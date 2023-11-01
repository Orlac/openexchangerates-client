<?php

namespace orlac\openexchangerates;

use orlac\openexchangerates\dto\Currency;

/**
 * 
 */
final class DtoCurrencyBuilder implements IDtoBuilder
{

    public function build(string $type, array $data): mixed
    {
        $result = [];
        foreach ($data ?? [] as $key => $item) {
            $result[] = new Currency($key, $item);
        }
        return $result;
    }

}
