# openexchangerates-client

PHP client https://openexchangerates.org/

## Install

Via Composer

``` bash
$ composer require orlac/openexchangerates
```

## Usage

```php
$appId = '<your_app_id>';
$baseUri = 'https://openexchangerates.org/api/';

$client = new ApiClient(new CurlConnect($appId, $baseUri));

$rsp = $client->request(Endpoints::Latest->value, new DtoBuilder());

var_dump($rsp);
```
