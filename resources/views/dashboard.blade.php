<x-default-layout>

{{-- Header Section --}}
<div class="dashboard-header">
    <div class="header-content">
        <div class="header-text">
            <h1 class="page-title">
                <span class="title-icon">
                    <i class="bi bi-speedometer2"></i>
                </span>
                Dashboard INFOLEND
            </h1>
            <p class="page-subtitle">
                Ringkasan data infokus dan aktivitas peminjaman perangkat secara real-time.
            </p>
        </div>
    </div>
    <div class="header-decoration">
        <div class="decoration-circle circle-1"></div>
        <div class="decoration-circle circle-2"></div>
        <div class="decoration-circle circle-3"></div>
    </div>
</div>

{{-- Stats Cards --}}
<div class="row g-4 mt-2">
    <div class="col-lg-3 col-md-6">
        <div class="stat-card stat-total">
            <div class="stat-icon">
                <i class="bi bi-display"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Total Infokus</span>
                <h2 class="stat-number" data-count="{{ $totalInfokus }}">{{ $totalInfokus }}</h2>
                <span class="stat-badge">
                    <i class="bi bi-box-seam me-1"></i>
                    Perangkat Terdaftar
                </span>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="stat-card stat-borrowed">
            <div class="stat-icon">
                <i class="bi bi-arrow-up-right-circle"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Sedang Dipinjam</span>
                <h2 class="stat-number" data-count="{{ $totalDipinjam }}">{{ $totalDipinjam }}</h2>
                <span class="stat-badge">
                    <i class="bi bi-clock-history me-1"></i>
                    Aktif Digunakan
                </span>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="stat-card stat-available">
            <div class="stat-icon">
                <i class="bi bi-check-circle"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Tersedia</span>
                <h2 class="stat-number" data-count="{{ $totalTersedia }}">{{ $totalTersedia }}</h2>
                <span class="stat-badge">
                    <i class="bi bi-hand-thumbs-up me-1"></i>
                    Siap Dipinjam
                </span>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="stat-card stat-history">
            <div class="stat-icon">
                <i class="bi bi-journal-text"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label">Total Peminjaman</span>
                <h2 class="stat-number" data-count="{{ $totalPeminjaman }}">{{ $totalPeminjaman }}</h2>
                <span class="stat-badge">
                    <i class="bi bi-graph-up me-1"></i>
                    Riwayat Transaksi
                </span>
            </div>
        </div>
    </div>
</div>

{{-- Charts Section --}}
<div class="row g-4 mt-2">
    {{-- Bar Chart - Statistik Peminjaman --}}
    <div class="col-lg-8">
        <div class="chart-card">
            <div class="chart-header">
                <div>
                    <h5 class="chart-title">
                        <i class="bi bi-bar-chart-fill me-2"></i>
                        Statistik Peminjaman
                    </h5>
                    <p class="chart-subtitle">Data peminjaman 6 bulan terakhir</p>
                </div>
                <div class="chart-tabs">
                    <button class="chart-tab active">Minggu</button>
                    <button class="chart-tab">Bulan</button>
                    <button class="chart-tab">Tahun</button>
                </div>
            </div>
            <div class="chart-body">
                <canvas id="statisticChart" height="280"></canvas>
            </div>
        </div>
    </div>
    
    {{-- Doughnut Chart - Status Infokus --}}
    <div class="col-lg-4">
        <div class="chart-card">
            <div class="chart-header">
                <div>
                    <h5 class="chart-title">
                        <i class="bi bi-pie-chart-fill me-2"></i>
                        Status Infokus
                    </h5>
                    <p class="chart-subtitle">Distribusi ketersediaan</p>
                </div>
            </div>
            <div class="chart-body d-flex align-items-center justify-content-center">
                <canvas id="statusChart" height="200"></canvas>
            </div>
            <div class="chart-legend-custom">
                <div class="legend-row">
                    <div class="legend-item-custom">
                        <span class="legend-color" style="background: #10367D;"></span>
                        <span class="legend-label">Tersedia</span>
                    </div>
                    <div class="legend-item-custom">
                        <span class="legend-color" style="background: #74B4D9;"></span>
                        <span class="legend-label">Dipinjam</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Daftar Infokus & Aktivitas --}}
<div class="row g-4 mt-2">
    {{-- Daftar Infokus --}}
    <div class="col-lg-7">
        <div class="chart-card infokus-card">
            <div class="chart-header">
                <div>
                    <h5 class="chart-title">
                        <i class="bi bi-display me-2"></i>
                        Daftar Infokus
                    </h5>
                    <p class="chart-subtitle">Semua perangkat yang terdaftar</p>
                </div>
                <div class="header-actions-inline">
                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input type="text" placeholder="Search" id="searchInfokus">
                    </div>
                    <button class="btn-filter">
                        <i class="bi bi-funnel"></i>
                        Filter
                    </button>
                </div>
            </div>
            <div class="infokus-table-wrapper">
                <table class="infokus-table">
                    <thead>
                        <tr>
                            <th>Nama Infokus</th>
                            <th>Merk</th>
                            <th>Lokasi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($infokusList ?? [] as $infokus)
                        <tr>
                            <td>
                                <div class="infokus-name">
                                    <div class="infokus-avatar">
                                        <i class="bi bi-display"></i>
                                    </div>
                                    {{ $infokus->nama_infokus }}
                                </div>
                            </td>
                            <td>{{ $infokus->merk }}</td>
                            <td>{{ $infokus->lokasi }}</td>
                            <td>
                                <span class="status-badge {{ $infokus->status == 'tersedia' ? 'status-available' : 'status-borrowed' }}">
                                    {{ ucfirst($infokus->status) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">
                                <i class="bi bi-inbox" style="font-size: 32px; display: block; margin-bottom: 8px;"></i>
                                Belum ada data infokus
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    {{-- Top Peminjam --}}
    <div class="col-lg-5">
        <div class="chart-card top-borrower-card">
            <div class="chart-header">
                <div>
                    <h5 class="chart-title">
                        <i class="bi bi-people-fill me-2"></i>
                        Top Peminjam
                    </h5>
                    <p class="chart-subtitle">Peminjam teraktif</p>
                </div>
            </div>
            <div class="top-borrower-list">
                @php
                    $topBorrowers = $topBorrowers ?? collect([]);
                @endphp
                @forelse($topBorrowers as $index => $borrower)
                <div class="borrower-item">
                    <div class="borrower-rank">{{ $index + 1 }}</div>
                    <div class="borrower-avatar">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($borrower->name ?? 'User') }}&background=10367D&color=fff&size=40" alt="Avatar">
                    </div>
                    <div class="borrower-info">
                        <span class="borrower-name">{{ $borrower->name ?? 'User' }}</span>
                    </div>
                    <div class="borrower-count">
                        <span class="count-value">{{ $borrower->total ?? 0 }}</span>
                        <span class="count-label">Pinjam</span>
                    </div>
                </div>
                @empty
                @for($i = 1; $i <= 5; $i++)
                <div class="borrower-item">
                    <div class="borrower-rank">{{ $i }}</div>
                    <div class="borrower-avatar">
                        <img src="https://ui-avatars.com/api/?name=User&background=EBEBEB&color=10367D&size=40" alt="Avatar">
                    </div>
                    <div class="borrower-info">
                        <span class="borrower-name text-muted">Belum ada data</span>
                    </div>
                    <div class="borrower-count">
                        <span class="count-value">0</span>
                        <span class="count-label">Pinjam</span>
                    </div>
                </div>
                @endfor
                @endforelse
            </div>
        </div>
    </div>
</div>

{{-- Welcome Section --}}
<div class="row g-4 mt-2">
    <div class="col-12">
        <div class="welcome-card">
            <div class="welcome-header">
                <div class="welcome-icon">
                    <i class="bi bi-geo-alt-fill"></i>
                </div>
                <div class="welcome-text">
                    <h5 class="welcome-title">Selamat Datang di INFOLEND</h5>
                    <p class="welcome-subtitle">Sistem Manajemen Peminjaman Infokus yang Efisien dan Modern</p>
                </div>
            </div>
            <div class="feature-cards">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-search"></i>
                    </div>
                    <h6 class="feature-title">Cek Ketersediaan</h6>
                    <p class="feature-desc">Lihat status real-time semua perangkat</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-plus-square"></i>
                    </div>
                    <h6 class="feature-title">Ajukan Peminjaman</h6>
                    <p class="feature-desc">Proses cepat dan mudah</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-bar-chart-line"></i>
                    </div>
                    <h6 class="feature-title">Monitoring Data</h6>
                    <p class="feature-desc">Pantau statistik lengkap</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-bell"></i>
                    </div>
                    <h6 class="feature-title">Notifikasi</h6>
                    <p class="feature-desc">Update status peminjaman</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Chart.js CDN --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Chart.js Global Config
    Chart.defaults.font.family = "'Inter', system-ui, sans-serif";
    Chart.defaults.color = '#64748b';
    
    // Statistik Peminjaman - Bar Chart (seperti referensi)
    const statCtx = document.getElementById('statisticChart').getContext('2d');
    
    // Gradient untuk bar chart
    const barGradient = statCtx.createLinearGradient(0, 0, 0, 280);
    barGradient.addColorStop(0, '#10367D');
    barGradient.addColorStop(1, '#74B4D9');
    
    new Chart(statCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($chartLabels) !!},
            datasets: [{
                label: 'Peminjaman',
                data: {!! json_encode($chartData) !!},
                backgroundColor: barGradient,
                borderRadius: 6,
                borderSkipped: false,
                barThickness: 45,
                maxBarThickness: 50
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#10367D',
                    titleColor: '#ffffff',
                    bodyColor: '#ffffff',
                    padding: 12,
                    cornerRadius: 8,
                    displayColors: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#EBEBEB',
                        drawBorder: false
                    },
                    ticks: {
                        stepSize: 1,
                        padding: 10,
                        color: '#64748b'
                    }
                },
                x: {
                    grid: { display: false },
                    ticks: { 
                        padding: 10,
                        color: '#64748b'
                    }
                }
            }
        }
    });
    
    // Status Infokus - Doughnut Chart
    const statusCtx = document.getElementById('statusChart').getContext('2d');
    new Chart(statusCtx, {
        type: 'doughnut',
        data: {
            labels: ['Tersedia', 'Dipinjam'],
            datasets: [{
                data: [{{ $totalTersedia }}, {{ $totalDipinjam }}],
                backgroundColor: ['#10367D', '#74B4D9'],
                borderColor: '#ffffff',
                borderWidth: 3,
                hoverOffset: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '65%',
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#10367D',
                    padding: 12,
                    cornerRadius: 8
                }
            }
        }
    });
    
    // Number Animation
    document.querySelectorAll('.stat-number').forEach(el => {
        const target = parseInt(el.getAttribute('data-count'));
        let current = 0;
        const increment = target / 30;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                el.textContent = target;
                clearInterval(timer);
            } else {
                el.textContent = Math.floor(current);
            }
        }, 30);
    });
    
    // Search functionality
    const searchInput = document.getElementById('searchInfokus');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const filter = this.value.toLowerCase();
            const rows = document.querySelectorAll('.infokus-table tbody tr');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    }
});
</script>

<style>
/* Color Variables - Royal Blue, Light Grey, Sky Blue */
:root {
    --royal-blue: #10367D;
    --light-grey: #EBEBEB;
    --sky-blue: #74B4D9;
    --white: #ffffff;
    --dark-text: #0f172a;
    --muted-text: #64748b;
}

/* Dashboard Header */
.dashboard-header {
    position: relative;
    background: linear-gradient(135deg, var(--royal-blue) 0%, #1a4a9e 50%, var(--sky-blue) 100%);
    border-radius: 20px;
    padding: 32px;
    margin: -28px -28px 0 -28px;
    overflow: hidden;
}

.header-content {
    position: relative;
    z-index: 2;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
}

.header-text {
    color: var(--white);
}

.page-title {
    display: flex;
    align-items: center;
    gap: 14px;
    font-size: 28px;
    font-weight: 800;
    margin: 0;
    color: var(--white);
}

.title-icon {
    width: 52px;
    height: 52px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}

.page-subtitle {
    margin: 8px 0 0 66px;
    color: rgba(255, 255, 255, 0.85);
    font-size: 15px;
}

.header-decoration {
    position: absolute;
    inset: 0;
    overflow: hidden;
}

.decoration-circle {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.08);
}

.circle-1 {
    width: 300px;
    height: 300px;
    top: -150px;
    right: -50px;
}

.circle-2 {
    width: 200px;
    height: 200px;
    bottom: -100px;
    left: 20%;
}

.circle-3 {
    width: 150px;
    height: 150px;
    top: 50%;
    right: 30%;
}

/* Stats Cards */
.stat-card {
    position: relative;
    background: var(--white);
    border-radius: 16px;
    padding: 24px;
    display: flex;
    align-items: flex-start;
    gap: 18px;
    overflow: hidden;
    border: 1px solid var(--light-grey);
    box-shadow: 0 4px 20px rgba(16, 54, 125, 0.08);
    transition: all 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 30px rgba(16, 54, 125, 0.12);
}

.stat-icon {
    width: 56px;
    height: 56px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    flex-shrink: 0;
}

.stat-total .stat-icon { background: rgba(16, 54, 125, 0.1); color: var(--royal-blue); }
.stat-borrowed .stat-icon { background: rgba(116, 180, 217, 0.2); color: var(--sky-blue); }
.stat-available .stat-icon { background: rgba(34, 197, 94, 0.1); color: #22c55e; }
.stat-history .stat-icon { background: rgba(245, 158, 11, 0.1); color: #f59e0b; }

.stat-content {
    position: relative;
    z-index: 2;
}

.stat-label {
    display: block;
    font-size: 12px;
    font-weight: 600;
    color: var(--muted-text);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.stat-number {
    font-size: 36px;
    font-weight: 800;
    color: var(--dark-text);
    margin: 4px 0 8px;
    line-height: 1;
}

.stat-badge {
    display: inline-flex;
    align-items: center;
    font-size: 11px;
    color: var(--muted-text);
    background: var(--light-grey);
    padding: 4px 10px;
    border-radius: 20px;
}

/* Chart Cards */
.chart-card {
    background: var(--white);
    border-radius: 16px;
    border: 1px solid var(--light-grey);
    box-shadow: 0 4px 20px rgba(16, 54, 125, 0.06);
    overflow: hidden;
}

.chart-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    padding: 20px 24px;
    border-bottom: 2px solid var(--sky-blue);
    background: var(--light-grey);
}

.chart-title {
    font-size: 16px;
    font-weight: 700;
    color: var(--dark-text);
    margin: 0;
    display: flex;
    align-items: center;
}

.chart-title i {
    color: var(--royal-blue);
}

.chart-subtitle {
    font-size: 13px;
    color: var(--muted-text);
    margin: 4px 0 0;
}

.chart-tabs {
    display: flex;
    background: var(--light-grey);
    border-radius: 8px;
    padding: 4px;
}

.chart-tab {
    padding: 6px 14px;
    border: none;
    background: transparent;
    font-size: 12px;
    font-weight: 600;
    color: var(--muted-text);
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.2s;
}

.chart-tab.active {
    background: var(--royal-blue);
    color: var(--white);
}

.chart-body {
    padding: 20px 24px;
}

/* Custom Legend for Doughnut */
.chart-legend-custom {
    padding: 16px 24px;
    border-top: 1px solid var(--light-grey);
}

.legend-row {
    display: flex;
    justify-content: center;
    gap: 24px;
    margin-bottom: 8px;
}

.legend-row:last-child {
    margin-bottom: 0;
}

.legend-item-custom {
    display: flex;
    align-items: center;
    gap: 8px;
}

.legend-color {
    width: 12px;
    height: 12px;
    border-radius: 3px;
}

.legend-label {
    font-size: 12px;
    color: var(--muted-text);
}

/* Header Actions Inline */
.header-actions-inline {
    display: flex;
    gap: 12px;
    align-items: center;
}

.search-box {
    display: flex;
    align-items: center;
    background: var(--light-grey);
    border-radius: 8px;
    padding: 8px 14px;
    gap: 8px;
}

.search-box i {
    color: var(--muted-text);
    font-size: 14px;
}

.search-box input {
    border: none;
    background: transparent;
    outline: none;
    font-size: 13px;
    width: 120px;
    color: var(--dark-text);
}

.search-box input::placeholder {
    color: var(--muted-text);
}

.btn-filter {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 8px 14px;
    border: 1px solid var(--royal-blue);
    background: transparent;
    color: var(--royal-blue);
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
}

.btn-filter:hover {
    background: var(--royal-blue);
    color: var(--white);
}

/* Infokus Table */
.infokus-table-wrapper {
    overflow-x: auto;
    background: var(--light-grey);
    border-radius: 12px;
    padding: 2px;
}

.infokus-table {
    width: 100%;
    border-collapse: collapse;
}

.infokus-table th {
    background: var(--royal-blue);
    padding: 14px 20px;
    text-align: left;
    font-size: 12px;
    font-weight: 600;
    color: var(--white);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-bottom: none;
}

.infokus-table td {
    padding: 14px 20px;
    border-bottom: 1px solid var(--light-grey);
    font-size: 14px;
    color: var(--dark-text);
}

.infokus-name {
    display: flex;
    align-items: center;
    gap: 12px;
}

.infokus-avatar {
    width: 36px;
    height: 36px;
    background: rgba(16, 54, 125, 0.1);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--royal-blue);
}

.status-badge {
    display: inline-flex;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.status-available {
    background: rgba(16, 54, 125, 0.1);
    color: var(--royal-blue);
    font-weight: 600;
}

.status-borrowed {
    background: rgba(116, 180, 217, 0.2);
    color: #1a5a7a;
    font-weight: 600;
}

.status-returned {
    background: rgba(34, 197, 94, 0.1);
    color: #16a34a;
}

/* Top Borrower */
.top-borrower-list {
    padding: 16px 20px;
}

.borrower-item {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 12px 16px;
    border-bottom: 1px solid var(--light-grey);
    background: var(--light-grey);
    border-radius: 10px;
    margin-bottom: 8px;
}

.borrower-item:last-child {
    border-bottom: none;
    margin-bottom: 0;
}

.borrower-rank {
    width: 28px;
    height: 28px;
    background: var(--royal-blue);
    color: var(--white);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 700;
    flex-shrink: 0;
}

.borrower-avatar img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
}

.borrower-info {
    flex: 1;
}

.borrower-name {
    font-weight: 600;
    color: var(--dark-text);
    font-size: 14px;
}

.borrower-count {
    text-align: right;
}

.count-value {
    display: block;
    font-size: 18px;
    font-weight: 700;
    color: var(--royal-blue);
}

.count-label {
    font-size: 11px;
    color: var(--muted-text);
}

/* Activity Table */
.activity-table-wrapper {
    overflow-x: auto;
}

.activity-table {
    width: 100%;
    border-collapse: collapse;
}

.activity-table th {
    background: var(--light-grey);
    padding: 14px 20px;
    text-align: left;
    font-size: 12px;
    font-weight: 600;
    color: var(--muted-text);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    white-space: nowrap;
}

.activity-table td {
    padding: 14px 20px;
    border-bottom: 1px solid var(--light-grey);
    font-size: 14px;
    color: var(--dark-text);
}

.user-cell {
    display: flex;
    align-items: center;
    gap: 10px;
}

.user-avatar-sm {
    width: 32px;
    height: 32px;
    border-radius: 50%;
}

.btn-view-all {
    display: inline-flex;
    align-items: center;
    padding: 8px 16px;
    background: var(--royal-blue);
    color: var(--white);
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s;
}

.btn-view-all:hover {
    background: #0d2d6b;
    color: var(--white);
}

/* Welcome Section */
.welcome-card {
    background: linear-gradient(135deg, var(--royal-blue) 0%, #1a4a9e 100%);
    border-radius: 16px;
    padding: 28px;
    box-shadow: 0 4px 20px rgba(16, 54, 125, 0.15);
    border: none;
}

.welcome-header {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 24px;
    padding-bottom: 20px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}

.welcome-icon {
    width: 48px;
    height: 48px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-size: 22px;
}

.welcome-title {
    font-size: 18px;
    font-weight: 700;
    color: var(--white);
    margin: 0;
}

.welcome-subtitle {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.85);
    margin: 4px 0 0 0;
}

.feature-cards {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.feature-card {
    background: rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    padding: 24px 20px;
    text-align: center;
    transition: all 0.3s ease;
    cursor: pointer;
}

.feature-card:hover {
    background: rgba(255, 255, 255, 0.25);
    border-color: rgba(255, 255, 255, 0.4);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    transform: translateY(-2px);
}

.feature-icon {
    width: 48px;
    height: 48px;
    background: rgba(255, 255, 255, 0.2);
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 14px;
    font-size: 20px;
    color: var(--white);
    transition: all 0.3s ease;
}

.feature-card:hover .feature-icon {
    background: var(--white);
    border-color: var(--white);
    color: var(--royal-blue);
}

.feature-title {
    font-size: 14px;
    font-weight: 600;
    color: var(--white);
    margin: 0 0 6px 0;
}

.feature-desc {
    font-size: 12px;
    color: rgba(255, 255, 255, 0.8);
    margin: 0;
    line-height: 1.4;
}

/* Responsive */
@media (max-width: 992px) {
    .header-actions-inline {
        flex-wrap: wrap;
    }
    
    .feature-cards {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .dashboard-header {
        padding: 24px;
        margin: -20px -20px 0 -20px;
    }
    
    .page-title {
        font-size: 22px;
    }
    
    .page-subtitle {
        margin-left: 0;
        margin-top: 12px;
    }
    
    .stat-number {
        font-size: 28px;
    }
    
    .chart-tabs {
        display: none;
    }
    
    .infokus-table-wrapper,
    .activity-table-wrapper {
        overflow-x: auto;
    }
    
    .legend-row {
        flex-direction: column;
        gap: 8px;
    }
    
    .feature-cards {
        grid-template-columns: 1fr;
    }
    
    .welcome-header {
        flex-direction: column;
        text-align: center;
    }
}
</style>

</x-default-layout>
