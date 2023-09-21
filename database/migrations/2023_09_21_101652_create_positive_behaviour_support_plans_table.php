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
        Schema::create('positive_behaviour_support_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('user_id');
            $table->date('todays_date');
            $table->date('review_date');
            $table->string('home_location');
            $table->string('street_address');
            $table->string('city');
            $table->string('county');
            $table->string('completed_by');
            $table->text('behaviors_when_happy_angry');
            $table->text('triggers');
            $table->text('actions');
            $table->text('behaviour_calm');
            $table->text('support');
            $table->text('behaviour_relaxed');
            $table->text('support_strategies');
            $table->text('recovery_period');
            $table->text('behaviour_crisis');
            $table->string('tablet_liquid');
            $table->string('strength');
            $table->string('route_admin');
            $table->string('dose_intervals');
            $table->string('dose_max');
            $table->enum('consulted_medical_practitioner', ['Yes', 'No']);
            $table->text('special_instructions');
            $table->text('reasons_admin');
            $table->text('name_medicine');
            $table->enum('medication', ['Prescribed', 'Over The Counter']);
            $table->text('condition');
            $table->text('history');
            $table->text('documentation');
            $table->text('personal_care');
            $table->text('family_views');
            $table->text('person_views');
            $table->enum('controls_agreed', ['Yes', 'No']);
            $table->enum('deprivation_of_liberty', ['Yes', 'No']);
            $table->text('name_aknowledged');
            $table->text('position');
            $table->text('role');
            $table->text('staff_email');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positive_behaviour_support_plans');
    }
};
