@extends('layout.layout-superadmin.layout')
@section('content')

@include('sweetalert::alert')
<div class="content-wrapper px-3">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data User</a></li>
            <li class="breadcrumb-item active">Data User</li>
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
          <h3 class="card-title">Tambah User </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama User</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama User" name="name">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Email</label>
              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Email" name="email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Username</label>
              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Username" name="username">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password" name="password">
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