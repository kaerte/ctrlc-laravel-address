<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeocodingsTable extends Migration
{
    public function up(): void
    {
        Schema::create('geocodings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->nullableMorphs('geocodingable');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->json('geocoding_metadata')->nullable();
            $table->string('geocoding_provider');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('geocodings');
    }
}
