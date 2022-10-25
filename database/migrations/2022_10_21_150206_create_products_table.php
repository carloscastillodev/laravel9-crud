<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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

            $table->string('name', 255)->index();
            $table->text('description');
            $table->string('quantity_per_unit', 50);
            $table->decimal('unit_price', 8, 2)->default(0.00);
            $table->unsignedSmallInteger('units_in_stock')->default(0);
            $table->unsignedSmallInteger('units_on_order')->default(0);
            $table->boolean('discontinued')->default(0);
            $table->string('image')->nullable();

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
};
