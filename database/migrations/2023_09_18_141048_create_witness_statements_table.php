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
        Schema::create('witness_statements', function (Blueprint $table) {
            $table->id();
            $table->string('ref_number');
            $table->unsignedBigInteger('user_id');
            $table->string('injured_person');
            $table->date('date_of_accident');
            $table->date('time_of_accident');
            $table->date('witness_dob');
            $table->string('witness_homeaddress');
            $table->string('street_address');
            $table->string('city');
            $table->string('county');
            $table->string('tel_number');
            $table->enum('fitzRoyEmployee', ['Yes', 'No']);
            $table->string('occupation');
            $table->string('what_happened');
            $table->text('position')->nullable(); // If you want to store checkbox values as JSON
            $table->text('description_accident');
            $table->string('where_were_you_positioned');
            $table->text('any_other_information');
            // Define foreign key constraint
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade'); // Cascade delete if user is deleted
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('witness_statements');
    }
};
