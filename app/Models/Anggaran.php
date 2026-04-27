<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    protected $table = 'anggaran';

    protected $fillable = [
        'kegiatan_id','nama_item','qty','harga','total'
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
