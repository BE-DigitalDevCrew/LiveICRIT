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
        Schema::create('falls_checklists', function (Blueprint $table) {
       
            $table->id();
                $table->unsignedBigInteger('patient_id');
                $table->unsignedBigInteger('user_id');
                $table->date('date');
                $table->string('incident_ref');
                $table->string('completed_by');
                $table->enum('health_concern', ['Yes', 'No']);
                $table->enum('personal_care', ['Yes', 'No']);
                $table->enum('breathing', ['Yes', 'No']);
                $table->enum('head_injury', ['Yes', 'No', 'Minor']);
                $table->enum('fall_distance', ['Yes', 'No']);
                $table->enum('serious_injury_suspected', ['Yes', 'No']);
                $table->enum('bleeding_or_skin_tear', ['Yes', 'No']);
                $table->enum('unusual_pain', ['Yes', 'No']);
                $table->enum('weight_bear', ['Yes', 'No']);
                $table->enum('recommend_attendance', ['Yes', 'No']);
                $table->enum('use_hoist', ['Yes', 'No']);
                $table->enum('hoist_not_used_space', ['Yes', 'No']);
                $table->string('comments_space');
                $table->enum('hoist_not_used_dignity', ['Yes', 'No']);
                $table->string('comments_dignity');
                $table->string('comments_position');
                $table->string('comments_other');
                $table->enum('handling_belt_used', ['Yes', 'No']);
                $table->string('comments_belt');
                $table->enum('pain_altered', ['Yes', 'No']);
                $table->enum('able_to_walk', ['Yes', 'No']);
                $table->string('immediate_cause');
                $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('falls_checklists');
    }
};
