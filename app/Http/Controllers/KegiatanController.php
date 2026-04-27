<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use PDF;

class KegiatanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX ADMIN
    |--------------------------------------------------------------------------
    | Draft + Ditolak dipisah tabel
    | Proses = menunggu_validasi + disetujui + berlangsung
    | Selesai = kegiatan selesai
    */

    public function index($status = 'draft')
    {
        /*
        =========================================
        DRAFT + DITOLAK
        =========================================
        */
        if ($status == 'draft') {

            $draft = Kegiatan::withCount('anggaran')
                ->where('status', 'draft')
                ->latest()
                ->get();

            $ditolak = Kegiatan::withCount('anggaran')
                ->where('status', 'ditolak')
                ->latest()
                ->get();

            return view(
                'admin.kegiatan.index',
                compact('draft', 'ditolak', 'status')
            );
        }

        /*
        =========================================
        PROSES
        =========================================
        */
        elseif ($status == 'proses') {

            $menunggu = Kegiatan::withCount('anggaran')
                ->where('status', 'menunggu_validasi')
                ->latest()
                ->get();

            $dijadwalkan = Kegiatan::withCount('anggaran')
                ->where('status', 'disetujui')
                ->latest()
                ->get();

            $berlangsung = Kegiatan::withCount('anggaran')
                ->where('status', 'berlangsung')
                ->latest()
                ->get();

            return view(
                'admin.kegiatan.proses',
                compact(
                    'menunggu',
                    'dijadwalkan',
                    'berlangsung',
                    'status'
                )
            );
        }

        /*
        =========================================
        SELESAI
        =========================================
        */
        elseif ($status == 'selesai') {

            $kegiatan = Kegiatan::with([
                    'anggaran',
                    'realisasi',
                    'lpj'
                ])
                ->where('status', 'selesai')
                ->latest()
                ->get();

            return view(
                'admin.kegiatan.selesai',
                compact('kegiatan', 'status')
            );
        }

        abort(404);
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('admin.kegiatan.create');
    }


    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        Kegiatan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'status' => 'draft',
            'created_by' => auth()->id()
        ]);

        return redirect('/admin/kegiatan/draft')
            ->with('success', 'Kegiatan berhasil dibuat');
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        return view(
            'admin.kegiatan.edit',
            compact('kegiatan')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $kegiatan->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
        ]);

        return redirect('/admin/kegiatan/draft')
            ->with('success', 'Berhasil diupdate');
    }


    /*
    |--------------------------------------------------------------------------
    | SUBMIT KE TAKMIR
    |--------------------------------------------------------------------------
    */

    public function submit($id)
    {
        Kegiatan::findOrFail($id)->update([
            'status' => 'menunggu_validasi'
        ]);

        return back()->with(
            'success',
            'Kegiatan dikirim untuk validasi'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | MULAI KEGIATAN
    |--------------------------------------------------------------------------
    */

    public function mulai($id)
    {
        Kegiatan::findOrFail($id)->update([
            'status' => 'berlangsung'
        ]);

        return back()->with(
            'success',
            'Kegiatan dimulai'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | SELESAIKAN KEGIATAN
    |--------------------------------------------------------------------------
    */

    public function selesai($id)
    {
        Kegiatan::findOrFail($id)->update([
            'status' => 'selesai'
        ]);

        return back()->with(
            'success',
            'Kegiatan selesai'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DITOLAK
    |--------------------------------------------------------------------------
    */

    public function ditolak($id)
    {
        Kegiatan::findOrFail($id)->update([
            'status' => 'ditolak'
        ]);

        return back()->with(
            'success',
            'Kegiatan ditolak'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | LIST ANGGARAN
    |--------------------------------------------------------------------------
    */

    public function listAnggaran($id)
    {
        $kegiatan = Kegiatan::with('anggaran')
            ->findOrFail($id);

        return view(
            'admin.kegiatan.list',
            compact('kegiatan')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DETAIL SELESAI
    |--------------------------------------------------------------------------
    */

    public function detailSelesai($id)
    {
        $kegiatan = Kegiatan::with([
            'anggaran',
            'realisasi',
            'galeri',
            'lpj',
            'evaluasi'
        ])->findOrFail($id);

        if ($kegiatan->status != 'selesai') {
            abort(403);
        }

        return view(
            'kegiatan.index',
            compact('kegiatan')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | LAPORAN KEGIATAN
    |--------------------------------------------------------------------------
    */

    public function laporan(Request $request)
    {
        $query = Kegiatan::with([
            'anggaran',
            'realisasi'
        ]);

        /*
        =========================================
        DEFAULT BULAN SEKARANG
        =========================================
        */

        $bulan = $request->bulan ?? now()->format('Y-m');

        $query->whereMonth(
            'tanggal',
            date('m', strtotime($bulan))
        )->whereYear(
            'tanggal',
            date('Y', strtotime($bulan))
        );

        /*
        =========================================
        FILTER STATUS
        =========================================
        */

        $status = $request->status ?? 'selesai';

        if ($status != 'all') {
            $query->where('status', $status);
        }

        $kegiatan = $query
            ->latest()
            ->paginate(10);

        return view(
            'laporan.kegiatan',
            compact(
                'kegiatan',
                'bulan',
                'status'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | EXPORT PDF
    |--------------------------------------------------------------------------
    */

    public function exportKegiatan(Request $request)
    {
        $bulan = $request->bulan ?? now()->format('Y-m');

        $kegiatan = Kegiatan::where('status', 'selesai')
            ->whereMonth(
                'tanggal',
                date('m', strtotime($bulan))
            )
            ->whereYear(
                'tanggal',
                date('Y', strtotime($bulan))
            )
            ->orderBy('tanggal', 'asc')
            ->get();

        $pdf = PDF::loadView(
            'laporan.kegiatan_pdf',
            [
                'kegiatan' => $kegiatan,
                'bulan' => $bulan
            ]
        )->setPaper('A4', 'portrait');

        return $pdf->download(
            'laporan-kegiatan-' . $bulan . '.pdf'
        );
    }
}
