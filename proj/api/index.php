<?php
require 'vendor/autoload.php';
$app = new Core\CustomSlim(array(
    'debug' => true
));
$client = new GuzzleHttp\Client();

$app->get('/', function() use ($app, $client) {

    $client->get('http://httpbin.org', ['future' => true])
        ->then(function ($response) {
            echo $response->getStatusCode();
        });
});
$app->run();