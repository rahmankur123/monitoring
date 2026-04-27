<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lpj extends Model
{
    protected $table = 'lpj';

    protected $fillable = [
        'kegiatan_id','file','uploaded_by'
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}