<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';

    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal',
        'status',
        'created_by',
        'catatan_takmir',
        'validated_by',
        'validated_at',
        'revisi_ke',
        'last_submitted_at'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI
    |--------------------------------------------------------------------------
    */

    // pembuat kegiatan (admin)
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // yang validasi (takmir)
    public function validator()
    {
        return $this->belongsTo(User::class, 'validated_by');
    }

    public function anggaran()
    {
        return $this->hasMany(Anggaran::class);
    }

    public function realisasi()
    {
        return $this->hasMany(RealisasiAnggaran::class);
    }

    public function evaluasi()
    {
        return $this->hasMany(Evaluasi::class);
    }

    public function galeri()
    {
        return $this->hasMany(Galeri::class);
    }

    public function lpj()
    {
        return $this->hasOne(Lpj::class);
    }

    public function logValidasi()
    {
        return $this->hasMany(LogValidasi::class);
    }
    public function validasi()
    {
        return $this->hasOne(Validasi::class);
    }
}