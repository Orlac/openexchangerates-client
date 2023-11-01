<?php

namespace orlac\openexchangerates;


interface IConnect
{

    public function get(string $endpoint, array $params = []): array;
}
