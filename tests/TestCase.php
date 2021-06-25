<?php

declare(strict_types=1);

namespace Ctrlc\Address\Tests;

use Ctrlc\Address\Providers\AddressesServiceProvider;
use Ctrlc\Address\Providers\GeoCodingServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->loadLaravelMigrations();
    }

    protected function getPackageProviders($app): array
    {
        return [AddressesServiceProvider::class, GeoCodingServiceProvider::class];
    }
}
