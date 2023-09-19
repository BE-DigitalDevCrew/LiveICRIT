<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('incident_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('user_id');
            $table->string('ref_number');
            $table->string('location');
            $table->date('date');
            $table->time('time');
            $table->string('person_affected');
            $table->string('initials');
            $table->text('description');
            $table->text('identified_causes');
            $table->string('completed_forms');
            $table->string('name_of_person');
            $table->date('date_completed');
            $table->string('manager_on_call');
            // Define foreign key constraint
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incident_reports');
    }
};
