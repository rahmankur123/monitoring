<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Anggaran;

class AnggaranController extends Controller
{
    public function create($kegiatan_id)
    {
        $kegiatan = Kegiatan::findOrFail($kegiatan_id);
        return view('bendahara.anggaran.create', compact('kegiatan'));
    }

    public function store(Request $request)
    {
        $kegiatan_id = $request->kegiatan_id;

        foreach ($request->nama_item as $i => $item) {
            $qty = $request->qty[$i];
            $harga = $request->harga[$i];

            Anggaran::create([
                'kegiatan_id' => $kegiatan_id,
                'nama_item' => $item,
                'qty' => $qty,
                'harga' => $harga,
                'total' => $qty * $harga
            ]);
        }

        return redirect('/bendahara/anggaran')->with('success','Anggaran berhasil disimpan');
    }
public function index($status = 'draft')
{

        $draft = Kegiatan::withCount('anggaran')
            ->where('status', 'draft')
            ->latest()
            ->get();

        $ditolak = Kegiatan::withCount('anggaran')
            ->where('status', 'ditolak')
            ->latest()
            ->get();

        $menunggu = Kegiatan::withCount('anggaran')
            ->where('status', 'menunggu_validasi')
            ->latest()
            ->get();

        return view('bendahara.anggaran.index', compact(
            'draft',
            'ditolak',
            'menunggu'
        ));
    


    return redirect('/bendahara/anggaran/draft');
}
public function proses()
{
    $menunggu = Kegiatan::where('status','menunggu_validasi')->get();
    $dijadwalkan = Kegiatan::where('status','disetujui')->get();
    $berlangsung = Kegiatan::where('status','berlangsung')->get();

    return view('bendahara.anggaran.proses', compact(
        'menunggu','dijadwalkan','berlangsung'
    ));
}
public function selesai()
{
    $selesai = Kegiatan::with(['anggaran','realisasi'])
        ->where('status','selesai')
        ->latest()
        ->get();

    $dibatalkan = Kegiatan::where('status','dibatalkan')->latest()->get();
    return view('bendahara.anggaran.selesai', compact('selesai', 'dibatalkan'));
}

public function list($kegiatan_id)
{
    $kegiatan = \App\Models\Kegiatan::findOrFail($kegiatan_id);

    $anggaran = \App\Models\Anggaran::where('kegiatan_id', $kegiatan_id)->get();

    $total = $anggaran->sum('total');

    return view('bendahara.anggaran.list', compact('kegiatan', 'anggaran', 'total'));
}
public function edit($kegiatan_id)
{
    $kegiatan = \App\Models\Kegiatan::findOrFail($kegiatan_id);
    $anggaran = \App\Models\Anggaran::where('kegiatan_id', $kegiatan_id)->get();

    return view('bendahara.anggaran.edit', compact('kegiatan','anggaran'));
}
public function update(Request $request)
{
    $kegiatan_id = $request->kegiatan_id;

    // hapus lama
    \App\Models\Anggaran::where('kegiatan_id', $kegiatan_id)->delete();

    // insert ulang
    foreach ($request->nama_item as $i => $item) {
        \App\Models\Anggaran::create([
            'kegiatan_id' => $kegiatan_id,
            'nama_item' => $item,
            'qty' => $request->qty[$i],
            'harga' => $request->harga[$i],
            'total' => $request->qty[$i] * $request->harga[$i]
        ]);
    }

    return redirect('/bendahara/anggaran/draft')
           ->with('success','Anggaran berhasil diupdate');
}
}