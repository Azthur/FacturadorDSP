<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;
$client = new Client();
$res = $client->request('GET', 'https://api.org.pe/v1/ruc/20600453271', [
    'headers' => [
        'Authorization' => 'Bearer 7964086d139cec9233e0581c3ceb49cQ',
        'Accept' => 'application/json',
    ],
    'verify' => false,
]);
echo $res->getBody();
