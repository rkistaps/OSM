<?php

declare(strict_types=1);

namespace OSM\Core\Collections;

use OSM\Core\Models\Country;

class CountryCollection extends AbstractModelCollection
{
    public function getModelClassName(): string
    {
        return Country::class;
    }
}
