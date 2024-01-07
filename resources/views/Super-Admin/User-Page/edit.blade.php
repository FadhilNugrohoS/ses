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
          <h3 class="card-title">Edit User </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('user.update',$users->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                          <input type="text" class="form-control" id="email" value="{{$users->email}}" name="email" required>
                      </div>
                      <div class="form-group">
                        <label for="username">Username</label>
                          <input type="text" class="form-control" id="username" value="{{$users->username}}" name="username" required>
                      </div>
                      <div class="form-group">
                        <label for="role">Role</label>
                          <input type="text" class="form-control" id="role" value="{{$users->role}}" name="role" required readonly>
                      </div>
                      <div class="form-group">
                        <label for="password">Password </label>
                          <input type="text" class="form-control" id="password" value="{{$users->password}}" name="password" required>
                      </div>
                </div>
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
@endsection