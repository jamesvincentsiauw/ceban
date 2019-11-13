<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->string('eventID');
            $table->string('participantID');
            $table->string('ticketFile')->comment('File Path');
            $table->timestamps();
            $table->foreign('eventID')->references('eventID')->on('events');
            $table->foreign('participantID')->references('participantID')->on('participants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
