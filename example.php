<?php

use orlac\openexchangerates\ApiClient;
use orlac\openexchangerates\CurlConnect;
use orlac\openexchangerates\DtoBuilder;
use orlac\openexchangerates\DtoCurrencyBuilder;
use orlac\openexchangerates\Endpoints;
use orlac\openexchangerates\Exception;

require('vendor/autoload.php');

$appId = '<your_app_id>';
$baseUri = 'https://openexchangerates.org/api/';

$client = new ApiClient(new CurlConnect($appId, $baseUri));

try {
    $rsp = $client->request(Endpoints::Latest->value, new DtoBuilder());
    var_dump($rsp);
    // Пример как прикрутить получеение данных и из других эндпойнтов этого апи.
    $rsp = $client->request(Endpoints::Currencies->value, new DtoCurrencyBuilder());
    var_dump($rsp);
} catch (Exception $ex) {
    echo $ex->getCode() . PHP_EOL;
    echo $ex->getMessage() . PHP_EOL;
}