<?php

namespace App\Http\Controllers\Atasan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Peramalan,
    Barang,
    DataAktual,
    HasilPeramalan
};
use Alert;
use Carbon\Carbon;

class PeramalanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('Super-Admin.Peramalan-Page.Peramalan',compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $peramalans = Peramalan::all()->toArray();
        for ($i = 0; $i < 3; $i++) {
            $hasil_peramalans = new HasilPeramalan;
            $hasil_peramalans->nama_barang = $peramalans[$i]['nama_barang'];
            $hasil_peramalans->bulan = $peramalans[$i]['bulan'];
            $hasil_peramalans->hasil_peramalan = $peramalans[$i]['hasil_peramalan'];
            $hasil_peramalans->mape = $peramalans[$i]['mape'];
            $hasil_peramalans->tahun = $peramalans[$i]['tahun'];
            $hasil_peramalans->save();
        }
        return redirect()->route('peramalan.result');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
    public function result()
    {
        $hasil_peramalans = HasilPeramalan::all();
        return view('Super-Admin.Peramalan-Page.hasil',compact('hasil_peramalans'));
    }

    public function proses(Request $request)
    {
        $barangs = Barang::all();
        $nama_barang = $request->nama_barang;
        $tahun = $request->tahun;
        $data = DataAktual::where('nama_barang',$request->nama_barang)->get();
        $data_bulan = $data->pluck('bulan')->toArray();
        $bulan = array();
        for($i=0; $i < count($data_bulan); $i++){
            $bulan[$i] = date('F', mktime(0, 0, 0, $data_bulan[$i]));
        };
        
        //penambahan bulan
        $jumlah_data = count($data);
        $tambah_bulan = $data[$jumlah_data-1]->bulan+1;
        $bulan_sekarang = array();
        for($i=0; $i < 3; $i++){
            $bulan_sekarang[$i] = date('F', mktime(0, 0, 0, $tambah_bulan));
            $tambah_bulan++;
        };

        //single exponential smoothing

        $alpha = $request->alpha;
        if ($alpha >= 1)
        {
            Alert::error('Alpha tidak boleh lebih dari 0.9', 'Masukkan nilai alpha seperti contoh');
            return redirect()->route('peramalan.index');
        }
        elseif($alpha <=0)
        {
            Alert::error('Alpha tidak boleh 0', 'Masukkan nilai alpha seperti contoh');
            return redirect()->route('peramalan.index');
        }
        else
        {
            $result = array();
            $result[0] = $data[0]->penjualan;
            $result[1] = $result[0];
            for ($i = 2; $i < count($data)+1; $i++) {
                $result[$i] = $result[$i - 1] + $alpha * ($data[$i-1]->penjualan - $result[$i - 1]);
            };
            
            //single exponential 3 bulan kedepan
            $hasil_peramalan = end($result);

            //mad
            $aktual = $data->pluck('penjualan')->toArray();
            $mad = array();
            $mad[0] = 0;
            for ($i = 1; $i < count($aktual); $i++) {
                $mad[$i] = abs($aktual[$i] - $result[$i]);
            }

            //mse
            $aktual = $data->pluck('penjualan')->toArray();
            $mse = array();
            $mse[0] = 0;
            for ($i = 1; $i < count($aktual); $i++) {
                $mse[$i] = pow(($aktual[$i] - $result[$i]),2);
            }
            
            //mape
            $aktual = $data->pluck('penjualan')->toArray();
            $mape = array();
            $mape[0] = 0;
            for ($i = 1; $i < count($aktual); $i++) {
                $mape[$i] =((abs($aktual[$i] - $result[$i])/$aktual[$i])*100) ;
            }
            $sum_mape = array_sum($mape)/count($aktual);
            //peramalan 3 bulan kedepan
            $hasil = array();
            $hasil[0] = $hasil_peramalan;
            for ($i = 1; $i < count($bulan_sekarang); $i++) {
                $hasil[$i] = $hasil[$i - 1] + $alpha * ($data[$i]->penjualan - $hasil[$i - 1]);
            };
            

            // mape peramalan 3 bulan kedepan
            $mape_3_bulan = array();
            $mape_3_bulan[0] = $sum_mape;
            for ($i = 1; $i < count($hasil); $i++) {
                $mape_3_bulan[$i] =((abs($hasil[$i] - $result[$i])/$hasil[$i])*100) ;
            }
            $sum_mape_3_bulan = array_sum($mape_3_bulan)/count($hasil);
            dd($mape_3_bulan);

            
            Peramalan::truncate();
            
            for ($i = 0; $i < count($hasil); $i++) {
                $peramalans = new Peramalan;
                $peramalans->nama_barang = $request->nama_barang;
                $peramalans->bulan = $bulan_sekarang[$i];
                $peramalans->hasil_peramalan = $hasil[$i];
                $peramalans->mape = $mape_3_bulan[$i];
                $peramalans->tahun = $request->tahun;
                $peramalans->save();
            }
        }

        return view('Super-Admin.Peramalan-Page.Peramalan',
        compact('nama_barang','data','bulan','barangs','result','mape',
        'mad','mse','sum_mape','hasil_peramalan','bulan_sekarang','hasil','sum_mape_3_bulan','tahun'));
    }
}
