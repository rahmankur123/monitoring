<div class="sidebar">

    <h5 class="logo">🕌 Masjid App</h5>

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
        <div class="menu-title">Dashboard</div>

        <a href="/{{ auth()->user()->role }}" class="menu-item">
            🏠 Dashboard
        </a>


        {{-- ========================= --}}
        {{-- ADMIN --}}
        {{-- ========================= --}}
        @if(auth()->user()->role == 'admin')

            <div class="menu-title">Kegiatan</div>

            <a href="/admin/kegiatan/draft" class="menu-item">
                📄 Draft & Ditolak
            </a>

            <a href="/admin/kegiatan/proses" class="menu-item">
                ⏳ Proses Kegiatan
            </a>

            <a href="/admin/kegiatan/selesai" class="menu-item">
                ✅ Selesai
            </a>

        @endif


        {{-- ========================= --}}
        {{-- BENDAHARA --}}
        {{-- ========================= --}}
        @if(auth()->user()->role == 'bendahara')

            <div class="menu-title">Kegiatan</div>

            <a href="/bendahara/anggaran/draft" class="menu-item">
                📄 Draft & Ditolak
            </a>

            <a href="/bendahara/anggaran/proses" class="menu-item">
                ⏳ Proses Kegiatan
            </a>

            <a href="/bendahara/anggaran/selesai" class="menu-item">
                ✅ Selesai
            </a>

            <div class="menu-title">Keuangan</div>

            <a href="/bendahara/kas" class="menu-item">
                💰 Kas
            </a>

        @endif


        {{-- ========================= --}}
        {{-- TAKMIR --}}
        {{-- ========================= --}}
        @if(auth()->user()->role == 'takmir')

            <div class="menu-title">Kegiatan</div>

            <a href="/takmir/kegiatan/draft" class="menu-item">
                📄 Draft & Ditolak
            </a>

            <a href="/takmir/kegiatan/proses" class="menu-item">
                ⏳ Proses Kegiatan
            </a>

            <a href="/takmir/kegiatan/selesai" class="menu-item">
                ✅ Selesai
            </a>

        @endif


        {{-- ========================= --}}
        {{-- LAPORAN --}}
        {{-- ========================= --}}
        <div class="menu-title">Laporan</div>

        <a href="/{{ auth()->user()->role }}/laporan/kegiatan" class="menu-item">
            📊 Laporan Kegiatan
        </a>

        <a href="/{{ auth()->user()->role }}/laporan/kas" class="menu-item">
            💰 Laporan Kas
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