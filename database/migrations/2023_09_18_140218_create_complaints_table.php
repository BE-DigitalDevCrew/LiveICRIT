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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('user_id');
            $table->string('phone_number');
            $table->string('address');
            $table->string('email');
            $table->string('street_address');
            $table->string('city');
            $table->string('country');
            $table->string('relative_status');
            $table->string('detailsOfComplaint');
            $table->string('complaintDescription');
            $table->string('recordedBy');
            $table->enum('injuries', ['yes', 'no']);
            $table->date('complaintDate');
            $table->string('position');
            $table->timestamps();
            // Define foreign key constraints if needed
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
