<x-default-layout> r

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

    <div>

        <h1 class="page-title mb-1">
            Data Infokus
        </h1>

        <p class="page-subtitle mb-0">
            Kelola daftar perangkat infokus, lokasi, kode, dan status peminjaman.
        </p>

    </div>

    @if(auth()->user()->role == 'admin')

        <a href="/infokus/create" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah Infokus
        </a>

    @endif

</div>

@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">

        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

    </div>

@endif

<div class="infokus-toolbar mb-4">

    <div class="toolbar-search">

        <i class="bi bi-search"></i>

        <input type="text"
               id="searchInfokus"
               class="form-control"
               placeholder="Cari nama, kode, lokasi, atau status...">

    </div>

    <div class="toolbar-info">

        <i class="bi bi-display me-1"></i>
        Total Data:
        <strong>{{ count($infokus) }}</strong>

    </div>

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

                            <span class="status-badge status-ready">

                                <i class="bi bi-check-circle me-1"></i>
                                Tersedia

                            </span>

                        @else

                            <span class="status-badge status-borrowed">

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

.infokus-toolbar {
    display: flex;
    justify-content: space-between;
    gap: 16px;
    align-items: center;
}

.toolbar-search {
    position: relative;
    flex: 1;
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
}

.toolbar-info {
    background: #eff6ff;
    color: #2563eb;
    border: 1px solid #bfdbfe;
    border-radius: 14px;
    padding: 11px 16px;
    font-weight: 700;
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

@media(max-width:768px) {
    .infokus-toolbar {
        flex-direction: column;
        align-items: stretch;
    }

    .toolbar-info {
        text-align: center;
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
    const rows = document.querySelectorAll('#infokusTable tbody tr');

    searchInput.addEventListener('keyup', function () {

        const keyword = this.value.toLowerCase();

        rows.forEach(function (row) {

            const text = row.innerText.toLowerCase();

            row.style.display = text.includes(keyword) ? '' : 'none';

        });

    });

});

</script>

</x-default-layout>
