<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluasi;
use App\Models\Kegiatan;

class EvaluasiController extends Controller
{
    public function index($kegiatan_id)
{
    $kegiatan = Kegiatan::with('evaluasi')->findOrFail($kegiatan_id);

    $evaluasi = $kegiatan->evaluasi;

    return view('evaluasi.index', compact(
        'kegiatan',
        'evaluasi'
    ));
}

    public function store(Request $request)
    {
        Evaluasi::create([
            'kegiatan_id' => $request->kegiatan_id,
            'user_id' => auth()->id(),
            'role_pengisi' => auth()->user()->role, // nanti dinamis
            'isi' => $request->isi
        ]);

        return back()->with('success','Evaluasi ditambahkan');
    }
}