<?php
/**
 * MIGRACIÓN TOTAL INTEGRAL - DATASERVER PERU S.A.C.
 * Pro 4 -> Pro 7 (Versión PDO)
 */
set_time_limit(0);

$host = 'facturador_db';
$user = 'root';
$pass = 'root';
$db_old = 'tenancy_dataserver_temp';
$db_new = 'tenancy_dataserver';

try {
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

echo "--- INICIANDO TRASPASO TOTAL DEFINITIVO (PDO) ---\n";

$pdo->exec("SET GLOBAL FOREIGN_KEY_CHECKS = 0");
$pdo->exec("SET FOREIGN_KEY_CHECKS = 0");
$pdo->exec("SET sql_mode = ''");

$tables = [
    // CONFIGURACIÓN Y CATÁLOGOS
    "establishments",
    "series",
    "users",
    "warehouses",
    "configurations",
    "payment_conditions",
    "exchange_rates",
    "zones",
    "cat_operation_types",
    "cat_identity_document_types",
    "cat_payment_method_types",
    "cat_unit_types",
    "cat_note_credit_types",
    "cat_note_debit_types",
    "cat_affectation_igv_types",
    "cat_system_isc_types",
    "cat_price_types",
    "cat_attribute_types",
    "cat_charge_discount_types",
    "payment_method_types",

    // MAESTROS
    "persons",
    "items",
    "item_warehouse",
    "item_unit_types",
    "item_lots",
    "item_lots_group",
    "brands",
    "categories",

    // DOCUMENTOS E INVOICES
    "documents",
    "document_items",
    "document_fee",
    "document_payments",
    "invoices",
    "summaries",
    "summary_documents",
    "voided",
    "voided_documents",

    // COTIZACIONES Y VENTAS AVANZADAS
    "quotations",
    "quotation_items",
    "sale_opportunities",
    "contracts",

    // NOTAS Y COMPRAS
    "notes",
    "sale_notes",
    "sale_note_items",
    "sale_note_payments",
    "purchases",
    "purchase_items",
    "purchase_payments",
    "purchase_fee",

    // LOGÍSTICA Y FINANZAS
    "dispatches",
    "dispatch_items",
    "dispatchers",
    "drivers",
    "transports",
    "cash",
    "cash_documents",
    "global_payments"
];

foreach ($tables as $table) {
    echo ">> Procesando $table... ";

    try {
        $stmt = $pdo->query("SHOW TABLES FROM $db_old LIKE '$table'");
        if ($stmt->rowCount() == 0) {
            echo "SALTADA (No existe en origen)\n";
            continue;
        }

        $pdo->exec("TRUNCATE TABLE $db_new.$table");

        $stmt = $pdo->query("SHOW COLUMNS FROM $db_old.$table");
        $columnsOld = $stmt->fetchAll(PDO::FETCH_COLUMN);

        $stmt = $pdo->query("SHOW COLUMNS FROM $db_new.$table");
        $columnsNew = $stmt->fetchAll(PDO::FETCH_COLUMN);

        $commonColumns = array_intersect($columnsOld, $columnsNew);
        $quotedColumns = array_map(function ($col) {
            return "`$col`"; }, $commonColumns);
        $colList = implode(", ", $quotedColumns);

        $sql = "INSERT INTO $db_new.$table ($colList) SELECT $colList FROM $db_old.$table";
        $count = $pdo->exec($sql);
        echo "OK ($count filas)\n";

    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage() . "\n";
    }
}

$pdo->exec("SET FOREIGN_KEY_CHECKS = 1");
echo "\n--- MIGRACIÓN COMPLETADA ---\n";
