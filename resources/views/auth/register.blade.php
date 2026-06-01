<x-default-layout>

<div class="register-wrapper">

    <div class="register-card">

        <div class="register-visual">

            <div class="brand-icon">
                <i class="bi bi-display"></i>
            </div>

            <h2>INFOLEND</h2>

            <p>
                Sistem Informasi Peminjaman Infocus
                Gedung Serbaguna Fakultas Teknik
                Universitas Tadulako

            <div class="feature-list">

                <div>
                    <i class="bi bi-check-circle-fill"></i>
                    Peminjaman Cepat
                </div>

                <div>
                    <i class="bi bi-check-circle-fill"></i>
                    Monitoring Real-Time
                </div>

                <div>
                    <i class="bi bi-check-circle-fill"></i>
                    Data Terpusat
                </div>

            </div>

        </div>

        <div class="register-form">

            <h3>Create Account</h3>

            <p class="text-muted mb-4">
                Lengkapi data akun untuk mulai menggunakan INFOLEND.
            </p>

            <!-- @if($errors->any())

                <div class="alert alert-danger">

                    <strong>
                        <i class="bi bi-exclamation-triangle me-1"></i>
                        Terjadi Kesalahan
                    </strong>

                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>

            @endif -->

            <form action="/register" method="POST">

                @csrf

                <div class="row g-3">

                    <div class="col-12">

                        <label class="form-label">
                            Nama Lengkap
                        </label>

                        <div class="input-modern">

                            <span>
                                <i class="bi bi-person"></i>
                            </span>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="Masukkan nama lengkap"
                                   value="{{ old('name') }}"
                                   required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">
                            NIM
                        </label>

                        <div class="input-modern">

                            <span>
                                <i class="bi bi-credit-card"></i>
                            </span>

                            <input type="text"
                                   name="nim"
                                   class="form-control"
                                   placeholder="Masukkan NIM"
                                   value="{{ old('nim') }}"
                                   required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">
                            Program Studi
                        </label>

                        <div class="input-modern">

                            <span>
                                <i class="bi bi-mortarboard"></i>
                            </span>

                            <input type="text"
                                   name="prodi"
                                   class="form-control"
                                   placeholder="Contoh: Sistem Informasi"
                                   value="{{ old('prodi') }}"
                                   required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">
                            Nomor HP
                        </label>

                        <div class="input-modern">

                            <span>
                                <i class="bi bi-phone"></i>
                            </span>

                            <input type="text"
                                   name="no_hp"
                                   class="form-control"
                                   placeholder="Masukkan nomor HP"
                                   value="{{ old('no_hp') }}"
                                   required>

                        </div>

                    </div>

                    <div class="col-md-6">

    <label class="form-label">
        Email
    </label>

    <div class="input-modern">

        <span>
            <i class="bi bi-envelope"></i>
        </span>

        <input type="email"
               name="email"
               class="form-control"
               placeholder="contoh: nama@untad.ac.id"
               value="{{ old('email') }}"
               required>

    </div>

    @error('email')
        <small class="text-danger d-block mt-2 fw-semibold">
            {{ $message }}
        </small>
    @enderror

    

</div>

                    <div class="col-md-6">

                        <label class="form-label">
                            Password
                        </label>

                        <div class="input-modern">

                            <span>
                                <i class="bi bi-lock"></i>
                            </span>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Masukkan password"
                                   required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <label class="form-label">
                            Konfirmasi Password
                        </label>

                        <div class="input-modern">

                            <span>
                                <i class="bi bi-shield-lock"></i>
                            </span>

                            <input type="password"
                                   name="password_confirmation"
                                   class="form-control"
                                   placeholder="Konfirmasi password"
                                   required>

                        </div>

                    </div>

                </div>

                <button type="submit" class="btn btn-primary register-btn mt-4">
                    <i class="bi bi-person-plus me-1"></i>
                    Register
                </button>

            </form>

            <div class="text-center mt-4">

                <span class="text-muted">
                    Sudah punya akun?
                </span>

                <a href="/login" class="fw-bold text-decoration-none">
                    Login
                </a>

            </div>

        </div>

    </div>

</div>

<style>

.register-wrapper {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 30px;
    background: #EBEBEB;
}

.register-card {
    width: 100%;
    max-width: 1200px;
    display: grid;
    grid-template-columns: 430px 1fr;
    background: #ffffff;
    border-radius: 32px;
    overflow: hidden;
    border: none;
    box-shadow: 0 25px 60px rgba(16,54,125,.15);
}

.register-visual {
    background:
        linear-gradient(
            rgba(16,54,125,.45),
            rgba(16,54,125,.45)
        ),
        url('https://yt3.googleusercontent.com/ytc/AIdro_nWY-e-cN6OU1oOOxdMz19_r2_pqbCitmnfT7SvkqYY=s900-c-k-c0x00ffffff-no-rj');

    background-size: cover;
    background-position: center;

    padding: 50px;
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.brand-icon {
    width: 82px;
    height: 82px;
    border-radius: 24px;
    background: rgba(116,180,217,.25);
    border: 1px solid rgba(255,255,255,.2);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 34px;
    margin-bottom: 24px;
}

.register-visual h2 {
    font-weight: 900;
    margin-bottom: 18px;
    letter-spacing: 1px;
    
}

.register-visual p {
    line-height: 1.8;
    opacity: .95;
    font-size: 15px;
}

.feature-list {
    margin-top: 32px;
    display: flex;
    flex-direction: column;
    gap: 14px;
    font-weight: 600;
}

.feature-list div {
    display: flex;
    gap: 10px;
    align-items: center;
}

.register-form {
    padding: 45px;
}

.register-form h3 {
    font-weight: 800;
    margin-bottom: 10px;
    color: #10367D;
}

.input-modern {
    display: flex;
    border: 1px solid #dbe3ee;
    border-radius: 16px;
    overflow: hidden;
    background: white;
    transition: .25s;
}

.input-modern:focus-within {
    border-color: #74B4D9;
    box-shadow: 0 0 0 4px rgba(116,180,217,.20);
}

.input-modern span {
    width: 54px;
    background: #EBEBEB;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #10367D;
    flex-shrink: 0;
}

.input-modern input {
    border: none;
    padding: 14px;
    box-shadow: none;
}

.input-modern input:focus {
    box-shadow: none;
}

.register-btn {
    width: 100%;
    padding: 14px;
    font-weight: 700;
    font-size: 16px;
    background: #10367D;
    border-color: #10367D;
}

.register-btn:hover {
    background: #0d2e6b;
    border-color: #0d2e6b;
}

.register-btn:focus {
    background: #0d2e6b;
    border-color: #0d2e6b;
    box-shadow: none;
}

.text-danger {
    font-size: 13px;
}

@media(max-width:900px) {

    .register-card {
        grid-template-columns: 1fr;
    }

    .register-form {
        padding: 28px;
    }

    .register-visual {
        padding: 35px;
        text-align: center;
    }

    .brand-icon {
        margin-left: auto;
        margin-right: auto;
    }

    .feature-list div {
        justify-content: center;
    }
}

</style>

</x-default-layout>
