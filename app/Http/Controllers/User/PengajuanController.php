<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Dokumen;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PengajuanController extends Controller
{
    /**
     * Menyimpan pengajuan baru dan 4 dokumen yang diunggah oleh User.
     */
    public function store(Request $request)
    {
        // 1. Validasi bahwa seluruh 4 dokumen wajib diunggah dalam format PDF dan minimal 1 MB
        $validator = Validator::make($request->all(), [
            'surat_permohonan'       => 'required|file|mimes:pdf|min:1024|max:10240',
            'sk_kepala_desa'         => 'required|file|mimes:pdf|min:1024|max:10240',
            'surat_kuasa'            => 'required|file|mimes:pdf|min:1024|max:10240',
            'surat_penunjukan_admin' => 'required|file|mimes:pdf|min:1024|max:10240',
        ], [
            'surat_permohonan.required'       => 'Data belum lengkap di upload! Cek kembali.',
            'sk_kepala_desa.required'         => 'Data belum lengkap di upload! Cek kembali.',
            'surat_kuasa.required'            => 'Data belum lengkap di upload! Cek kembali.',
            'surat_penunjukan_admin.required' => 'Data belum lengkap di upload! Cek kembali.',
            'surat_permohonan.file'           => 'Data belum lengkap di upload! Cek kembali.',
            'sk_kepala_desa.file'             => 'Data belum lengkap di upload! Cek kembali.',
            'surat_kuasa.file'                => 'Data belum lengkap di upload! Cek kembali.',
            'surat_penunjukan_admin.file'     => 'Data belum lengkap di upload! Cek kembali.',
            'surat_permohonan.mimes'          => 'Format berkas Surat Permohonan harus PDF.',
            'sk_kepala_desa.mimes'            => 'Format berkas SK Kepala Desa harus PDF.',
            'surat_kuasa.mimes'               => 'Format berkas Surat Kuasa harus PDF.',
            'surat_penunjukan_admin.mimes'    => 'Format berkas Surat Penunjukan Admin harus PDF.',
            'surat_permohonan.min'            => 'Ukuran berkas Surat Permohonan minimal 1 MB.',
            'sk_kepala_desa.min'              => 'Ukuran berkas SK Kepala Desa minimal 1 MB.',
            'surat_kuasa.min'                 => 'Ukuran berkas Surat Kuasa minimal 1 MB.',
            'surat_penunjukan_admin.min'      => 'Ukuran berkas Surat Penunjukan Admin minimal 1 MB.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first() ?? 'Data belum lengkap di upload! Cek kembali.',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $uploadedFiles = [];

        try {
            DB::beginTransaction();

            // 2. Buat 1 record baru pada tabel pengajuans (id_desa = null)
            $pengajuan = Pengajuan::create([
                'id_desa'           => null,
                'status'            => 'Diproses',
                'keterangan_revisi' => null,
                'tanggal_pengajuan' => now(),
            ]);

            // 3. Mapping 4 file upload ke jenis_dokumen
            $fileMappings = [
                'surat_permohonan'       => 'surat_permohonan',
                'surat_kuasa'            => 'surat_kuasa',
                'sk_kepala_desa'         => 'sk_kepala_desa',
                'surat_penunjukan_admin' => 'surat_penunjukan_admin',
            ];

            foreach ($fileMappings as $fieldKey => $jenisDokumen) {
                $file = $request->file($fieldKey);
                $originalName = $file->getClientOriginalName();
                $filename = time() . '_' . uniqid() . '_' . $originalName;

                // Simpan file asli ke storage/app/public/dokumen
                $storedPath = $file->storeAs('dokumen', $filename, 'public');
                $uploadedFiles[] = $storedPath;

                // Buat 1 record pada tabel dokumens
                Dokumen::create([
                    'id_pengajuan'  => $pengajuan->id_pengajuan,
                    'jenis_dokumen' => $jenisDokumen,
                    'nama_file'     => $originalName,
                    'path_file'     => 'storage/' . $storedPath,
                ]);
            }

            DB::commit();

            return response()->json([
                'success'      => true,
                'message'      => 'Pengajuan berhasil dikirim.',
                'id_pengajuan' => $pengajuan->id_pengajuan,
            ]);

        } catch (\Throwable $e) {
            DB::rollBack();

            // Bersihkan file fisik yang sempat tersimpan jika rollback
            foreach ($uploadedFiles as $filePath) {
                Storage::disk('public')->delete($filePath);
            }

            Log::error('Gagal menyimpan pengajuan: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan pada server saat memproses pengajuan. Silakan coba lagi.',
            ], 500);
        }
    }
}
