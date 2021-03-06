<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->string('eventID');
            $table->string('participantID')->unique()->primary();
            $table->string('participantName');
            $table->string('participantEmail');
            $table->string('phone')->nullable();
            $table->string('qty');
            $table->boolean('verified')->default(false);
            $table->string('ticketFile')->default('TBD');
            $table->timestamps();
            $table->foreign('participantEmail')->references('email')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('eventID')->references('eventID')->on('events')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}