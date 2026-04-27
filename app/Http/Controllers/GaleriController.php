<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index($kegiatan_id)
    {
        $galeri = Galeri::where('kegiatan_id', $kegiatan_id)->get();

        return view('admin.galeri.index', compact('galeri','kegiatan_id'));
    }

    public function store(Request $request)
{
    $request->validate([
        'foto' => 'required',
        'foto.*' => 'image|mimes:jpg,jpeg,png|max:2048'
    ]);

    foreach ($request->file('foto') as $file) {

        $namaFile = time().'_'.$file->getClientOriginalName();

        $path = $file->storeAs('galeri', $namaFile, 'public');

        Galeri::create([
            'kegiatan_id' => $request->kegiatan_id,
            'foto' => $path
        ]);
    }

    return back()->with('success','Foto berhasil upload');
}
}