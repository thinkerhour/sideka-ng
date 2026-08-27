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
        $totalDomain = Domain::count();

        // 1. Data Status Masa Aktif Domain (Aktif vs Kadaluarsa)
        $today = now()->format('Y-m-d');
        $domainKadaluarsa = Domain::whereNotNull('tanggal_kadaluarsa')
            ->where('tanggal_kadaluarsa', '<', $today)
            ->count();
        $domainAktif = Domain::where(function($q) use ($today) {
            $q->whereNull('tanggal_kadaluarsa')
              ->orWhere('tanggal_kadaluarsa', '>=', $today);
        })->count();

        // 2. Data Jumlah Desa Terdaftar (Aktif) dari Tahun ke Tahun
        $domainByYearRaw = Domain::selectRaw("YEAR(COALESCE(tanggal_aktif, created_at)) as tahun, COUNT(*) as total")
            ->groupBy('tahun')
            ->orderBy('tahun', 'asc')
            ->pluck('total', 'tahun')
            ->toArray();

        $currentYear = (int) date('Y');
        $minYear = !empty($domainByYearRaw) ? min(array_keys($domainByYearRaw)) : $currentYear;
        $startYear = min($minYear, $currentYear - 3);

        $yearsLabels = [];
        $domainYearData = [];

        for ($y = $startYear; $y <= $currentYear; $y++) {
            $yearsLabels[] = 'Tahun ' . $y;
            $domainYearData[] = $domainByYearRaw[$y] ?? 0;
        }

        return view('admin.grafik', compact(
            'totalPengajuan',
            'pengajuanDiproses',
            'pengajuanRevisi',
            'domainBerhasil',
            'totalDesa',
            'totalDomain',
            'domainAktif',
            'domainKadaluarsa',
            'yearsLabels',
            'domainYearData'
        ));
    }

    /**
     * Preview pencarian global di header admin (Autocomplete)
     */
    public function searchPreview(Request $request)
    {
        $query = trim($request->input('q', ''));
        if (empty($query)) {
            return response()->json([]);
        }

        $results = [];

        // Search in Pengajuan berelasi dengan Desa & Domain
        $pengajuans = Pengajuan::with(['desa', 'desa.domain'])
            ->whereHas('desa', function ($q) use ($query) {
                $q->where('nama_desa', 'like', "%{$query}%")
                  ->orWhere('kecamatan', 'like', "%{$query}%")
                  ->orWhereHas('domain', function ($qDom) use ($query) {
                      $qDom->where('nama_domain', 'like', "%{$query}%");
                  });
            })
            ->take(5)
            ->get();

        foreach ($pengajuans as $p) {
            $desaName = $p->desa ? $p->desa->nama_desa : '-';
            $kecamatan = $p->desa ? $p->desa->kecamatan : '-';
            $results[] = [
                'type'     => 'pengajuan',
                'title'    => 'Desa ' . $desaName,
                'subtitle' => 'Kec. ' . $kecamatan . ' (Pengajuan Domain)',
                'status'   => $p->status,
                'url'      => route('admin.pengajuan.show', $p->id_pengajuan),
            ];
        }

        // Search in Desa
        $desas = Desa::where('nama_desa', 'like', "%{$query}%")
            ->whereNotIn('id_desa', $pengajuans->pluck('id_desa'))
            ->take(3)
            ->get();

        foreach ($desas as $d) {
            $results[] = [
                'type'     => 'desa',
                'title'    => 'Desa ' . $d->nama_desa,
                'subtitle' => 'Kec. ' . $d->kecamatan . ' (Data Desa)',
                'status'   => null,
                'url'      => route('admin.desa.show', $d->id_desa),
            ];
        }

        return response()->json($results);
    }
}
