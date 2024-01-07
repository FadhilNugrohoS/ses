@extends('layout.layout-superadmin.layout')
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
    <table class="table table-bordered table-striped table-hover">
        <thead style="text-align: center">
          <div class="d-flex flex-row-reverse px-2 py-2" >
            <a type="button" class="btn btn-primary btn-lg" href="{{ route ('barangs.create') }} ">Tambah</a>
          </div>
          <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Nama Barang</th>
            <th rowspan="2">Satuan</th>
            <th rowspan="2">Harga</th>
            <th rowspan="2">Stok</th>
            <th rowspan="2">Penjualan</th>
            <th rowspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          ?>
            @foreach ($barangs as $barang )
            <tr style="text-align: center">
                <td><?= $no++?></td>
                <td>{{$barang->nama_barang}}</td>
                <td>{{$barang->satuan}}</td>
                <td>Rp. @idr ($barang->harga)</td>
                <td>
                    @if ($barang->stok == 0)
                        <span class="badge bg-danger">Belum Tersedia</span>
                    @else
                        {{$barang->stok}}
                    @endif
                </td>
                <td>
                    @if ($barang->penjualan == 0)
                        <span class="badge bg-danger">Belum Tersedia</span>
                    @else
                        {{$barang->penjualan}}
                    @endif
                </td>
                <td>
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('barangs.destroy', $barang->id) }}" method="POST">
                        <a href="{{ route('barangs.edit', $barang->id) }}"
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
    {{$barangs->links()}}
@endsection