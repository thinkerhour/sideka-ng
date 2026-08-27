<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Faq;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Tampilkan halaman Beranda beserta daftar domain terdaftar dan FAQ.
     */
    public function index(Request $request)
    {
        $search = trim($request->input('search', ''));

        $query = Domain::with('desa');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_domain', 'LIKE', '%' . $search . '%')
                  ->orWhereHas('desa', function ($qDesa) use ($search) {
                      $qDesa->where('nama_desa', 'LIKE', '%' . $search . '%')
                            ->orWhere('kecamatan', 'LIKE', '%' . $search . '%');
                  });
            });
        }

        $domains = $query->paginate(10)->appends($request->query());
        $faqs = Faq::orderBy('id_faq', 'asc')->get();

        return view('user.beranda', compact('domains', 'search', 'faqs'));
    }

    /**
     * Download template Surat Kuasa (.docx / .doc).
     */
    public function downloadTemplateSuratKuasa()
    {
        $candidatePaths = [
            public_path('documents/pengajuan/template_surat_kuasa.docx'),
            public_path('documents/pengajuan/template-surat-kuasa.docx'),
            public_path('documents/pengajuan/template_surat_kuasa.doc'),
            public_path('documents/pengajuan/template-surat-kuasa.doc'),
            public_path('templates/template-surat-kuasa.docx'),
        ];

        foreach ($candidatePaths as $path) {
            if (file_exists($path) && filesize($path) > 0) {
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                return response()->download($path, 'template-surat-kuasa.' . $ext, [
                    'Content-Type' => $ext === 'doc' 
                        ? 'application/msword' 
                        : 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                ]);
            }
        }

        abort(404, 'File template tidak ditemukan.');
    }
}

