<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogValidasi extends Model
{
    protected $table = 'log_validasi';

    protected $fillable = [
        'kegiatan_id','status','catatan','oleh'
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'oleh');
    }
}