<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluasi;

class EvaluasiController extends Controller
{
    public function index($kegiatan_id)
    {
        $evaluasi = Evaluasi::where('kegiatan_id', $kegiatan_id)->get();

        return view('evaluasi.index', compact('evaluasi','kegiatan_id'));
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