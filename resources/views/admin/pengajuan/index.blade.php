@extends('layouts.admin')

@section('title', 'Data Pengajuan')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <div>
            <h1 style="font-size: 24px; font-weight: 800; color: #0f172a;">Pengelolaan Data Pengajuan Domain</h1>
            <p style="font-size: 14px; color: #64748b;">Periksa kelengkapan dokumen pengajuan dan kelola status permohonan desa.id.</p>
        </div>
    </div>

    <!-- Filter & Search Section -->
    <div class="admin-card">
        <form action="{{ route('admin.pengajuan.index') }}" method="GET" style="display: flex; gap: 16px; flex-wrap: wrap; align-items: center; justify-content: space-between;">
            <!-- Status Filter Buttons -->
            <div style="display: flex; gap: 8px;">
                <a href="{{ route('admin.pengajuan.index') }}" 
                   class="{{ empty($status) ? 'btn-action-primary' : 'btn-action-secondary' }}">
                    Semua Status
                </a>
                <a href="{{ route('admin.pengajuan.index', ['status' => 'Diproses']) }}" 
                   class="{{ $status === 'Diproses' ? 'btn-action-primary' : 'btn-action-secondary' }}">
                    Diproses
                </a>
                <a href="{{ route('admin.pengajuan.index', ['status' => 'Revisi']) }}" 
                   class="{{ $status === 'Revisi' ? 'btn-action-primary' : 'btn-action-secondary' }}">
                    Revisi
                </a>
                <a href="{{ route('admin.pengajuan.index', ['status' => 'Domain Berhasil']) }}" 
                   class="{{ $status === 'Domain Berhasil' ? 'btn-action-primary' : 'btn-action-secondary' }}">
                    Domain Berhasil
                </a>
            </div>

            <!-- Search Input -->
            <div style="display: flex; gap: 8px;">
                @if($status)
                    <input type="hidden" name="status" value="{{ $status }}">
                @endif
                <input type="text" 
                       name="search" 
                       value="{{ $search }}" 
                       placeholder="Cari desa / kecamatan..." 
                       style="padding: 8px 16px; border-radius: 8px; border: 1px solid #cbd5e1; font-size: 13.5px; outline: none; width: 240px;">
                <button type="submit" class="btn-action-primary">Cari</button>
            </div>
        </form>
    </div>

    <!-- Data Table Card -->
    <div class="admin-card">
        @if($pengajuans->isEmpty())
            <div style="text-align: center; padding: 48px; color: #94a3b8;">
                <svg width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="margin-bottom: 12px; opacity: 0.5;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <p style="font-size: 16px; font-weight: 700; color: #475569;">Tidak ada data pengajuan ditemukan</p>
                <p style="font-size: 13.5px;">Belum ada pengajuan desa yang sesuai dengan filter pencarian ini.</p>
            </div>
        @else
            <div style="overflow-x: auto;">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Nama Desa</th>
                            <th>Kecamatan</th>
                            <th>Admin Website</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                            <th>Keterangan Revisi</th>
                            <th style="width: 120px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengajuans as $index => $pengajuan)
                            <tr>
                                <td>{{ $pengajuans->firstItem() + $index }}</td>
                                <td><strong>{{ $pengajuan->desa->nama_desa ?? '-' }}</strong></td>
                                <td>{{ $pengajuan->desa->kecamatan ?? '-' }}</td>
                                <td>{{ $pengajuan->desa->nama_admin_website ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->translatedFormat('d M Y, H:i') }}</td>
                                <td>
                                    @if($pengajuan->status === 'Diproses')
                                        <span class="badge-status badge-diproses">Diproses</span>
                                    @elseif($pengajuan->status === 'Revisi')
                                        <span class="badge-status badge-revisi">Revisi</span>
                                    @elseif($pengajuan->status === 'Domain Berhasil')
                                        <span class="badge-status badge-berhasil">Domain Berhasil</span>
                                    @endif
                                </td>
                                <td>
                                    @if($pengajuan->status === 'Revisi' && $pengajuan->keterangan_revisi)
                                        <span style="font-size: 12.5px; color: #b45309; font-style: italic;">
                                            "{{ Str::limit($pengajuan->keterangan_revisi, 35) }}"
                                        </span>
                                    @else
                                        <span style="color: #94a3b8;">-</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.pengajuan.show', $pengajuan->id_pengajuan) }}" class="btn-action-primary">
                                        Detail Dokumen
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="pagination-wrapper">
                {{ $pengajuans->appends(request()->query())->links() }}
            </div>
        @endif
    </div>
@endsection
