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
            $table->string('satusehat_patient_id')->nullable()->unique();
            $table->string('nik')->unique();
            $table->string('name');
            $table->enum('gender', ['male', 'female', 'other', 'unknown']);
            $table->date('birth_date');
            $table->string('birth_place')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('mother_nik')->nullable();

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
