<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProdukResource;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = produk::latest();
        return ProdukResource::collection($produk->paginate(10));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $request);

        if ($validator->fails()) {
            return response()->validation($validator->messages());
        } else {
            $produk = produk::create([
                'nama_barang' => $request->nama_barang,
                'jumlah_barang' => $request->jumlah_barang,
                'kode_barang' => $request->kode_barang,
                'slug_barang' => $request->slug_barang,
            ]);

            return response()->success(
                'Produk Berhasil ditambahkan',
                new ProdukResource($produk)
            );
        }
    }


    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return response()->success('true', new ProdukResource($produk));
        // return response()->json($produk);
    }


    public function update(Request $request, produk $produk)
    {
        //
    }


    public function destroy(produk $produk)
    {
        //
    }
}
