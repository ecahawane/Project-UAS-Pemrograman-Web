<x-default-layout>

<!-- Back Button -->
<div class="mb-4">
    <a href="/infokus" class="btn-back">
        <i class="bi bi-chevron-left"></i>
        Kembali
    </a>
</div>

<!-- Detail Container -->
<div class="detail-container">
    <!-- Header Section with Background -->
    <div class="detail-header">
        <div class="header-background" style="background-image: url('/images/backgroundproyektor.png')"></div>
        
        <div class="header-content">
            <div class="device-info">
                <div class="device-icon">
                    <i class="bi bi-display"></i>
                </div>
                <div class="device-details">
                    <h1 class="device-name">{{ $infokus->nama_infokus }}</h1>
                    <p class="device-code">Kode: {{ $infokus->kode_infokus }}</p>
                    <p class="device-description">
                        Informasi lengkap perangkat infokus yang terdaftar pada sistem. Kelola data, lokasi, status, dan riwayat peminjaman dengan mudah dan terstruktur.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Cards Grid -->
    <div class="info-cards-grid">
        <div class="info-card">
            <div class="card-icon icon-blue">
                <i class="bi bi-display"></i>
            </div>
            <div class="card-content">
                <span class="card-label">Nama Infokus</span>
                <p class="card-value">{{ $infokus->nama_infokus }}</p>
            </div>
            <div class="card-border border-blue"></div>
        </div>

        <div class="info-card">
            <div class="card-icon icon-purple">
                <i class="bi bi-hash"></i>
            </div>
            <div class="card-content">
                <span class="card-label">Kode Perangkat</span>
                <p class="card-value">{{ $infokus->kode_infokus }}</p>
            </div>
            <div class="card-border border-purple"></div>
        </div>

        <div class="info-card">
            <div class="card-icon icon-teal">
                <i class="bi bi-geo-alt-fill"></i>
            </div>
            <div class="card-content">
                <span class="card-label">Lokasi</span>
                <p class="card-value">{{ $infokus->lokasi }}</p>
            </div>
            <div class="card-border border-teal"></div>
        </div>

        <div class="info-card">
            <div class="card-icon @if($infokus->status === 'tersedia') icon-green @else icon-red @endif">
                @if($infokus->status === 'tersedia')
                    <i class="bi bi-check-circle-fill"></i>
                @else
                    <i class="bi bi-x-circle-fill"></i>
                @endif
            </div>
            <div class="card-content">
                <span class="card-label">Status</span>
                <p class="card-value @if($infokus->status === 'tersedia') text-success @else text-danger @endif">
                    {{ ucfirst($infokus->status) }}
                </p>
            </div>
            <div class="card-border @if($infokus->status === 'tersedia') border-green @else border-red @endif"></div>
        </div>
    </div>

    <!-- Additional Info Section -->
    <div class="additional-info-section">
        <div class="info-row">
            <div class="info-box">
                <div class="info-box-icon">
                    <i class="bi bi-calendar3"></i>
                </div>
                <div class="info-box-content">
                    <span class="info-box-label">Tanggal Ditambahkan</span>
                    @if($infokus->created_at)
                        <p class="info-box-value">{{ $infokus->created_at->translatedFormat('d F Y') }}</p>
                        <small class="info-box-time">{{ $infokus->created_at->format('H:i') }} WIB</small>
                    @else
                        <p class="info-box-value">-</p>
                    @endif
                </div>
            </div>

            <div class="info-box">
                <div class="info-box-icon">
                    <i class="bi bi-clock-history"></i>
                </div>
                <div class="info-box-content">
                    <span class="info-box-label">Terakhir Digunakan</span>
                    @php
                        $lastPeminjaman = $infokus->peminjamans()->latest('tanggal_pinjam')->first();
                    @endphp
                    @if($lastPeminjaman && $lastPeminjaman->tanggal_pinjam)
                        <p class="info-box-value">
                            {{ \Carbon\Carbon::parse($lastPeminjaman->tanggal_pinjam)->translatedFormat('d F Y') }}
                        </p>
                        <small class="info-box-time">
                            {{ \Carbon\Carbon::parse($lastPeminjaman->tanggal_pinjam)->format('H:i') }} WIB
                        </small>
                    @else
                        <p class="info-box-value">Belum pernah digunakan</p>
                    @endif
                </div>
            </div>

            <div class="info-box">
                <div class="info-box-icon">
                    <i class="bi bi-person-circle"></i>
                </div>
                <div class="info-box-content">
                    <span class="info-box-label">Peminjam Terakhir</span>
                    @if($lastPeminjaman)
                        <p class="info-box-value">{{ $lastPeminjaman->nama_dosen ?? 'Staff IT' }}</p>
                        <small class="info-box-time">{{ $lastPeminjaman->user->name ?? 'Admin' }}</small>
                    @else
                        <p class="info-box-value">-</p>
                    @endif
                </div>
            </div>

            <div class="info-box">
                <div class="info-box-icon">
                    <i class="bi bi-calculator"></i>
                </div>
                <div class="info-box-content">
                    <span class="info-box-label">Total Peminjaman</span>
                    <p class="info-box-value">{{ $infokus->peminjamans->count() }} Kali</p>
                    <small class="info-box-time">Sejak ditambahkan</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="charts-section">
        <div class="chart-card">
            <h3 class="chart-title">Ringkasan Peminjaman (6 Bulan Terakhir)</h3>
            <canvas id="borrowingChart" height="80"></canvas>
        </div>

        <div class="chart-card">
            <h3 class="chart-title">Status Peminjaman</h3>
            <canvas id="statusChart" height="80"></canvas>
        </div>
    </div>

    <!-- Riwayat Peminjaman -->
    <div class="history-section">
        <div class="section-header">
            <h3 class="section-title">Riwayat Peminjaman</h3>
            @if($infokus->peminjamans->count() > 5)
                <a href="#" class="view-all-link">Lihat Semua</a>
            @endif
        </div>
        <div class="history-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Nama Peminjam</th>
                        <th>Mata Kuliah</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($infokus->peminjamans()->latest('tanggal_pinjam')->take(5)->get() as $peminjaman)
                        <tr>
                            <td>{{ $peminjaman->tanggal_pinjam ? \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->translatedFormat('d/m/Y') : '-' }}</td>
                            <td>{{ $peminjaman->tanggal_kembali ? \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->translatedFormat('d/m/Y') : 'Belum dikembalikan' }}</td>
                            <td>{{ $peminjaman->nama_dosen ?? '-' }}</td>
                            <td>{{ $peminjaman->mata_kuliah ?? '-' }}</td>
                            <td>
                                <span class="status-badge @if($peminjaman->status === 'selesai') status-complete @elseif($peminjaman->status === 'dipinjam') status-borrowed @else status-pending @endif">
                                    @if($peminjaman->status === 'selesai')
                                        Selesai
                                    @elseif($peminjaman->status === 'dipinjam')
                                        Dipinjam
                                    @else
                                        {{ ucfirst($peminjaman->status) }}
                                    @endif
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada riwayat peminjaman</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="action-buttons">
        @if(auth()->user()->role == 'admin')
            <a href="/infokus/{{ $infokus->id }}/edit" class="btn btn-edit">
                <i class="bi bi-pencil-square"></i>
                Edit Data
            </a>
            <form action="/infokus/{{ $infokus->id }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-delete">
                    <i class="bi bi-trash3"></i>
                    Hapus
                </button>
            </form>
        @endif
    </div>
</div>

<style>
.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #2563eb;
    font-weight: 600;
    text-decoration: none;
    padding: 8px 0;
    transition: all 0.3s ease;
}

.btn-back:hover {
    color: #1d4ed8;
    transform: translateX(-4px);
}

.detail-container {
    background: #f8fafc;
    border-radius: 20px;
    overflow: hidden;
    padding: 30px;
}

.detail-header {
    position: relative;
    margin: -30px -30px 30px -30px;
    height: 350px;
    overflow: hidden;
    display: flex;
    align-items: center;
}

.header-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-size: cover;
    background-position: center;
    opacity: 0.15;
    z-index: 0;
}

.header-content {
    position: relative;
    z-index: 1;
    width: 100%;
    padding: 40px;
}

.device-info {
    display: flex;
    gap: 30px;
    align-items: flex-start;
}

.device-icon {
    width: 80px;
    height: 80px;
    border-radius: 20px;
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 36px;
    color: white;
    flex-shrink: 0;
    box-shadow: 0 8px 24px rgba(37, 99, 235, 0.3);
}

.device-details {
    flex: 1;
}

.device-name {
    font-size: 36px;
    font-weight: 900;
    color: #0f172a;
    margin-bottom: 8px;
    line-height: 1.2;
}

.device-code {
    color: #2563eb;
    font-weight: 600;
    font-size: 14px;
    margin-bottom: 12px;
}

.device-description {
    color: #475569;
    line-height: 1.6;
    font-size: 14px;
}

/* Info Cards Grid */
.info-cards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
}

.info-card {
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    padding: 24px;
    display: flex;
    gap: 16px;
    align-items: flex-start;
    position: relative;
    transition: all 0.3s ease;
}

.info-card:hover {
    border-color: #bfdbfe;
    box-shadow: 0 8px 20px rgba(37, 99, 235, 0.1);
    transform: translateY(-2px);
}

.card-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
}

.icon-blue {
    background: #eff6ff;
    color: #2563eb;
}

.icon-purple {
    background: #f3e8ff;
    color: #a855f7;
}

.icon-teal {
    background: #f0fdfa;
    color: #0d9488;
}

.icon-green {
    background: #dcfce7;
    color: #15803d;
}

.icon-red {
    background: #fee2e2;
    color: #dc2626;
}

.card-content {
    flex: 1;
}

.card-label {
    display: block;
    font-size: 12px;
    color: #64748b;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 8px;
}

.card-value {
    font-size: 18px;
    font-weight: 700;
    color: #0f172a;
    margin: 0;
}

.card-border {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 4px;
    border-radius: 0 0 16px 16px;
}

.border-blue {
    background: linear-gradient(90deg, #2563eb, #0ea5e9);
}

.border-purple {
    background: linear-gradient(90deg, #a855f7, #d946ef);
}

.border-teal {
    background: linear-gradient(90deg, #0d9488, #14b8a6);
}

.border-green {
    background: linear-gradient(90deg, #15803d, #22c55e);
}

.border-red {
    background: linear-gradient(90deg, #dc2626, #f87171);
}

/* Additional Info Section */
.additional-info-section {
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    padding: 30px;
    margin-bottom: 30px;
}

.info-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 24px;
}

.info-box {
    display: flex;
    gap: 16px;
    padding: 16px;
    background: #f8fafc;
    border-radius: 12px;
    border: 1px solid #e2e8f0;
    transition: all 0.3s ease;
}

.info-box:hover {
    background: #f1f5f9;
    border-color: #cbd5e1;
    transform: translateY(-2px);
}

.info-box-icon {
    width: 44px;
    height: 44px;
    border-radius: 10px;
    background: linear-gradient(135deg, #2563eb, #0ea5e9);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    color: white;
    flex-shrink: 0;
}

.info-box-content {
    flex: 1;
}

.info-box-label {
    display: block;
    font-size: 11px;
    color: #64748b;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 4px;
}

.info-box-value {
    font-size: 16px;
    font-weight: 700;
    color: #0f172a;
    margin: 0;
}

.info-box-time {
    display: block;
    font-size: 12px;
    color: #94a3b8;
    margin-top: 4px;
}

/* Charts Section */
.charts-section {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 24px;
    margin-bottom: 40px;
}

.chart-card {
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    padding: 24px;
    transition: all 0.3s ease;
}

.chart-card:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.chart-title {
    font-size: 16px;
    font-weight: 700;
    color: #0f172a;
    margin: 0 0 20px 0;
}

/* History Section */
.history-section {
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    padding: 24px;
    margin-bottom: 30px;
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.section-title {
    font-size: 18px;
    font-weight: 700;
    color: #0f172a;
    margin: 0;
}

.view-all-link {
    color: #2563eb;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.view-all-link:hover {
    color: #1d4ed8;
    text-decoration: underline;
}

.history-table {
    overflow-x: auto;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin: 0;
}

.table thead th {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    padding: 16px;
    text-align: left;
    font-weight: 600;
    font-size: 12px;
    text-transform: uppercase;
    color: #475569;
    letter-spacing: 0.05em;
}

.table tbody td {
    padding: 16px;
    border: 1px solid #e2e8f0;
    color: #334155;
}

.table tbody tr:hover {
    background: #f8fafc;
}

.status-badge {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 600;
    text-transform: capitalize;
}

.status-complete {
    background: #dcfce7;
    color: #15803d;
}

.status-borrowed {
    background: #fee2e2;
    color: #dc2626;
}

.status-pending {
    background: #fef3c7;
    color: #b45309;
}

.text-success {
    color: #15803d;
}

.text-danger {
    color: #dc2626;
}

.text-muted {
    color: #94a3b8;
}

.text-center {
    text-align: center;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 24px;
    border: none;
    border-radius: 12px;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 14px;
}

.btn-edit {
    background: linear-gradient(135deg, #f59e0b, #f97316);
    color: white;
}

.btn-edit:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(245, 158, 11, 0.3);
}

.btn-delete {
    background: linear-gradient(135deg, #ef4444, #f87171);
    color: white;
}

.btn-delete:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(239, 68, 68, 0.3);
}

@media(max-width:768px) {
    .detail-container {
        padding: 20px;
    }
    
    .detail-header {
        height: auto;
        min-height: 250px;
        margin: -20px -20px 20px -20px;
    }
    
    .header-content {
        padding: 20px;
    }

    .device-info {
        flex-direction: column;
        gap: 16px;
        align-items: center;
        text-align: center;
    }

    .device-name {
        font-size: 24px;
    }

    .info-cards-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }
    
    .info-card {
        padding: 16px;
    }

    .info-row {
        grid-template-columns: 1fr;
        gap: 16px;
    }
    
    .info-box {
        padding: 12px;
    }
    
    .additional-info-section {
        padding: 20px;
    }

    .charts-section {
        grid-template-columns: 1fr;
        gap: 16px;
    }
    
    .chart-card {
        padding: 16px;
    }
    
    .history-section {
        padding: 16px;
    }

    .action-buttons {
        flex-direction: column;
    }

    .btn {
        width: 100%;
        justify-content: center;
    }
    
    .section-header {
        flex-direction: column;
        gap: 10px;
        align-items: flex-start;
    }
    
    .table thead th,
    .table tbody td {
        padding: 10px;
        font-size: 12px;
    }
}
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get actual borrowing data for the last 6 months
    const months = [];
    const borrowingCounts = [];
    
    // Get data for the last 6 months
    for (let i = 5; i >= 0; i--) {
        const date = new Date();
        date.setMonth(date.getMonth() - i);
        const monthName = date.toLocaleString('id-ID', { month: 'short' });
        months.push(monthName);
        
        // Get start and end of month
        const startOfMonth = new Date(date.getFullYear(), date.getMonth(), 1);
        const endOfMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0);
        
        // Count borrowings in this month (this is dynamic data, adjust based on your actual data)
        // You can replace this with actual data from your backend
        const count = @json($infokus->peminjamans)
            .filter(p => {
                const pinjamDate = new Date(p.tanggal_pinjam);
                return pinjamDate >= startOfMonth && pinjamDate <= endOfMonth;
            }).length;
        
        borrowingCounts.push(count);
    }
    
    // Borrowing Chart
    const ctx = document.getElementById('borrowingChart');
    if(ctx) {
        new Chart(ctx.getContext('2d'), {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Jumlah Peminjaman',
                    data: borrowingCounts,
                    borderColor: '#2563eb',
                    backgroundColor: 'rgba(37, 99, 235, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#2563eb',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            boxWidth: 10
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `Peminjaman: ${context.raw} kali`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            precision: 0
                        },
                        title: {
                            display: true,
                            text: 'Jumlah Peminjaman',
                            color: '#64748b'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Bulan',
                            color: '#64748b'
                        }
                    }
                }
            }
        });
    }

    // Status Chart (Donut)
    const statusCtx = document.getElementById('statusChart');
    if(statusCtx) {
        // Calculate actual status counts from your data
        const totalBorrowings = @json($infokus->peminjamans->count());
        const completedBorrowings = @json($infokus->peminjamans->where('status', 'selesai')->count());
        const activeBorrowings = @json($infokus->peminjamans->where('status', 'dipinjam')->count());
        const pendingBorrowings = totalBorrowings - completedBorrowings - activeBorrowings;
        
        new Chart(statusCtx.getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Selesai', 'Dipinjam', 'Pending'],
                datasets: [{
                    data: [completedBorrowings, activeBorrowings, pendingBorrowings],
                    backgroundColor: [
                        '#22c55e',
                        '#ef4444',
                        '#f59e0b'
                    ],
                    borderColor: '#fff',
                    borderWidth: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 20
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = total > 0 ? Math.round((value / total) * 100) : 0;
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });
    }
});
</script>

</x-default-layout>