<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlashSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flash_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flashes_id')->references('id')->on('flashes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('products_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->integer('new_price');
            $table->integer('amount')->nullable();
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
        Schema::dropIfExists('flash_sales');
    }
}
