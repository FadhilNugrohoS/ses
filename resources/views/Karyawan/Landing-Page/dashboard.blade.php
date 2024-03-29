@extends('layout.layout-karyawan.layout')
@section('content')
    <div class="content-wrapper px-3">
        <!-- Content Header (Page header) -->
        <h1 class="text-center ml-3"><strong>SELAMAT DATANG</strong></h1>
        <h2 class="text-center ml-3">Sistem Peramalan Penjualan Pada Distributor</h2>
        <h2 class="text-center ml-3">Makanan CV.Wahyu Utama Abadi</h2>
        <h2 class="text-center ml-3 mb-5" style="font-size: 20px">Jl.Raya Tumapel Barat No. 14 Singosari Malang</h2>
        <div class="row">
            <div class="col-lg-6 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $barangs }}</h3>

                        <p>Barang</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $pemesanans }}</h3>

                        <p>Pemesanan</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-university"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            {{-- <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>44</h3>

            <p>User Registrations</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-plus"></i>
          </div>
          <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div> --}}
            <!-- ./col -->
            {{-- <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>65</h3>

            <p>Unique Visitors</p>
          </div>
          <div class="icon">
            <i class="fas fa-chart-pie"></i>
          </div>
          <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div> --}}
            <!-- ./col -->
        </div>
        <!-- /.row -->
    @endsection
