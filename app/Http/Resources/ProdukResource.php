<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdukResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_barang' => $this->nama_barang,
            'jumlah_barang' => $this->jumlah_barang,
            'kode_barang' => $this->kode_barang,
            'slug_barang' => $this->slug_barang,
        ];
    }
}
