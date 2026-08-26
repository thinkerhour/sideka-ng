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
            // Status: Diproses
            [
                'nama_desa' => 'Wangunsari',
                'kecamatan' => 'Sindangkerta',
                'nama_kepala_desa' => 'H. Kurnia',
                'nama_admin_website' => 'Budi Santoso',
                'email_admin' => 'budi@wangunsari-sindangkerta.desa.id',
                'no_telp_admin' => '081234567801',
                'website' => null,
                'status' => 'Diproses',
                'domain' => null,
            ],
            [
                'nama_desa' => 'Ciburuy',
                'kecamatan' => 'Padalarang',
                'nama_kepala_desa' => 'H. Ahmad Supardi',
                'nama_admin_website' => 'Budi Santoso',
                'email_admin' => 'budi.admin@ciburuy.desa.id',
                'no_telp_admin' => '081234567891',
                'website' => null,
                'status' => 'Diproses',
                'domain' => null,
            ],
            // Status: Revisi
            [
                'nama_desa' => 'Pasirhalang',
                'kecamatan' => 'Cisarua',
                'nama_kepala_desa' => 'Asep Gunawan',
                'nama_admin_website' => 'Rahmat Hidayat',
                'email_admin' => 'admin@pasirhalang.desa.id',
                'no_telp_admin' => '081234567808',
                'website' => null,
                'status' => 'Revisi',
                'keterangan_revisi' => 'Stempel pada Surat Kuasa belum terlihat jelas dan SK Pengangkatan Kepala Desa belum melampirkan lembar pengesahan terakhir.',
                'domain' => null,
            ],
            [
                'nama_desa' => 'Mekarsari',
                'kecamatan' => 'Ngamprah',
                'nama_kepala_desa' => 'H. Ahmad',
                'nama_admin_website' => 'Rizki Ramadan',
                'email_admin' => 'admin@mekarsari-ngamprah.desa.id',
                'no_telp_admin' => '081234567807',
                'website' => null,
                'status' => 'Revisi',
                'keterangan_revisi' => 'Mohon mengunggah ulang Surat Kuasa dengan stempel basah Kepala Desa yang terlihat jelas.',
                'domain' => null,
            ],
            // Status: Domain Berhasil (10 Desa Terdaftar)
            [
                'nama_desa' => 'Lembang',
                'kecamatan' => 'Lembang',
                'nama_kepala_desa' => 'Hj. Yulia Agustina',
                'nama_admin_website' => 'Dimas Prayoga',
                'email_admin' => 'admin@lembang.desa.id',
                'no_telp_admin' => '085712345678',
                'website' => 'https://lembang.desa.id',
                'status' => 'Domain Berhasil',
                'domain' => 'lembang.desa.id',
            ],
            [
                'nama_desa' => 'Rancasenggang',
                'kecamatan' => 'Sindangkerta',
                'nama_kepala_desa' => 'Asep Saepudin',
                'nama_admin_website' => 'Deden Kurnia',
                'email_admin' => 'admin@rancasenggang-sindangkerta.desa.id',
                'no_telp_admin' => '081234567802',
                'website' => 'https://rancasenggang-sindangkerta.desa.id',
                'status' => 'Domain Berhasil',
                'domain' => 'rancasenggang-sindangkerta.desa.id',
            ],
            [
                'nama_desa' => 'Buninagara',
                'kecamatan' => 'Sindangkerta',
                'nama_kepala_desa' => 'H. Agus',
                'nama_admin_website' => 'Randi Prayoga',
                'email_admin' => 'admin@buninagara-sindangkerta.desa.id',
                'no_telp_admin' => '081234567803',
                'website' => 'https://buninagara-sindangkerta.desa.id',
                'status' => 'Domain Berhasil',
                'domain' => 'buninagara-sindangkerta.desa.id',
            ],
            [
                'nama_desa' => 'Cibedug',
                'kecamatan' => 'Rongga',
                'nama_kepala_desa' => 'Dadan Ramdani',
                'nama_admin_website' => 'Hendra Gunawan',
                'email_admin' => 'admin@cibedug.desa.id',
                'no_telp_admin' => '081234567804',
                'website' => 'https://cibedug.desa.id',
                'status' => 'Domain Berhasil',
                'domain' => 'cibedug.desa.id',
            ],
            [
                'nama_desa' => 'Padalarang',
                'kecamatan' => 'Padalarang',
                'nama_kepala_desa' => 'Drs. H. Supriatna',
                'nama_admin_website' => 'Asep Ruhimat',
                'email_admin' => 'admin@padalarang-padalarang.desa.id',
                'no_telp_admin' => '081234567805',
                'website' => 'https://padalarang-padalarang.desa.id',
                'status' => 'Domain Berhasil',
                'domain' => 'padalarang-padalarang.desa.id',
            ],
            [
                'nama_desa' => 'Pakuhaji',
                'kecamatan' => 'Ngamprah',
                'nama_kepala_desa' => 'H. Dedi',
                'nama_admin_website' => 'Ferry Septian',
                'email_admin' => 'admin@pakuhaji-kbb.desa.id',
                'no_telp_admin' => '081234567806',
                'website' => 'https://pakuhaji-kbb.desa.id',
                'status' => 'Domain Berhasil',
                'domain' => 'pakuhaji-kbb.desa.id',
            ],
            [
                'nama_desa' => 'Cihanjuang',
                'kecamatan' => 'Parongpong',
                'nama_kepala_desa' => 'Ginanjar Rahayu',
                'nama_admin_website' => 'Taufik Hidayat',
                'email_admin' => 'admin@cihanjuang.desa.id',
                'no_telp_admin' => '081234567809',
                'website' => 'https://cihanjuang.desa.id',
                'status' => 'Domain Berhasil',
                'domain' => 'cihanjuang.desa.id',
            ],
            [
                'nama_desa' => 'Batujajar Barat',
                'kecamatan' => 'Batujajar',
                'nama_kepala_desa' => 'H. Erwan',
                'nama_admin_website' => 'Yudi Permana',
                'email_admin' => 'admin@batujajarbarat.desa.id',
                'no_telp_admin' => '081234567810',
                'website' => 'https://batujajarbarat.desa.id',
                'status' => 'Domain Berhasil',
                'domain' => 'batujajarbarat.desa.id',
            ],
            [
                'nama_desa' => 'Kertamulya',
                'kecamatan' => 'Padalarang',
                'nama_kepala_desa' => 'Drs. Supriatna',
                'nama_admin_website' => 'Randi Kurnia',
                'email_admin' => 'randi@kertamulya.desa.id',
                'no_telp_admin' => '081298765432',
                'website' => 'https://kertamulya.desa.id',
                'status' => 'Domain Berhasil',
                'domain' => 'kertamulya.desa.id',
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
        ];

        foreach ($samples as $item) {
            $desa = Desa::updateOrCreate(
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
            $pengajuan = Pengajuan::updateOrCreate(
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
                Dokumen::updateOrCreate(
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
            if (($item['status'] === 'Domain Berhasil' || $item['status'] === 'Berhasil') && !empty($item['domain'])) {
                Domain::updateOrCreate(
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
