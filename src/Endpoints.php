<?php

namespace orlac\openexchangerates;

enum Endpoints: string
{
    case Latest = 'latest.json';
    case Currencies = 'currencies.json';
}
