<?php

declare(strict_types=1);

namespace Ctrlc\Address\Services;

use Ctrlc\Address\Models\Address;

interface GeocodingServiceContract
{
    public function reverseGeocode(string $postcode, ?string $city): ?Address;
}
