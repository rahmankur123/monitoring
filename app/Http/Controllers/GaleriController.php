<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\Kegiatan;

class GaleriController extends Controller
{
    public function index($kegiatan_id)
{
    $kegiatan = Kegiatan::with('galeri')->findOrFail($kegiatan_id);

    $galeri = $kegiatan->galeri;

    return view('admin.galeri.index', compact(
        'kegiatan',
        'galeri'
    ));
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

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        if (file_exists(public_path('storage/' . $galeri->foto))) {
            unlink(public_path('storage/' . $galeri->foto));
        }
        
        $galeri->delete();

        



        return back()->with('success','Foto berhasil dihapus');
    }
}