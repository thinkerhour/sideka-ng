@extends('layouts.admin')

@section('title', 'Tambah Data Desa')

@section('content')
    <div style="margin-bottom: 24px;">
        <a href="{{ route('admin.desa.index') }}" style="color: #64748b; font-size: 13.5px; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 6px; margin-bottom: 8px;">
            ← Kembali ke Data Desa
        </a>
        <h1 style="font-size: 24px; font-weight: 800; color: #0f172a;">Tambah Data Desa Baru</h1>
        <p style="font-size: 14px; color: #64748b;">Masukkan rincian data desa, kepala desa, dan admin website.</p>
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

        <form action="{{ route('admin.desa.store') }}" method="POST">
            @csrf

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 18px;">
                <div>
                    <label style="display: block; font-size: 13.5px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nama Desa <span style="color: #ef4444;">*</span></label>
                    <input type="text" name="nama_desa" value="{{ old('nama_desa') }}" required placeholder="Contoh: Ciburuy" style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px;">
                </div>
                <div>
                    <label style="display: block; font-size: 13.5px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Kecamatan <span style="color: #ef4444;">*</span></label>
                    <input type="text" name="kecamatan" value="{{ old('kecamatan') }}" required placeholder="Contoh: Padalarang" style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px;">
                </div>
            </div>

            <div style="margin-bottom: 18px;">
                <label style="display: block; font-size: 13.5px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nama Kepala Desa / Pemangku Desa <span style="color: #ef4444;">*</span></label>
                <input type="text" name="nama_kepala_desa" value="{{ old('nama_kepala_desa') }}" required placeholder="Contoh: H. Ahmad Supardi" style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px;">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 18px;">
                <div>
                    <label style="display: block; font-size: 13.5px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nama Admin Website Desa <span style="color: #ef4444;">*</span></label>
                    <input type="text" name="nama_admin_website" value="{{ old('nama_admin_website') }}" required placeholder="Contoh: Budi Santoso" style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px;">
                </div>
                <div>
                    <label style="display: block; font-size: 13.5px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nomor Telepon / WA Admin <span style="color: #ef4444;">*</span></label>
                    <input type="text" name="no_telp_admin" value="{{ old('no_telp_admin') }}" required placeholder="Contoh: 081234567890" style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 24px;">
                <div>
                    <label style="display: block; font-size: 13.5px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Email Admin Website <span style="color: #ef4444;">*</span></label>
                    <input type="email" name="email_admin" value="{{ old('email_admin') }}" required placeholder="admin@ciburuy.desa.id" style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px;">
                </div>
                <div>
                    <label style="display: block; font-size: 13.5px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">URL Website (Opsional)</label>
                    <input type="url" name="website" value="{{ old('website') }}" placeholder="https://ciburuy.desa.id" style="width: 100%; padding: 10px 14px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px;">
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 12px;">
                <a href="{{ route('admin.desa.index') }}" class="btn-action-secondary">Batal</a>
                <button type="submit" class="btn-action-primary" style="padding: 10px 24px;">Simpan Data Desa</button>
            </div>
        </form>
    </div>
@endsection
