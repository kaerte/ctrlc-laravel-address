<?php

declare(strict_types=1);

namespace Ctrlc\Address\Tests\Feature;

use Ctrlc\Address\Events\GeocodingApiLimitExceeded;
use Ctrlc\Address\Models\Address;
use Ctrlc\Address\Services\GeocodingServiceContract;
use Ctrlc\Address\Services\GoogleGeocoding;
use Ctrlc\Address\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Http;

class GoogleGeocodingTest extends TestCase
{
    use RefreshDatabase;

    protected GeocodingServiceContract $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new GoogleGeocoding();
    }

    public function test_ok(): void
    {
        $response = file_get_contents(__DIR__.'../../__mocks/responses/google/OK.json');
        Http::fake([
            GoogleGeocoding::URL.'*' => Http::response($response, 200, ['Content-Type' => 'application/json; charset=UTF-8']),
        ]);
        $address = $this->service->reverseGeocode('K1M 1M4');
        $this->verifyAddress($address);
    }

    public function test_zero_results()
    {
        $response = file_get_contents(__DIR__.'../../__mocks/responses/google/ZERO_RESULTS.json');
        Http::fake([
            GoogleGeocoding::URL.'*' => Http::response($response, 200, ['Content-Type' => 'application/json; charset=UTF-8']),
        ]);

        $address = $this->service->reverseGeocode('K1M 1M4');
        self::assertNull($address);
    }

    public function test_invalid_request()
    {
        $response = file_get_contents(__DIR__.'../../__mocks/responses/google/INVALID_REQUEST.json');
        Http::fake([
            GoogleGeocoding::URL.'*' => Http::response($response, 200, ['Content-Type' => 'application/json; charset=UTF-8']),
        ]);

        $address = $this->service->reverseGeocode('K1M 1M4');
        self::assertNull($address);
    }

    public function test_query_daily_limit()
    {
        Event::fake();

        $response = file_get_contents(__DIR__.'../../__mocks/responses/google/QUERY_DAILY_LIMIT.json');
        Http::fake([
            GoogleGeocoding::URL.'*' => Http::response($response, 200, ['Content-Type' => 'application/json; charset=UTF-8']),
        ]);

        $address = $this->service->reverseGeocode('K1M 1M4');

        Event::assertDispatched(GeocodingApiLimitExceeded::class);
        self::assertNull($address);
    }

    private function verifyAddress(Address $address)
    {
        self::assertInstanceOf(Address::class, $address);
        self::assertEquals('24', $address->line_1);
        self::assertEquals('Sussex Drive', $address->line_2);
        self::assertEquals('Ottawa', $address->line_3);
        self::assertEquals('Ontario', $address->city);
        self::assertEquals('K1M 1M4', $address->postcode);
        self::assertEquals('CA', $address->country->iso_2);
        self::assertEquals(45.4444101, $address->latitude);
        self::assertEquals(-75.69387789999999, $address->longitude);
    }
}
