<?php

namespace orlac\openexchangerates\dto;

/**
 * 
 */
class Currency
{

    public function __construct(
        public string $code,
        public string $name,
    ) {
    }
}
