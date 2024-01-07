@extends('layout.layout-superadmin.layout')
@section('content')
@include('sweetalert::alert')

<div class="content-wrapper px-3">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Peramalan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Peramalan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="d-flex flex-row-reverse px-2 py-2" >
           
    </div>
    <form class="needs-validation" action="{{route('peramalan.proses')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id">Pilih Barang</label>
                            <select name="nama_barang" id="id" class="form-control input-lg dynamic" data-dependent="nama_barang">
                                <option disabled selected> --- Pilih Barang --- </option>
                                @foreach ($barangs as $barang)
                                    <option value="{{$barang->nama_barang}}">{{$barang->nama_barang}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alpha">Alpha</label>
                              <input type="text" class="form-control"  placeholder="0 < alpha < 1" name="alpha" required>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                              <input type="text" class="form-control"  placeholder="Masukkan Tahun" name="tahun" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Hitung</button>
                    </div>
                    <div class="col-md-6 ">
                        <p> <strong>Penjelasan</strong></p>
                        <p> 
                          1. Silahkan pilih barang yang akan diramalkan <br>
                          2. Untuk nilai alpha silahkan inputkan mulai dari 0 sampai dengan 1 seperti contoh nilai alpha = 0.3
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @if($_SERVER['REQUEST_METHOD'] == 'POST')
    <div class="row">
      <div class="col-12 col-lg-12">
            <table class="table table-bordered table-striped table-hover">
              <thead style="text-align: center">
                <div class="d-flex flex-row-reverse px-2 py-2" >
                </div>
                <tr>
                  <th rowspan="2">No</th>
                  <th rowspan="2">Nama Barang</th>
                  <th rowspan="2">Bulan</th>
                  <th rowspan="2">Tahun</th>
                  <th rowspan="2">Aktual</th>
                  <th rowspan="2">Forecast</th>
                  <th rowspan="2">MAD</th>
                  <th rowspan="2">MSE</th>
                  <th rowspan="2">MAPE</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $id = 0;
                ?>
                @foreach ($data as $d)
                  <tr style="text-align: left">
                      <td><?= $no++?></td>
                      <td>{{$nama_barang}}</td>
                      <td>{{$bulan[$id]}}</td>
                      <td>{{$d->tahun}}</td>
                      <td>{{$d->penjualan}}</td>
                      <td>{{$result[$id]}}</td>
                      <td>{{$mad[$id]}}</td>
                      <td>{{$mse[$id]}}</td>
                      <td>{{number_format($mape[$id],1)}}%</td>
                  </tr>
                  @php
                      $id++;
                  @endphp
                @endforeach
              </tbody>
          </table>

          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="warning-box bg-gradient-warning" style="opacity: 80%">
    
                  <div class="warning-box-content">
                    <div class="p-3" style="font-size: 18px">
                      <strong> Mape</strong> <br>
                      Merupakan nilai kesalahan prediksi yang dihitung dengan cara membandingkan nilai aktual dengan nilai peramalan. <br>
                      <strong>Nilai Mape</strong><br> 
                      <strong>< 10% : Sangat Baik </strong><br>
                      <strong>10% - 20% : Baik </strong> <br>
                      <strong>20% - 50% : Cukup </strong> <br>
                      <strong> > 50% : Buruk </strong>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="success-box bg-gradient-success" style="opacity: 90%">
                  <div class="success-box-content">
                    <div class="p-3" style="font-size: 18px">
                      Anda Memilih Barang : <br>
                      <strong>{{$nama_barang}}</strong> <br>
                      @php
                          $id = 0;
                      @endphp
                          Hasil Peramalan : <br>
                        @foreach ($hasil as $h)
                        <strong> {{$bulan_sekarang[$id]}}  {{$tahun}} : {{$h}}</strong><br>
                          @php
                              $id++;
                          @endphp
                        @endforeach
                      MAPE : <br>
                      <strong>{{number_format($sum_mape_3_bulan,1)}} %</strong>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="card-footer">
              <div class="d-flex flex-row-reverse">
                <a href="{{route('peramalan.index')}}" class="btn btn-primary" >Reset</a>&nbsp;
                <a href="{{route('peramalan.create')}}" class="btn btn-primary">Simpan</a>
              </div>
            </div>
          </div>
      </div>
    </div>
    @endif
</div>
@endsection