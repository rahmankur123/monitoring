<div class="sidebar">

    @auth

        <div class="user-box">
            <small>Login sebagai</small>
            <div class="fw-bold">
                {{ auth()->user()->name }}
            </div>
        </div>

        {{-- ========================= --}}
        {{-- DASHBOARD --}}
        {{-- ========================= --}}
        <div class="menu-title">Beranda Amanah</div>

        <a href="/{{ auth()->user()->role }}" class="menu-item">
            🏠 Beranda Amanah
        </a>


        {{-- ========================= --}}
        {{-- ADMIN --}}
        {{-- ========================= --}}
        @if(auth()->user()->role == 'admin')

            <div class="menu-title">Kegiatan</div>

            <a href="/admin/kegiatan/draft" class="menu-item">
                📄 Tadhdiq
            </a>

            <a href="/admin/kegiatan/proses" class="menu-item">
                ⏳ Proses Amanah
            </a>

            <a href="/admin/kegiatan/selesai" class="menu-item">
                ✅ Khatam Kegiatan
            </a>

            <div class="menu-title">Manajemen</div>

            <a href="/admin/user" class="menu-item">
                👤 User
            </a>

        @endif


        {{-- ========================= --}}
        {{-- BENDAHARA --}}
        {{-- ========================= --}}
        @if(auth()->user()->role == 'bendahara')

            <div class="menu-title">Kegiatan</div>

            <a href="/bendahara/anggaran/draft" class="menu-item">
                📄 Tashdiq
            </a>

            <a href="/bendahara/anggaran/proses" class="menu-item">
                ⏳ Proses Amanah
            </a>

            <a href="/bendahara/anggaran/selesai" class="menu-item">
                ✅ Khatam Kegiatan
            </a>

            <div class="menu-title">Keuangan</div>

            <a href="/bendahara/kas" class="menu-item">
                💰 Kas Adil
            </a>

        @endif


        {{-- ========================= --}}
        {{-- TAKMIR --}}
        {{-- ========================= --}}
        @if(auth()->user()->role == 'takmir')

            <div class="menu-title">Kegiatan</div>

            <a href="/takmir/kegiatan/draft" class="menu-item">
                📄 Tadhdiq
            </a>

            <a href="/takmir/kegiatan/proses" class="menu-item">
                ⏳ Proses Amanah
            </a>

            <a href="/takmir/kegiatan/selesai" class="menu-item">
                ✅ Khatam Kegiatan
            </a>

        @endif


        {{-- ========================= --}}
        {{-- LAPORAN --}}
        {{-- ========================= --}}
        <div class="menu-title">Laporan</div>

        <a href="/{{ auth()->user()->role }}/laporan/kegiatan" class="menu-item">
            📊 Laporan Syiar
        </a>

        <a href="/{{ auth()->user()->role }}/laporan/kas" class="menu-item">
            💰 Baitul Mal
        </a>


        {{-- ========================= --}}
        {{-- LOGOUT --}}
        {{-- ========================= --}}
        <div class="logout-box mt-4">
            <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-danger w-100">
                    Logout
                </button>
            </form>
        </div>

    @endauth

</div>