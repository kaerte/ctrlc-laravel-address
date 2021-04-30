<?php declare(strict_types=1);

namespace Ctrlc\Address\Services;

use Ctrlc\Address\Exceptions\AddressNotFoundException;
use Ctrlc\Address\Exceptions\ApiException;
use Ctrlc\Address\Exceptions\ApiLimitException;
use Ctrlc\Address\Models\Address;
use Ctrlc\Address\Models\Country;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use JsonException;

class GoogleGeocoding implements GeocodingServiceContract
{
    public const URL = 'https://maps.googleapis.com/maps/api/geocode/json';

    public function reverseGeocode(string $postcode, ?string $city = ''): ?Address
    {
        try {
            $address = trim($postcode . ' ' . $city);
            $response = Http::get(self::URL, [
                'address' => $address,
                'key' => config('ctrlc.geocoding.google.key'),
            ]);

            $body = json_decode($response->body(), false, 20, JSON_THROW_ON_ERROR);

            return match ($body->status) {
                'OK' => $this->addressFromBody($body),
                'ZERO_RESULTS' => throw new AddressNotFoundException($address),
                'INVALID_REQUEST', 'REQUEST_DENIED', 'UNKNOWN_ERROR' => throw new ApiException($body->status),
                'OVER_DAILY_LIMIT', 'OVER_QUERY_LIMIT' => throw new ApiLimitException($body->status),
            };
        } catch (AddressNotFoundException | ApiException | ApiLimitException | JsonException $e) {
            report($e);

            return null;
        }
    }

    private function addressFromBody($body)
    {
        /** @var Collection $address_components */
        $address_components = collect($body->results[0]->address_components);
        /** @var Collection $geometry */
        $geometry = collect($body->results[0]->geometry);

        $country = $this->getKeyFromAddressComponents($address_components, 'country')?->short_name;

        return new Address([
            'line1' => $this->getKeyFromAddressComponents($address_components, 'street_number')?->long_name,
            'line2' => $this->getKeyFromAddressComponents($address_components, 'route')?->long_name,
            'line3' => $this->getKeyFromAddressComponents($address_components, 'locality')?->long_name,
            'postcode' => $this->getKeyFromAddressComponents($address_components, 'postal_code')?->long_name,
            'city' => $this->getKeyFromAddressComponents($address_components, 'administrative_area_level_1')?->long_name,
            'country_id' => Country::where('iso_2', $country)->firstOrFail()->id,

            'latitude' => $geometry['location']->lat,
            'longitude' => $geometry['location']->lng,

            'geocoding_metadata' => $body,
            'geocoding_provider' => $this::class,
        ]);
    }

    private function getKeyFromAddressComponents($address_components, string $key)
    {
        return $address_components->filter(fn ($component) => in_array($key, $component->types))->first();
    }
}