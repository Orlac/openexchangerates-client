<?php

namespace orlac\openexchangerates\dto;

/**
 * 
 */
class Latest
{

    public function __construct(
        public readonly int $timestamp,
        public readonly string $disclaimer,
        public readonly string $license,
        public readonly Rate $base,
        public array $rates,
    ) {
    }

}
