<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use Illuminate\Http\Request;

class AdminDesaController extends Controller
{
    /**
     * Tampilkan tabel data desa dengan pencarian.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $query = Desa::query();

        if ($search) {
            $query->where('nama_desa', 'like', "%{$search}%")
                ->orWhere('kecamatan', 'like', "%{$search}%")
                ->orWhere('nama_kepala_desa', 'like', "%{$search}%")
                ->orWhere('nama_admin_website', 'like', "%{$search}%")
                ->orWhere('email_admin', 'like', "%{$search}%");
        }

        $desas = $query->orderBy('nama_desa', 'asc')->paginate(10);

        return view('admin.desa.index', compact('desas', 'search'));
    }

    /**
     * Form Tambah Data Desa.
     */
    public function create()
    {
        return view('admin.desa.create');
    }

    /**
     * Simpan Data Desa Baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_desa' => ['required', 'string', 'max:100'],
            'kecamatan' => ['required', 'string', 'max:100'],
            'nama_kepala_desa' => ['required', 'string', 'max:100'],
            'nama_admin_website' => ['required', 'string', 'max:100'],
            'email_admin' => ['required', 'email', 'max:100'],
            'no_telp_admin' => ['required', 'string', 'max:20'],
            'website' => ['nullable', 'string', 'max:255'],
        ], [
            'nama_desa.required' => 'Nama desa wajib diisi.',
            'kecamatan.required' => 'Kecamatan wajib diisi.',
            'nama_kepala_desa.required' => 'Nama Kepala Desa wajib diisi.',
            'nama_admin_website.required' => 'Nama Admin Website wajib diisi.',
            'email_admin.required' => 'Email Admin wajib diisi.',
            'email_admin.email' => 'Format email admin tidak valid.',
            'no_telp_admin.required' => 'Nomor telepon admin wajib diisi.',
        ]);

        Desa::create($validated);

        return redirect()->route('admin.desa.index')->with('success', 'Data desa berhasil ditambahkan.');
    }

    /**
     * Tampilkan Detail Data Desa.
     */
    public function show($id)
    {
        $desa = Desa::with(['pengajuan.dokumens', 'domain'])->findOrFail($id);

        return view('admin.desa.show', compact('desa'));
    }

    /**
     * Form Edit Data Desa.
     */
    public function edit($id)
    {
        $desa = Desa::findOrFail($id);

        return view('admin.desa.edit', compact('desa'));
    }

    /**
     * Update Data Desa.
     */
    public function update(Request $request, $id)
    {
        $desa = Desa::findOrFail($id);

        $validated = $request->validate([
            'nama_desa' => ['required', 'string', 'max:100'],
            'kecamatan' => ['required', 'string', 'max:100'],
            'nama_kepala_desa' => ['required', 'string', 'max:100'],
            'nama_admin_website' => ['required', 'string', 'max:100'],
            'email_admin' => ['required', 'email', 'max:100'],
            'no_telp_admin' => ['required', 'string', 'max:20'],
            'website' => ['nullable', 'string', 'max:255'],
        ], [
            'nama_desa.required' => 'Nama desa wajib diisi.',
            'kecamatan.required' => 'Kecamatan wajib diisi.',
            'nama_kepala_desa.required' => 'Nama Kepala Desa wajib diisi.',
            'nama_admin_website.required' => 'Nama Admin Website wajib diisi.',
            'email_admin.required' => 'Email Admin wajib diisi.',
            'email_admin.email' => 'Format email admin tidak valid.',
            'no_telp_admin.required' => 'Nomor telepon admin wajib diisi.',
        ]);

        $desa->update($validated);

        return redirect()->route('admin.desa.index')->with('success', 'Data desa berhasil diperbarui.');
    }

    /**
     * Hapus Data Desa.
     */
    public function destroy($id)
    {
        $desa = Desa::findOrFail($id);
        $desa->delete();

        return redirect()->route('admin.desa.index')->with('success', 'Data desa berhasil dihapus.');
    }
}
