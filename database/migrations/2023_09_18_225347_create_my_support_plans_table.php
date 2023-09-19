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
        Schema::create('my_support_plans', function (Blueprint $table) {
            
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('patient_id');
            $table->text('comm_skills');
            $table->text('friend_fam');
            $table->text('mobility_dexterity');
            $table->text('routines_personal_care');
            $table->text('needs');
            $table->text('emotions');
            $table->text('daily_living_skills');
            $table->text('general_health_needs');
            $table->text('medication_support');
            $table->text('recreation_and_relation');
            $table->text('eating_drinking_nutrition');
            $table->text('psychological_support');
            $table->text('finance');
            $table->string('staff_email');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Fixed foreign 
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_support_plans');
    }
};
