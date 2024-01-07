@extends('layout.layout-superadmin.layout')
@section('content')

@include('sweetalert::alert')
<div class="content-wrapper px-3">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pemesanan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Data Pemesanan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <table class="table table-bordered table-striped table-hover">
        <thead style="text-align: center">
            <div class="d-flex flex-row-reverse px-2 py-2" >
                <a type="button" class="btn btn-primary btn-lg" href="{{ route ('pemesanans.create') }} ">Tambah</a>
            </div>
          <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Nama Pemesan</th>
            <th rowspan="2">Alamat</th>
            <th rowspan="2">No.Telfon</th>
            <th rowspan="2">Nama Barang</th>
            <th rowspan="2">Satuan</th>
            <th rowspan="2">Harga</th>
            <th rowspan="2">Jumlah</th>
            <th rowspan="2">Total</th>
            <th colspan="2">Status Pembayaran</th>
            <th rowspan="2">Action</th>
          </tr>
          <tr>
              <th rowspan="2">Pembayaran</th>
              <th rowspan="2">Validasi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          ?>
            @foreach ($pesanans as $pesan )
            <tr style="text-align: center">
                <td><?= $no++?></td>
                <td>{{$pesan->nama_pemesan}}</td>
                <td>{{$pesan->alamat}}</td>
                <td>{{$pesan->nohp}}</td>
                <td>{{$pesan->nama_barang}}</td>
                <td>{{$pesan->satuan}}</td>
                <td>Rp. @idr ($pesan->harga)</td>
                <td>{{$pesan->jumlah}}</td>
                <td>Rp. @idr($pesan->total)</td>
                <td>
                    @if ($pesan->status == 0)
                        <span class="badge bg-danger">Belum Terverifikasi</span>
                    @elseif ($pesan->status == 1)
                        <span class="badge bg-success">Terverifikasi</span>
                    @endif
                </td>
                <td>
                    @if($pesan->status == 0)
                      <a href="{{route('pemesanans.proses',$pesan->id)}}"><button button type="submit" class="btn btn-sm btn-primary">Verifikasi</button></a>
                    @elseif($pesan->status == 1)
                    <button type="submit" class="btn btn-sm btn-success" disabled><i class="fa fa-check" aria-hidden="true"></i></button>
                    @endif
                </td>
                <td>
                  @if($pesan->status == 0)
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('pemesanans.destroy', $pesan->id) }}" method="POST">
                        <a href="{{ route('pemesanans.edit', $pesan->id) }}"
                            class="btn btn-sm btn-info"><i class="fa-solid fa-pencil"></i></a>
                        @csrf
                    </form>
                  @elseif($pesan->status == 1)
                      <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                          <a href="{{ route('pemesanans.edit', $pesan->id) }}">
                            <button type="submit" class="btn btn-sm btn-info" disabled><i class="fa-solid fa-pencil">
                            </i></button></a>
                          @csrf
                      </form>
                   @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$pesanans->links()}}
@endsection