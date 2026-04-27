<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lpj;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Storage;

class LpjController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create($kegiatan_id)
    {
        $kegiatan = Kegiatan::with('lpj')->findOrFail($kegiatan_id);

        return view('bendahara.lpj.create', compact('kegiatan'));
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'kegiatan_id' => 'required',
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:5120'
        ]);

        $kegiatan = Kegiatan::findOrFail($request->kegiatan_id);

$extension = $request->file('file')->getClientOriginalExtension();

$namaFile = str_replace(' ', '-', $kegiatan->judul) . '.' . $extension;

$file = $request->file('file')->storeAs(
    'lpj',
    $namaFile,
    'public'
);

        Lpj::updateOrCreate(
            [
                'kegiatan_id' => $request->kegiatan_id
            ],
            [
                'file' => $file,
                'uploaded_by' => auth()->id()
            ]
        );

        return redirect('/bendahara/anggaran/selesai')
            ->with('success', 'LPJ berhasil diupload');
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($kegiatan_id)
    {
        $kegiatan = Kegiatan::with('lpj')->findOrFail($kegiatan_id);

        return view('bendahara.lpj.edit', compact('kegiatan'));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $kegiatan_id)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:5120'
        ]);

        $lpj = Lpj::where('kegiatan_id', $kegiatan_id)->first();

        /*
        |--------------------------------------------------------------------------
        | Hapus file lama jika ada
        |--------------------------------------------------------------------------
        */

        if ($lpj && $lpj->file) {
            if (Storage::disk('public')->exists($lpj->file)) {
                Storage::disk('public')->delete($lpj->file);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Upload file baru
        |--------------------------------------------------------------------------
        */

        $kegiatan = Kegiatan::findOrFail($kegiatan_id);

$extension = $request->file('file')->getClientOriginalExtension();

$namaFile = str_replace(' ', '-', $kegiatan->judul) . '.' . $extension;

$file = $request->file('file')->storeAs(
    'lpj',
    $namaFile,
    'public'
);

        Lpj::updateOrCreate(
            [
                'kegiatan_id' => $kegiatan_id
            ],
            [
                'file' => $file,
                'uploaded_by' => auth()->id()
            ]
        );

        return redirect('/bendahara/anggaran/selesai')
            ->with('success', 'LPJ berhasil diperbarui');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $lpj = Lpj::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | Hapus file fisik
        |--------------------------------------------------------------------------
        */

        if ($lpj->file && Storage::disk('public')->exists($lpj->file)) {
            Storage::disk('public')->delete($lpj->file);
        }

        /*
        |--------------------------------------------------------------------------
        | Hapus data database
        |--------------------------------------------------------------------------
        */

        $lpj->delete();

        return back()->with('success', 'LPJ berhasil dihapus');
    }
}