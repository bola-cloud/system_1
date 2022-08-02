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
            $table->timestamps();
            $table->string('product_name');
            $table->text('description');
            $table->integer('category_id')->nullable();
            $table->integer('quantity_inshop');
            $table->integer('quantity_total');
            $table->integer('price');
            $table->integer('cost');
            $table->integer('sale_price');
            $table->integer('sale');
            $table->string('brand');
            $table->integer('product_code')->default('0');
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
