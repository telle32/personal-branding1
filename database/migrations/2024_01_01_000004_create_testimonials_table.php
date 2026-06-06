<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');           // Nama klien
            $table->string('position')->nullable(); // Jabatan / posisi klien
            $table->string('company')->nullable();  // Nama perusahaan
            $table->string('avatar')->nullable();   // Foto klien
            $table->text('content');           // Isi testimoni
            $table->tinyInteger('rating')->default(5); // Rating 1-5
            $table->boolean('is_active')->default(true); // Tampilkan di halaman publik
            $table->integer('order')->default(0);   // Urutan tampil
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
