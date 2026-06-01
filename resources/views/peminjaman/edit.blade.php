<x-default-layout>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

    <div>

        <h1 class="page-title mb-1">
            Edit Peminjaman
        </h1>

        <p class="page-subtitle mb-0">
            Perbarui informasi peminjaman infokus dan status pengembaliannya.
        </p>

    </div>

    <a href="/peminjaman"
       class="btn btn-outline-secondary">

        <i class="bi bi-arrow-left me-1"></i>
        Kembali

    </a>

</div>

@if($errors->any())

<div class="alert alert-danger">

    <strong>

        <i class="bi bi-exclamation-triangle me-1"></i>

        Terjadi Kesalahan

    </strong>

    <ul class="mb-0 mt-2">

        @foreach($errors->all() as $error)

        <li>

            {{ $error }}

        </li>

        @endforeach

    </ul>

</div>

@endif

<div class="edit-card">

<form action="/peminjaman/{{ $peminjaman->id }}"
      method="POST">

@csrf
@method('PUT')

<div class="form-section">

<div class="section-title">

<div class="section-icon">

<i class="bi bi-display"></i>

</div>

<div>

<h5 class="mb-1">

Data Infokus

</h5>

<p class="mb-0">

Perbarui perangkat infokus yang digunakan.

</p>

</div>

</div>

<label class="form-label">

Pilih Infokus

</label>

<div class="input-group-modern">

<span>

<i class="bi bi-projector"></i>

</span>

<select
name="infokus_id"
class="form-select"
required>

@foreach($infokus as $item)

<option
value="{{ $item->id }}"
{{ $item->id == old('infokus_id',$peminjaman->infokus_id) ? 'selected' : '' }}>

{{ $item->kode_infokus }}

-

{{ $item->nama_infokus }}

</option>

@endforeach

</select>

</div>

</div>

<div class="form-section">

<div class="section-title">

<div class="section-icon">

<i class="bi bi-calendar2-week"></i>

</div>

<div>

<h5 class="mb-1">

Jadwal Peminjaman

</h5>

<p class="mb-0">

Atur waktu pinjam dan pengembalian.

</p>

</div>

</div>

<div class="row g-4">

<div class="col-md-6">

<label class="form-label">

Tanggal Pinjam

</label>

<div class="input-group-modern">

<span>

<i class="bi bi-calendar-event"></i>

</span>

<input
type="date"
name="tanggal_pinjam"
class="form-control"
value="{{ old('tanggal_pinjam',$peminjaman->tanggal_pinjam) }}"
required>

</div>

</div>

<div class="col-md-6">

<label class="form-label">

Tanggal Kembali

</label>

<div class="input-group-modern">

<span>

<i class="bi bi-calendar-check"></i>

</span>

<input
type="date"
name="tanggal_kembali"
class="form-control"
value="{{ old('tanggal_kembali',$peminjaman->tanggal_kembali) }}">

</div>

</div>

</div>

</div>

<div class="form-section">

    <div class="section-title">

        <div class="section-icon">

            <i class="bi bi-info-circle"></i>

        </div>

        <div>

            <h5 class="mb-1">
                Status Saat Ini
            </h5>

            <p class="mb-0">
                Status pengembalian dilakukan melalui tombol Kembalikan pada halaman daftar peminjaman.
            </p>

        </div>

    </div>

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

<div class="status-info">

<div class="status-icon">

<i class="bi bi-lightbulb"></i>

</div>

<div>

<strong>

Tips Pengelolaan

</strong>

<p class="mb-0">

Pengembalian perangkat dilakukan melalui tombol
<b>Kembalikan</b> pada halaman daftar peminjaman.

Gunakan halaman ini untuk memperbaiki data peminjaman apabila terjadi kesalahan input.

</p>

</div>

</div>

<div class="action-area">

<a href="/peminjaman"
class="btn btn-light">

Batal

</a>

<button
type="submit"
class="btn btn-primary">

<i class="bi bi-save me-1"></i>

Update Data

</button>

</div>

</form>

</div>

<style>

.edit-card{

background:white;

padding:32px;

border-radius:28px;

border:1px solid #e2e8f0;

box-shadow:
0 14px 35px rgba(15,23,42,.06);

}

.form-section{

background:#f8fafc;

padding:24px;

border-radius:22px;

border:1px solid #e2e8f0;

margin-bottom:24px;

}

.section-title{

display:flex;

gap:14px;

align-items:center;

margin-bottom:22px;

}

.section-icon{

width:48px;

height:48px;

border-radius:16px;

background:#eff6ff;

display:flex;

align-items:center;

justify-content:center;

color:#2563eb;

font-size:22px;

}

.input-group-modern{

display:flex;

border:1px solid #dbe3ee;

border-radius:16px;

overflow:hidden;

background:white;

transition:.25s;

}

.input-group-modern:focus-within{

border-color:#2563eb;

box-shadow:
0 0 0 4px rgba(37,99,235,.12);

}

.input-group-modern span{

width:56px;

background:#eff6ff;

display:flex;

align-items:center;

justify-content:center;

color:#2563eb;

font-size:18px;

}

.input-group-modern input,
.input-group-modern select{

border:none;

box-shadow:none;

padding:14px;

}

.input-group-modern input:focus,
.input-group-modern select:focus{

box-shadow:none;

}

.status-info{

display:flex;

gap:14px;

background:#eff6ff;

border:1px solid #bfdbfe;

padding:18px;

border-radius:18px;

margin-top:10px;

}

.status-icon{

width:44px;

height:44px;

border-radius:14px;

background:#2563eb;

display:flex;

align-items:center;

justify-content:center;

color:white;

flex-shrink:0;

}

.action-area{

margin-top:28px;

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

.edit-card{

padding:22px;

}

.form-section{

padding:18px;

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