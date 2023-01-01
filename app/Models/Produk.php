<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    public $table = 'produk';

    protected $fillable = [
        'nama_barang', 'harga_barang', 'kode_barang', 'slug_barang'
    ];

  
}
