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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('id_pesanan');
            $table->bigInteger('order')->unsigned()->nullable();
            $table->foreign('order')->references('id')->on('orders');
            $table->string('order_id')->nullable();
            $table->bigInteger('cart_id')->unsigned();
            $table->foreign('cart_id')->references('id')->on('carts');
            $table->string('alamat');
            $table->string('resi')->nullable();
            $table->string('status');
            $table->string('tanggal_pesan');
            $table->string('tanggal_jadi');
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
        Schema::dropIfExists('pesanans');
    }
};
