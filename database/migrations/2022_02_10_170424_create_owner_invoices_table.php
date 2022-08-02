<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnerInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner_invoices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('product_sold_id');
            $table->integer('total_paid');
            $table->integer('total_unpaid');
            $table->integer('total_cost');
            $table->integer('total_price');
            $table->integer('total_profit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('owner_invoices');
    }
}
