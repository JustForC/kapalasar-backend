<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('vouchers_id')->references('id')->on('vouchers')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('total');
            $table->integer('status');
            $table->string('invoice')->nullable();
            $table->dateTime('date_invoice')->nullable();
            $table->string('receipt')->nullable();
            $table->dateTime('date_receipt')->nullable();
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
        Schema::dropIfExists('checkouts');
    }
}
