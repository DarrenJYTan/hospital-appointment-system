<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_lists', function (Blueprint $table) {
            $table->id();
            $table->string('patientId');
            $table->string('patientName');
            $table->string('appointmentCode');
            $table->string('status');
            $table->string('assignTo');
            $table->string('assignBy');
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
        Schema::dropIfExists('appointment_lists');
    }
}
