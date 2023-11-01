<?php

namespace orlac\openexchangerates;

use stdClass;

interface IDtoBuilder
{

    public function build(string $type, array $params): mixed;
}
