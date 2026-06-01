<x-default-layout>

<!-- Back Button -->
<div class="mb-4">
    <a href="/infokus" class="btn-back">
        <i class="bi bi-chevron-left"></i>
        Kembali
    </a>
</div>

<!-- Create Container -->
<div class="create-container">
    <!-- Header Section with Background -->
    <div class="create-header">
        <div class="header-background" style="background-image: url('/images/equipment-management-bg.png')"></div>
        
        <div class="header-content">
            <div class="header-icon">
                <i class="bi bi-plus-circle"></i>
            </div>
            <div class="header-text">
                <h1 class="header-title">Tambah Infokus</h1>
                <p class="header-subtitle">Tambahkan perangkat infokus baru ke sistem INFOLEND dengan informasi lengkap dan akurat.</p>
                <div class="header-underline"></div>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <form action="/infokus" method="POST" class="create-form">
        @csrf

        <!-- Form Fields Grid -->
        <div class="form-grid">
            <!-- Nama Infokus -->
            <div class="form-group">
                <label class="form-label-custom">
                    <span class="label-dot"></span>
                    Nama Infokus
                </label>
                <div class="input-wrapper">
                    <span class="input-icon">
                        <i class="bi bi-display"></i>
                    </span>
                    <input
                        type="text"
                        name="nama_infokus"
                        class="form-input-custom"
                        placeholder="Contoh: Canon Pro, Sony Projector"
                        value="{{ old('nama_infokus') }}"
                        required>
                </div>
                @error('nama_infokus')
                    <small class="form-error">{{ $message }}</small>
                @enderror
            </div>

            <!-- Kode Infokus -->
            <div class="form-group">
                <label class="form-label-custom">
                    <span class="label-dot"></span>
                    Kode Infokus
                </label>
                <div class="input-wrapper">
                    <span class="input-icon">
                        <i class="bi bi-hash"></i>
                    </span>
                    <input
                        type="text"
                        name="kode_infokus"
                        class="form-input-custom"
                        placeholder="Contoh: IFK-001, IFO14"
                        value="{{ old('kode_infokus') }}"
                        required>
                </div>
                @error('kode_infokus')
                    <small class="form-error">{{ $message }}</small>
                @enderror
            </div>

            <!-- Lokasi -->
            <div class="form-group">
                <label class="form-label-custom">
                    <span class="label-dot"></span>
                    Lokasi
                </label>
                <div class="input-wrapper">
                    <span class="input-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </span>
                    <input
                        type="text"
                        name="lokasi"
                        class="form-input-custom"
                        placeholder="Contoh: Ruang Peminjaman, Lab Multimedia"
                        value="{{ old('lokasi') }}"
                        required>
                </div>
                @error('lokasi')
                    <small class="form-error">{{ $message }}</small>
                @enderror
            </div>

            <!-- Status -->
            <div class="form-group">
                <label class="form-label-custom">
                    <span class="label-dot"></span>
                    Status
                </label>
                <div class="input-wrapper">
                    <span class="input-icon">
                        <i class="bi bi-check-circle-fill"></i>
                    </span>
                    <select name="status" class="form-input-custom form-select-custom" required>
                        <option value="">Pilih Status</option>
                        <option value="tersedia" {{ old('status') == 'tersedia' ? 'selected' : '' }}>
                            Tersedia
                        </option>
                        <option value="dipinjam" {{ old('status') == 'dipinjam' ? 'selected' : '' }}>
                            Dipinjam
                        </option>
                    </select>
                </div>
                @error('status')
                    <small class="form-error">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <!-- Tips Info Box -->
        <div class="tips-box">
            <div class="tips-icon">
                <i class="bi bi-lightbulb-fill"></i>
            </div>
            <div class="tips-content">
                <h4 class="tips-title">Tips Penambahan Data</h4>
                <p class="tips-text">Pastikan kode infokus unik, nama perangkat jelas, dan lokasi tempat perangkat disimpan terdata dengan baik untuk kemudahan pengelolaan.</p>
            </div>
            <div class="tips-icon-right">
                <i class="bi bi-star"></i>
            </div>
        </div>

        <!-- Info Section -->
        <div class="info-section">
            <div class="info-item">
                <div class="info-icon">
                    <i class="bi bi-info-circle"></i>
                </div>
                <div class="info-content">
                    <span class="info-label">Informasi Penting</span>
                    <p class="info-text">Setiap perangkat akan secara otomatis mendapatkan nomor unik dan dapat dikelola melalui sistem manajemen peminjaman.</p>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="/infokus" class="btn btn-cancel">
                <i class="bi bi-x-circle"></i>
                Batal
            </a>
            <button type="submit" class="btn btn-submit">
                <i class="bi bi-plus-circle"></i>
                Simpan Data
            </button>
        </div>
    </form>
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

.create-container {
    background: #f8fafc;
    border-radius: 20px;
    overflow: hidden;
    padding: 30px;
}

.create-header {
    position: relative;
    margin: -30px -30px 40px -30px;
    height: 300px;
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
    opacity: 0.12;
    z-index: 0;
}

.header-content {
    position: relative;
    z-index: 1;
    display: flex;
    gap: 30px;
    align-items: flex-start;
    padding: 40px;
    width: 100%;
}

.header-icon {
    width: 100px;
    height: 100px;
    border-radius: 24px;
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 50px;
    color: white;
    flex-shrink: 0;
    box-shadow: 0 12px 32px rgba(37, 99, 235, 0.3);
}

.header-text {
    flex: 1;
}

.header-title {
    font-size: 40px;
    font-weight: 900;
    color: #0f172a;
    margin-bottom: 12px;
    line-height: 1.2;
}

.header-subtitle {
    font-size: 16px;
    color: #475569;
    margin-bottom: 16px;
    line-height: 1.6;
}

.header-underline {
    width: 60px;
    height: 4px;
    background: linear-gradient(90deg, #2563eb, #0ea5e9);
    border-radius: 999px;
}

/* Form Styles */
.create-form {
    background: white;
    border-radius: 16px;
    padding: 30px;
    border: 1px solid #e2e8f0;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 24px;
    margin-bottom: 30px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-label-custom {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
    color: #0f172a;
    margin-bottom: 12px;
    font-size: 14px;
}

.label-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #2563eb;
}

.input-wrapper {
    display: flex;
    align-items: center;
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease;
    background: white;
}

.input-wrapper:focus-within {
    border-color: #2563eb;
    box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
}

.input-icon {
    width: 48px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #2563eb;
    background: #eff6ff;
    font-size: 18px;
    flex-shrink: 0;
}

.form-input-custom {
    flex: 1;
    border: none;
    background: transparent;
    padding: 12px 16px;
    font-size: 14px;
    color: #0f172a;
    outline: none;
}

.form-input-custom::placeholder {
    color: #cbd5e1;
}

.form-select-custom {
    cursor: pointer;
}

.form-error {
    color: #dc2626;
    font-size: 12px;
    margin-top: 6px;
    display: block;
}

/* Tips Box */
.tips-box {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 24px;
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    border: 2px solid #fcd34d;
    border-radius: 16px;
    margin-bottom: 24px;
    position: relative;
}

.tips-icon {
    width: 56px;
    height: 56px;
    border-radius: 14px;
    background: linear-gradient(135deg, #f59e0b, #f97316);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: white;
    flex-shrink: 0;
}

.tips-content {
    flex: 1;
}

.tips-title {
    font-size: 14px;
    font-weight: 700;
    color: #92400e;
    margin: 0 0 4px 0;
}

.tips-text {
    font-size: 13px;
    color: #78350f;
    margin: 0;
}

.tips-icon-right {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 40px;
    color: #f59e0b;
    opacity: 0.15;
}

/* Info Section */
.info-section {
    padding: 20px;
    background: #f0fdf4;
    border: 2px solid #86efac;
    border-radius: 12px;
    margin-bottom: 30px;
}

.info-item {
    display: flex;
    gap: 12px;
}

.info-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    background: linear-gradient(135deg, #10b981, #059669);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    color: white;
    flex-shrink: 0;
}

.info-content {
    flex: 1;
}

.info-label {
    display: block;
    font-size: 12px;
    color: #047857;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 4px;
}

.info-text {
    font-size: 13px;
    color: #065f46;
    margin: 0;
    line-height: 1.5;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    justify-content: flex-end;
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
    font-size: 14px;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-cancel {
    background: #f1f5f9;
    color: #475569;
}

.btn-cancel:hover {
    background: #e2e8f0;
    transform: translateY(-2px);
}

.btn-submit {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    color: white;
}

.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(37, 99, 235, 0.4);
}

@media(max-width:768px) {
    .create-container {
        padding: 20px;
    }

    .create-header {
        height: 240px;
        margin: -20px -20px 30px -20px;
    }

    .header-icon {
        width: 80px;
        height: 80px;
        font-size: 40px;
    }

    .header-title {
        font-size: 28px;
    }

    .header-subtitle {
        font-size: 14px;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }

    .action-buttons {
        justify-content: stretch;
    }

    .btn {
        flex: 1;
        justify-content: center;
    }
}
</style>

</x-default-layout>
