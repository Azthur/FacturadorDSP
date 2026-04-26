<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Hyn\Tenancy\Environment;
use Hyn\Tenancy\Models\Website;

$id = 1;
$website = Website::find($id);
if ($website) {
    echo "Switching to website ID: {$id} ({$website->uuid})\n";
    $env = app(Environment::class);
    $env->tenant($website);
} else {
    echo "Website ID: {$id} not found!\n";
    exit(1);
}

$service = new Modules\ApiPeruDev\Data\ServiceData();
$date = '2025-11-14';

echo "Testing service('tc', '$date'):\n";
$result1 = $service->service('tc', $date);
echo json_encode($result1, JSON_PRETTY_PRINT) . "\n\n";

echo "Testing exchange('$date'):\n";
$result2 = $service->exchange($date);
echo json_encode($result2, JSON_PRETTY_PRINT) . "\n";
