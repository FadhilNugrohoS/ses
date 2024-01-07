@extends('layout.layout-superadmin.layout')
@section('content')

@include('sweetalert::alert')
<div class="content-wrapper px-3">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Hasil Perhitungan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Hasil Perhitungan</a></li>
              <li class="breadcrumb-item active">Hasil Perhitungan</li>
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
            <th rowspan="2">Forecast</th>
            <th rowspan="2">MAD</th>
            <th rowspan="2">MSE</th>
            <th rowspan="2">MAPE</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $i = 0;
          ?>
            @foreach ($result as $res )
              <tr style="text-align: left">
                  <td><?= $no++?></td>
                  <td>{{$res}}</td>
              </tr>
            @endforeach
        </tbody>
    </table>
@endsection