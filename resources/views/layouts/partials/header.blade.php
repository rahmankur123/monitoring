{{-- HEADER : resources/views/layouts/partials/header.blade.php --}}
<div class="header">
    <div>
        <h5 class="mb-0 fw-bold">🕌 Sistem Monitoring Masjid</h5>
        <small class="text-muted">
            Monitoring kegiatan, anggaran, LPJ, evaluasi, dan laporan masjid
        </small>
    </div>

    @auth
    <div class="text-end">
        <small class="text-muted d-block">Login sebagai</small>
        <span class="fw-bold text-dark">
            {{ auth()->user()->name }}
        </span>
    </div>
    @endauth
</div>


