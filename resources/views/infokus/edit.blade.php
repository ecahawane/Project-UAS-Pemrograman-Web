<x-default-layout>

<!-- Hero Section with Animation -->
<div class="infokus-hero mb-5">
    <div class="hero-content">
        <div class="hero-text">
            <p class="hero-label animate-fadeInUp" style="animation-delay: 0s">MANAJEMEN INFOKUS</p>
            <h1 class="hero-title animate-fadeInUp" style="animation-delay: 0.1s">Data Infokus</h1>
            <p class="hero-description animate-fadeInUp" style="animation-delay: 0.2s">
                Kelola seluruh perangkat infokus, lokasi, kode, dan status peminjaman dengan mudah dan terstruktur.
            </p>
            <div class="hero-underline"></div>
        </div>

        <div class="hero-image-container animate-float">
            <!-- Intense Projector Light Beam - Bright Glow -->
            <div class="projector-light-core"></div>
            <div class="projector-light-beam-primary"></div>
            <div class="projector-light-beam-secondary"></div>
            <div class="projector-light-bloom"></div>
            <img src="/images/proyektor.webp" alt="Projector" class="hero-image">
        </div>

        <!-- Right Side Icons -->
        <div class="hero-icons">
            <div class="floating-icon icon-1 animate-bounce" style="animation-delay: 0s">
                <i class="bi bi-bar-chart"></i>
            </div>
            <div class="floating-icon icon-2 animate-bounce" style="animation-delay: 0.2s">
                <i class="bi bi-geo-alt"></i>
            </div>
            <div class="floating-icon icon-3 animate-bounce" style="animation-delay: 0.4s">
                <i class="bi bi-shield-check"></i>
            </div>
        </div>

        <!-- Decorative Elements -->
        <div class="decorative-orb orb-1 animate-float" style="animation-duration: 6s"></div>
        <div class="decorative-orb orb-2 animate-float" style="animation-duration: 8s; animation-delay: -2s"></div>
    </div>

    <!-- Stats Cards with Animation -->
    <div class="stats-grid">
        <div class="stat-card animate-scaleIn" style="animation-delay: 0s">
            <div class="stat-icon icon-blue">
                <i class="bi bi-display"></i>
            </div>
            <div class="stat-content">
                <p class="stat-number">{{ count($infokus) }}</p>
                <p class="stat-label">Total Infokus</p>
                <small class="stat-desc">Semua perangkat terdaftar</small>
            </div>
        </div>

        <div class="stat-card animate-scaleIn" style="animation-delay: 0.1s">
            <div class="stat-icon icon-green">
                <i class="bi bi-check-circle"></i>
            </div>
            <div class="stat-content">
                <p class="stat-number">{{ $infokus->where('status', 'tersedia')->count() }}</p>
                <p class="stat-label">Tersedia</p>
                <small class="stat-desc">Siap untuk dipinjam</small>
            </div>
        </div>

        <div class="stat-card animate-scaleIn" style="animation-delay: 0.2s">
            <div class="stat-icon icon-red">
                <i class="bi bi-arrow-left-right"></i>
            </div>
            <div class="stat-content">
                <p class="stat-number">{{ $infokus->where('status', 'dipinjam')->count() }}</p>
                <p class="stat-label">Dipinjam</p>
                <small class="stat-desc">Sedang dipinjam</small>
            </div>
        </div>

        <div class="stat-card animate-scaleIn" style="animation-delay: 0.3s">
            <div class="stat-icon icon-purple">
                <i class="bi bi-geo-alt-fill"></i>
            </div>
            <div class="stat-content">
                <p class="stat-number">{{ $infokus->groupBy('lokasi')->count() }}</p>
                <p class="stat-label">Lokasi Berbeda</p>
                <small class="stat-desc">Tersebar di berbagai lokasi</small>
            </div>
        </div>
    </div>
</div>

@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show mb-4 animate-slideDown" role="alert">

        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

    </div>

@endif

<!-- Toolbar Section -->
<div class="infokus-toolbar mb-4 animate-fadeIn">

    <div class="toolbar-search">

        <i class="bi bi-search"></i>

        <input type="text"
               id="searchInfokus"
               class="form-control"
               placeholder="Cari nama, kode, lokasi, atau status...">

    </div>

    <div class="toolbar-filters">
        <div class="filter-dropdown">
            <i class="bi bi-funnel"></i>
            <select class="form-select filter-select" id="statusFilter">
                <option value="">Semua Status</option>
                <option value="tersedia">Tersedia</option>
                <option value="dipinjam">Dipinjam</option>
            </select>
        </div>

        <div class="filter-dropdown">
            <i class="bi bi-geo-alt"></i>
            <select class="form-select filter-select" id="lokasiFilter">
                <option value="">Semua Lokasi</option>
                @foreach($infokus->groupBy('lokasi') as $lokasi => $items)
                    <option value="{{ $lokasi }}">{{ $lokasi }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn-reset">
            <i class="bi bi-arrow-clockwise"></i>
            Reset
        </button>
    </div>

    @if(auth()->user()->role == 'admin')
        <a href="/infokus/create" class="btn btn-primary btn-add">
            <i class="bi bi-plus-circle me-2"></i>
            Tambah Infokus
        </a>
    @endif

</div>

<div class="table-responsive infokus-table-wrapper">

    <table class="table align-middle mb-0" id="infokusTable">

        <thead>

            <tr>

                <th>No</th>
                <th>Nama Infokus</th>
                <th>Kode</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>

            </tr>

        </thead>

        <tbody>

            @forelse($infokus as $item)

                <tr>

                    <td>
                        <span class="number-badge">
                            {{ $loop->iteration }}
                        </span>
                    </td>

                    <td>

                        <div class="device-info">

                            <div class="device-icon">

                                <i class="bi bi-display"></i>

                            </div>

                            <div>

                                <strong>
                                    {{ $item->nama_infokus }}
                                </strong>

                                <small>
                                    Perangkat Infokus
                                </small>

                            </div>

                        </div>

                    </td>

                    <td>

                        <span class="code-badge">
                            {{ $item->kode_infokus }}
                        </span>

                    </td>

                    <td>

                        <span class="location-text">

                            <i class="bi bi-geo-alt me-1"></i>
                            {{ $item->lokasi }}

                        </span>

                    </td>

                    <td>

                        @if($item->status == 'tersedia')

                            <span class="status-badge status-ready animate-pulse-green">

                                <i class="bi bi-check-circle me-1"></i>
                                Tersedia

                            </span>

                        @else

                            <span class="status-badge status-borrowed animate-pulse-red">

                                <i class="bi bi-x-circle me-1"></i>
                                Dipinjam

                            </span>

                        @endif

                    </td>

                    <td>

                        <div class="d-flex justify-content-end gap-2 flex-wrap">

                            <a href="/infokus/{{ $item->id }}"
                               class="btn-action btn-detail">

                                <i class="bi bi-eye"></i>
                                Detail

                            </a>

                            @if(auth()->user()->role == 'admin')

                                <a href="/infokus/{{ $item->id }}/edit"
                                   class="btn-action btn-edit">

                                    <i class="bi bi-pencil-square"></i>
                                    Edit

                                </a>

                                <form action="/infokus/{{ $item->id }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn-action btn-delete"
                                            onclick="return confirm('Yakin ingin menghapus data infokus ini?')">

                                        <i class="bi bi-trash"></i>
                                        Hapus

                                    </button>

                                </form>

                            @endif

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6">

                        <div class="empty-state">

                            <div class="empty-icon">

                                <i class="bi bi-inbox"></i>

                            </div>

                            <h5>
                                Data Infokus Belum Ada
                            </h5>

                            <p>
                                Belum ada perangkat infokus yang terdaftar di sistem.
                            </p>

                            @if(auth()->user()->role == 'admin')

                                <a href="/infokus/create" class="btn btn-primary">

                                    <i class="bi bi-plus-circle me-1"></i>
                                    Tambah Infokus Pertama

                                </a>

                            @endif

                        </div>

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

<style>

/* Hero Section */
.infokus-hero {
    position: relative;
    background: linear-gradient(135deg, #e0f2fe 0%, #dbeafe 50%, #f0f9ff 100%);
    border-radius: 28px;
    padding: 40px;
    margin-bottom: 40px;
    border: 2px solid rgba(37, 99, 235, 0.1);
    overflow: hidden;
}

.hero-content {
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    align-items: center;
    gap: 40px;
    position: relative;
    z-index: 2;
}

.hero-text {
    padding-right: 20px;
}

.hero-label {
    color: #2563eb;
    font-weight: 800;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    margin-bottom: 12px;
}

.hero-title {
    font-size: 48px;
    font-weight: 900;
    color: #0f172a;
    margin-bottom: 16px;
    line-height: 1.2;
}

.hero-description {
    font-size: 16px;
    color: #475569;
    line-height: 1.6;
    margin-bottom: 20px;
}

.hero-underline {
    width: 48px;
    height: 4px;
    background: linear-gradient(90deg, #2563eb, #38bdf8);
    border-radius: 999px;
}

.hero-image-container {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 280px;
}

/* Primary Light Core - Bright center of the beam */
.projector-light-core {
    position: absolute;
    width: 80px;
    height: 80px;
    background: radial-gradient(circle, rgba(147, 197, 253, 0.8) 0%, rgba(59, 130, 246, 0.6) 40%, rgba(37, 99, 235, 0.3) 100%);
    border-radius: 50%;
    animation: lightCorePulse 1.5s ease-in-out infinite;
    z-index: 1;
    left: 20%;
    top: 35%;
    filter: blur(2px);
    box-shadow: 0 0 30px rgba(59, 130, 246, 0.8), 0 0 60px rgba(59, 130, 246, 0.5);
}

/* Primary Light Beam - Main projection light */
.projector-light-beam-primary {
    position: absolute;
    width: 450px;
    height: 280px;
    background: linear-gradient(110deg, 
        rgba(96, 165, 250, 0.5) 0%,
        rgba(59, 130, 246, 0.35) 30%,
        rgba(37, 99, 235, 0.15) 60%,
        transparent 100%);
    border-radius: 0 200px 200px 0;
    animation: lightBeamIntense 2s ease-in-out infinite;
    z-index: 0;
    left: 15%;
    top: 15%;
    filter: blur(15px);
    transform-origin: left center;
}

/* Secondary Light Beam - Additional glow */
.projector-light-beam-secondary {
    position: absolute;
    width: 350px;
    height: 220px;
    background: linear-gradient(110deg, 
        rgba(147, 197, 253, 0.3) 0%,
        rgba(96, 165, 250, 0.2) 40%,
        transparent 100%);
    border-radius: 0 150px 150px 0;
    animation: lightBeamSoft 2.5s ease-in-out infinite;
    z-index: 0;
    left: 20%;
    top: 25%;
    filter: blur(25px);
}

/* Bloom/Halo effect - Outer glow */
.projector-light-bloom {
    position: absolute;
    width: 320px;
    height: 240px;
    background: radial-gradient(ellipse 200px 150px at 30% 50%, 
        rgba(96, 165, 250, 0.25) 0%,
        rgba(59, 130, 246, 0.1) 50%,
        transparent 100%);
    animation: bloomPulse 3s ease-in-out infinite;
    z-index: 0;
    left: 10%;
    top: 20%;
    filter: blur(35px);
}

.hero-image {
    width: 100%;
    max-width: 100%;
    height: auto;
    object-fit: contain;
    filter: drop-shadow(0 20px 40px rgba(37, 99, 235, 0.2));
    position: relative;
    z-index: 2;
}

.hero-icons {
    position: absolute;
    right: 30px;
    top: 50%;
    transform: translateY(-50%);
    display: flex;
    flex-direction: column;
    gap: 16px;
    z-index: 3;
}

.floating-icon {
    width: 56px;
    height: 56px;
    border-radius: 18px;
    background: rgba(255, 255, 255, 0.85);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #2563eb;
    font-size: 24px;
    box-shadow: 0 12px 24px rgba(37, 99, 235, 0.15);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(37, 99, 235, 0.1);
}

.icon-1 {
    background: linear-gradient(135deg, #eff6ff, rgba(255, 255, 255, 0.9));
}

.icon-2 {
    background: linear-gradient(135deg, #dbeafe, rgba(255, 255, 255, 0.9));
    color: #0369a1;
}

.icon-3 {
    background: linear-gradient(135deg, #bfdbfe, rgba(255, 255, 255, 0.9));
    color: #0284c7;
}

/* Decorative Orbs */
.decorative-orb {
    position: absolute;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(59, 130, 246, 0.2), transparent);
    z-index: 1;
}

.orb-1 {
    width: 180px;
    height: 180px;
    top: -40px;
    right: 50px;
}

.orb-2 {
    width: 120px;
    height: 120px;
    bottom: 20px;
    left: 80px;
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-top: 30px;
    position: relative;
    z-index: 2;
}

.stat-card {
    background: rgba(255, 255, 255, 0.95);
    border: 1px solid rgba(37, 99, 235, 0.15);
    border-radius: 20px;
    padding: 24px;
    display: flex;
    align-items: flex-start;
    gap: 16px;
    backdrop-filter: blur(8px);
    transition: all 0.3s ease;
    box-shadow: 0 8px 24px rgba(37, 99, 235, 0.08);
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 16px 40px rgba(37, 99, 235, 0.12);
    border-color: rgba(37, 99, 235, 0.3);
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    flex-shrink: 0;
}

.icon-blue {
    background: #eff6ff;
    color: #2563eb;
}

.icon-green {
    background: #dcfce7;
    color: #15803d;
}

.icon-red {
    background: #fee2e2;
    color: #dc2626;
}

.icon-purple {
    background: #f3e8ff;
    color: #a855f7;
}

.stat-content {
    flex: 1;
}

.stat-number {
    margin: 0;
    font-size: 32px;
    font-weight: 900;
    color: #0f172a;
    line-height: 1;
}

.stat-label {
    margin: 8px 0 4px;
    font-weight: 700;
    color: #334155;
    font-size: 14px;
}

.stat-desc {
    display: block;
    color: #64748b;
    font-size: 12px;
}

.infokus-toolbar {
    display: flex;
    justify-content: space-between;
    gap: 16px;
    align-items: center;
    flex-wrap: wrap;
}

.toolbar-search {
    position: relative;
    flex: 1;
    min-width: 250px;
}

.toolbar-search i {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #64748b;
}

.toolbar-search .form-control {
    padding-left: 44px;
    border-radius: 14px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 12px rgba(15, 23, 42, 0.06);
}

.toolbar-search .form-control:focus {
    border-color: #2563eb;
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.15);
}

.toolbar-filters {
    display: flex;
    gap: 12px;
    align-items: center;
}

.filter-dropdown {
    position: relative;
    display: flex;
    align-items: center;
    gap: 8px;
}

.filter-dropdown i {
    color: #64748b;
    font-size: 16px;
    pointer-events: none;
}

.filter-select {
    padding-left: 36px;
    padding-right: 12px;
    border-radius: 14px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 12px rgba(15, 23, 42, 0.06);
    font-size: 14px;
    cursor: pointer;
}

.filter-select:focus {
    border-color: #2563eb;
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.15);
}

.btn-reset {
    padding: 10px 16px;
    border: 1px solid #e2e8f0;
    background: #f8fafc;
    color: #2563eb;
    border-radius: 14px;
    cursor: pointer;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: all 0.25s ease;
}

.btn-reset:hover {
    background: #eff6ff;
    border-color: #bfdbfe;
}

.btn-add {
    padding: 10px 20px;
    white-space: nowrap;
}

.infokus-table-wrapper {
    border-radius: 20px;
    border: 1px solid #e2e8f0;
    overflow: hidden;
    box-shadow: 0 14px 35px rgba(15, 23, 42, .06);
}

#infokusTable thead th {
    background: #f8fafc;
    padding: 16px;
    color: #475569;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: .04em;
    border-bottom: 1px solid #e2e8f0;
}

#infokusTable tbody td {
    padding: 18px 16px;
    border-bottom: 1px solid #f1f5f9;
}

#infokusTable tbody tr {
    transition: .25s;
}

#infokusTable tbody tr:hover {
    background: #f8fbff;
}

.number-badge {
    width: 34px;
    height: 34px;
    border-radius: 12px;
    background: #f1f5f9;
    color: #334155;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
}

.device-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.device-icon {
    width: 44px;
    height: 44px;
    border-radius: 14px;
    background: #eff6ff;
    color: #2563eb;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}

.device-info small {
    display: block;
    color: #64748b;
    margin-top: 2px;
}

.code-badge {
    background: #f1f5f9;
    color: #334155;
    padding: 8px 12px;
    border-radius: 999px;
    font-weight: 800;
    font-size: 13px;
}

.location-text {
    color: #475569;
    font-weight: 600;
}

.status-badge {
    display: inline-flex;
    align-items: center;
    padding: 8px 12px;
    border-radius: 999px;
    font-weight: 800;
    font-size: 13px;
}

.status-ready {
    background: #dcfce7;
    color: #15803d;
}

.status-borrowed {
    background: #fee2e2;
    color: #b91c1c;
}

.btn-action {
    border: none;
    text-decoration: none;
    padding: 8px 12px;
    border-radius: 12px;
    font-size: 13px;
    font-weight: 800;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: .25s;
}

.btn-detail {
    background: #e0f2fe;
    color: #0369a1;
}

.btn-edit {
    background: #fef3c7;
    color: #b45309;
}

.btn-delete {
    background: #fee2e2;
    color: #b91c1c;
}

.btn-action:hover {
    transform: translateY(-2px);
    opacity: .9;
}

.empty-state {
    text-align: center;
    padding: 50px 20px;
}

.empty-icon {
    width: 72px;
    height: 72px;
    border-radius: 24px;
    background: #f1f5f9;
    color: #64748b;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 34px;
    margin-bottom: 18px;
}

.empty-state p {
    color: #64748b;
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-20px);
    }
}

@keyframes scaleIn {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-15px);
    }
}

/* Intense Light Core Pulse */
@keyframes lightCorePulse {
    0%, 100% {
        opacity: 0.7;
        box-shadow: 0 0 25px rgba(59, 130, 246, 0.8), 0 0 50px rgba(59, 130, 246, 0.4);
    }
    50% {
        opacity: 1;
        box-shadow: 0 0 40px rgba(59, 130, 246, 1), 0 0 80px rgba(59, 130, 246, 0.6);
    }
}

/* Primary Light Beam Intense Animation */
@keyframes lightBeamIntense {
    0%, 100% {
        opacity: 0.35;
    }
    50% {
        opacity: 0.55;
    }
}

/* Secondary Soft Light Animation */
@keyframes lightBeamSoft {
    0%, 100% {
        opacity: 0.2;
    }
    50% {
        opacity: 0.4;
    }
}

/* Bloom Pulse Animation */
@keyframes bloomPulse {
    0%, 100% {
        opacity: 0.15;
        transform: scale(0.95);
    }
    50% {
        opacity: 0.3;
        transform: scale(1.05);
    }
}

@keyframes pulseGreen {
    0%, 100% {
        background-color: #dcfce7;
        box-shadow: 0 0 0 0 rgba(21, 128, 61, 0.7);
    }
    50% {
        background-color: #bbf7d0;
        box-shadow: 0 0 0 8px rgba(21, 128, 61, 0.2);
    }
}

@keyframes pulseRed {
    0%, 100% {
        background-color: #fee2e2;
        box-shadow: 0 0 0 0 rgba(220, 38, 38, 0.7);
    }
    50% {
        background-color: #fecaca;
        box-shadow: 0 0 0 8px rgba(220, 38, 38, 0.2);
    }
}

.animate-fadeInUp {
    animation: fadeInUp 0.6s ease-out forwards;
    opacity: 0;
}

.animate-float {
    animation: float 4s ease-in-out infinite;
}

.animate-scaleIn {
    animation: scaleIn 0.5s ease-out forwards;
    opacity: 0;
}

.animate-slideDown {
    animation: slideDown 0.5s ease-out forwards;
}

.animate-fadeIn {
    animation: fadeIn 0.6s ease-out forwards;
    opacity: 0;
}

.animate-bounce {
    animation: bounce 2s ease-in-out infinite;
}

.animate-pulse-green {
    animation: pulseGreen 1.5s ease-in-out infinite;
}

.animate-pulse-red {
    animation: pulseRed 1.5s ease-in-out infinite;
}

@media(max-width:768px) {
    .infokus-hero {
        padding: 30px 20px;
    }

    .hero-content {
        grid-template-columns: 1fr;
        gap: 30px;
    }

    .hero-title {
        font-size: 32px;
    }

    .hero-text {
        padding-right: 0;
    }

    .hero-image-container {
        height: 220px;
    }

    .hero-icons {
        position: static;
        transform: none;
        flex-direction: row;
        justify-content: center;
        gap: 12px;
    }

    .floating-icon {
        width: 48px;
        height: 48px;
        font-size: 20px;
    }

    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
    }

    .stat-card {
        padding: 16px;
    }

    .stat-number {
        font-size: 24px;
    }

    .infokus-toolbar {
        flex-direction: column;
        align-items: stretch;
    }

    .toolbar-search {
        min-width: 100%;
    }

    .toolbar-filters {
        flex-direction: column;
    }

    .filter-dropdown {
        width: 100%;
    }

    .filter-select {
        width: 100%;
    }

    .btn-reset {
        width: 100%;
        justify-content: center;
    }

    .btn-add {
        width: 100%;
        justify-content: center;
    }

    .btn-action {
        width: 100%;
        justify-content: center;
    }
}

</style>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('searchInfokus');
    const statusFilter = document.getElementById('statusFilter');
    const lokasiFilter = document.getElementById('lokasiFilter');
    const resetBtn = document.querySelector('.btn-reset');
    const rows = document.querySelectorAll('#infokusTable tbody tr');

    // Filter function
    function filterTable() {
        const keyword = searchInput.value.toLowerCase();
        const statusValue = statusFilter.value.toLowerCase();
        const lokasiValue = lokasiFilter.value.toLowerCase();

        rows.forEach(function (row) {
            const text = row.innerText.toLowerCase();
            const statusCell = row.querySelector('td:nth-child(5)');
            const lokasiCell = row.querySelector('td:nth-child(4)');

            let statusMatch = true;
            let lokasiMatch = true;
            let searchMatch = text.includes(keyword);

            if (statusValue && statusCell) {
                statusMatch = statusCell.innerText.toLowerCase().includes(statusValue);
            }

            if (lokasiValue && lokasiCell) {
                lokasiMatch = lokasiCell.innerText.toLowerCase().includes(lokasiValue);
            }

            row.style.display = (searchMatch && statusMatch && lokasiMatch) ? '' : 'none';
        });
    }

    // Event listeners
    searchInput.addEventListener('keyup', filterTable);
    statusFilter.addEventListener('change', filterTable);
    lokasiFilter.addEventListener('change', filterTable);

    // Reset filter
    resetBtn.addEventListener('click', function () {
        searchInput.value = '';
        statusFilter.value = '';
        lokasiFilter.value = '';
        rows.forEach(function (row) {
            row.style.display = '';
        });
    });

});

</script>

</x-default-layout>
