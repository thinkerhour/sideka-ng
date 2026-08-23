@extends('layouts.admin')

@section('title', 'Edit Data Desa - ' . $desa->nama_desa)

@section('content')
    <div style="margin-bottom: 24px;">
        <a href="{{ route('admin.desa.index') }}" style="color: #64748b; font-size: 13.5px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 6px; margin-bottom: 8px;">
            ← Kembali ke Data Desa
        </a>
        <h1 style="font-size: 24px; font-weight: 800; color: #0f172a;">Edit Data Desa {{ $desa->nama_desa }}</h1>
        <p style="font-size: 14px; color: #64748b;">Perbarui rincian informasi data desa dan kontak pengelola.</p>
    </div>

    <div class="admin-card" style="max-width: 720px;">
        @if($errors->any())
            <div style="background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; padding: 12px 18px; border-radius: 10px; font-size: 13.5px; margin-bottom: 20px;">
                <ul style="margin-left: 18px; margin-bottom: 0;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.desa.update', $desa->id_desa) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 18px;">
                <div>
                    <label style="display: block; font-size: 13.5px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nama Desa <span style="color: #ef4444;">*</span></label>
                    <input type="text" name="nama_desa" value="{{ old('nama_desa', $desa->nama_desa) }}" required style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px;">
                </div>
                <div>
                    <label style="display: block; font-size: 13.5px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Kecamatan <span style="color: #ef4444;">*</span></label>
                    <input type="text" name="kecamatan" value="{{ old('kecamatan', $desa->kecamatan) }}" required style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px;">
                </div>
            </div>

            <div style="margin-bottom: 18px;">
                <label style="display: block; font-size: 13.5px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nama Kepala Desa / Pemangku Desa <span style="color: #ef4444;">*</span></label>
                <input type="text" name="nama_kepala_desa" value="{{ old('nama_kepala_desa', $desa->nama_kepala_desa) }}" required style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px;">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 18px;">
                <div>
                    <label style="display: block; font-size: 13.5px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nama Admin Website Desa <span style="color: #ef4444;">*</span></label>
                    <input type="text" name="nama_admin_website" value="{{ old('nama_admin_website', $desa->nama_admin_website) }}" required style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px;">
                </div>
                <div>
                    <label style="display: block; font-size: 13.5px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nomor Telepon / WA Admin <span style="color: #ef4444;">*</span></label>
                    <input type="text" name="no_telp_admin" value="{{ old('no_telp_admin', $desa->no_telp_admin) }}" required style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 24px;">
                <div>
                    <label style="display: block; font-size: 13.5px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Email Admin Website <span style="color: #ef4444;">*</span></label>
                    <input type="email" name="email_admin" value="{{ old('email_admin', $desa->email_admin) }}" required style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px;">
                </div>
                <div>
                    <label style="display: block; font-size: 13.5px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">URL Website (Opsional)</label>
                    <input type="url" name="website" value="{{ old('website', $desa->website) }}" style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px;">
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 12px;">
                <a href="{{ route('admin.desa.index') }}" class="btn-action-secondary">Batal</a>
                <button type="submit" class="btn-action-primary" style="padding: 10px 24px;">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection
