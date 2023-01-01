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
        if (!$produk) {
            return response()->validation('Produk tidak temukan');
        }
        return ProdukResource::collection($produk->paginate(10));

        // $produk = produk::latest();
        // return response()->success('Data Berhasil Diambil', ProdukResource::collection($produk->paginate(10)));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [$request]);

        if ($validator->fails()) {
            return response()->validation($validator->messages());
        } else {
            $produk = produk::create([
                'nama_barang' => $request->nama_barang,
                'harga_barang' => $request->harga_barang,
                'kode_barang' => $request->kode_barang,
                'slug_barang' => $request->slug_barang,
            ]);

            if ($produk) {
                return response()->success(
                    'Produk Berhasil ditambahkan',
                    new ProdukResource($produk)
                );
            } else {
                return response()->error(
                    'Gagal Ditambahkan',
                    new ProdukResource($produk)
                );
            }
        }
    }


    public function show($id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            return response()->validation(
                'Produk Tidak ditemukan',

            );
        } else {
            return response()->success('true', new ProdukResource($produk));
        }


        // return response()->json($produk);
    }


    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            return response()->validation(
                'Produk Tidak ditemukan',

            );
        }
        $validator = Validator::make($request->all(), [$request]);

        if ($validator->fails()) {
            return response()->validation($validator->messages());
        } else {

            $data = $request->all();
            $produk->fill($data);
            $produk->save();
            // $produk = produk::update([
            //     'nama_barang' => $request->nama_barang,
            //     'harga_barang' => $request->harga_barang,
            //     'kode_barang' => $request->kode_barang,
            //     'slug_barang' => $request->slug_barang,
            // ]);

            return response()->success(
                'Produk Berhasil Diubah',
                new ProdukResource($produk)
            );
        }
    }


    public function destroy($id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            return response()->validation('Produk Tidak Ditemukan');
        }

        $oldproduk = $produk;
        return response()->success(
            'Product Berhasil Dihapus',
            new ProdukResource($oldproduk)
        );
    }
}
