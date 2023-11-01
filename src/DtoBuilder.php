<?php

namespace orlac\openexchangerates;

use orlac\openexchangerates\dto\Latest;
use orlac\openexchangerates\dto\Rate;
use stdClass;

/**
 * 
 */
class DtoBuilder implements IDtoBuilder
{

    public function build(string $type, array $data): mixed
    {
        return match ($type) {
            Endpoints::Latest->value => $this->getLatest($data),
        };
    }

    private function getLatest(array $data): Latest
    {
        $rates = [];
        foreach ($data['rates'] ?? [] as $key => $item) {
            $rates[] = new Rate($data['base'], $key, $item);
        }
        return new Latest(
            $data['timestamp'],
            $data['disclaimer'],
            $data['license'],
            new Rate(
                $data['base'],
                $data['base'],
                1
            ),
            $rates,
        );
    }
}
