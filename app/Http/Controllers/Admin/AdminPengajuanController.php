<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class AdminPengajuanController extends Controller
{
    /**
     * Tampilkan daftar data pengajuan domain.
     */
    public function index(Request $request)
    {
        $status = $request->query('status');
        $search = $request->query('search');

        $query = Pengajuan::with(['desa', 'dokumens']);

        if ($status && in_array($status, ['Diproses', 'Revisi', 'Domain Berhasil'])) {
            $query->where('status', $status);
        }

        if ($search) {
            $query->whereHas('desa', function ($q) use ($search) {
                $q->where('nama_desa', 'like', "%{$search}%")
                  ->orWhere('kecamatan', 'like', "%{$search}%")
                  ->orWhere('nama_admin_website', 'like', "%{$search}%");
            });
        }

        $pengajuans = $query->orderBy('tanggal_pengajuan', 'desc')->paginate(10);

        return view('admin.pengajuan.index', compact('pengajuans', 'status', 'search'));
    }

    /**
     * Detail Pengajuan & Pemeriksaan 4 Dokumen Persyaratan.
     */
    public function show($id)
    {
        $pengajuan = Pengajuan::with(['desa', 'dokumens'])->findOrFail($id);

        // Group dokumens by jenis_dokumen
        $dokumens = [
            'surat_permohonan' => $pengajuan->dokumens->firstWhere('jenis_dokumen', 'surat_permohonan'),
            'sk_kepala_desa' => $pengajuan->dokumens->firstWhere('jenis_dokumen', 'sk_kepala_desa'),
            'surat_kuasa' => $pengajuan->dokumens->firstWhere('jenis_dokumen', 'surat_kuasa'),
            'surat_penunjukan_admin' => $pengajuan->dokumens->firstWhere('jenis_dokumen', 'surat_penunjukan_admin'),
        ];

        return view('admin.pengajuan.show', compact('pengajuan', 'dokumens'));
    }

    /**
     * Update Status Pengajuan & Keterangan Revisi.
     */
    public function update(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        $validated = $request->validate([
            'status' => ['required', 'in:Diproses,Revisi,Domain Berhasil'],
            'keterangan_revisi' => ['nullable', 'string', 'required_if:status,Revisi'],
            'nama_domain' => ['nullable', 'string', 'max:150', 'required_if:status,Domain Berhasil'],
        ], [
            'status.required' => 'Status pengajuan wajib dipilih.',
            'status.in' => 'Status pengajuan tidak valid.',
            'keterangan_revisi.required_if' => 'Keterangan revisi wajib diisi jika status diubah ke Revisi.',
            'nama_domain.required_if' => 'Nama domain wajib diisi jika status diubah ke Domain Berhasil.',
        ]);

        $pengajuan->status = $validated['status'];
        if ($validated['status'] === 'Revisi') {
            $pengajuan->keterangan_revisi = $validated['keterangan_revisi'];
        } else {
            $pengajuan->keterangan_revisi = null;
        }
        $pengajuan->save();

        // Jika status diubah ke Domain Berhasil dan nama_domain diisi, update/create di tabel domains
        if ($validated['status'] === 'Domain Berhasil' && !empty($validated['nama_domain'])) {
            Domain::updateOrCreate(
                ['id_desa' => $pengajuan->id_desa],
                [
                    'nama_domain' => $validated['nama_domain'],
                    'tanggal_aktif' => now(),
                    'tanggal_kadaluarsa' => now()->addYear(),
                ]
            );

            // Update kolom website di tabel desa jika perlu
            if ($pengajuan->desa) {
                $pengajuan->desa->update(['website' => 'https://' . ltrim($validated['nama_domain'], 'https://http://')]);
            }
        }

        return redirect()->route('admin.pengajuan.show', $id)
            ->with('success', 'Status pengajuan berhasil diperbarui.');
    }
}
