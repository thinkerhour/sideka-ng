<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Tampilkan halaman Beranda beserta daftar domain terdaftar.
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

        return view('user.beranda', compact('domains', 'search'));
    }
}

