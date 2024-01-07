<?php

namespace App\Http\Controllers\Atasan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\{
    DataAktual,
    Barang,
    Pemesanan
};
use Alert;

class DataAktualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = DataAktual::paginate(20);
        return view('Super-Admin.DataAktual-Page.data_aktual',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = Barang::all();
        return view('Super-Admin.DataAktual-Page.create',compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Pemesanans = Pemesanan::find($request->id);
        $tanggal = $request->tahun.'-'.$request->bulan;
        $hitung_penjualan = Pemesanan::where('nama_barang',$request->nama_barang)->where('status',1)->whereMonth('created_at',$request->bulan)->whereYear('created_at',$request->tahun)->sum('jumlah');
        if($hitung_penjualan == null)
        {
            Alert::error('Data Penjualan Tidak Ditemukan','Error');
            return redirect()->route('data.index');
        }
        else if($datas = DataAktual::where('nama_barang',$request->nama_barang)->where('bulan',$request->bulan)->where('tahun',$request->tahun)->first())
        {
            Alert::error('Data Penjualan Sudah Ada','Silahkan Cek Kembali','Error');
            return redirect()->route('data.index');
        }
        else
        {
            $datas = DataAktual::create([
                'nama_barang' => $request->nama_barang,
                'bulan' => $request->bulan,
                'tahun' => $request->tahun,
                'penjualan' => $hitung_penjualan,
            ]);
            Alert::success('Data Berhasil Ditambahkan','Success');
            return redirect()->route('data.index');
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
        return view('Super-Admin.DataAktual-Page.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datas = DataAktual::find($id);
        $datas->update([
            'bulan' => Carbon::now('Asia/Jakarta')->format('m'),
            'tahun' => Carbon::now('Asia/Jakarta')->format('Y'),
            'penjualan' => $request->penjualan,
        ]);
        return redirect()->route('data-aktual.index')->with('success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $datas = DataAktual::find($id);
        $datas->delete();
    }

    // Ajax for table Nama Barang
    public function barang(Request $request)
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

    function fetch1(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic = $request->get('dynamic');
        $data = DB::table('pemesanans')
            ->where($select, $value)
            ->groupBy($dynamic)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic . '" name="jumlah" selected>' . ucfirst($row->$dynamic) . '</option>';
        }
        echo $output;
    }
}
