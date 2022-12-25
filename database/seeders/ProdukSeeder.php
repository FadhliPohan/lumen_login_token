<?php

namespace Database\Seeders;

use App\Models\produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $produk = Produk::factory()->create([
            'nama_barang' => 'ka',
            'kode_barang' => 'us4353com',
            'harga_barang' => 33434,
            'slug_barang' => 'jakrta'
          ]);

          $produk1 = Produk::factory()->create([
            'nama_barang' => 'dsa',
            'kode_barang' => 'use453',
            'harga_barang' => 34234,
            'slug_barang' => 'jakrczta'
          ]);

          $produk2 = Produk::factory()->create([
            'nama_barang' => 'Exagre user',
            'kode_barang' => 3423,
            'harga_barang' => 343434,
            'slug_barang' => 'jakrczxta'
          ]);

          $produk3 = Produk::factory()->create([
            'nama_barang' => 'Example user',
            'kode_barang' => 'usfas@mfascom',
            'harga_barang' => 43434,
            'slug_barang' => 'jakxzczxbvsrta'
          ]);

          $produk4 = Produk::factory()->create([
            'nama_barang' => 'Example user',
            'kode_barang' => 'user@mfasfam',
            'harga_barang' => 43434,
            'slug_barang' => 'jakrbnghfdta'
          ]);
    }
}
