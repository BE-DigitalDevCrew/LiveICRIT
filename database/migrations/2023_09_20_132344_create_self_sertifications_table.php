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
        Schema::create('self_sertifications', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->unsignedBigInteger('user_id');
            $table->string('service_department');
            $table->string('absence_date');
            $table->string('reason_of_absence');
            $table->enum('absent_due_to_accident', ['Yes', 'No']);
            $table->enum('consulted_medical_practitioner', ['Yes', 'No']);
            $table->text('medical_advice');
            $table->text('declaration');
            $table->string('declaration_name');
            $table->string('declaration_last_name');
            $table->date('declaration_date');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('self_sertifications');
    }
};
