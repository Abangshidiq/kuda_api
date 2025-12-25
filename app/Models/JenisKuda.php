<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisKuda extends Model
{
    use HasFactory;

    protected $table = 'jeniskuda';
    protected $fillable = ['jenis'];

    public function datakuda()
    {
        return $this->hasMany(DataKuda::class, 'jeniskuda_id');
    }
}
