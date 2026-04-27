{{-- layouts/partials/header.blade.php --}}
<div class="bg-light p-3 border-bottom">
    <h5>Dashboard {{ strtoupper(auth()->user()->role ?? '') }}</h5>
</div>