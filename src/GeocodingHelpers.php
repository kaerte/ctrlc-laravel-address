<?php declare(strict_types=1);

namespace Ctrlc\Address;

use Ctrlc\Address\Models\Address;
use InvalidArgumentException;

class GeocodingHelpers
{
    public static function distanceBetweenTwoAddresses(Address $addressFrom, Address $addressTo, $unit = 'kilometers')
    {
        $lat1 = $addressFrom->latitude;
        $lng1 = $addressFrom->longitude;
        $lat2 = $addressTo->latitude;
        $lng2 = $addressTo->longitude;

        $theta = $lng1 - $lng2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;

        return match ($unit) {
            'kilometers' => number_format(($miles * 1.609344), 2),
            'nautical-miles' => number_format(($miles * 0.8684), 2),
            //miles
            'miles' => number_format($miles, 2),
            default => throw new InvalidArgumentException('Invalid distance unit')
        };
    }
}
