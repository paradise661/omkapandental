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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            // Step 1: Personal Information
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->date('dob')->nullable();
            $table->enum('patient_type', ['New Patient', 'Existing Patient'])->nullable();

            // Step 2: Appointment Details
            $table->string('service_type')->nullable();
            $table->string('doctor')->nullable();
            $table->date('appointment_date')->nullable();
            $table->string('appointment_time')->nullable();
            $table->text('reason_visit')->nullable();

            // Step 3: Insurance Information
            $table->enum('insurance', ['Yes', 'No', 'Not Sure'])->nullable();
            $table->string('insurance_provider')->nullable();
            $table->string('policy_number')->nullable();
            $table->string('group_number')->nullable();

            // Step 4: Medical History
            $table->json('medical_conditions')->nullable();
            $table->text('medication')->nullable();
            $table->text('allergies')->nullable();

            // Step 5: Communication Preferences
            $table->json('appointment_reminders')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
