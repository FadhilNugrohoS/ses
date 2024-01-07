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
    <table class="table table-bordered table-striped table-hover">
        <thead style="text-align: center">
          <div class="d-flex flex-row-reverse px-2 py-2" >
            <a type="button" class="btn btn-primary btn-lg" href="{{ route ('user.create') }} ">Tambah</a>
          </div>
          <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Email</th>
            <th rowspan="2">Username</th>
            <th rowspan="2">Role</th>
            <th rowspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          ?>
            @foreach ($users as $us )
            <tr style="text-align: center">
                <td><?= $no++?></td>
                <td>{{$us->email}}</td>
                <td>{{$us->username}}</td>
                <td>
                  @if($us->role == 1)
                    <span class="">Atasan</span>
                  @else
                      Karyawan
                  @endif
                </td>
                <td>
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('user.destroy', $us->id) }}" method="POST">
                        <a href="{{ route('user.edit', $us->id) }}"
                            class="btn btn-sm btn-info"><i class="fa-solid fa-pencil"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection