@extends('layout.layout-karyawan.layout')
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
            <li class="breadcrumb-item"><a href="#">Data Pemesanan</a></li>
            <li class="breadcrumb-item active">Data Pemesanan</li>
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
          <h3 class="card-title">Edit Pemesanan </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('pemesanan.update',$pesanans->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id">Pilih Barang</label>
                        <select name="id_barang" id="id" class="form-control input-lg dynamic" data-dependent="nama_barang" data-dynamic="satuan" data-dynamic1="harga">
                            <option disabled selected> --- Pilih Barang --- </option>
                            @foreach ($barangs as $barang)
                                <option value="{{$barang->id}}">{{$barang->nama_barang}} || {{$barang->satuan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="nama_barang">Nama Barang</label>
                        <select type="text" class="form-control" id="nama_barang" value="{{$pesanans->nama_barang}}" name="nama_barang" required readonly style ="appearance: none; -webkitappearance:none; -moz-appearance: none;">
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="satuan">Satuan</label>
                        <select type="text" class="form-control" id="satuan" value="{{$pesanans->satuan}}" name="satuan" required readonly style ="appearance: none; -webkitappearance:none; -moz-appearance: none;">
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="harga">Harga</label>
                      <select type="text" class="form-control" id="harga" value="{{$pesanans->harga}}" name="harga" required onchange="total_harga();" readonly style ="appearance: none; -webkitappearance:none; -moz-appearance: none;">
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="jumlah">Jumlah</label>
                      <input type="text" class="form-control" id="jumlah" name="jumlah"onchange="total_harga();" required>
                    </div>
                    <div class="form-group">
                      <label for="total">Total Harga</label>
                      <input type="text" class="form-control" id="total"  name="total" required readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_pemesan">Nama Pemesan</label>
                          <input type="text" class="form-control" id="nama_pemesan" value="{{$pesanans->nama_pemesan}}" name="nama_pemesan" required>
                      </div>
                      <div class="form-group">
                        <label for="alamat">Alamat</label>
                          <input type="text" class="form-control" id="alamat" value="{{$pesanans->alamat}}" name="alamat" required>
                      </div>
                      <div class="form-group">
                        <label for="nohp">Nomor Telepon</label>
                          <input type="text" class="form-control" id="nohp" value="{{$pesanans->nohp}}" name="nohp" required>
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
  <!-- /.card -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>
    function total_harga() {
        var jumlah = document.getElementById("jumlah").value;
        var harga = document.getElementById("harga").value;
        var total = parseFloat(jumlah) * parseFloat(harga);
        if (!isNaN(total)) {
          document.getElementById("total").value = harga;
        } else {
          document.getElementById("total").value = total;
        }
    }
 </script>
   <script>
    $(document).ready(function() {

        $('.dynamic').change(function() {
            if ($(this).val() != '') {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('pemesanan.dependent') }}",
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
 {{-- Ajax for satuan --}}
 <script>
  $(document).ready(function() {
      $('.dynamic').change(function() {
          if ($(this).val() != '') {
              var select = $(this).attr("id");
              var value = $(this).val();
              var dynamic = $(this).data('dynamic');
              var _token = $('input[name="_token"]').val();
              $.ajax({
                  url: "{{ route('pemesanan.fetch1') }}",
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
          $('#satuan').val('');
      });
  });
</script>

{{-- Ajax for harga --}}
<script>
  $(document).ready(function() {
      $('.dynamic').change(function() {
          if ($(this).val() != '') {
              var select = $(this).attr("id");
              var value = $(this).val();
              var dynamic1 = $(this).data('dynamic1');
              var _token = $('input[name="_token"]').val();
              $.ajax({
                  url: "{{ route('pemesanan.fetch2') }}",
                  method: "POST",
                  data: {
                      select: select,
                      value: value,
                      _token: _token,
                      dynamic1: dynamic1
                  },
                  success: function(result) {
                      $('#' + dynamic1).html(result);
                  }
              })
          }
      });

      $('#id').change(function() {
          $('#harga').val('');
      });
  });
</script>
@endsection