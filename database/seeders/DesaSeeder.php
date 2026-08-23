<?php

namespace Database\Seeders;

use App\Models\Desa;
use App\Models\Dokumen;
use App\Models\Domain;
use App\Models\Pengajuan;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $samples = [
            [
                'nama_desa' => 'Ciburuy',
                'kecamatan' => 'Padalarang',
                'nama_kepala_desa' => 'H. Ahmad Supardi',
                'nama_admin_website' => 'Budi Santoso',
                'email_admin' => 'budi.admin@ciburuy.desa.id',
                'no_telp_admin' => '081234567891',
                'website' => 'https://ciburuy.desa.id',
                'status' => 'Domain Berhasil',
                'domain' => 'ciburuy.desa.id',
            ],
            [
                'nama_desa' => 'Kertamulya',
                'kecamatan' => 'Padalarang',
                'nama_kepala_desa' => 'Drs. Supriatna',
                'nama_admin_website' => 'Randi Kurnia',
                'email_admin' => 'randi@kertamulya.desa.id',
                'no_telp_admin' => '081298765432',
                'website' => null,
                'status' => 'Diproses',
                'domain' => null,
            ],
            [
                'nama_desa' => 'Lembang',
                'kecamatan' => 'Lembang',
                'nama_kepala_desa' => 'Hj. Yulia Agustina',
                'nama_admin_website' => 'Dimas Prayoga',
                'email_admin' => 'admin@lembang.desa.id',
                'no_telp_admin' => '085712345678',
                'website' => null,
                'status' => 'Revisi',
                'keterangan_revisi' => 'Mohon mengunggah ulang Surat Kuasa dengan stempel basah Kepala Desa yang terlihat jelas.',
                'domain' => null,
            ],
            [
                'nama_desa' => 'Jayagiri',
                'kecamatan' => 'Lembang',
                'nama_kepala_desa' => 'Rahmat Hidayat, S.IP',
                'nama_admin_website' => 'Siti Nurhaliza',
                'email_admin' => 'siti@jayagiri.desa.id',
                'no_telp_admin' => '081345678901',
                'website' => 'https://jayagiri.desa.id',
                'status' => 'Domain Berhasil',
                'domain' => 'jayagiri.desa.id',
            ],
            [
                'nama_desa' => 'Cilame',
                'kecamatan' => 'Ngamprah',
                'nama_kepala_desa' => 'Deden Gunawan',
                'nama_admin_website' => 'Ahmad Fauzi',
                'email_admin' => 'fauzi@cilame.desa.id',
                'no_telp_admin' => '087812345678',
                'website' => null,
                'status' => 'Diproses',
                'domain' => null,
            ],
        ];

        foreach ($samples as $item) {
            $desa = Desa::firstOrCreate(
                [
                    'nama_desa' => $item['nama_desa'],
                    'kecamatan' => $item['kecamatan'],
                ],
                [
                    'nama_kepala_desa' => $item['nama_kepala_desa'],
                    'nama_admin_website' => $item['nama_admin_website'],
                    'email_admin' => $item['email_admin'],
                    'no_telp_admin' => $item['no_telp_admin'],
                    'website' => $item['website'],
                ]
            );

            // Pengajuan
            $pengajuan = Pengajuan::firstOrCreate(
                ['id_desa' => $desa->id_desa],
                [
                    'status' => $item['status'],
                    'keterangan_revisi' => $item['keterangan_revisi'] ?? null,
                    'tanggal_pengajuan' => now()->subDays(rand(1, 20)),
                ]
            );

            // Seed 4 Dokumen Persyaratan
            $jenisDokumens = [
                'surat_permohonan' => 'Surat_Permohonan_' . $desa->nama_desa . '.pdf',
                'sk_kepala_desa' => 'SK_Kades_' . $desa->nama_desa . '.pdf',
                'surat_kuasa' => 'Surat_Kuasa_' . $desa->nama_desa . '.pdf',
                'surat_penunjukan_admin' => 'Surat_Penunjukan_Admin_' . $desa->nama_desa . '.pdf',
            ];

            foreach ($jenisDokumens as $jenis => $filename) {
                Dokumen::firstOrCreate(
                    [
                        'id_pengajuan' => $pengajuan->id_pengajuan,
                        'jenis_dokumen' => $jenis,
                    ],
                    [
                        'nama_file' => $filename,
                        'path_file' => 'storage/dokumen/' . $filename,
                    ]
                );
            }

            // Domain jika status Domain Berhasil
            if ($item['status'] === 'Domain Berhasil' && !empty($item['domain'])) {
                Domain::firstOrCreate(
                    ['id_desa' => $desa->id_desa],
                    [
                        'nama_domain' => $item['domain'],
                        'tanggal_aktif' => now()->subMonths(2),
                        'tanggal_kadaluarsa' => now()->addMonths(10),
                    ]
                );
            }
        }
    }
}
