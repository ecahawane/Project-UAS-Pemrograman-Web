<x-default-layout>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

    <div>

        <h1 class="page-title mb-1">
            Detail Peminjaman
        </h1>

        <p class="page-subtitle mb-0">
            Informasi lengkap data peminjaman infokus.
        </p>

    </div>

    <a href="/peminjaman"
       class="btn btn-outline-secondary">

        <i class="bi bi-arrow-left me-1"></i>

        Kembali

    </a>

</div>

<div class="detail-card">

    <div class="detail-header">

        <div class="detail-avatar">

            <i class="bi bi-journal-check"></i>

        </div>

        <div>

            <h3 class="mb-1">

                {{ $peminjaman->infokus->nama_infokus }}

            </h3>

            <p class="mb-0 text-muted">

                Dipinjam oleh
                <strong>
                    {{ $peminjaman->user->name }}
                </strong>

            </p>

        </div>

        <div class="ms-md-auto">

            @if($peminjaman->status == 'dipinjam')

                <span class="status-badge status-borrowed">

                    <i class="bi bi-clock-history me-1"></i>

                    Dipinjam

                </span>

            @else

                <span class="status-badge status-returned">

                    <i class="bi bi-check-circle me-1"></i>

                    Dikembalikan

                </span>

            @endif

        </div>

    </div>

    <div class="section-block">

        <h5 class="section-heading">

            <i class="bi bi-person-circle me-2"></i>

            Data Peminjam

        </h5>

        <div class="detail-grid">

            <div class="info-box">

                <span>Nama User</span>

                <strong>
                    {{ $peminjaman->user->name }}
                </strong>

            </div>

            <div class="info-box">

                <span>NIM</span>

                <strong>
                    {{ $peminjaman->user->nim }}
                </strong>

            </div>

            <div class="info-box">

                <span>Program Studi</span>

                <strong>
                    {{ $peminjaman->user->prodi }}
                </strong>

            </div>

            <div class="info-box">

                <span>Nomor HP</span>

                <strong>
                    {{ $peminjaman->user->no_hp }}
                </strong>

            </div>

        </div>

    </div>

    <div class="section-block">

        <h5 class="section-heading">

            <i class="bi bi-display me-2"></i>

            Data Infokus

        </h5>

        <div class="detail-grid">

            <div class="info-box">

                <span>Nama Infokus</span>

                <strong>

                    {{ $peminjaman->infokus->nama_infokus }}

                </strong>

            </div>

            <div class="info-box">

                <span>Kode Infokus</span>

                <strong>

                    {{ $peminjaman->infokus->kode_infokus }}

                </strong>

            </div>

            <div class="info-box">

                <span>Status Perangkat</span>

                <strong>

                    @if($peminjaman->status == 'dipinjam')

                        Sedang Digunakan

                    @else

                        Sudah Dikembalikan

                    @endif

                </strong>

            </div>

        </div>

    </div>

    <div class="section-block mb-0">

        <h5 class="section-heading">

            <i class="bi bi-calendar-event me-2"></i>

            Waktu Peminjaman

        </h5>

        <div class="detail-grid">

            <div class="info-box">

                <span>Tanggal Pinjam</span>

                <strong>

                    {{ $peminjaman->tanggal_pinjam }}

                </strong>

            </div>

            <div class="info-box">

                <span>Jam Pinjam</span>

                <strong>

                    {{ \Carbon\Carbon::parse($peminjaman->jam_pinjam)->format('H:i') }}
                    WITA

                </strong>

            </div>

            <div class="info-box">

                <span>Tanggal Kembali</span>

                <strong>

                    @if($peminjaman->tanggal_kembali)

                        {{ $peminjaman->tanggal_kembali }}

                    @else

                        Belum Dikembalikan

                    @endif

                </strong>

            </div>

        </div>

    </div>

</div>

<style>

.detail-card{
background:white;
padding:34px;
border-radius:28px;
border:1px solid #e2e8f0;
box-shadow:0 15px 40px rgba(15,23,42,.06);
}

.detail-header{
display:flex;
align-items:center;
gap:20px;
padding-bottom:28px;
margin-bottom:28px;
border-bottom:1px solid #e2e8f0;
}

.detail-avatar{
width:78px;
height:78px;
border-radius:24px;
background:linear-gradient(135deg,#2563eb,#60a5fa);
color:white;
display:flex;
align-items:center;
justify-content:center;
font-size:34px;
}

.section-block{
margin-bottom:28px;
}

.section-heading{
margin-bottom:16px;
font-weight:800;
}

.detail-grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(230px,1fr));
gap:16px;
}

.info-box{
padding:20px;
border-radius:18px;
background:#f8fafc;
border:1px solid #e2e8f0;
}

.info-box span{
display:block;
font-size:13px;
font-weight:700;
color:#64748b;
margin-bottom:8px;
}

.info-box strong{
font-size:16px;
color:#0f172a;
}

.status-badge{
padding:10px 16px;
border-radius:999px;
font-weight:700;
display:inline-flex;
align-items:center;
}

.status-borrowed{
background:#fef3c7;
color:#b45309;
}

.status-returned{
background:#dcfce7;
color:#15803d;
}

@media(max-width:768px){

.detail-card{
padding:22px;
}

.detail-header{
flex-direction:column;
align-items:flex-start;
}

}

</style>

</x-default-layout>