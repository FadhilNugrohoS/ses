<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Barang;
use Alert;
use DB;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanans = Pemesanan::paginate(10);
        return view('Karyawan.Pemesanan-Page.Pemesanan',compact('pesanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = Barang::where('stok','>',0)->get();
        return view('Karyawan.Pemesanan-Page.create',compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pesanans=Pemesanan::create([
            'nama_pemesan'=>$request->nama_pemesan,
            'alamat'=>$request->alamat,
            'nohp'=>$request->nohp,
            'nama_barang'=>$request->nama_barang,
            'id_barang'=>$request->id,
            'satuan' =>$request->satuan,
            'harga' =>$request->harga,
            'jumlah' =>$request->jumlah,
            'total' =>$request->total,
            'status'=> 0
        ]);
        if($pesanans){
            Alert::success('Pesanan Berhasil Ditambahkan','Success');
            return redirect()->route('pemesanan.index');
        }
        else{
            Alert::error('Pesanan Gagal Ditambahkan','Error');
            return redirect()->route('pemesanan.index');
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
        $barangs = Barang::where('stok','>',0)->get();
        $pesanans = Pemesanan::find($id);
        return view('Karyawan.Pemesanan-Page.edit',compact('pesanans','barangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pesanans = Pemesanan::find($id);
        $pesanans->update(
            [
                'nama_pemesan'=>$request->nama_pemesan,
                'alamat'=>$request->alamat,
                'nohp'=>$request->nohp,
                'nama_barang'=>$request->nama_barang,
                'id_barang'=>$request->id_barang,
                'satuan' =>$request->satuan,
                'harga' =>$request->harga,
                'jumlah' =>$request->jumlah,
                'total' =>$request->total,
                'status'=> 0
            ]
        );
        if($pesanans){
            Alert::success('Pesanan Berhasil Diubah','Success');
            return redirect()->route('pemesanan.index');
        }
        else{
            Alert::error('Pesanan Gagal Diubah','Error');
            return redirect()->route('pemesanan.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pesanans = Pemesanan::find($id);
        if($pesanans->delete()){
            Alert::success('Berhasil Dihapus','Success');
            return redirect()->route('pemesanan.index');
        }
        else{
            Alert::error('Gagal Dihapus','Error');
            return redirect()->route('pemesanan.index');
        }
    }

    public function proses($id)
    {
        $pesanans = Pemesanan::find($id);
        $pesanans->status = 1;
        $pesanans->save();

        $barangs = Barang::find($pesanans->id_barang);
        $barangs->stok=$barangs->stok - $pesanans->jumlah;
        $barangs->penjualan = $barangs->penjualan + $pesanans->jumlah;
        $barangs->save();
        if($pesanans){
            Alert::success('Pesanan Berhasil Diverifikasi','Success');
            return redirect()->route('pemesanan.index');
        }
        else{
            Alert::error('Pesanan Gagal Diverifikasi','Error');
            return redirect()->route('pemesanan.index');
        }

    }

    // Ajax for table Nama Barang
    function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('barangs')
                ->where($select, $value)
                ->groupBy($dependent)
                ->get();
        foreach ($data as $row){
            $output = '<option value="' . $row->$dependent . '"name="nama_barang" selected>' . ucfirst($row->$dependent) . '</option>';
        }
        echo $output;
    }

    // Ajax for satuan
    function fetch1(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic = $request->get('dynamic');
        $data = DB::table('barangs')
            ->where($select, $value)
            ->groupBy($dynamic)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic . '" name="satuan" selected>' . ucfirst($row->$dynamic) . '</option>';
        }
        echo $output;
    }

    // Ajax for Harga
    function fetch2(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic1 = $request->get('dynamic1');
        $data = DB::table('barangs')
            ->where($select, $value)
            ->groupBy($dynamic1)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic1 . '" name="harga" selected>' . ucfirst($row->$dynamic1) . '</option>';
        }
        echo $output;
    }
}
