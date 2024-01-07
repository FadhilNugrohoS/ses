<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::create([
            'nama_barang' => 'YOUKA ROLL (1X36X20)',
            'satuan' => 'Pack',
            'harga' => '8500',
            'stok' => '100',
            'penjualan' => '0'
        ]);
        Barang::create([
            'nama_barang' => 'PIDI JELLY BUBBLE GUM (1X24X30)',
            'satuan' => 'Kardus',
            'harga' => '289500',
            'stok' => '50',
            'penjualan' => '0'
        ]);
        Barang::create([
            'nama_barang' => 'JELLY G. BEAN (1X24X30)',
            'satuan' => 'Kardus',
            'harga' => '12150',
            'stok' => '50',
            'penjualan' => '0'
        ]);
        Barang::create([
            'nama_barang' => 'MODI MUSHROOM (1X15X24)',
            'satuan' => 'Kardus',
            'harga' => '291600',
            'stok' => '20',
            'penjualan' => '0'
        ]);
        Barang::create([
            'nama_barang' => 'MARS. SPR MINI CHALK (1X36X20)',
            'satuan' => 'Kardus',
            'harga' => '289000',
            'stok' => '30',
            'penjualan' => '0'
        ]);
        Barang::create([
            'nama_barang' => 'MARSHMALLOW ANEKA RASA (1X36X20)',
            'satuan' => 'Kardus',
            'harga' => '289000',
            'stok' => '30',
            'penjualan' => '0'
        ]);
        Barang::create([
            'nama_barang' => 'JELLY SEDOT KATO 100ML (1X10X10)',
            'satuan' => 'Kardus',
            'harga' => '85000',
            'stok' => '25',
            'penjualan' => '0'
        ]);
        Barang::create([
            'nama_barang' => 'MINI PIZZA (1X24X30)',
            'satuan' => 'Pack',
            'harga' => '12150',
            'stok' => '25',
            'penjualan' => '0'
        ]);
        Barang::create([
            'nama_barang' => 'MARSHMALLOW KEPANG (1X36X20)',
            'satuan' => 'Kardus',
            'harga' => '291600',
            'stok' => '0',
            'penjualan' => '0'
        ]);
        Barang::create([
            'nama_barang' => 'MARSHMALLOW SWEET HEART LOVE (1X36X20)',
            'satuan' => 'Kardus',
            'harga' => '291600',
            'stok' => '0',
            'penjualan' => '0'
        ]);
        Barang::create([
            'nama_barang' => 'ROSE CREAM LEMON (1X10)(1X60)',
            'satuan' => 'Kardus',
            'harga' => '63000',
            'stok' => '0',
            'penjualan' => '0'
        ]);
        Barang::create([
            'nama_barang' => 'ROSE CREAM COKLAT (1X10)',
            'satuan' => 'Kardus',
            'harga' => '63000',
            'stok' => '0',
            'penjualan' => '0'
        ]);
        Barang::create([
            'nama_barang' => 'JAGER (1X6X10)',
            'satuan' => 'Kardus',
            'harga' => '96000',
            'stok' => '0',
            'penjualan' => '0'
        ]);
        Barang::create([
            'nama_barang' => 'SUTEKI WAFER COKLAT',
            'satuan' => 'Kardus',
            'harga' => '143000',
            'stok' => '0',
            'penjualan' => '0'
        ]);
        Barang::create([
            'nama_barang' => 'SUTEKI WAFER PANDAN',
            'satuan' => 'Kardus',
            'harga' => '143000',
            'stok' => '0',
            'penjualan' => '0'
        ]);
        Barang::create([
            'nama_barang' => 'SUTEKI WAFER STROBERI',
            'satuan' => 'Kardus',
            'harga' => '143000',
            'stok' => '0',
            'penjualan' => '0'
        ]);
        Barang::create([
            'nama_barang' => 'ROTI PANGGANG AOKA MIX (1X60)',
            'satuan' => 'Kardus',
            'harga' => '102000',
            'stok' => '0',
            'penjualan' => '0'
        ]);
        Barang::create([
            'nama_barang' => 'RIA WAFER COKLAT (1X10)',
            'satuan' => 'Kardus',
            'harga' => '87000',
            'stok' => '25',
            'penjualan' => '0'
        ]);
        Barang::create([
            'nama_barang' => 'RIA WAFER TUTTI FRUTTI (1X10)',
            'satuan' => 'Kardus',
            'harga' => '87000',
            'stok' => '25',
            'penjualan' => '0'
        ]);
        Barang::create([
            'nama_barang' => 'BISKUIT RASA KLEPON (1X3X10)',
            'satuan' => 'Kardus',
            'harga' => '46500',
            'stok' => '25',
            'penjualan' => '0'
        ]);

    }
}
