<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
	use HasFactory;

	protected $table = 'barang';

	protected $fillable = ['kd_barang', 'kd_supplier', 'nama', 'kd_kategori', 'harga_beli', 'harga_jual', 'diskon', 'stok'];

	public function kategori()
	{
		return $this->belongsTo(Kategori::class, 'kd_kategori');

	}
    public function supplier()
	{
		return $this->belongsTo(Supplier::class, 'kd_supplier');

	}
}
