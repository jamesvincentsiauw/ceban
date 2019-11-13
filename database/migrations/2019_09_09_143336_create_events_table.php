<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->string('eventID')->unique()->primary();
            $table->string('poster')->comment('File Path');
            $table->string('eventName');
            $table->string('category')->comment('Workshop/Seminar/Concert/Other');
            $table->string('location');
            $table->string('price')->default('Rp 0,00');
            $table->string('organizationName');
            $table->date('eventDate');
            $table->integer('availableMaximumTicket')->comment('99 for infinite');
            $table->string('status')->comment('Active/Expired')->default('Active');
            $table->timestamps();
            $table->foreign('organizationName')->references('organizationName')->on('owners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
