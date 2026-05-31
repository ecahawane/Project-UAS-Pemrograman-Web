<x-default-layout>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

    <div>

        <h1 class="page-title mb-1">
            Dashboard INFOLEND
        </h1>

        <p class="page-subtitle mb-0">
            Ringkasan data infokus dan aktivitas peminjaman perangkat.
        </p>

    </div>

    <div class="d-flex gap-2">

        <a href="/infokus" class="btn btn-primary">
            <i class="bi bi-display me-1"></i>
            Lihat Infokus
        </a>

        <a href="/peminjaman" class="btn btn-outline-primary">
            <i class="bi bi-journal-check me-1"></i>
            Data Peminjaman
        </a>

    </div>

</div>

<div class="row g-4">

    <div class="col-md-4">

        <div class="dashboard-card card-total h-100">

            <div class="dashboard-icon bg-primary-subtle text-primary">

                <i class="bi bi-display"></i>

            </div>

            <div>

                <p class="dashboard-label">
                    Total Infokus
                </p>

                <h2 class="dashboard-number">
                    {{ $totalInfokus }}
                </h2>

                <small class="dashboard-desc">
                    Jumlah perangkat infokus terdaftar.
                </small>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="dashboard-card card-borrowed h-100">

            <div class="dashboard-icon bg-warning-subtle text-warning">

                <i class="bi bi-box-arrow-up-right"></i>

            </div>

            <div>

                <p class="dashboard-label">
                    Total Dipinjam
                </p>

                <h2 class="dashboard-number">
                    {{ $totalDipinjam }}
                </h2>

                <small class="dashboard-desc">
                    Total perangkat yang sedang dipinjam.
                </small>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="dashboard-card card-ready h-100">

            <div class="dashboard-icon bg-success-subtle text-success">

                <i class="bi bi-check-circle"></i>

            </div>

            <div>

                <p class="dashboard-label">
                    Tersedia
                </p>

                <h2 class="dashboard-number">
                    {{ $totalTersedia }}
                </h2>

                <small class="dashboard-desc">
                    Perangkat yang masih bisa dipinjam.
                </small>

            </div>

        </div>

    </div>

</div>

<div class="row g-4 mt-1">

    <div class="col-lg-12">

        <div class="info-panel h-100">

            <div class="d-flex align-items-center gap-3 mb-3">

                <div class="panel-icon">

                    <i class="bi bi-info-circle"></i>

                </div>

                <div>

                    <h5 class="mb-1">
                        Selamat Datang di INFOLEND
                    </h5>

                    <p class="mb-0">
                        Sistem ini membantu proses pengelolaan dan peminjaman infokus agar lebih rapi, cepat, dan mudah dipantau.
                    </p>

                </div>

            </div>

            <div class="row g-3 mt-2">

                <div class="col-md-4">

                    <div class="mini-feature">

                        <i class="bi bi-search"></i>

                        <span>Cek Ketersediaan</span>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="mini-feature">

                        <i class="bi bi-calendar-check"></i>

                        <span>Ajukan Peminjaman</span>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="mini-feature">

                        <i class="bi bi-clipboard-data"></i>

                        <span>Monitoring Data</span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

.dashboard-card{
position:relative;
overflow:hidden;
display:flex;
align-items:center;
gap:18px;
padding:24px;
border-radius:22px;
background:#ffffff;
border:1px solid #e2e8f0;
box-shadow:0 14px 35px rgba(15,23,42,.07);
transition:.25s;
}

.dashboard-card:hover{
transform:translateY(-4px);
box-shadow:0 20px 45px rgba(15,23,42,.11);
}

.dashboard-card::after{
content:"";
position:absolute;
width:130px;
height:130px;
right:-45px;
top:-45px;
border-radius:50%;
background:rgba(37,99,235,.08);
}

.card-borrowed::after{
background:rgba(245,158,11,.12);
}

.card-ready::after{
background:rgba(22,163,74,.12);
}

.dashboard-icon{
width:62px;
height:62px;
border-radius:18px;
display:flex;
align-items:center;
justify-content:center;
font-size:26px;
flex-shrink:0;
}

.dashboard-label{
margin-bottom:4px;
color:#64748b;
font-weight:700;
}

.dashboard-number{
margin:0;
font-size:38px;
font-weight:900;
color:#0f172a;
}

.dashboard-desc{
color:#64748b;
}

.info-panel{
padding:26px;
border-radius:22px;
background:linear-gradient(135deg,#ffffff,#f8fbff);
border:1px solid #e2e8f0;
box-shadow:0 14px 35px rgba(15,23,42,.06);
}

.panel-icon{
width:52px;
height:52px;
border-radius:16px;
background:#eff6ff;
color:#2563eb;
display:flex;
align-items:center;
justify-content:center;
font-size:24px;
}

.mini-feature{
padding:16px;
border-radius:16px;
background:#f8fafc;
border:1px solid #e2e8f0;
display:flex;
align-items:center;
gap:10px;
font-weight:700;
color:#334155;
}

.mini-feature i{
color:#2563eb;
}

@media(max-width:768px){

.dashboard-card{
padding:20px;
}

.dashboard-number{
font-size:32px;
}

}

</style>

</x-default-layout>