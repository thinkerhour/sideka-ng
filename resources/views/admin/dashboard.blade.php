@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div style="margin-bottom: 24px;">
        <h1 style="font-size: 24px; font-weight: 800; color: #0f172a;">Ringkasan Data System SIDeKa-NG</h1>
        <p style="font-size: 14px; color: #64748b;">Pantau statistik pengajuan domain dan status registrasi desa secara langsung.</p>
    </div>

    <!-- 5 Ringkasan Statistik Utama -->
    <div class="stats-grid">
        <!-- 1. Total Pengajuan -->
        <div class="stat-card">
            <div class="stat-icon-wrapper stat-icon-purple">
                📋
            </div>
            <div class="stat-info-group">
                <span class="stat-label">Total Pengajuan</span>
                <span class="stat-value">{{ number_format($totalPengajuan) }}</span>
            </div>
        </div>

        <!-- 2. Pengajuan Diproses -->
        <div class="stat-card">
            <div class="stat-icon-wrapper stat-icon-blue">
                ⏳
            </div>
            <div class="stat-info-group">
                <span class="stat-label">Diproses</span>
                <span class="stat-value">{{ number_format($pengajuanDiproses) }}</span>
            </div>
        </div>

        <!-- 3. Pengajuan Revisi -->
        <div class="stat-card">
            <div class="stat-icon-wrapper stat-icon-amber">
                ✏️
            </div>
            <div class="stat-info-group">
                <span class="stat-label">Revisi</span>
                <span class="stat-value">{{ number_format($pengajuanRevisi) }}</span>
            </div>
        </div>

        <!-- 4. Domain Berhasil -->
        <div class="stat-card">
            <div class="stat-icon-wrapper stat-icon-emerald">
                🌐
            </div>
            <div class="stat-info-group">
                <span class="stat-label">Domain Berhasil</span>
                <span class="stat-value">{{ number_format($domainBerhasil) }}</span>
            </div>
        </div>

        <!-- 5. Total Desa -->
        <div class="stat-card">
            <div class="stat-icon-wrapper stat-icon-indigo">
                🏡
            </div>
            <div class="stat-info-group">
                <span class="stat-label">Total Desa</span>
                <span class="stat-value">{{ number_format($totalDesa) }}</span>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="charts-grid">
        <!-- Chart 1: Status Pengajuan -->
        <div class="admin-card" style="margin-bottom: 0;">
            <div class="chart-card-header">
                <h2 class="chart-card-title">Grafik Status Pengajuan</h2>
                <a href="{{ route('admin.grafik') }}" style="font-size: 12.5px; color: #2563eb; font-weight: 600; text-decoration: none;">Lihat Detail →</a>
            </div>
            <div style="height: 260px; position: relative;">
                <canvas id="statusChart"></canvas>
            </div>
        </div>

        <!-- Chart 2: Perbandingan Desa Berdomain -->
        <div class="admin-card" style="margin-bottom: 0;">
            <div class="chart-card-header">
                <h2 class="chart-card-title">Perbandingan Desa Berdomain desa.id</h2>
                <a href="{{ route('admin.grafik') }}" style="font-size: 12.5px; color: #2563eb; font-weight: 600; text-decoration: none;">Lihat Detail →</a>
            </div>
            <div style="height: 260px; position: relative;">
                <canvas id="domainDesaChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Recent Submissions Table -->
    <div class="admin-card" style="margin-top: 28px;">
        <div class="chart-card-header">
            <h2 class="chart-card-title">Pengajuan Terbaru</h2>
            <a href="{{ route('admin.pengajuan.index') }}" class="btn-action-primary">Kelola Semua Pengajuan</a>
        </div>

        @if($recentPengajuans->isEmpty())
            <div style="text-align: center; padding: 40px; color: #94a3b8;">
                <p style="font-size: 15px; font-weight: 600;">Belum ada data pengajuan dalam database.</p>
                <p style="font-size: 13px;">Data pengajuan akan muncul otomatis setelah diajukan oleh pengguna/desa.</p>
            </div>
        @else
            <div style="overflow-x: auto;">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Desa</th>
                            <th>Kecamatan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentPengajuans as $index => $pengajuan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><strong>{{ $pengajuan->desa->nama_desa ?? '-' }}</strong></td>
                                <td>{{ $pengajuan->desa->kecamatan ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($pengajuan->tanggal_pengajuan)->translatedFormat('d F Y H:i') }}</td>
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
                                    <a href="{{ route('admin.pengajuan.show', $pengajuan->id_pengajuan) }}" class="btn-action-secondary">
                                        Periksa Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Status Chart (Bar)
        const ctxStatus = document.getElementById('statusChart').getContext('2d');
        new Chart(ctxStatus, {
            type: 'bar',
            data: {
                labels: ['Diproses', 'Revisi', 'Domain Berhasil'],
                datasets: [{
                    label: 'Jumlah Pengajuan',
                    data: [{{ $pengajuanDiproses }}, {{ $pengajuanRevisi }}, {{ $domainBerhasil }}],
                    backgroundColor: ['#3b82f6', '#f59e0b', '#10b981'],
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true, ticks: { stepSize: 1 } }
                }
            }
        });

        // Domain vs Total Desa Chart (Doughnut)
        const ctxDomain = document.getElementById('domainDesaChart').getContext('2d');
        new Chart(ctxDomain, {
            type: 'doughnut',
            data: {
                labels: ['Desa Memiliki Domain', 'Desa Belum Memiliki Domain'],
                datasets: [{
                    data: [{{ $totalDomain }}, {{ max(0, $totalDesa - $totalDomain) }}],
                    backgroundColor: ['#10b981', '#cbd5e1'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });
    });
</script>
@endpush
