<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Domain;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Halaman Utama Dashboard Admin
     */
    public function index()
    {
        $totalPengajuan = Pengajuan::count();
        $pengajuanDiproses = Pengajuan::where('status', 'Diproses')->count();
        $pengajuanRevisi = Pengajuan::where('status', 'Revisi')->count();
        $domainBerhasil = Pengajuan::where('status', 'Domain Berhasil')->count();
        $totalDesa = Desa::count();
        $totalDomain = Domain::count();

        $recentPengajuans = Pengajuan::with(['desa', 'dokumens'])
            ->orderBy('tanggal_pengajuan', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalPengajuan',
            'pengajuanDiproses',
            'pengajuanRevisi',
            'domainBerhasil',
            'totalDesa',
            'totalDomain',
            'recentPengajuans'
        ));
    }

    /**
     * Halaman Daftar Domain Terdaftar
     */
    public function domainIndex(Request $request)
    {
        $search = $request->query('search');

        $query = Domain::with('desa');

        if ($search) {
            $query->where('nama_domain', 'like', "%{$search}%")
                ->orWhereHas('desa', function ($q) use ($search) {
                    $q->where('nama_desa', 'like', "%{$search}%")
                      ->orWhere('kecamatan', 'like', "%{$search}%");
                });
        }

        $domains = $query->orderBy('created_at', 'desc')->paginate(10);
        $desasWithoutDomain = Desa::doesntHave('domain')->get();

        return view('admin.domain.index', compact('domains', 'desasWithoutDomain', 'search'));
    }

    /**
     * Simpan / Tambah data Domain
     */
    public function domainStore(Request $request)
    {
        $validated = $request->validate([
            'id_desa' => ['required', 'exists:desas,id_desa'],
            'nama_domain' => ['required', 'string', 'max:150'],
            'tanggal_aktif' => ['nullable', 'date'],
            'tanggal_kadaluarsa' => ['nullable', 'date', 'after_or_equal:tanggal_aktif'],
        ], [
            'id_desa.required' => 'Desa harus dipilih.',
            'id_desa.exists' => 'Desa tidak ditemukan.',
            'nama_domain.required' => 'Nama domain wajib diisi.',
            'tanggal_kadaluarsa.after_or_equal' => 'Tanggal kadaluarsa harus setelah atau sama dengan tanggal aktif.',
        ]);

        Domain::updateOrCreate(
            ['id_desa' => $validated['id_desa']],
            [
                'nama_domain' => $validated['nama_domain'],
                'tanggal_aktif' => $validated['tanggal_aktif'] ?? null,
                'tanggal_kadaluarsa' => $validated['tanggal_kadaluarsa'] ?? null,
            ]
        );

        return redirect()->route('admin.domain.index')->with('success', 'Data domain berhasil diperbarui.');
    }

    /**
     * Halaman Visualisasi Grafik Pengajuan & Statistik
     */
    public function grafik()
    {
        $totalPengajuan = Pengajuan::count();
        $pengajuanDiproses = Pengajuan::where('status', 'Diproses')->count();
        $pengajuanRevisi = Pengajuan::where('status', 'Revisi')->count();
        $domainBerhasil = Pengajuan::where('status', 'Domain Berhasil')->count();
        
        $totalDesa = Desa::count();
        $desaBerdomain = Domain::count();
        $desaBelumDomain = max(0, $totalDesa - $desaBerdomain);

        return view('admin.grafik', compact(
            'totalPengajuan',
            'pengajuanDiproses',
            'pengajuanRevisi',
            'domainBerhasil',
            'totalDesa',
            'desaBerdomain',
            'desaBelumDomain'
        ));
    }
}
