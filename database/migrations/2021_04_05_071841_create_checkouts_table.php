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
            // Pembeli
            $table->foreignId('users_id')->nullable()->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            // Voucher
            // $table->foreignId('vouchers_id')->nullable()->references('id')->on('vouchers')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('type');
            $table->string('discount');
            // penjual / referal code
            $table->foreignId('merchant_id')->nullable()->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('total');
            $table->integer('status');
            // $table->string('invoice')->nullable();
            // $table->dateTime('date_invoice')->nullable();
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
