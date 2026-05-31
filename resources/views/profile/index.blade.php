<x-default-layout>

<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

    <div>

        <h1 class="page-title mb-1">
            Profile User
        </h1>

        <p class="page-subtitle mb-0">
            Informasi akun pengguna yang sedang login.
        </p>

    </div>

</div>

<div class="profile-wrapper">

<div class="profile-card">

<div class="profile-header">

<div class="profile-avatar">

{{ strtoupper(substr(auth()->user()->name,0,1)) }}

</div>

<div>

<h3 class="mb-1">

{{ auth()->user()->name }}

</h3>

<p class="text-muted mb-0">

{{ auth()->user()->email }}

</p>

</div>

</div>

<div class="profile-body">

<div class="profile-item">

<div class="profile-icon">

<i class="bi bi-person"></i>

</div>

<div>

<span>
Nama Lengkap
</span>

<strong>

{{ auth()->user()->name }}

</strong>

</div>

</div>

<div class="profile-item">

<div class="profile-icon">

<i class="bi bi-envelope"></i>

</div>

<div>

<span>
Email
</span>

<strong>

{{ auth()->user()->email }}

</strong>

</div>

</div>

<div class="profile-item">

<div class="profile-icon">

<i class="bi bi-shield-check"></i>

</div>

<div>

<span>
Role
</span>

<strong class="text-capitalize">

{{ auth()->user()->role }}

</strong>

</div>

</div>

@if(auth()->user()->nim)

<div class="profile-item">

<div class="profile-icon">

<i class="bi bi-credit-card"></i>

</div>

<div>

<span>
NIM
</span>

<strong>

{{ auth()->user()->nim }}

</strong>

</div>

</div>

@endif

@if(auth()->user()->prodi)

<div class="profile-item">

<div class="profile-icon">

<i class="bi bi-mortarboard"></i>

</div>

<div>

<span>
Program Studi
</span>

<strong>

{{ auth()->user()->prodi }}

</strong>

</div>

</div>

@endif

@if(auth()->user()->no_hp)

<div class="profile-item">

<div class="profile-icon">

<i class="bi bi-telephone"></i>

</div>

<div>

<span>
Nomor HP
</span>

<strong>

{{ auth()->user()->no_hp }}

</strong>

</div>

</div>

@endif

</div>

<div class="profile-footer">

<div class="account-status">

<div class="status-dot">

</div>

Akun Aktif

</div>

</div>

</div>

</div>

<style>

.profile-wrapper{

display:flex;

justify-content:center;

}

.profile-card{

width:100%;

max-width:780px;

background:white;

border-radius:30px;

overflow:hidden;

border:1px solid #e2e8f0;

box-shadow:
0 18px 45px rgba(15,23,42,.06);

}

.profile-header{

background:
linear-gradient(
135deg,
#2563eb,
#3b82f6
);

padding:40px;

display:flex;

align-items:center;

gap:22px;

color:white;

}

.profile-avatar{

width:88px;

height:88px;

border-radius:28px;

background:
rgba(255,255,255,.18);

backdrop-filter:
blur(10px);

display:flex;

align-items:center;

justify-content:center;

font-size:34px;

font-weight:800;

border:
1px solid rgba(255,255,255,.2);

}

.profile-body{

padding:34px;

display:grid;

grid-template-columns:
repeat(
auto-fit,
minmax(260px,1fr)
);

gap:18px;

}

.profile-item{

display:flex;

align-items:flex-start;

gap:14px;

padding:18px;

border-radius:18px;

background:#f8fafc;

border:1px solid #e2e8f0;

transition:.25s;

}

.profile-item:hover{

transform:
translateY(-3px);

box-shadow:
0 10px 24px rgba(15,23,42,.05);

}

.profile-icon{

width:48px;

height:48px;

border-radius:14px;

background:#eff6ff;

color:#2563eb;

display:flex;

align-items:center;

justify-content:center;

font-size:20px;

flex-shrink:0;

}

.profile-item span{

display:block;

font-size:.85rem;

font-weight:700;

color:#64748b;

margin-bottom:4px;

}

.profile-item strong{

font-size:1rem;

color:#0f172a;

}

.profile-footer{

padding:24px 34px;

border-top:
1px solid #e2e8f0;

display:flex;

justify-content:flex-end;

}

.account-status{

background:#dcfce7;

color:#15803d;

padding:10px 16px;

border-radius:999px;

font-weight:700;

display:flex;

align-items:center;

gap:8px;

}

.status-dot{

width:10px;

height:10px;

border-radius:50%;

background:#22c55e;

animation:
pulse 1.5s infinite;

}

@keyframes pulse{

0%{

transform:scale(.8);

opacity:.7;

}

50%{

transform:scale(1.2);

opacity:1;

}

100%{

transform:scale(.8);

opacity:.7;

}

}

@media(max-width:768px){

.profile-header{

padding:28px;

flex-direction:column;

text-align:center;

}

.profile-body{

padding:22px;

grid-template-columns:1fr;

}

.profile-footer{

justify-content:center;

}

}

</style>

</x-default-layout>