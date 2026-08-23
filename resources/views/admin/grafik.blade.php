@extends('layouts.admin')

@section('title', 'Grafik Pengajuan & Analisis Data')

@section('content')
    <div style="margin-bottom: 24px;">
        <h1 style="font-size: 24px; font-weight: 800; color: #0f172a;">Grafik Pengajuan & Statistik Sistem</h1>
        <p style="font-size: 14px; color: #64748b;">Visualisasi statistik pengajuan domain desa.id dan persentase cakupan desa terdaftar.</p>
    </div>

    <!-- Summary Metrics -->
    <div class="stats-grid" style="margin-bottom: 28px;">
        <div class="stat-card">
            <div class="stat-icon-wrapper stat-icon-purple">📋</div>
            <div class="stat-info-group">
                <span class="stat-label">Total Permohonan</span>
                <span class="stat-value">{{ number_format($totalPengajuan) }}</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon-wrapper stat-icon-blue">⏳</div>
            <div class="stat-info-group">
                <span class="stat-label">Dalam Proses</span>
                <span class="stat-value">{{ number_format($pengajuanDiproses) }}</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon-wrapper stat-icon-amber">✏️</div>
            <div class="stat-info-group">
                <span class="stat-label">Perlu Revisi</span>
                <span class="stat-value">{{ number_format($pengajuanRevisi) }}</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon-wrapper stat-icon-emerald">🌐</div>
            <div class="stat-info-group">
                <span class="stat-label">Domain Disetujui</span>
                <span class="stat-value">{{ number_format($domainBerhasil) }}</span>
            </div>
        </div>
    </div>

    <!-- Charts Layout Grid -->
    <div class="charts-grid" style="margin-bottom: 28px;">
        <!-- Chart 1: Status Distribution -->
        <div class="admin-card">
            <div class="chart-card-header">
                <h2 class="chart-card-title">Distribusi Status Pengajuan</h2>
            </div>
            <div style="height: 320px; position: relative;">
                <canvas id="grafikStatusFull"></canvas>
            </div>
        </div>

        <!-- Chart 2: Domain Coverage -->
        <div class="admin-card">
            <div class="chart-card-header">
                <h2 class="chart-card-title">Cakupan Desa Berdomain ({{ $totalDesa > 0 ? round(($desaBerdomain / $totalDesa) * 100, 1) : 0 }}%)</h2>
            </div>
            <div style="height: 320px; position: relative;">
                <canvas id="grafikCakupanFull"></canvas>
            </div>
        </div>
    </div>

    <!-- Detailed Statistics breakdown -->
    <div class="admin-card">
        <h2 style="font-size: 16px; font-weight: 700; color: #1e293b; margin-bottom: 16px;">Ringkasan Persentase & Metrik Real-Time</h2>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
            <div style="padding: 16px; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
                <div style="font-size: 12.5px; color: #64748b; font-weight: 600;">Rasio Disetujui</div>
                <div style="font-size: 22px; font-weight: 800; color: #10b981; margin-top: 4px;">
                    {{ $totalPengajuan > 0 ? round(($domainBerhasil / $totalPengajuan) * 100, 1) : 0 }}%
                </div>
                <div style="font-size: 12px; color: #94a3b8; margin-top: 2px;">dari total pengajuan masuk</div>
            </div>

            <div style="padding: 16px; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
                <div style="font-size: 12.5px; color: #64748b; font-weight: 600;">Rasio Dalam Process</div>
                <div style="font-size: 22px; font-weight: 800; color: #3b82f6; margin-top: 4px;">
                    {{ $totalPengajuan > 0 ? round(($pengajuanDiproses / $totalPengajuan) * 100, 1) : 0 }}%
                </div>
                <div style="font-size: 12px; color: #94a3b8; margin-top: 2px;">sedang diverifikasi admin</div>
            </div>

            <div style="padding: 16px; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
                <div style="font-size: 12.5px; color: #64748b; font-weight: 600;">Rasio Revisi</div>
                <div style="font-size: 22px; font-weight: 800; color: #f59e0b; margin-top: 4px;">
                    {{ $totalPengajuan > 0 ? round(($pengajuanRevisi / $totalPengajuan) * 100, 1) : 0 }}%
                </div>
                <div style="font-size: 12px; color: #94a3b8; margin-top: 2px;">memerlukan perbaikan dokumen</div>
            </div>

            <div style="padding: 16px; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
                <div style="font-size: 12.5px; color: #64748b; font-weight: 600;">Total Desa Terdata</div>
                <div style="font-size: 22px; font-weight: 800; color: #4338ca; margin-top: 4px;">
                    {{ number_format($totalDesa) }} Desa
                </div>
                <div style="font-size: 12px; color: #94a3b8; margin-top: 2px;">Kabupaten Bandung Barat</div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Chart Status Bar Full
        const ctxStatus = document.getElementById('grafikStatusFull').getContext('2d');
        new Chart(ctxStatus, {
            type: 'bar',
            data: {
                labels: ['Diproses', 'Revisi', 'Domain Berhasil'],
                datasets: [{
                    label: 'Jumlah Pengajuan',
                    data: [{{ $pengajuanDiproses }}, {{ $pengajuanRevisi }}, {{ $domainBerhasil }}],
                    backgroundColor: ['#3b82f6', '#f59e0b', '#10b981'],
                    borderRadius: 10
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

        // Chart Cakupan Pie
        const ctxCakupan = document.getElementById('grafikCakupanFull').getContext('2d');
        new Chart(ctxCakupan, {
            type: 'pie',
            data: {
                labels: ['Sudah Memiliki Domain ({{ $desaBerdomain }})', 'Belum Memiliki Domain ({{ $desaBelumDomain }})'],
                datasets: [{
                    data: [{{ $desaBerdomain }}, {{ $desaBelumDomain }}],
                    backgroundColor: ['#10b981', '#e2e8f0'],
                    borderWidth: 2,
                    borderColor: '#ffffff'
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
