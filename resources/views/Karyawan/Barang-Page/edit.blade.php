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
          <h3 class="card-title">Edit Barang </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('barang.update',$barangs->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Barang</label>
              <input type="text" class="form-control" value="{{$barangs->nama_barang}}" name="nama_barang">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Satuan</label>
              <input type="text" class="form-control" value="{{$barangs->satuan}}" name="satuan">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Harga</label>
              <input type="text" class="form-control" value="{{$barangs->harga}}" name="harga">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Stok</label>
              <input type="text" class="form-control" value="{{$barangs->stok}}" name="stok">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Penjualan</label>
              <input type="text" class="form-control" value="{{$barangs->penjualan}}" name="penjualan">
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