<x-default-layout>

<div class="login-wrapper">

    <div class="login-card">

        <div class="login-visual">

            <div class="brand-icon">
                <i class="bi bi-display"></i>
            </div>

            <h2>INFOLEND</h2>

            <p>
                Sistem Informasi Peminjaman Infocus
                Gedung Serbaguna Fakultas Teknik
                Universitas Tadulako
            </p>

            <div class="visual-badge">
                <i class="bi bi-shield-check me-2"></i>
                Secure Login
            </div>

        </div>

        <div class="login-form">

            <h3 class="mb-1">Login Account</h3>

            <p class="text-muted mb-4">
                Masuk untuk mengelola peminjaman infokus.
            </p>

            @if(session('error'))

                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    {{ session('error') }}
                </div>

            @endif

            @if($errors->any())

                <div class="alert alert-danger">

                    <strong>Terjadi kesalahan:</strong>

                    <ul class="mb-0 mt-2">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="/login" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">Email</label>

                    <div class="input-group-modern">

                        <span>
                            <i class="bi bi-envelope"></i>
                        </span>

                        <input type="email"
                               name="email"
                               class="form-control"
                               placeholder="Masukkan email"
                               value="{{ old('email') }}"
                               required>

                    </div>

                </div>

                <div class="mb-4">

                    <label class="form-label">Password</label>

                    <div class="input-group-modern">

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

                <button type="submit" class="btn btn-primary w-100 login-btn">

                    <i class="bi bi-box-arrow-in-right me-1"></i>
                    Login

                </button>

            </form>

            <div class="text-center mt-4">

                <span class="text-muted">
                    Belum punya akun?
                </span>

                <a href="/register" class="fw-bold text-decoration-none">
                    Register
                </a>

            </div>

        </div>

    </div>

</div>

<style>

<style>

.login-wrapper {
    min-height: 78vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 30px 0;
}

/* CARD */
.login-card {
    width: 100%;
    max-width: 1150px;
    display: grid;
    grid-template-columns: 420px 1fr;
    background: #ffffff;
    border-radius: 32px;
    overflow: hidden;
    box-shadow: 0 25px 60px rgba(16,54,125,.15);
}

/* PANEL KIRI */
.login-visual {

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
    width: 90px;
    height: 90px;
    border-radius: 24px;

    background: rgba(255,255,255,.15);

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 42px;

    margin-bottom: 30px;

    backdrop-filter: blur(10px);
}

.login-visual h2 {
    font-size: 3rem;
    font-weight: 800;
    margin-bottom: 20px;
    color: white;
}

.login-visual p {
    font-size: 1.15rem;
    line-height: 1.8;
    color: rgba(255,255,255,.95);
    margin-bottom: 35px;
}

/* FITUR */
.feature-list div {
    margin-bottom: 16px;
    font-size: 1.05rem;
    font-weight: 600;
}

.feature-list i {
    margin-right: 10px;
}

/* PANEL KANAN */
.login-form {
    padding: 55px;
    background: #ffffff;
}

.login-form h3 {
    color: #10367D;
    font-size: 2.3rem;
    font-weight: 800;
    margin-bottom: 10px;
}

.login-form p.text-muted {
    font-size: 1rem;
    margin-bottom: 30px !important;
}

/* LABEL */
.form-label {
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 8px;
}

/* INPUT */
.input-group-modern {
    display: flex;
    align-items: center;

    border: 1px solid #dbe3ee;
    border-radius: 16px;

    overflow: hidden;

    background: white;

    transition: .25s;
}

.input-group-modern:focus-within {
    border-color: #74B4D9;
    box-shadow: 0 0 0 4px rgba(116,180,217,.20);
}

.input-group-modern span {
    width: 58px;
    align-self: stretch;

    background: #EBEBEB;
    color: #10367D;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 18px;
}

.input-group-modern .form-control {
    border: none;
    box-shadow: none;
    padding: 14px 18px;
    background: white;
}

.input-group-modern .form-control:focus {
    box-shadow: none;
}

/* BUTTON */
.login-btn {

    background: #10367D;
    border: none;

    border-radius: 14px;

    padding: 14px;

    font-size: 17px;
    font-weight: 700;

    transition: .3s;
}

.login-btn:hover {

    background: #0c2a62;

    transform: translateY(-2px);
}

/* ALERT */
.alert {
    border-radius: 14px;
}

/* RESPONSIVE */
@media (max-width: 992px) {

    .login-card {
        grid-template-columns: 1fr;
    }

    .login-visual {
        min-height: 350px;
        text-align: center;
        align-items: center;
    }

    .login-form {
        padding: 35px;
    }
}

</style>

</x-default-layout>
