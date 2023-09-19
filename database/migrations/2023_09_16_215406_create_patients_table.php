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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('house');
            $table->unsignedBigInteger('Staff_Id'); // Assuming it's a foreign key reference to another table.
            $table->string('id_number');
            $table->string('address');
            $table->string('phone_number');
            $table->foreign('Staff_Id')->references('id')->on('users')->onDelete('cascade');
            $table->string('email')->unique();
            $table->timestamps();       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
