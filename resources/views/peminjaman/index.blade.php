<x-default-layout>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

    <div>

        <h1 class="page-title mb-1">
            Data Peminjaman
        </h1>

        <p class="page-subtitle mb-0">
            Pantau riwayat peminjaman infokus, status pengembalian, dan detail pengguna.
        </p>

    </div>

    <a href="/peminjaman/create" class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i>
        Tambah Peminjaman
    </a>

</div>

@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">

        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

    </div>

@endif

@if(session('error'))

    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">

        <i class="bi bi-exclamation-circle me-2"></i>
        {{ session('error') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

    </div>

@endif

<div class="peminjaman-toolbar mb-4">

    <div class="toolbar-search">

        <i class="bi bi-search"></i>

        <input type="text"
               id="searchPeminjaman"
               class="form-control"
               placeholder="Cari user, infokus, tanggal, atau status...">

    </div>

    <div class="toolbar-info">

        <i class="bi bi-journal-check me-1"></i>
        Total Data:
        <strong>{{ count($peminjaman) }}</strong>

    </div>

</div>

<div class="table-responsive peminjaman-table-wrapper">

    <table class="table align-middle mb-0" id="peminjamanTable">

        <thead>

            <tr>

                <th>No</th>
                <th>User</th>
                <th>Infokus</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>

            </tr>

        </thead>

        <tbody>

            @forelse($peminjaman as $item)

                <tr>

                    <td>
                        <span class="number-badge">
                            {{ $loop->iteration }}
                        </span>
                    </td>

                    <td>

                        <div class="user-info">

                            <div class="user-avatar">

                                {{ strtoupper(substr($item->user->name, 0, 1)) }}

                            </div>

                            <div>

                                <strong>
                                    {{ $item->user->name }}
                                </strong>

                                <small>
                                    Peminjam
                                </small>

                            </div>

                        </div>

                    </td>

                    <td>

                        <div class="device-info">

                            <div class="device-icon">

                                <i class="bi bi-display"></i>

                            </div>

                            <div>

                                <strong>
                                    {{ $item->infokus->nama_infokus }}
                                </strong>

                                <small>
                                    Perangkat Infokus
                                </small>

                            </div>

                        </div>

                    </td>

                    <td>

                        <span class="date-badge">

                            <i class="bi bi-calendar-event me-1"></i>
                            {{ $item->tanggal_pinjam }}

                        </span>

                    </td>

                    <td>

                        @if($item->tanggal_kembali)

                            <span class="date-badge returned">

                                <i class="bi bi-calendar-check me-1"></i>
                                {{ $item->tanggal_kembali }}

                            </span>

                        @else

                            <span class="date-empty">

                                Belum kembali

                            </span>

                        @endif

                    </td>

                    <td>

                        @if($item->status == 'dipinjam')

                            <span class="status-badge status-borrowed">

                                <i class="bi bi-clock-history me-1"></i>
                                Dipinjam

                            </span>

                        @elseif($item->status == 'dikembalikan')

                            <span class="status-badge status-returned">

                                <i class="bi bi-check-circle me-1"></i>
                                Dikembalikan

                            </span>

                        @endif

                    </td>

                    <td>

                        <div class="d-flex justify-content-end gap-2 flex-wrap">

                            <a href="/peminjaman/{{ $item->id }}"
                               class="btn-action btn-detail">

                                <i class="bi bi-eye"></i>
                                Detail

                            </a>

                            @if(auth()->user()->role == 'admin')

                                <a href="/peminjaman/{{ $item->id }}/edit"
                                   class="btn-action btn-edit">

                                    <i class="bi bi-pencil-square"></i>
                                    Edit

                                </a>

                                <form action="/peminjaman/{{ $item->id }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn-action btn-delete"
                                            onclick="return confirm('Yakin ingin menghapus data peminjaman ini?')">

                                        <i class="bi bi-trash"></i>
                                        Hapus

                                    </button>

                                </form>

                            @else

                                @if($item->status == 'dikembalikan')

                                    <form action="/peminjaman/{{ $item->id }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn-action btn-delete"
                                                onclick="return confirm('Yakin ingin menghapus riwayat peminjaman ini?')">

                                            <i class="bi bi-trash"></i>
                                            Hapus

                                        </button>

                                    </form>

                                @endif

                            @endif

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7">

                        <div class="empty-state">

                            <div class="empty-icon">

                                <i class="bi bi-journal-x"></i>

                            </div>

                            <h5>
                                Data Peminjaman Kosong
                            </h5>

                            <p>
                                Belum ada data peminjaman infokus yang tercatat.
                            </p>

                            <a href="/peminjaman/create" class="btn btn-primary">

                                <i class="bi bi-plus-circle me-1"></i>
                                Tambah Peminjaman

                            </a>

                        </div>

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

<style>

.peminjaman-toolbar {
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

.peminjaman-table-wrapper {
    border-radius: 20px;
    border: 1px solid #e2e8f0;
    overflow: hidden;
    box-shadow: 0 14px 35px rgba(15, 23, 42, .06);
}

#peminjamanTable thead th {
    background: #f8fafc;
    padding: 16px;
    color: #475569;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: .04em;
    border-bottom: 1px solid #e2e8f0;
}

#peminjamanTable tbody td {
    padding: 18px 16px;
    border-bottom: 1px solid #f1f5f9;
}

#peminjamanTable tbody tr {
    transition: .25s;
}

#peminjamanTable tbody tr:hover {
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

.user-info,
.device-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.user-avatar {
    width: 44px;
    height: 44px;
    border-radius: 14px;
    background: linear-gradient(135deg, #2563eb, #60a5fa);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 900;
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

.user-info small,
.device-info small {
    display: block;
    color: #64748b;
    margin-top: 2px;
}

.date-badge {
    background: #f1f5f9;
    color: #334155;
    padding: 8px 12px;
    border-radius: 999px;
    font-weight: 800;
    font-size: 13px;
    display: inline-flex;
    align-items: center;
}

.date-badge.returned {
    background: #dcfce7;
    color: #15803d;
}

.date-empty {
    background: #fee2e2;
    color: #b91c1c;
    padding: 8px 12px;
    border-radius: 999px;
    font-weight: 800;
    font-size: 13px;
}

.status-badge {
    display: inline-flex;
    align-items: center;
    padding: 8px 12px;
    border-radius: 999px;
    font-weight: 800;
    font-size: 13px;
}

.status-borrowed {
    background: #fef3c7;
    color: #b45309;
}

.status-returned {
    background: #dcfce7;
    color: #15803d;
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
    .peminjaman-toolbar {
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

    const searchInput = document.getElementById('searchPeminjaman');
    const rows = document.querySelectorAll('#peminjamanTable tbody tr');

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