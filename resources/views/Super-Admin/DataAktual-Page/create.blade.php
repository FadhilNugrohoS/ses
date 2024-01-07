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
            <li class="breadcrumb-item"><a href="#">Data Aktual</a></li>
            <li class="breadcrumb-item active">Data Aktual</li>
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
          <h3 class="card-title">Tambah Data Aktual </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('data.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
                <label for="id">Pilih Barang</label>
                <select name="nama_barang" id="id" class="form-control input-lg dynamic" data-dependent="nama_barang" data-dynamic="jumlah">
                    <option disabled selected> --- Pilih Barang --- </option>
                    @foreach ($barangs as $barang)
                        <option value="{{$barang->nama_barang}}">{{$barang->nama_barang}}</option>
                    @endforeach
                </select>
            </div>
            {{-- <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                  <select type="text" class="form-control" id="nama_barang" placeholder="" name="nama_barang" readonly="readonly" style ="appearance: none; -webkitappearance:none; -moz-appearance: none;">
                  </select>
              </div> --}}
            <div class="form-group">
              <label for="id">Pilih Bulan</label>
              <select name="bulan"class="form-control input-lg dynamic">
                  <option disabled selected> --- Pilih Bulan --- </option>
                  <option value ='1'>Januari </option>
                  <option value ='2'>Februari </option>
                  <option value ='3'>Maret </option>
                  <option value ='4'>April </option>
                  <option value ='5'>Mei </option>
                  <option value ='6'>Juni </option>
                  <option value ='7'>Juli </option>
                  <option value ='8'>Agustus </option>
                  <option value ='9'>September </option>
                  <option value ='10'>Oktober </option>
                  <option value ='11'>November </option>
                  <option value ='12'>Desember </option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Tahun</label>
              <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Tahun" name="tahun">
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
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    {{-- Ajax Nama_Barang --}}
    <script>
        $(document).ready(function() {
    
            $('.dynamic').change(function() {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('data.dependent') }}",
                        method: "POST",
                        data: {
                            select: select,
                            value: value,
                            _token: _token,
                            dependent: dependent
                        },
                        success: function(result) {
                            $('#' + dependent).html(result);
                        }
    
                    })
                }
            });
            $('#id').change(function() {
                $('#nama_barang').val('');
            });
        });
        </script>
        {{-- Ajax Penjualan --}}
        <script>
            $(document).ready(function() {
        
                $('.dynamic').change(function() {
                    if ($(this).val() != '') {
                        var select = $(this).attr("id");
                        var value = $(this).val();
                        var dynamic = $(this).data('dynamic');
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "{{ route('data.fetch1') }}",
                            method: "POST",
                            data: {
                                select: select,
                                value: value,
                                _token: _token,
                                dynamic: dynamic
                            },
                            success: function(result) {
                                $('#' + dynamic).html(result);
                            }
        
                        })
                    }
                });
                $('#id').change(function() {
                    $('#jumlah').val('');
                });
            });
            </script>
        <script>
            $('#reservationdate').datetimepicker({
                format: 'L'
            });
        </script>
@endsection