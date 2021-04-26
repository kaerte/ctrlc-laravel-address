<?php declare(strict_types=1);

namespace Ctrlc\Address\Exceptions;

use Ctrlc\Address\Events\GeocodingApiLimitExceeded;
use Exception;
use Throwable;

class ApiLimitException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $newMessage = __('ctrlc_geocoding::messages.api_limit_exceeded', ['limit' => $message]);
        parent::__construct($newMessage, $code, $previous);
    }

    public function report(): void
    {
        GeocodingApiLimitExceeded::dispatch($this);
    }
}
