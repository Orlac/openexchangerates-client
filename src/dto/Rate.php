<?php

namespace orlac\openexchangerates\dto;

/**
 * 
 */
class Rate
{

    public function __construct(
        public string $base,
        public string $code,
        public float $value,
    ) {
    }
}
