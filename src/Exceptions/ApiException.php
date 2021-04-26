<?php declare(strict_types=1);

namespace Ctrlc\Address\Exceptions;

use Exception;
use Throwable;

class ApiException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $newMessage = __('ctrlc_geocoding::messages.api_error');
        parent::__construct($newMessage, $code, $previous);
    }
}
