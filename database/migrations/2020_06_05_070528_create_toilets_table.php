<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToiletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toilets', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('business_product_id')->nullable();
            $table->string('name');
            $table->string('street');
            $table->string('house_number')->nullable();
            $table->unsignedInteger('postal_code');
            $table->string('city_name');
            $table->string('main_city_name');
            $table->string('promotional_region');
            $table->float('lat', 20, 17);
            $table->float('long', 20, 17);
            $table->text('product_description');
            $table->text('accessibility_description');
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('toilets');
    }
}
