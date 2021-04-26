<?php declare(strict_types=1);

use Ctrlc\Address\Models\Country;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->nullableMorphs('addressable');
            $table->string('label')->nullable();
            $table->string('company')->nullable();
            $table->string('first_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('line1')->nullable();
            $table->string('line2')->nullable();
            $table->string('line3')->nullable();
            $table->string('postcode', 50)->nullable();
            $table->string('city', 80)->nullable();
            $table->foreignIdFor(Country::class)->constrained();

            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            $table->boolean('is_primary')->default(false);
            $table->boolean('is_billing')->default(false);
            $table->boolean('is_shipping')->default(false);

            $table->json('geocoding_metadata')->nullable();
            $table->string('geocoding_provider')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
}
