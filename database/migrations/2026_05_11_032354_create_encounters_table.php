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
        Schema::create('encounters', function (Blueprint $table) {
            $table->id();

            $table->string('satusehat_encounter_id')->nullable()->unique();


            //relasi
            $table->foreignId('patient_id')
                ->constrained('patients')
                ->cascadeOnDelete();

            $table->foreignId('practitioner_id')
                ->constrained('practitioners')
                ->cascadeOnDelete();

            $table->foreignId('organization_id')
                ->constrained('organizations')
                ->cascadeOnDelete();

            $table->foreignId('location_id')
                ->constrained('locations')
                ->cascadeOnDelete();

            //encounter data

            // planned, in-progress, finished, cancelled
            $table->enum('status',['planned', 'in-progress','finished', 'cancelled'])->default('planned');

            // outpatient, inpatient, emergency
            $table->string('class')->nullable();

            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();

            // discharge disposition
            // contoh:
            // home, transferred, deceased
            $table->string('discharge_disposition')->nullable();

            // catatan tambahan
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encounters');
    }
};
