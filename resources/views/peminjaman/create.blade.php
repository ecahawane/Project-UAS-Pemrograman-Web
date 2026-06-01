<x-default-layout>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

    <div>
        <h1 class="page-title mb-1">Tambah Peminjaman</h1>
        <p class="page-subtitle mb-0">
            Pilih infokus dan isi data peminjaman.
        </p>
    </div>

    <a href="/peminjaman" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>
        Kembali
    </a>

</div>

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mb-4">

        {{ session('error') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"></button>

    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger mb-4">

        <ul class="mb-0">

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>
@endif

<div class="borrow-card">

    <form action="/peminjaman" method="POST">

        @csrf

        <div class="row g-4">
            <!-- DATA PERANGKAT -->
            <div class="col-12">

                <div class="section-header">

                    <i class="bi bi-display"></i>

                    <div>
                        <h5>Data Perangkat</h5>
                        <p>Pilih infokus dan ruangan penggunaan.</p>
                    </div>

                </div>

            </div>
            <!-- INFOCUS -->
            <div class="col-md-6">

                <label class="form-label">
                    Pilih Infokus
                </label>

                <div class="input-modern">

                    <span>
                        <i class="bi bi-display"></i>
                    </span>

                    <select name="infokus_id"
                            class="form-select"
                            required>

                        <option value="">
                            -- Pilih Infokus --
                        </option>

                        @foreach($infokus as $item)

                            @if($item->status == 'tersedia')

                                <option value="{{ $item->id }}">

                                    {{ $item->kode_infokus }}
                                    -
                                    {{ $item->nama_infokus }}

                                </option>

                            @endif

                        @endforeach

                    </select>

                </div>

            </div>

            <!-- RUANGAN -->
            <div class="col-md-6">

                <label class="form-label">
                    Ruangan
                </label>

                <div class="input-modern">

                    <span>
                        <i class="bi bi-building"></i>
                    </span>

                    <select name="ruangan"
                            class="form-select"
                            required>

                        <option value="">
                            -- Pilih Ruangan --
                        </option>

                        @php

                            $ruanganList = [
                                'FF01',
                                'FF02',
                                'FF03',
                                'FF04',
                                'FF05',
                                'FF06',
                                'FF07',
                                'FF08',
                                'FF09',
                                'FF10',
                                'FF11',
                                'FF12'
                            ];

                        @endphp

                        @foreach($ruanganList as $ruangan)

                            @if(!in_array($ruangan, $ruanganTerpakai))

                                <option value="{{ $ruangan }}">

                                    {{ $ruangan }}

                                </option>

                            @endif

                        @endforeach

                    </select>

                </div>

            </div>
            <div class="col-12">

                <div class="section-header">

                    <i class="bi bi-mortarboard"></i>

                    <div>
                        <h5>Informasi Akademik</h5>
                        <p>Lengkapi data dosen dan mata kuliah.</p>
                    </div>

                </div>

            </div>

            <!-- DOSEN -->
            <div class="col-md-6">

                <label class="form-label">
                    Nama Dosen
                </label>

                <div class="input-modern">

                    <span>
                        <i class="bi bi-person"></i>
                    </span>

                    <input type="text"
                           name="nama_dosen"
                           class="form-control"
                           placeholder="Masukkan nama dosen"
                           required>

                </div>

            </div>

            <!-- MATA KULIAH -->
            <div class="col-md-6">

                <label class="form-label">
                    Mata Kuliah
                </label>

                <div class="input-modern">

                    <span>
                        <i class="bi bi-book"></i>
                    </span>

                    <input type="text"
                           name="mata_kuliah"
                           class="form-control"
                           placeholder="Masukkan mata kuliah"
                           required>

                </div>

            </div>
            <div class="col-12">

                <div class="section-header">

                    <i class="bi bi-calendar-check"></i>

                    <div>
                        <h5>Jadwal Peminjaman</h5>
                        <p>Tentukan tanggal pengembalian infokus.</p>
                    </div>

                </div>

            </div>

            <!-- TANGGAL KEMBALI -->
            <div class="col-md-6">

                <label class="form-label">
                    Tanggal Kembali
                </label>

                <div class="input-modern">

                    <span>
                        <i class="bi bi-calendar-check"></i>
                    </span>

                    <input type="date"
                           name="tanggal_kembali"
                           class="form-control"
                           required>

                </div>

            </div>

        </div>

        <div class="note-box mt-4">

            <i class="bi bi-info-circle"></i>

            <span>
                Pastikan data dosen, mata kuliah, dan ruangan telah diisi dengan benar sebelum menyimpan peminjaman.
            </span>

        </div>

        <div class="action-area">

            <a href="/peminjaman"
               class="btn btn-light">

                Batal

            </a>

            <button type="submit"
                    class="btn btn-primary">

                <i class="bi bi-floppy me-1"></i>

                Simpan Peminjaman

            </button>

        </div>

    </form>

</div>

<style>

.borrow-card{
    background:white;
    padding:32px;
    border-radius:26px;
    border:1px solid #e2e8f0;
    box-shadow:0 14px 40px rgba(15,23,42,.06);
}

.input-modern{
    display:flex;
    border:1px solid #dbe3ee;
    border-radius:16px;
    overflow:hidden;
    background:white;
    transition:.25s;
}

.input-modern:focus-within{
    border-color:#2563eb;
    box-shadow:0 0 0 4px rgba(37,99,235,.12);
}

.input-modern span{
    width:56px;
    background:#eff6ff;
    color:#2563eb;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
}

.input-modern .form-select,
.input-modern .form-control{
    border:none;
    box-shadow:none;
    padding:14px;
}

.note-box{
    display:flex;
    align-items:center;
    gap:12px;
    background:#eff6ff;
    color:#1e40af;
    border:1px solid #bfdbfe;
    padding:16px;
    border-radius:18px;
    font-weight:600;
}

.action-area{
    margin-top:30px;
    display:flex;
    justify-content:flex-end;
    gap:12px;
}

.btn-light{
    background:#f1f5f9;
    border:none;
}

.section-header{
    display:flex;
    align-items:center;
    gap:14px;
    margin-top:10px;
    margin-bottom:8px;
}

.section-header i{
    width:48px;
    height:48px;
    border-radius:14px;
    background:#EBEBEB;
    color:#10367D;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:20px;
}

.section-header h5{
    margin:0;
    font-weight:700;
    color:#10367D;
}

.section-header p{
    margin:0;
    color:#64748b;
    font-size:14px;
}
@media(max-width:768px){

    .borrow-card{
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