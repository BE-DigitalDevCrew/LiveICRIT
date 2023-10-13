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
        Schema::create('daily_entries', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('shift'); // Shift field
            $table->string('patient_name');
            $table->unsignedBigInteger('staff_id');
            $table->unsignedBigInteger('patient_id');   
            $table->string('personal_care'); // Personal Care field
            $table->string('medication_admin'); // Medication Admin field
            $table->string('appointments'); // Appointments field
            $table->string('activities'); // Activities field
            $table->string('incident'); // Incident field
            $table->string('comments'); // Incident field
            $table->foreign('staff_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade'); 
            $table->string("prepared_by");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_entries');
    }
};
