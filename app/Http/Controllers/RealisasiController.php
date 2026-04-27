<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\RealisasiAnggaran;
use App\Models\Kas;

class RealisasiController extends Controller
{
    public function create($kegiatan_id)
{
    $kegiatan = Kegiatan::with(['anggaran','realisasi'])
        ->findOrFail($kegiatan_id);

    return view('bendahara.realisasi.create', compact('kegiatan'));
}

    public function store(Request $request)
{
    $kegiatan_id = $request->kegiatan_id;

    // 🔥 CEK: kalau sudah pernah realisasi → TOLAK
    if (RealisasiAnggaran::where('kegiatan_id', $kegiatan_id)->exists()) {
        return back()->with('error', 'Realisasi sudah pernah diinput!');
    }

    $totalInputBaru = 0;

    foreach ($request->nama_item as $i => $item) {
        $totalInputBaru += $request->qty[$i] * $request->harga[$i];
    }

    // 🔥 CEK SALDO
    if ($totalInputBaru > Kas::saldo()) {
        return back()->with('error','Saldo tidak cukup!');
    }

    // simpan realisasi
    foreach ($request->nama_item as $i => $item) {
        RealisasiAnggaran::create([
            'kegiatan_id' => $kegiatan_id,
            'nama_item' => $item,
            'qty' => $request->qty[$i],
            'harga' => $request->harga[$i],
            'total' => $request->qty[$i] * $request->harga[$i]
        ]);
    }

    // 🔥 kas keluar hanya dari input BARU
    Kas::create([
        'tanggal' => now(),
        'keterangan' => 'Realisasi kegiatan: '.$kegiatan_id,
        'tipe' => 'keluar',
        'jumlah' => $totalInputBaru,
        'created_by' => auth()->id(),
        'kegiatan_id' => $kegiatan_id
    ]);

    return redirect('/bendahara/realisasi')
        ->with('success','Realisasi berhasil disimpan');
}
    public function index()
{
    $kegiatan = \App\Models\Kegiatan::with('realisasi')->latest()->get();

    return view('bendahara.anggaran.selesai', compact('kegiatan'));
}
public function list($kegiatan_id)
{
    $kegiatan = \App\Models\Kegiatan::findOrFail($kegiatan_id);

    $realisasi = \App\Models\RealisasiAnggaran::where('kegiatan_id', $kegiatan_id)->get();

    $total = $realisasi->sum('total');

    return view('bendahara.anggaran.selesai', compact('kegiatan','realisasi','total'));
}
public function edit($kegiatan_id)
{
    $kegiatan = Kegiatan::with('realisasi')->findOrFail($kegiatan_id);

    return view('bendahara.realisasi.edit', compact('kegiatan'));
}
public function update(Request $request, $kegiatan_id)
{
    $kegiatan = Kegiatan::findOrFail($kegiatan_id);

    // hapus realisasi lama
    RealisasiAnggaran::where('kegiatan_id', $kegiatan_id)->delete();

    $totalRealisasi = 0;

    foreach ($request->nama_item as $i => $item) {
        $total = $request->qty[$i] * $request->harga[$i];

        $totalRealisasi += $total;

        RealisasiAnggaran::create([
            'kegiatan_id' => $kegiatan_id,
            'nama_item' => $item,
            'qty' => $request->qty[$i],
            'harga' => $request->harga[$i],
            'total' => $total
        ]);
    }

    // update kas keluar lama
    Kas::where('kegiatan_id', $kegiatan_id)
        ->where('tipe', 'keluar')
        ->delete();

    Kas::create([
        'tanggal' => now(),
        'keterangan' => 'Realisasi kegiatan ID '.$kegiatan_id,
        'tipe' => 'keluar',
        'jumlah' => $totalRealisasi,
        'created_by' => 1,
        'kegiatan_id' => $kegiatan_id
    ]);

    return redirect('/bendahara/anggaran/selesai')
        ->with('success', 'Realisasi berhasil diperbarui');
}
public function destroy($id)
{
    $realisasi = RealisasiAnggaran::findOrFail($id);

    $kegiatan_id = $realisasi->kegiatan_id;

    $realisasi->delete();

    return back()->with('success', 'Item realisasi berhasil dihapus');
}
}