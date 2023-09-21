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
        Schema::create('medication_incidents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('user_id');
            $table->string('phone_number');
            $table->string('address');
            $table->string('email');
            $table->string('street_address');
            $table->string('city');
            $table->string('country');
            $table->string('relativeStatus');
            $table->text('detailsOfComplaint');
            $table->string('complaintDescription');
            $table->string('recordedBy');
            $table->string('injuries');
            $table->date('complaintDate');
            $table->string('position');
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medication_incidents');
    }
};
