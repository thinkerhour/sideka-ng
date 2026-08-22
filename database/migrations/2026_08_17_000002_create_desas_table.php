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
        Schema::create('desas', function (Blueprint $table) {
            $table->id('id_desa');
            $table->string('nama_desa', 100);
            $table->string('kecamatan', 100);
            $table->string('nama_kepala_desa', 100);
            $table->string('nama_admin_website', 100);
            $table->string('email_admin', 100);
            $table->string('no_telp_admin', 20);
            $table->string('website', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desas');
    }
};
