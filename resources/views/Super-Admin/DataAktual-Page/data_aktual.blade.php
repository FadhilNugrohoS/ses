@extends('layout.layout-superadmin.layout')
@section('content')

@include('sweetalert::alert')
<div class="content-wrapper px-3">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Aktual</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Data Aktual</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <table class="table table-bordered table-striped table-hover">
        <thead style="text-align: center">
          <div class="d-flex flex-row-reverse px-2 py-2" >
            <a type="button" class="btn btn-primary btn-lg" href="{{ route ('data.create') }} ">Tambah</a>
          </div>
          <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Nama Barang</th>
            <th rowspan="2">Bulan</th>
            <th rowspan="2">Tahun</th>
            <th rowspan="2">Penjualan</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          ?>
            @foreach ($datas as $data )
            <tr style="text-align: center">
                <td><?= $no++?></td>
                <td>{{$data->nama_barang}}</td>
                @if ($data->bulan == '1')
                  <td>Januari</td>
                @elseif ($data->bulan == '2')
                  <td>Februari</td>
                @elseif ($data->bulan == '3')
                  <td>Maret</td>
                @elseif ($data->bulan == '4')
                  <td>April</td>
                @elseif ($data->bulan == '5')
                  <td>Mei</td>
                @elseif ($data->bulan == '6') 
                  <td>Juni</td>
                @elseif ($data->bulan == '7')
                  <td>Juli</td>
                @elseif ($data->bulan == '8')
                  <td>Agustus</td>
                @elseif ($data->bulan == '9')
                  <td>September</td>
                @elseif ($data->bulan == '10')
                  <td>Oktober</td>
                @elseif ($data->bulan == '11') 
                  <td>November</td>
                @elseif ($data->bulan == '12')
                  <td>Desember</td>
                @endif
                <td>{{$data->tahun}}</td>
                <td>{{$data->penjualan}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
      {{$datas->links()}}
@endsection