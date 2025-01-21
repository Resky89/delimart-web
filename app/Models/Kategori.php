<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'kd_kategori';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['kd_kategori', 'nama_kategori'];

    public function barang()
    {
        return $this->hasMany(Barang::class, 'kd_kategori');
    }
}

