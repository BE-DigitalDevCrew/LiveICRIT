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
        Schema::create('abc_reports', function (Blueprint $table) {
            $table->id();
            $table->string('initialsOfPerson');
            $table->unsignedBigInteger("user_id");
            $table->time('start_time');
            $table->time('end_time');
            $table->string('influencing_factors');
            $table->string('what_happened_before_incident');
            $table->json('behaviors'); // Assuming it's stored as JSON
            $table->string('what_happened_after_incident');
            $table->string('immediate_actions');
            $table->string('done_differently');
            $table->enum('proact_scip_interventions', ['Yes', 'No']);
            $table->enum('medication_administered', ['Yes', 'No']);
            $table->enum('physical_contact_injury_intimidation', ['Yes', 'No']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abc_reports');
    }
};
