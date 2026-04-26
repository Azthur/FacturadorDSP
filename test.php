<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$service = new Modules\ApiPeruDev\Data\ServiceData();
$result = $service->service('ruc', '20600453271');
echo json_encode($result, JSON_PRETTY_PRINT);
