@extends('layout.layout-karyawan.layout')
@section('content')

@include('sweetalert::alert')
<div class="content-wrapper px-3">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Barang</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data Barang</a></li>
            <li class="breadcrumb-item active">Data Barang</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
    <div class="container-fluid">
      <div class="row">
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Tambah Barang </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('barang.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Barang</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Barang" name="nama_barang">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Satuan</label>
              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Satuan" name="satuan">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Harga</label>
              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Harga" name="harga">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Stok</label>
              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Stok Barang" name="stok">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Penjualan</label>
              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Penjualan" name="penjualan">
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
      </div>
    </div>
  <!-- /.card -->
@endsection