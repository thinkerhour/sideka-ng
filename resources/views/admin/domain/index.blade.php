@extends('layouts.admin')

@section('title', 'Daftar Domain Terdaftar')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <div>
            <h1 style="font-size: 24px; font-weight: 800; color: #0f172a;">Daftar Domain Desa.id Terdaftar</h1>
            <p style="font-size: 14px; color: #64748b;">Kelola informasi domain aktif dan tanggal kadaluarsa domain desa di Kabupaten Bandung Barat.</p>
        </div>

        <button onclick="document.getElementById('addDomainModal').style.display='flex'" class="btn-action-primary">
            + Tambah / Input Info Domain
        </button>
    </div>

    <!-- Filter & Search Section -->
    <div class="admin-card">
        <form action="{{ route('admin.domain.index') }}" method="GET" style="display: flex; gap: 16px; align-items: center;">
            <input type="text" 
                   name="search" 
                   value="{{ $search }}" 
                   placeholder="Cari domain atau nama desa..." 
                   style="flex: 1; max-width: 400px; padding: 10px 16px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px; outline: none;">
            <button type="submit" class="btn-action-primary">Cari Domain</button>
            @if($search)
                <a href="{{ route('admin.domain.index') }}" class="btn-action-secondary">Reset</a>
            @endif
        </form>
    </div>

    <!-- Table of Domains -->
    <div class="admin-card">
        @if($domains->isEmpty())
            <div style="text-align: center; padding: 48px; color: #94a3b8;">
                <svg width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-bottom: 12px; opacity: 0.5;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                </svg>
                <p style="font-size: 16px; font-weight: 700; color: #475569;">Belum ada data domain terdaftar</p>
                <p style="font-size: 13.5px;">Gunakan tombol di atas atau ubah status pengajuan menjadi "Domain Berhasil" untuk merekam domain baru.</p>
            </div>
        @else
            <div style="overflow-x: auto;">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Nama Desa</th>
                            <th>Kecamatan</th>
                            <th>Nama Domain</th>
                            <th>Tanggal Aktif</th>
                            <th>Tanggal Kadaluarsa</th>
                            <th>Status Domain</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($domains as $index => $domain)
                            <tr>
                                <td>{{ $domains->firstItem() + $index }}</td>
                                <td><strong>{{ $domain->desa->nama_desa ?? '-' }}</strong></td>
                                <td>{{ $domain->desa->kecamatan ?? '-' }}</td>
                                <td>
                                    <a href="https://{{ $domain->nama_domain }}" target="_blank" style="color: #2563eb; font-weight: 600; text-decoration: none; font-style: italic;">
                                        https://{{ $domain->nama_domain }}
                                    </a>
                                </td>
                                <td>{{ $domain->tanggal_aktif ? \Carbon\Carbon::parse($domain->tanggal_aktif)->translatedFormat('d M Y') : '-' }}</td>
                                <td>{{ $domain->tanggal_kadaluarsa ? \Carbon\Carbon::parse($domain->tanggal_kadaluarsa)->translatedFormat('d M Y') : '-' }}</td>
                                <td>
                                    @if($domain->tanggal_kadaluarsa && \Carbon\Carbon::parse($domain->tanggal_kadaluarsa)->isPast())
                                        <span class="badge-status badge-revisi">Kadaluarsa</span>
                                    @else
                                        <span class="badge-status badge-berhasil">Aktif</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="pagination-wrapper">
                {{ $domains->appends(request()->query())->links() }}
            </div>
        @endif
    </div>

    <!-- Modal Input Domain -->
    <div id="addDomainModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 999; align-items: center; justify-content: center;">
        <div style="background: #ffffff; width: 100%; max-width: 500px; padding: 28px; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h3 style="font-size: 18px; font-weight: 800; color: #0f172a;">Input / Update Domain Desa</h3>
                <button onclick="document.getElementById('addDomainModal').style.display='none'" style="background: none; border: none; font-size: 20px; cursor: pointer;">&times;</button>
            </div>

            <form action="{{ route('admin.domain.store') }}" method="POST">
                @csrf
                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 13px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Pilih Desa</label>
                    <select name="id_desa" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px;">
                        <option value="">-- Pilih Desa --</option>
                        @foreach(\App\Models\Desa::orderBy('nama_desa')->get() as $desa)
                            <option value="{{ $desa->id_desa }}">{{ $desa->nama_desa }} (Kec. {{ $desa->kecamatan }})</option>
                        @endforeach
                    </select>
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 13px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nama Domain (desa.id)</label>
                    <input type="text" name="nama_domain" placeholder="contoh: ciburuy.desa.id" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px;">
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 13px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Tanggal Aktif</label>
                    <input type="date" name="tanggal_aktif" value="{{ date('Y-m-d') }}" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px;">
                </div>

                <div style="margin-bottom: 24px;">
                    <label style="display: block; font-size: 13px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Tanggal Kadaluarsa</label>
                    <input type="date" name="tanggal_kadaluarsa" value="{{ date('Y-m-d', strtotime('+1 year')) }}" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 14px;">
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 10px;">
                    <button type="button" onclick="document.getElementById('addDomainModal').style.display='none'" class="btn-action-secondary">Batal</button>
                    <button type="submit" class="btn-action-primary">Simpan Domain</button>
                </div>
            </form>
        </div>
    </div>
@endsection
