<?php declare(strict_types=1);

namespace Ctrlc\Address\Exceptions;

use Exception;
use Throwable;

class AddressNotFoundException extends Exception
{
    public function __construct($addressString = "", $code = 0, Throwable $previous = null)
    {
        $newMessage = __('ctrlc_geocoding::messages.address_not_found');
        parent::__construct($newMessage, $code, $previous);
    }
}
