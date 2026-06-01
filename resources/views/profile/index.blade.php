<x-default-layout>

<div class="profile-page">

    <div class="profile-hero">
        <div>
            <span class="hero-badge">INFOLEND Profile</span>
            <h1>Profile {{ ucfirst(auth()->user()->role) }}</h1>
            <p>Informasi akun pengguna yang sedang login.</p>
        </div>

        <div class="hero-actions">
            <button type="button" class="btn-profile btn-edit" onclick="openEditModal()">
                <i class="bi bi-pencil-square"></i> Edit Profile
            </button>

            <button type="button" class="btn-profile btn-about" onclick="openAboutModal()">
                <i class="bi bi-info-circle"></i> About Us
            </button>
        </div>
    </div>

    <div class="profile-wrapper">

        <div class="profile-card">

            <div class="profile-header">

                <div class="profile-avatar" id="avatarInitial">
                    {{ strtoupper(substr(auth()->user()->name,0,1)) }}
                </div>

                <div>
                    <h3 id="displayName">{{ auth()->user()->name }}</h3>
                    <p id="displayEmail">{{ auth()->user()->email }}</p>
                    <span class="role-pill text-capitalize">
                        {{ auth()->user()->role }}
                    </span>
                </div>

            </div>

            <div class="profile-body">

                <div class="profile-item">
                    <div class="profile-icon"><i class="bi bi-person"></i></div>
                    <div>
                        <span>Nama Lengkap</span>
                        <strong id="infoName">{{ auth()->user()->name }}</strong>
                    </div>
                </div>

                <div class="profile-item">
                    <div class="profile-icon"><i class="bi bi-envelope"></i></div>
                    <div>
                        <span>Email</span>
                        <strong id="infoEmail">{{ auth()->user()->email }}</strong>
                    </div>
                </div>

                <div class="profile-item">
                    <div class="profile-icon"><i class="bi bi-shield-check"></i></div>
                    <div>
                        <span>Role</span>
                        <strong class="text-capitalize">{{ auth()->user()->role }}</strong>
                    </div>
                </div>

                @if(auth()->user()->role !== 'admin' && auth()->user()->nim)
                <div class="profile-item">
                    <div class="profile-icon"><i class="bi bi-credit-card"></i></div>
                    <div>
                        <span>NIM</span>
                        <strong>{{ auth()->user()->nim }}</strong>
                    </div>
                </div>
                @endif

                @if(auth()->user()->role !== 'admin' && auth()->user()->prodi)
                <div class="profile-item">
                    <div class="profile-icon"><i class="bi bi-mortarboard"></i></div>
                    <div>
                        <span>Program Studi</span>
                        <strong id="infoProdi">{{ auth()->user()->prodi }}</strong>
                    </div>
                </div>
                @endif

                @if(auth()->user()->no_hp)
                <div class="profile-item">
                    <div class="profile-icon"><i class="bi bi-telephone"></i></div>
                    <div>
                        <span>Nomor HP</span>
                        <strong id="infoPhone">{{ auth()->user()->no_hp }}</strong>
                    </div>
                </div>
                @endif

            </div>

            <div class="profile-footer">
                <div class="account-status">
                    <div class="status-dot"></div>
                    Akun Aktif
                </div>
            </div>

        </div>

    </div>

</div>

{{-- MODAL EDIT PROFILE --}}
<div class="custom-modal" id="editModal">
    <div class="modal-box">
        <div class="modal-header-custom">
            <div>
                <h4>Edit Profile</h4>
                <p>Perbarui informasi profile pengguna.</p>
            </div>
            <button onclick="closeEditModal()" class="modal-close">&times;</button>
        </div>

        <div class="modal-body-custom">
            <label>Nama Lengkap</label>
            <input type="text" id="inputName" value="{{ auth()->user()->name }}">

            <label>Email</label>
            <input type="email" id="inputEmail" value="{{ auth()->user()->email }}">

            @if(auth()->user()->role !== 'admin')
            <label>Program Studi</label>
            <input type="text" id="inputProdi" value="{{ auth()->user()->prodi }}">
            @endif

            <label>Nomor HP</label>
            <input type="text" id="inputPhone" value="{{ auth()->user()->no_hp }}">
        </div>

        <div class="modal-footer-custom">
            <button class="btn-cancel" onclick="closeEditModal()">Batal</button>
            <button class="btn-save" onclick="saveDisplayProfile()">Simpan Perubahan</button>
        </div>
    </div>
</div>

{{-- MODAL ABOUT --}}
<div class="custom-modal" id="aboutModal">
    <div class="modal-box about-box">
        <div class="modal-header-custom">
            <div>
                <h4>About INFOLEND</h4>
                <p>Sistem Peminjaman Infocus SG Teknik Untad</p>
            </div>
            <button onclick="closeAboutModal()" class="modal-close">&times;</button>
        </div>

        <div class="about-content">
            <div class="about-logo">KELOMPOK 2 · INFOLEND</div>

            <p>
                INFOLEND adalah sistem informasi peminjaman infocus yang dirancang
                untuk membantu proses pendataan, pengajuan, dan pengelolaan peminjaman
                infocus di lingkungan SG Teknik Untad agar lebih rapi, cepat, dan mudah digunakan.
            </p>

            <h5>Team Members</h5>

            <div class="team-list">

                <a href="https://www.instagram.com/muelhizkya?igsh=MTZveTA4eGZpajI2cg==" target="_blank">
                    <span>Samuel Hizkia Kuandu</span>
                    <strong>F52124005</strong>
                </a>

                <a href="https://www.instagram.com/ecahawane_?igsh=NTh2b3IzdHQwdmFo" target="_blank">
                    <span>Elsya Armelya Naysila Hawane</span>
                    <strong>F52124006</strong>
                </a>

                <a href="https://www.instagram.com/mellziix?igsh=MTV3ZzlrbjhwOTd5ag%3D%3D&utm_source=qr" target="_blank">
                    <span>Nur Amelia</span>
                    <strong>F52124017</strong>
                </a>

                <a href="https://www.instagram.com/shell.aaaa_?igsh=MTBtOGN2cTNvcW1sZw==" target="_blank">
                    <span>Marchella Silviana Michelle Marunduh</span>
                    <strong>F52124021</strong>
                </a>

                <a href="https://www.instagram.com/ratu_annica?igsh=Y2I3eG55YW1sczU1" target="_blank">
                    <span>Ratu Annisa</span>
                    <strong>F52124022</strong>
                </a>

            </div>
        </div>
    </div>
</div>

<style>
:root{
    --royal-blue:#10367D;
    --sky-blue:#74B4D9;
    --light-grey:#EBEBEB;
    --white:#ffffff;
    --dark:#0f172a;
}

.profile-page{
    background:var(--light-grey);
    padding-bottom:30px;
    min-height:100vh;
}

.profile-hero{
    background:linear-gradient(135deg,var(--royal-blue),var(--sky-blue));
    border-radius:30px;
    padding:36px;
    margin-bottom:30px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
    color:white;
    box-shadow:0 20px 50px rgba(16,54,125,.22);
    position:relative;
    overflow:hidden;
}

.profile-hero::after{
    content:"";
    position:absolute;
    width:220px;
    height:220px;
    border-radius:50%;
    background:rgba(255,255,255,.14);
    right:-70px;
    top:-80px;
}

.hero-badge{
    display:inline-block;
    background:rgba(255,255,255,.18);
    border:1px solid rgba(255,255,255,.35);
    padding:8px 15px;
    border-radius:999px;
    font-size:.8rem;
    font-weight:800;
    margin-bottom:12px;
}

.profile-hero h1{
    font-size:2.05rem;
    font-weight:900;
    margin:0 0 6px;
}

.profile-hero p{
    margin:0;
    color:#f8fbff;
}

.hero-actions{
    display:flex;
    gap:12px;
    flex-wrap:wrap;
    position:relative;
    z-index:2;
}

.btn-profile{
    border:none;
    border-radius:16px;
    padding:12px 18px;
    font-weight:900;
    display:flex;
    align-items:center;
    gap:8px;
    cursor:pointer;
    transition:.25s;
}

.btn-edit{
    background:white;
    color:var(--royal-blue);
}

.btn-about{
    background:var(--royal-blue);
    color:white;
    border:1px solid rgba(255,255,255,.35);
}

.btn-profile:hover{
    transform:translateY(-3px);
    box-shadow:0 12px 24px rgba(16,54,125,.25);
}

.profile-wrapper{
    display:flex;
    justify-content:center;
}

.profile-card{
    width:100%;
    max-width:900px;
    background:white;
    border-radius:30px;
    overflow:hidden;
    border:1px solid rgba(16,54,125,.12);
    box-shadow:0 18px 45px rgba(16,54,125,.10);
}

.profile-header{
    background:linear-gradient(135deg,var(--royal-blue),var(--sky-blue));
    padding:42px;
    display:flex;
    align-items:center;
    gap:22px;
    color:white;
    position:relative;
}

.profile-avatar{
    width:94px;
    height:94px;
    border-radius:30px;
    background:rgba(255,255,255,.20);
    backdrop-filter:blur(10px);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:38px;
    font-weight:900;
    border:1px solid rgba(255,255,255,.30);
}

.profile-header h3{
    margin:0 0 4px;
    font-size:1.75rem;
    font-weight:900;
}

.profile-header p{
    margin:0 0 10px;
    color:#f8fbff;
}

.role-pill{
    display:inline-block;
    background:rgba(255,255,255,.20);
    border:1px solid rgba(255,255,255,.35);
    padding:7px 13px;
    border-radius:999px;
    font-size:.8rem;
    font-weight:900;
}

.profile-body{
    padding:34px;
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:18px;
}

.profile-item{
    display:flex;
    align-items:flex-start;
    gap:14px;
    padding:20px;
    border-radius:20px;
    background:#f7fbfd;
    border:1px solid rgba(116,180,217,.45);
    transition:.25s;
}

.profile-item:hover{
    transform:translateY(-4px);
    box-shadow:0 14px 28px rgba(16,54,125,.10);
    border-color:var(--sky-blue);
}

.profile-icon{
    width:50px;
    height:50px;
    border-radius:16px;
    background:var(--light-grey);
    color:var(--royal-blue);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:21px;
    flex-shrink:0;
}

.profile-item span{
    display:block;
    font-size:.83rem;
    font-weight:900;
    color:#64748b;
    margin-bottom:5px;
}

.profile-item strong{
    font-size:1rem;
    color:var(--royal-blue);
}

.profile-footer{
    padding:24px 34px;
    border-top:1px solid rgba(116,180,217,.35);
    display:flex;
    justify-content:flex-end;
}

.account-status{
    background:#e8f8ef;
    color:#15803d;
    padding:10px 16px;
    border-radius:999px;
    font-weight:900;
    display:flex;
    align-items:center;
    gap:8px;
}

.status-dot{
    width:10px;
    height:10px;
    border-radius:50%;
    background:#22c55e;
    animation:pulse 1.5s infinite;
}

.custom-modal{
    position:fixed;
    inset:0;
    background:rgba(16,54,125,.55);
    backdrop-filter:blur(7px);
    display:none;
    align-items:center;
    justify-content:center;
    z-index:9999;
    padding:20px;
}

.custom-modal.show{
    display:flex;
}

.modal-box{
    width:100%;
    max-width:560px;
    background:white;
    border-radius:28px;
    overflow:hidden;
    box-shadow:0 30px 80px rgba(16,54,125,.30);
    animation:popIn .25s ease;
}

.about-box{
    max-width:720px;
}

.modal-header-custom{
    background:linear-gradient(135deg,var(--royal-blue),var(--sky-blue));
    color:white;
    padding:26px;
    display:flex;
    justify-content:space-between;
    gap:16px;
}

.modal-header-custom h4{
    margin:0 0 6px;
    font-weight:900;
}

.modal-header-custom p{
    margin:0;
    color:#f8fbff;
    font-size:.9rem;
}

.modal-close{
    width:38px;
    height:38px;
    border:none;
    border-radius:12px;
    background:rgba(255,255,255,.18);
    color:white;
    font-size:26px;
    line-height:1;
    cursor:pointer;
}

.modal-body-custom{
    padding:26px;
}

.modal-body-custom label{
    display:block;
    font-weight:900;
    color:var(--royal-blue);
    margin-bottom:8px;
    margin-top:14px;
}

.modal-body-custom input{
    width:100%;
    border:1px solid rgba(116,180,217,.65);
    border-radius:15px;
    padding:13px 15px;
    outline:none;
    background:#f7fbfd;
    color:var(--royal-blue);
    font-weight:700;
}

.modal-body-custom input:focus{
    border-color:var(--royal-blue);
    box-shadow:0 0 0 4px rgba(116,180,217,.25);
}

.modal-footer-custom{
    padding:20px 26px 26px;
    display:flex;
    justify-content:flex-end;
    gap:12px;
}

.btn-cancel,
.btn-save{
    border:none;
    border-radius:14px;
    padding:11px 18px;
    font-weight:900;
    cursor:pointer;
}

.btn-cancel{
    background:var(--light-grey);
    color:var(--royal-blue);
}

.btn-save{
    background:var(--royal-blue);
    color:white;
}

.about-content{
    padding:28px;
}

.about-logo{
    display:inline-block;
    background:var(--light-grey);
    color:var(--royal-blue);
    border:1px solid var(--sky-blue);
    padding:10px 16px;
    border-radius:999px;
    font-weight:900;
    margin-bottom:16px;
}

.about-content p{
    color:#475569;
    line-height:1.7;
    margin-bottom:22px;
}

.about-content h5{
    font-weight:900;
    color:var(--royal-blue);
    margin-bottom:14px;
}

.team-list{
    display:grid;
    gap:12px;
}

.team-list a{
    background:#f7fbfd;
    border:1px solid var(--sky-blue);
    border-radius:18px;
    padding:16px 18px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:16px;
    text-decoration:none;
    transition:.28s;
}

.team-list a:hover{
    background:var(--sky-blue);
    transform:translateY(-4px);
    box-shadow:0 15px 30px rgba(16,54,125,.18);
}

.team-list span{
    display:block;
    font-weight:900;
    color:var(--royal-blue);
}

.team-list strong{
    color:var(--royal-blue);
    background:var(--light-grey);
    padding:7px 11px;
    border-radius:999px;
    white-space:nowrap;
}

.team-list a:hover span{
    color:white;
}

.team-list a:hover strong{
    background:white;
    color:var(--royal-blue);
}

@keyframes pulse{
    0%{transform:scale(.8);opacity:.7;}
    50%{transform:scale(1.2);opacity:1;}
    100%{transform:scale(.8);opacity:.7;}
}

@keyframes popIn{
    from{transform:scale(.95);opacity:0;}
    to{transform:scale(1);opacity:1;}
}

@media(max-width:768px){
    .profile-hero{
        flex-direction:column;
        align-items:flex-start;
        padding:26px;
    }

    .hero-actions{
        width:100%;
    }

    .btn-profile{
        flex:1;
        justify-content:center;
    }

    .profile-header{
        padding:30px;
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

    .team-list a{
        flex-direction:column;
        align-items:flex-start;
        gap:8px;
    }
}
</style>

<script>
function openEditModal(){
    document.getElementById('editModal').classList.add('show');
}

function closeEditModal(){
    document.getElementById('editModal').classList.remove('show');
}

function openAboutModal(){
    document.getElementById('aboutModal').classList.add('show');
}

function closeAboutModal(){
    document.getElementById('aboutModal').classList.remove('show');
}

function saveDisplayProfile(){
    let name = document.getElementById('inputName').value;
    let email = document.getElementById('inputEmail').value;
    let phone = document.getElementById('inputPhone').value;

    document.getElementById('displayName').innerText = name;
    document.getElementById('displayEmail').innerText = email;
    document.getElementById('infoName').innerText = name;
    document.getElementById('infoEmail').innerText = email;

    if(document.getElementById('inputProdi') && document.getElementById('infoProdi')){
        let prodi = document.getElementById('inputProdi').value;
        document.getElementById('infoProdi').innerText = prodi;
    }

    if(document.getElementById('infoPhone')){
        document.getElementById('infoPhone').innerText = phone;
    }

    if(name.length > 0){
        document.getElementById('avatarInitial').innerText = name.charAt(0).toUpperCase();
    }

    closeEditModal();

    alert('Perubahan profile berhasil disimpan.');
}

window.onclick = function(event){
    let editModal = document.getElementById('editModal');
    let aboutModal = document.getElementById('aboutModal');

    if(event.target === editModal){
        closeEditModal();
    }

    if(event.target === aboutModal){
        closeAboutModal();
    }
}
</script>

</x-default-layout>