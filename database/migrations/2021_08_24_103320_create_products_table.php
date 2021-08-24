<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('url')->nullable();
            $table->boolean('is_active')->default(1);
            $table->integer('sort')->nullable();
            $table->string('img')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('inner_diameter')->nullable();
            $table->string('external_diameter')->nullable();
            $table->string('width')->nullable();
            $table->string('analogs')->nullable();
            $table->string('weight')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('products');
    }
}
