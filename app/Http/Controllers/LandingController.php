<?php

namespace App\Http\Controllers;

class LandingController extends Controller
{
    public function index()
    {
        $totalKegiatan = \App\Models\Kegiatan::count();
        $totalAnggaran = \App\Models\Anggaran::sum('total');
        $kegiatans = \App\Models\Kegiatan::latest()->take(5)->get();

        return view('landing', compact(
            'totalKegiatan',
            'totalAnggaran',
            'kegiatans'
        ));
    }
}