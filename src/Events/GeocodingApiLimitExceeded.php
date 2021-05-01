<?php

declare(strict_types=1);

namespace Ctrlc\Address\Events;

use Ctrlc\Address\Exceptions\ApiLimitException;
use Illuminate\Foundation\Events\Dispatchable;

class GeocodingApiLimitExceeded
{
    use Dispatchable;

    public function __construct(
        public ApiLimitException $exception
    ) {
    }
}
