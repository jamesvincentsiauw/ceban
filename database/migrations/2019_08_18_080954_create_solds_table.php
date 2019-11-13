<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solds', function (Blueprint $table) {
            $table->string('nomorPenjualan');
            $table->string('namaPelanggan');
            $table->string('kodeBarang');
            $table->integer('qty');
            $table->string('hargaSatuan');
            $table->string('hargaTotal');
            $table->string('grandTotal');
            $table->timestamps();
            $table->foreign('kodeBarang')->references('kodeBarang')->on('inventories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solds');
    }
}
