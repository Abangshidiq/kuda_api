<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{    
    public function up(): void
    {
        Schema::create('datakuda', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jeniskuda_id')->constrained('jeniskuda')->onDelete('cascade');
            $table->string('nama');
            $table->float('berat');
            $table->string('tahunlahir');
            $table->string('gambar'); // akan menyimpan nama file atau link
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('data_kudas');
    }
};
