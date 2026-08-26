<?php

namespace Database\Seeders;

use App\Models\Dokumen;
use App\Models\Pengajuan;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Jika belum ada data pengajuan, jalankan DesaSeeder sebagai dependency
        if (Pengajuan::count() === 0) {
            $this->call(DesaSeeder::class);
        }

        $pengajuans = Pengajuan::with('desa')->get();

        foreach ($pengajuans as $pengajuan) {
            $desaName = $pengajuan->desa 
                ? str_replace(' ', '_', $pengajuan->desa->nama_desa) 
                : 'Pengajuan_' . $pengajuan->id_pengajuan;

            $dokumenList = [
                'surat_permohonan'       => 'Surat_Permohonan_' . $desaName . '.pdf',
                'surat_kuasa'            => 'Surat_Kuasa_' . $desaName . '.pdf',
                'sk_kepala_desa'         => 'SK_Kades_' . $desaName . '.pdf',
                'surat_penunjukan_admin' => 'Surat_Penunjukan_Admin_' . $desaName . '.pdf',
            ];

            foreach ($dokumenList as $jenis => $filename) {
                Dokumen::updateOrCreate(
                    [
                        'id_pengajuan'  => $pengajuan->id_pengajuan,
                        'jenis_dokumen' => $jenis,
                    ],
                    [
                        'nama_file' => $filename,
                        'path_file' => 'storage/dokumen/' . $filename,
                    ]
                );
            }
        }
    }
}
