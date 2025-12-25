<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKuda extends Model
{
    use HasFactory;

    protected $table = 'datakuda';

    protected $fillable = [
        'jeniskuda_id',
        'nama',
        'berat',
        'tahunlahir',
        'gambar'
    ];

    protected $appends = ['gambar_url'];

    public function jenis()
    {
        return $this->belongsTo(JenisKuda::class, 'jeniskuda_id');
    }

    public function getGambarUrlAttribute()
    {
        return $this->gambar
            ? asset('storage/' . $this->gambar)
            : null;
    }
}
