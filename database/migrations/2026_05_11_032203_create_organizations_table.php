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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();

            $table->string('satusehat_organization_id')->nullable()->unique();

            // kode organisasi internal / kode faskes
            $table->string('organization_code')->nullable()->unique();

            $table->string('name');

            // contoh:
            // hospital, clinic, puskesmas
            $table->enum('type',['hospital', 'clinic', 'puskesmas'])->nullable();

            $table->text('address')->nullable();
            $table->string('phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
