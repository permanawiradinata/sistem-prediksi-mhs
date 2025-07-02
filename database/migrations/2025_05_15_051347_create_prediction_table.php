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
        Schema::create('prediction', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 200)->nullable();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->enum('status_bekerja', ['bekerja', 'tidak'])->nullable();
            $table->string('umur', 100)->nullable();
            $table->enum('status_menikah', ['menikah', 'belum'])->nullable();
            $table->decimal('ips1')->nullable();
            $table->decimal('ips2')->nullable();
            $table->decimal('ips3')->nullable();
            $table->decimal('ips4')->nullable();
            $table->decimal('ipk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prediction');
    }
};
