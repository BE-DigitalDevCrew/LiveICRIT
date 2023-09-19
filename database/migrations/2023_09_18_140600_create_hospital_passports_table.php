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
        Schema::create('hospital_passports', function (Blueprint $table) {
            $table->id();
            $table->date('assessment_date');
            $table->string('staff_email');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('patient_id');
            $table->string('likes_to_be_known');
            $table->string('nhs_number');
            $table->date('dob');
            $table->string('address');
            $table->string('city');
            $table->string('county');
            $table->string('country');
            $table->string('phone_number');
            $table->string('email');
            $table->text('my_support_care_needs');
            $table->text('my_carer_speaks');
            $table->text('things_to_know');
            $table->text('religious_needs');
            $table->text('ethnicity');
            $table->text('gp_name');
            $table->text('gp_address');
            $table->text('gp_city');
            $table->text('gp_county');
            $table->text('gp_other_services');
            $table->text('gp_social_worker');
            $table->text('gp_allergies');
            $table->text('gp_medical_interventions');
            $table->text('gp_cardio_vascular');
            $table->text('gp_risk_of_chocking');
            $table->text('gp_current_medication');
            $table->text('gp_mymedicalhistory');
            $table->text('gp_anxious');
            $table->text('how_to_comm');
            $table->string('how_i_medicate');
            $table->string('how_you_know_pain');
            $table->string('moving_around');
            $table->string('person_care');
            $table->string('seeing_hearing');
            $table->string('how_i_eat');
            $table->string('how_i_keep_safe');
            $table->string('how_i_toilet');
            $table->string('sleeping_pattern');
            $table->string('likes');
            $table->string('dislike');
            $table->text('additional_info');
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
        Schema::dropIfExists('hospital_passports');
    }
};
