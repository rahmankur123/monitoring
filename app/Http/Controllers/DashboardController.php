<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;

class DashboardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN DASHBOARD
    |--------------------------------------------------------------------------
    */
    public function admin()
    {
        $totalKegiatan = Kegiatan::count();

        $menunggu = Kegiatan::where('status', 'menunggu_validasi')->count();

        $selesai = Kegiatan::where('status', 'selesai')->count();

        $ditolak = Kegiatan::whereIn('status', ['ditolak', 'dibatalkan'])->count();

        $latestKegiatan = Kegiatan::latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalKegiatan',
            'menunggu',
            'selesai',
            'ditolak',
            'latestKegiatan'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | BENDAHARA DASHBOARD
    |--------------------------------------------------------------------------
    */
    public function bendahara()
    {
        $totalKegiatan = Kegiatan::count();

        $menunggu = Kegiatan::whereIn('status', [
            'draft',
            'ditolak',
            'menunggu_validasi'
        ])->count();

        $selesai = Kegiatan::where('status', 'selesai')->count();

        $ditolak = Kegiatan::where('status', 'ditolak')->count();

        $latestKegiatan = Kegiatan::latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalKegiatan',
            'menunggu',
            'selesai',
            'ditolak',
            'latestKegiatan'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | TAKMIR DASHBOARD
    |--------------------------------------------------------------------------
    */
    public function takmir()
    {
        $totalKegiatan = Kegiatan::count();

        $menunggu = Kegiatan::where('status', 'menunggu_validasi')->count();

        $selesai = Kegiatan::where('status', 'selesai')->count();

        $ditolak = Kegiatan::where('status', 'ditolak')->count();

        $latestKegiatan = Kegiatan::latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalKegiatan',
            'menunggu',
            'selesai',
            'ditolak',
            'latestKegiatan'
        ));
    }
}