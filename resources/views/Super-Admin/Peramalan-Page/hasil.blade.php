@extends('layout.layout-superadmin.layout')
@section('content')

@include('sweetalert::alert')
<div class="content-wrapper px-3">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Hasil Peramalan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Hasil Peramalan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
    <table class="table table-bordered table-striped table-hover">
        <thead style="text-align: center">
            <div class="d-flex flex-row-reverse px-2 py-2" >
                
            </div>
          <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Nama Barang</th>
            <th rowspan="2">Bulan</th>
            <th rowspan="2">Tahun</th>
            <th rowspan="2">Hasil Peramalan</th>
            <th rowspan="2">MAPE</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          ?>
            @foreach ($hasil_peramalans as $hasil )
            <tr style="text-align: center">
                <td><?= $no++?></td>
                <td>{{$hasil->nama_barang}}</td>
                <td>{{$hasil->bulan}}</td>
                <td>{{$hasil->tahun}}</td>
                <td>{{number_format($hasil->hasil_peramalan,0)}}</td>
                <td>{{number_format($hasil->mape)}}%</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="warning-box bg-gradient-warning" style="opacity: 80%">
    
      <div class="warning-box-content">
        <div class="p-3" style="font-size: 18px">
          <strong> Mape</strong> <br>
          Merupakan nilai kesalahan prediksi yang dihitung dengan cara membandingkan nilai aktual dengan nilai peramalan. <br>
          <strong>< 10% : Sangat Baik </strong><br>
          <strong>10% - 20% : Baik </strong><br>
          <strong>20% - 50% : Cukup </strong><br>
          <strong> > 50% : Buruk </strong>
        </div>
      </div>
    </div>
@endsection