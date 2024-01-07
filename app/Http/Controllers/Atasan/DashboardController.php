<?php

namespace App\Http\Controllers\Atasan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Barang,
    Pemesanan,
    DataAktual
};

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all()->count();
        $pemesanans = Pemesanan::all()->count();
        $penjualan = DataAktual::all();
        $tahun = $penjualan->pluck('tahun')->unique();
        $bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        $januari = $penjualan->where('bulan',1)->pluck('penjualan')->sum();
        $februari = $penjualan->where('bulan',2)->pluck('penjualan')->sum();
        $maret = $penjualan->where('bulan',3)->pluck('penjualan')->sum();
        $april = $penjualan->where('bulan',4)->pluck('penjualan')->sum();
        $mei = $penjualan->where('bulan',5)->pluck('penjualan')->sum();
        $juni = $penjualan->where('bulan',6)->pluck('penjualan')->sum();
        $juli = $penjualan->where('bulan',7)->pluck('penjualan')->sum();
        $agustus = $penjualan->where('bulan',8)->pluck('penjualan')->sum();
        $september = $penjualan->where('bulan',9)->pluck('penjualan')->sum();
        $oktober = $penjualan->where('bulan',10)->pluck('penjualan')->sum();
        $november = $penjualan->where('bulan',11)->pluck('penjualan')->sum();
        $desember = $penjualan->where('bulan',12)->pluck('penjualan')->sum();
        return view('Super-Admin.Landing-Page.dashboard',compact('barangs','pemesanans','bulan','januari','februari','maret',
        'april','mei','juni','juli','agustus','september','oktober',
        'november','desember','tahun'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
}
