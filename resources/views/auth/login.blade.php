<x-default-layout>

<div class="login-wrapper">

    <div class="login-card">

        <div class="login-visual">

            <div class="brand-icon">
                <i class="bi bi-display"></i>
            </div>

            <h2>INFOLEND</h2>

            <p>
                Sistem peminjaman infokus yang cepat, rapi, dan mudah digunakan.
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

.login-wrapper {
    min-height: 78vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.login-card {
    width: 100%;
    max-width: 980px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    background: white;
    border-radius: 30px;
    overflow: hidden;
    border: 1px solid #e2e8f0;
    box-shadow: 0 20px 50px rgba(15,23,42,.10);
}

.login-visual {
    position: relative;
    padding: 50px;
    background: linear-gradient(135deg,#0f172a,#2563eb);
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    overflow: hidden;
}

.login-visual::before {
    content: "";
    position: absolute;
    width: 220px;
    height: 220px;
    border-radius: 50%;
    background: rgba(255,255,255,.12);
    top: -70px;
    right: -70px;
}

.login-visual::after {
    content: "";
    position: absolute;
    width: 160px;
    height: 160px;
    border-radius: 50%;
    background: rgba(255,255,255,.08);
    bottom: -50px;
    left: -50px;
}

.brand-icon {
    width: 76px;
    height: 76px;
    border-radius: 24px;
    background: rgba(255,255,255,.16);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 34px;
    margin-bottom: 24px;
    backdrop-filter: blur(10px);
    position: relative;
    z-index: 1;
}

.login-visual h2,
.login-visual p,
.visual-badge {
    position: relative;
    z-index: 1;
}

.login-visual h2 {
    font-weight: 900;
    margin-bottom: 12px;
}

.login-visual p {
    color: rgba(255,255,255,.82);
    font-size: 16px;
    line-height: 1.7;
}

.visual-badge {
    margin-top: 28px;
    display: inline-flex;
    width: fit-content;
    align-items: center;
    padding: 12px 16px;
    border-radius: 999px;
    background: rgba(255,255,255,.14);
    font-weight: 700;
}

.login-form {
    padding: 50px;
}

.login-form h3 {
    font-weight: 900;
    color: #0f172a;
}

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
    border-color: #2563eb;
    box-shadow: 0 0 0 4px rgba(37,99,235,.12);
}

.input-group-modern span {
    width: 56px;
    align-self: stretch;
    background: #eff6ff;
    color: #2563eb;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}

.input-group-modern .form-control {
    border: none;
    box-shadow: none;
    padding: 14px 16px;
}

.input-group-modern .form-control:focus {
    box-shadow: none;
}

.login-btn {
    padding: 13px 16px;
    font-size: 16px;
}

@media(max-width:768px) {
    .login-card {
        grid-template-columns: 1fr;
    }

    .login-visual {
        padding: 34px;
        text-align: center;
        align-items: center;
    }

    .login-form {
        padding: 30px;
    }
}

</style>

</x-default-layout>