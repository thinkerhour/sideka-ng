<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class CekStatusController extends Controller
{
    /**
     * Cari status pengajuan berdasarkan nama desa atau nama domain.
     */
    public function search(Request $request)
    {
        $keyword = trim($request->input('keyword', ''));

        if (empty($keyword)) {
            return response()->json([
                'found'   => false,
                'message' => 'Silakan masukkan nama desa atau nama domain terlebih dahulu.',
            ]);
        }

        // Cari data pengajuan berelasi dengan desa, domain, dan dokumen
        $pengajuan = Pengajuan::with(['desa.domain', 'dokumens'])
            ->whereHas('desa', function ($q) use ($keyword) {
                $q->where('nama_desa', 'LIKE', '%' . $keyword . '%')
                  ->orWhere('kecamatan', 'LIKE', '%' . $keyword . '%')
                  ->orWhereHas('domain', function ($qDom) use ($keyword) {
                      $qDom->where('nama_domain', 'LIKE', '%' . $keyword . '%');
                  });
            })
            ->latest('id_pengajuan')
            ->first();

        if (!$pengajuan) {
            return response()->json([
                'found'   => false,
                'message' => 'Data pengajuan untuk "' . e($keyword) . '" tidak ditemukan. Silakan periksa kembali nama desa atau domain.',
            ]);
        }

        $desaName = $pengajuan->desa ? $pengajuan->desa->nama_desa : '-';
        $kecamatan = $pengajuan->desa ? $pengajuan->desa->kecamatan : '-';

        // Tentukan nama domain
        $domainName = ($pengajuan->desa && $pengajuan->desa->domain) 
            ? $pengajuan->desa->domain->nama_domain 
            : strtolower(str_replace(' ', '', $desaName)) . '.desa.id';

        // Format dokumen upload
        $dokumens = $pengajuan->dokumens->map(function ($doc) {
            return [
                'jenis_dokumen' => $doc->jenis_dokumen,
                'nama_file'     => $doc->nama_file,
                'path_file'     => asset($doc->path_file),
            ];
        });

        // Format tanggal pengajuan
        $tanggalPengajuan = $pengajuan->tanggal_pengajuan 
            ? $pengajuan->tanggal_pengajuan->format('d F Y') 
            : now()->format('d F Y');

        // Format tanggal aktif & kadaluarsa domain jika tersedia
        $tanggalAktif = ($pengajuan->desa && $pengajuan->desa->domain && $pengajuan->desa->domain->tanggal_aktif)
            ? $pengajuan->desa->domain->tanggal_aktif->format('d F Y')
            : '-';

        $tanggalKadaluarsa = ($pengajuan->desa && $pengajuan->desa->domain && $pengajuan->desa->domain->tanggal_kadaluarsa)
            ? $pengajuan->desa->domain->tanggal_kadaluarsa->format('d F Y')
            : '-';

        return response()->json([
            'found' => true,
            'data'  => [
                'id_pengajuan'      => $pengajuan->id_pengajuan,
                'status'            => $pengajuan->status,
                'keterangan_revisi' => $pengajuan->keterangan_revisi,
                'tanggal_pengajuan' => $tanggalPengajuan,
                'nama_desa'         => $desaName,
                'kecamatan'         => $kecamatan,
                'nama_domain'       => $domainName,
                'tanggal_aktif'     => $tanggalAktif,
                'tanggal_kadaluarsa'=> $tanggalKadaluarsa,
                'dokumens'          => $dokumens,
            ],
        ]);
    }
}

