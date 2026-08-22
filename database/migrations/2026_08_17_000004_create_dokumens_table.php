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
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id('id_dokumen');
            $table->foreignId('id_pengajuan')
                  ->constrained('pengajuans', 'id_pengajuan')
                  ->onDelete('cascade');
            $table->enum('jenis_dokumen', [
                'surat_permohonan',
                'sk_kepala_desa',
                'surat_kuasa',
                'surat_penunjukan_admin'
            ]);
            $table->string('nama_file', 255);
            $table->string('path_file', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumens');
    }
};
