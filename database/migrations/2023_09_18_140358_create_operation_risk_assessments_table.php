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
        Schema::create('operation_risk_assessments', function (Blueprint $table) {
            
            $table->id();
            $table->date('assessment_date');
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("patient_id");
            $table->string('assessors_email');
            $table->string('what_causes_harm');
            $table->string('where_is_the_hazard');
            $table->string('who_might_be_harmed');
            $table->string('how_will_they_be_harmed');
            $table->string('how_often_are_exposed_hazard');
            $table->string('how_long_exposed_hazard');
            $table->enum('disallowing_activity', ['Yes', 'No']);
            $table->text('comment');
            $table->enum('likelihood_harm', ['Unlikely', 'No', 'Very Likely']);
            $table->text('list_of_control_measures');
            $table->date('date_when_control_measures_implemented');
            $table->string('identity_training_required_risk');
            $table->date('identity_training_was_specified');
            $table->string('identity_equipment_reduced_risk');
            $table->date('date_equipment_provided');
            $table->enum('likelihood_radio_harm', ['Unlikely', 'No', 'Very Likely']);
            $table->enum('how_serious_harm_radio', ['No Injury', 'Minor Injury', 'Major Injury', 'Death']);
            $table->text('additional_control_measures');
            $table->date('completion_control_measures');
            $table->string('risk_assessment_drawn_by');
            $table->date('risk_assessment_date');
            $table->enum('assessment_taken_mental', ['Yes', 'No']);
            $table->text('please_comment_any_behaviours');
            $table->enum('positive_liberty_issue', ['Yes', 'No']);
            $table->enum('outcome_best_interest_radio', ['Yes', 'No']);
            $table->date('date_of_review');
            $table->text('changes_required');
            $table->string('managers_name');
            $table->string('risk_assessment_Activity_accessed');
            $table->date('date_of_assessment');
            $table->string('signage_name');
            $table->date('signage_date');
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
        Schema::dropIfExists('operation_risk_assessments');
    }
};
