<x-default-layout>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

    <div>

        <h1 class="page-title mb-1">
            Tambah Infokus
        </h1>

        <p class="page-subtitle mb-0">
            Tambahkan perangkat infokus baru ke sistem INFOLEND.
        </p>

    </div>

    <a href="/infokus"
       class="btn btn-outline-secondary">

        <i class="bi bi-arrow-left me-1"></i>
        Kembali

    </a>

</div>

<div class="create-card">

<form action="/infokus"
      method="POST">

@csrf

<div class="row g-4">

<div class="col-md-6">

<label class="form-label">

    Nama Infokus

</label>

<div class="input-group-modern">

<span>

<i class="bi bi-display"></i>

</span>

<input
type="text"
name="nama_infokus"
class="form-control"
placeholder="Contoh: Epson Projector X500"
value="{{ old('nama_infokus') }}"
required>

</div>

@error('nama_infokus')

<small class="text-danger">

{{ $message }}

</small>

@enderror

</div>

<div class="col-md-6">

<label class="form-label">

Kode Infokus

</label>

<div class="input-group-modern">

<span>

<i class="bi bi-upc-scan"></i>

</span>

<input
type="text"
name="kode_infokus"
class="form-control"
placeholder="Contoh: IFK-001"
value="{{ old('kode_infokus') }}"
required>

</div>

@error('kode_infokus')

<small class="text-danger">

{{ $message }}

</small>

@enderror

</div>

<div class="col-12">

<label class="form-label">

Lokasi

</label>

<div class="input-group-modern">

<span>

<i class="bi bi-geo-alt"></i>

</span>

<input
type="text"
name="lokasi"
class="form-control"
placeholder="Contoh: Ruang Multimedia Lt.2"
value="{{ old('lokasi') }}"
required>

</div>

@error('lokasi')

<small class="text-danger">

{{ $message }}

</small>

@enderror

</div>

</div>

<div class="action-area">

<a href="/infokus"
class="btn btn-light">

Batal

</a>

<button
type="submit"
class="btn btn-primary">

<i class="bi bi-floppy me-1"></i>

Simpan Data

</button>

</div>

</form>

</div>

<style>

.create-card{

background:white;

padding:32px;

border-radius:24px;

border:1px solid #e2e8f0;

box-shadow:
0 14px 40px rgba(15,23,42,.06);

}

.input-group-modern{

display:flex;

align-items:center;

border:1px solid #dbe3ee;

border-radius:16px;

overflow:hidden;

transition:.25s;

background:white;

}

.input-group-modern:focus-within{

border-color:#2563eb;

box-shadow:
0 0 0 4px rgba(37,99,235,.12);

}

.input-group-modern span{

width:56px;

display:flex;

align-items:center;

justify-content:center;

color:#2563eb;

background:#eff6ff;

font-size:18px;

}

.input-group-modern .form-control{

border:none;

box-shadow:none;

padding:14px 16px;

background:transparent;

}

.input-group-modern .form-control:focus{

box-shadow:none;

}

.action-area{

margin-top:32px;

display:flex;

justify-content:flex-end;

gap:12px;

}

.btn-light{

background:#f1f5f9;

border:none;

}

.btn-light:hover{

background:#e2e8f0;

}

@media(max-width:768px){

.create-card{

padding:22px;

}

.action-area{

flex-direction:column;

}

.action-area .btn{

width:100%;

}

}

</style>

</x-default-layout>