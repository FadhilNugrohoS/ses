<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use Alert;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::paginate(10);
        return view('Karyawan.Barang-Page.barang',compact('barangs'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Karyawan.Barang-Page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $barangs=Barang::create([
            'nama_barang'=>$request->nama_barang,
            'satuan' =>$request->satuan,
            'harga' =>$request->harga,
            'stok' =>$request->stok,
            'penjualan' =>$request->penjualan
        ]);
        if($barangs){
            Alert::success('Berhasil Menambahkan',$barangs->nama_barang,'Selamat');
            return redirect()->route('barang.index');
        }
        else{
            Alert::error('Gagal Menambahkan',$barangs->nama_barang,'Coba Lagi');
            return redirect()->route('barang.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barangs = Barang::find($id);
        return view('Karyawan.Barang-Page.edit',compact('barangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barangs = Barang::find($id);
        $barangs->update($request->all());
        if($barangs){
            Alert::success($barangs->nama_barang,'Berhasil Diubah','Selamat');
            return redirect()->route('barang.index');
        }
        else{
            Alert::error($barangs->nama_barang,'Gagal Diubah','Coba Lagi');
            return redirect()->route('barang.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barangs = Barang::find($id);
        if($barangs->delete())
        {
            Alert::success($barangs->nama_barang,'Berhasil Dihapus', 'Success');
            return redirect()->route('barang.index');
        }
        else{
            Alert::error($barangs->nama_barang,'Gagal Dihapus','Coba Lagi');
            return redirect()->route('barang.index');
        }
    }
}
