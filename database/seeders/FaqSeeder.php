<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'pertanyaan' => 'Apa itu SIDEKA-NG?',
                'jawaban'    => 'Sideka-NG (Sistem Informasi Desa dan Kawasan-New Generation) adalah aplikasi umum buatan pemerintah Indonesia yang dikelola untuk mendukung layanan publik dan administrasi di tingkat desa atau kelurahan.',
            ],
            [
                'pertanyaan' => 'Apakah mendaftar SIDEKA-NG sama dengan Website Desa?',
                'jawaban'    => 'Ya betul SIDEKA-NG Adalah Website Desa dan Layanan Desa',
            ],
            [
                'pertanyaan' => 'Apakah mendaftar SIDEKA-NG gratis?',
                'jawaban'    => 'Ya, Pendaftaran SIDEKA-NG gratis untuk tahun pertama gratis, tahun kedua dan seterusnya berbayar hanya untuk domain desa.id saja.',
            ],
            [
                'pertanyaan' => 'Berapa biayanya?',
                'jawaban'    => 'Biaya untuk perpanjang domain desa.id sebesar 50.000,- + PPn',
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(
                ['pertanyaan' => $faq['pertanyaan']],
                ['jawaban' => $faq['jawaban']]
            );
        }
    }
}

