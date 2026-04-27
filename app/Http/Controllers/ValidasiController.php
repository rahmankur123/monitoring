<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\LogValidasi;

class ValidasiController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DRAFT / INDEX
    |--------------------------------------------------------------------------
    | Menampilkan:
    | - Menunggu Validasi
    | - Ditolak
    */

    public function index()
    {
        $menunggu = Kegiatan::with('anggaran')
            ->where('status', 'menunggu_validasi')
            ->latest()
            ->get();

        $ditolak = Kegiatan::with('anggaran')
            ->where('status', 'ditolak')
            ->latest()
            ->get();

        return view('takmir.kegiatan.index', compact(
            'menunggu',
            'ditolak'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | PROSES
    |--------------------------------------------------------------------------
    | Menampilkan:
    | - Disetujui (Dijadwalkan)
    | - Berlangsung
    */

    public function proses()
    {
        $dijadwalkan = Kegiatan::with('anggaran')
            ->where('status', 'disetujui')
            ->latest()
            ->get();

        $berlangsung = Kegiatan::with('anggaran')
            ->where('status', 'berlangsung')
            ->latest()
            ->get();

        return view('takmir.kegiatan.proses', compact(
            'dijadwalkan',
            'berlangsung'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | SELESAI
    |--------------------------------------------------------------------------
    | Menampilkan:
    | - Selesai
    | - Dibatalkan
    */

    public function selesai()
    {
        $selesai = Kegiatan::with([
                'anggaran',
                'realisasi',
                'lpj',
                'galeri',
                'evaluasi'
            ])
            ->where('status', 'selesai')
            ->latest()
            ->get();

        $dibatalkan = Kegiatan::with('anggaran')
            ->where('status', 'dibatalkan')
            ->latest()
            ->get();

        return view('takmir.kegiatan.selesai', compact(
            'selesai',
            'dibatalkan'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | DETAIL KEGIATAN + ANGGARAN
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $kegiatan = Kegiatan::with('anggaran')
            ->findOrFail($id);

        return view('takmir.kegiatan.show', compact(
            'kegiatan'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | APPROVE
    |--------------------------------------------------------------------------
    */

    public function approve($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $kegiatan->update([
            'status' => 'disetujui',
            'validated_by' => auth()->id(),
            'validated_at' => now(),
            'catatan_takmir' => null
        ]);

        LogValidasi::create([
            'kegiatan_id' => $id,
            'status' => 'disetujui',
            'catatan' => 'Disetujui',
            'oleh' => auth()->id()
        ]);

        return redirect('/takmir/kegiatan/draft')->with('success', 'Kegiatan berhasil disetujui');
    }


    /*
    |--------------------------------------------------------------------------
    | REJECT
    |--------------------------------------------------------------------------
    */

    public function reject(Request $request, $id)
    {
        $request->validate([
            'catatan' => 'required'
        ]);

        $kegiatan = Kegiatan::findOrFail($id);

        $kegiatan->update([
            'status' => 'ditolak',
            'catatan_takmir' => $request->catatan
        ]);

        LogValidasi::create([
            'kegiatan_id' => $id,
            'status' => 'ditolak',
            'catatan' => $request->catatan,
            'oleh' => auth()->id()
        ]);

        return redirect('/takmir/kegiatan/draft')->with('success', 'Kegiatan berhasil ditolak');
        
    }
}