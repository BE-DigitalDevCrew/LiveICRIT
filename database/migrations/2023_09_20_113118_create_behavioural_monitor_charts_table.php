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
        Schema::create('behavioural_monitor_charts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('user_id'); // Assuming you associate it with a user
            $table->date('date');
            $table->string('known_behaviours');
            $table->string('totals');
            $table->time('time');
            $table->string('known_behaviour_reference');
            $table->string('comments');
            $table->enum('injuries', ['yes', 'no']);
            $table->string('initials');   
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
        Schema::dropIfExists('behavioural_monitor_charts');
    }
};
