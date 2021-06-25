<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->nullableMorphs('addressable');
            $table->string('first_name', 255)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->string('company', 255)->nullable();
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city', 100);
            $table->string('state_or_province', 100)->nullable();
            $table->string('postal_code', 30);
            $table->string('country_code', 2)->index();
            $table->string('phone', 50)->nullable();
            $table->boolean('is_primary')->default(true);
            $table->boolean('is_billing')->default(false);
            $table->boolean('is_shipping')->default(false);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
}
