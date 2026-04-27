<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kas;
use App\Models\RealisasiAnggaran;
use PDF;

class KasController extends Controller
{
    public function index()
    {
        $kas = Kas::latest()->get();

        // hitung saldo
        $saldo = Kas::saldo();

        return view('bendahara.kas.index', compact('kas','saldo'));
    }

    public function create()
    {
        return view('bendahara.kas.create');
    }

    public function store(Request $request)
    {
        Kas::create([
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'tipe' => $request->tipe,
            'jumlah' => $request->jumlah,
            'created_by' => 1 // nanti auth
        ]);

        return redirect('/bendahara/kas')->with('success','Kas ' . $request->tipe . ' ditambahkan');
    }

public function laporan(Request $request)
{
    $bulan = $request->bulan ?? now()->format('Y-m');

    $kas = Kas::whereMonth('tanggal', date('m', strtotime($bulan)))
        ->whereYear('tanggal', date('Y', strtotime($bulan)))
        ->orderBy('tanggal')
        ->get();

    // mapping biar seragam
    $data = $kas->map(function ($k) {
        return (object)[
            'tanggal' => $k->tanggal,
            'keterangan' => $k->keterangan,
            'jumlah' => $k->jumlah,
            'tipe' => $k->tipe
        ];
    });

    // 🔥 TOTAL (AKURAT)
    $totalMasuk = $data->where('tipe','masuk')->sum('jumlah');
    $totalKeluar = $data->where('tipe','keluar')->sum('jumlah');

    // pagination manual
    $perPage = 10;
    $page = request()->get('page', 1);

    $pagedData = new \Illuminate\Pagination\LengthAwarePaginator(
        $data->forPage($page, $perPage)->values(),
        $data->count(),
        $perPage,
        $page,
        [
            'path' => request()->url(),
            'query' => request()->query()
        ]
    );

    return view('laporan.kas', [
        'data' => $pagedData,
        'bulan' => $bulan,
        'totalMasuk' => $totalMasuk,
        'totalKeluar' => $totalKeluar
    ]);
}

public function exportKas(Request $request)
{
    $bulan = $request->bulan ?? now()->format('Y-m');

    // ambil data (PAKAI LOGIKA YANG SAMA DENGAN laporan())
    $kasMasuk = Kas::whereMonth('tanggal', date('m', strtotime($bulan)))
        ->whereYear('tanggal', date('Y', strtotime($bulan)))
        ->get()
        ->map(function ($item) {
            return [
                'tanggal' => $item->tanggal,
                'keterangan' => $item->keterangan,
                'jumlah' => $item->jumlah,
                'tipe' => 'masuk'
            ];
        });

    $kasKeluar = RealisasiAnggaran::with('kegiatan')
        ->whereHas('kegiatan', function ($q) use ($bulan) {
            $q->whereMonth('tanggal', date('m', strtotime($bulan)))
              ->whereYear('tanggal', date('Y', strtotime($bulan)));
        })
        ->get()
        ->map(function ($r) {
            return [
                'tanggal' => $r->created_at,
                'keterangan' => 'Realisasi: '.$r->kegiatan->judul,
                'jumlah' => $r->qty * $r->harga,
                'tipe' => 'keluar'
            ];
        });

    $data = $kasMasuk->merge($kasKeluar)
                     ->sortBy('tanggal')
                     ->values();

    $pdf = PDF::loadView('laporan.kas_pdf', [
        'data' => $data,
        'bulan' => $bulan
    ]);

    return $pdf->download('laporan-kas-'.$bulan.'.pdf');
}
}