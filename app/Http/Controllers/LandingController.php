<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;

class LandingController extends Controller
{
public function index()
{
    $kegiatans = Kegiatan::with('galeri')
        ->where('status', 'selesai')
        ->has('galeri')
        ->latest()
        ->take(6)
        ->get();

    $totalKegiatan = Kegiatan::where('status', 'selesai')->count();

    return view('landing', compact('kegiatans', 'totalKegiatan'));
}


public function detail($id)
{
    $kegiatan = Kegiatan::with([
        'galeri'
    ])
    ->where('status', 'selesai')
    ->has('galeri')
    ->findOrFail($id);

    return view('public.detail', compact('kegiatan'));
}
}