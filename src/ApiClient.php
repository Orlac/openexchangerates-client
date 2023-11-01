<?php

namespace orlac\openexchangerates;

/**
 * 
 */
final class ApiClient
{

    public function __construct(
        private IConnect $connector,
    ) {
    }

    public function request(string $endpoint, IDtoBuilder $dtoBuilder, $params = []): mixed
    {
        return $dtoBuilder->build($endpoint, $this->connector->get($endpoint, $params));
    }
}
