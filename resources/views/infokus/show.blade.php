<x-default-layout>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

    <div>

        <h1 class="page-title mb-1">
            Detail Infokus
        </h1>

        <p class="page-subtitle mb-0">
            Informasi lengkap perangkat infokus yang terdaftar pada sistem.
        </p>

    </div>

    <a href="/infokus"
       class="btn btn-outline-secondary">

        <i class="bi bi-arrow-left me-1"></i>
        Kembali

    </a>

</div>

<div class="detail-card">

<div class="detail-header">

<div class="device-avatar">

<i class="bi bi-display"></i>

</div>

<div>

<h3 class="mb-1">

{{ $infokus->nama_infokus }}

</h3>

<p class="mb-0 text-muted">

Kode:
<strong>

{{ $infokus->kode_infokus }}

</strong>

</p>

</div>

</div>

<div class="detail-grid">

<div class="info-box">

<div class="info-label">

<i class="bi bi-display me-2"></i>

Nama Infokus

</div>

<div class="info-value">

{{ $infokus->nama_infokus }}

</div>

</div>

<div class="info-box">

<div class="info-label">

<i class="bi bi-upc-scan me-2"></i>

Kode Perangkat

</div>

<div class="info-value">

{{ $infokus->kode_infokus }}

</div>

</div>

<div class="info-box">

<div class="info-label">

<i class="bi bi-geo-alt me-2"></i>

Lokasi

</div>

<div class="info-value">

{{ $infokus->lokasi }}

</div>

</div>

<div class="info-box">

<div class="info-label">

<i class="bi bi-check2-circle me-2"></i>

Status

</div>

<div class="info-value">

@if($infokus->status=='tersedia')

<span class="status-badge status-ready">

<i class="bi bi-check-circle-fill me-1"></i>

Tersedia

</span>

@else

<span class="status-badge status-borrowed">

<i class="bi bi-x-circle-fill me-1"></i>

Dipinjam

</span>

@endif

</div>

</div>

</div>

@if(auth()->user()->role=='admin')

<div class="action-area">

<a href="/infokus/{{ $infokus->id }}/edit"
class="btn btn-warning">

<i class="bi bi-pencil-square me-1"></i>

Edit Data

</a>

<form
action="/infokus/{{ $infokus->id }}"
method="POST">

@csrf
@method('DELETE')

<button
class="btn btn-danger"
onclick="return confirm('Yakin ingin menghapus data infokus ini?')">

<i class="bi bi-trash me-1"></i>

Hapus

</button>

</form>

</div>

@endif

</div>

<style>

.detail-card{

background:white;

padding:34px;

border-radius:28px;

border:1px solid #e2e8f0;

box-shadow:
0 15px 40px rgba(15,23,42,.06);

}

.detail-header{

display:flex;

align-items:center;

gap:20px;

padding-bottom:28px;

border-bottom:1px solid #e2e8f0;

margin-bottom:28px;

}

.device-avatar{

width:78px;

height:78px;

border-radius:24px;

background:
linear-gradient(
135deg,
#2563eb,
#60a5fa
);

display:flex;

align-items:center;

justify-content:center;

font-size:34px;

color:white;

box-shadow:
0 10px 30px rgba(37,99,235,.25);

}

.detail-grid{

display:grid;

grid-template-columns:
repeat(
auto-fit,
minmax(250px,1fr)
);

gap:18px;

}

.info-box{

padding:22px;

border-radius:18px;

background:#f8fafc;

border:1px solid #e2e8f0;

transition:.25s;

}

.info-box:hover{

transform:translateY(-3px);

box-shadow:
0 10px 25px rgba(0,0,0,.05);

}

.info-label{

font-size:.85rem;

font-weight:700;

color:#64748b;

margin-bottom:12px;

}

.info-value{

font-size:1.05rem;

font-weight:700;

color:#0f172a;

}

.status-badge{

padding:8px 16px;

border-radius:999px;

font-size:.85rem;

font-weight:700;

display:inline-flex;

align-items:center;

}

.status-ready{

background:#dcfce7;

color:#15803d;

}

.status-borrowed{

background:#fee2e2;

color:#b91c1c;

}

.action-area{

display:flex;

gap:12px;

margin-top:32px;

padding-top:28px;

border-top:1px solid #e2e8f0;

}

@media(max-width:768px){

.detail-card{

padding:22px;

}

.detail-header{

flex-direction:column;

align-items:flex-start;

}

.action-area{

flex-direction:column;

}

.action-area .btn{

width:100%;

}

.action-area form{

width:100%;

}

.action-area button{

width:100%;

}

}

</style>

</x-default-layout>