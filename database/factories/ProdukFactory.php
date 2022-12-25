<?php

namespace Database\Factories;

use App\Models\produk;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdukFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = produk::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'id' => $this->id,
            // 'nama_barang' => $this->nama_barang,
            // 'harga_barang' => $this->jumlah_barang,
            // 'kode_barang' => $this->kode_barang,
            // 'slug_barang' => $this->slug_barang,

        ];
    }
}
