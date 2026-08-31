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
            <div class="stat-icon-wrapper stat-icon-sky">📋</div>
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

    <!-- Charts Layout Grid: Row 1 (2 Columns) -->
    <div class="charts-grid" style="margin-bottom: 28px;">
        <!-- Chart 1: Status Distribution (TETAP DIPERTAHANKAN) -->
        <div class="admin-card" style="margin-bottom: 0;">
            <div class="chart-card-header">
                <h2 class="chart-card-title">Distribusi Status Pengajuan</h2>
            </div>
            <div style="height: 320px; position: relative;">
                <canvas id="grafikStatusFull"></canvas>
            </div>
        </div>

        <!-- Chart 2: Status Masa Aktif Domain (Aktif vs Kadaluarsa) -->
        <div class="admin-card" style="margin-bottom: 0;">
            <div class="chart-card-header">
                <h2 class="chart-card-title">Status Masa Aktif Domain (Aktif vs Kadaluarsa)</h2>
            </div>
            <div style="height: 320px; position: relative;">
                <canvas id="grafikMasaAktif"></canvas>
            </div>
        </div>
    </div>

    <!-- Chart 3: Jumlah Desa Terdaftar dari Tahun ke Tahun (Full Width) -->
    <div class="admin-card" style="margin-bottom: 28px;">
        <div class="chart-card-header">
            <div>
                <h2 class="chart-card-title">Jumlah Desa Terdaftar dari Tahun ke Tahun</h2>
                <p style="font-size: 13px; color: #64748b; margin-top: 4px;">Akumulasi dan tren input domain desa aktif dari tahun ke tahun</p>
            </div>
            <span class="badge-status badge-berhasil" style="font-size: 13px; padding: 6px 14px;">
                Total {{ $totalDomain }} Domain Terdaftar
            </span>
        </div>
        <div style="height: 340px; position: relative;">
            <canvas id="grafikTahunKeTahun"></canvas>
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
                <div style="font-size: 12.5px; color: #64748b; font-weight: 600;">Domain Desa Aktif</div>
                <div style="font-size: 22px; font-weight: 800; color: #10b981; margin-top: 4px;">
                    {{ number_format($domainAktif) }}
                </div>
                <div style="font-size: 12px; color: #94a3b8; margin-top: 2px;">domain aktif beroperasi</div>
            </div>

            <div style="padding: 16px; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
                <div style="font-size: 12.5px; color: #64748b; font-weight: 600;">Domain Kadaluarsa</div>
                <div style="font-size: 22px; font-weight: 800; color: #ef4444; margin-top: 4px;">
                    {{ number_format($domainKadaluarsa) }}
                </div>
                <div style="font-size: 12px; color: #94a3b8; margin-top: 2px;">memerlukan perpanjangan</div>
            </div>

            <div style="padding: 16px; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
                <div style="font-size: 12.5px; color: #64748b; font-weight: 600;">Total Desa Terdata</div>
                <div style="font-size: 22px; font-weight: 800; color: #0284c7; margin-top: 4px;">
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
        // Chart 1: Distribusi Status Pengajuan (TETAP DIPERTAHANKAN)
        const ctxStatus = document.getElementById('grafikStatusFull').getContext('2d');
        new Chart(ctxStatus, {
            type: 'bar',
            data: {
                labels: ['Diproses', 'Revisi', 'Domain Berhasil'],
                datasets: [{
                    label: 'Jumlah Pengajuan',
                    data: [{{ $pengajuanDiproses }}, {{ $pengajuanRevisi }}, {{ $domainBerhasil }}],
                    backgroundColor: ['#8ECAE6', '#f59e0b', '#10b981'],
                    borderColor: ['#0284c7', '#d97706', '#059669'],
                    borderWidth: 1.5,
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

        // Chart 2: Status Masa Aktif Domain (Aktif vs Kadaluarsa)
        const ctxMasaAktif = document.getElementById('grafikMasaAktif').getContext('2d');
        new Chart(ctxMasaAktif, {
            type: 'doughnut',
            data: {
                labels: ['Domain Aktif ({{ $domainAktif }})', 'Domain Kadaluarsa ({{ $domainKadaluarsa }})'],
                datasets: [{
                    data: [{{ $domainAktif }}, {{ $domainKadaluarsa }}],
                    backgroundColor: ['#10b981', '#ef4444'],
                    borderWidth: 2,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' }
                },
                cutout: '55%'
            }
        });

        // Chart 3: Jumlah Desa Terdaftar dari Tahun ke Tahun (Bar)
        const ctxTahun = document.getElementById('grafikTahunKeTahun').getContext('2d');
        new Chart(ctxTahun, {
            type: 'bar',
            data: {
                labels: {!! json_encode($yearsLabels) !!},
                datasets: [{
                    label: 'Jumlah Desa Terdaftar',
                    data: {!! json_encode($domainYearData) !!},
                    backgroundColor: '#0284c7',
                    hoverBackgroundColor: '#8ECAE6',
                    borderRadius: 8,
                    maxBarThickness: 60
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return ' ' + context.parsed.y + ' Desa Terdaftar';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1 }
                    },
                    x: {
                        grid: { display: false }
                    }
                }
            }
        });
    });
</script>
@endpush
