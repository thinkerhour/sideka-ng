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
        Schema::create('domains', function (Blueprint $table) {
            $table->id('id_domain');
            $table->foreignId('id_desa')
                  ->unique()
                  ->constrained('desas', 'id_desa')
                  ->onDelete('cascade');
            $table->string('nama_domain', 150);
            $table->date('tanggal_aktif')->nullable();
            $table->date('tanggal_kadaluarsa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domains');
    }
};
