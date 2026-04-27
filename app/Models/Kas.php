<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    protected $table = 'kas';

    protected $fillable = [
        'tanggal',
        'keterangan',
        'tipe',        // masuk / keluar
        'jumlah',
        'created_by',
        'kegiatan_id'  // nullable (kalau dari realisasi)
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI
    |--------------------------------------------------------------------------
    */

    // yang input kas
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // relasi ke kegiatan (opsional)
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    /*
    |--------------------------------------------------------------------------
    | HELPER (BIAR CLEAN)
    |--------------------------------------------------------------------------
    */

    // total kas masuk
    public static function totalMasuk()
    {
        return self::where('tipe', 'masuk')->sum('jumlah');
    }

    // total kas keluar
    public static function totalKeluar()
    {
        return self::where('tipe', 'keluar')->sum('jumlah');
    }

    // saldo
    public static function saldo()
    {
        return self::totalMasuk() - self::totalKeluar();
    }
}