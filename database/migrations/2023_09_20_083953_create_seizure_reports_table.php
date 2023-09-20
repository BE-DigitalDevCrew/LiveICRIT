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
        Schema::create('seizure_reports', function (Blueprint $table) {
            $table->id();
            $table->string('ref_number');
            $table->string('location');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('patient_id');
            $table->date('date_of_incident');
            $table->time('time_of_incident');
            $table->json('other_forms_1')->nullable();
            $table->json('other_forms_2')->nullable();
            $table->string('did_fall');
            $table->string('initials_of_harm');
            $table->text('incident_description');
            $table->text('any_causes_to_incident');
            $table->json('any_other_forms')->nullable();
            $table->string('stiffen');
            $table->string('conciousness');
            $table->string('color');
            $table->string('movement');
            $table->string('breathing');
            $table->json('parts');
            $table->string('how_long_seizure');
            $table->string('incontinence');
            $table->json('condition_after_seizure')->nullable();
            $table->string('recovery_date');
            $table->string('person_injury');
            $table->string('treatment');
            $table->json('triggers')->nullable();
            $table->string('reported_by');
            $table->date('report_date');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seizure_reports');
    }
};
