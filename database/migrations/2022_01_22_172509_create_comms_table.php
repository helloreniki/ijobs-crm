<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id');
            $table->text('content');
            $table->string('type')->nullable(); // phone, email, video call
            $table->date('date');
            $table->date('date_of_next_contact')->nullable();
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
        Schema::dropIfExists('comms');
    }
}
