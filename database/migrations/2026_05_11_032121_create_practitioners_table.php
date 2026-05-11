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
        Schema::create('practitioners', function (Blueprint $table) {
            $table->id();

            $table->string('satusehat_practitioner_id')->nullable()->unique();

            $table->string('nik')->unique();
            $table->string('name');

            $table->enum('gender', ['male', 'female', 'other', 'unknown']);

            $table->date('birth_date')->nullable();

            // contoh:
            // dokter umum, spesialis anak, perawat, dll
            $table->string('specialization')->nullable();

            $table->string('phone')->nullable();
            $table->text('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practitioners');
    }
};
