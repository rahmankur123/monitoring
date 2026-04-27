<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\LogValidasi;

class ValidasiController extends Controller
{
    // list kegiatan
    public function index($status = null)
{
    $query = Kegiatan::with('anggaran');

    if ($status == 'menunggu_validasi') {
        $query->where('status', 'menunggu_validasi');
    } elseif ($status == 'disetujui') {
        $query->where('status', 'disetujui');
    } elseif ($status == 'selesai') {
        $query->where('status', 'selesai');
    }

    $kegiatan = $query->latest()->get();

    return view('takmir.kegiatan.index', compact('kegiatan','status'));
}

    // detail kegiatan + anggaran
    public function show($id)
    {
        $kegiatan = Kegiatan::with('anggaran')->findOrFail($id);

        return view('takmir.kegiatan.show', compact('kegiatan'));
    }

    // approve
    public function approve($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $kegiatan->update([
            'status' => 'disetujui',
            'validated_by' => 1, // nanti ganti auth
            'validated_at' => now(),
            'catatan_takmir' => null
        ]);

        LogValidasi::create([
            'kegiatan_id' => $id,
            'status' => 'disetujui',
            'catatan' => 'Disetujui',
            'oleh' => 1
        ]);

        return redirect()->back()->with('success','Disetujui');
    }

    // reject
    public function reject(Request $request, $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $kegiatan->update([
            'status' => 'ditolak',
            'catatan_takmir' => $request->catatan
        ]);

        LogValidasi::create([
            'kegiatan_id' => $id,
            'status' => 'ditolak',
            'catatan' => $request->catatan,
            'oleh' => 1
        ]);

        return redirect()->back()->with('success','Ditolak');
    }
}