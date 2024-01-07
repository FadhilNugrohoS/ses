@extends('layout.layout-superadmin.layout')
@section('content')
    @include('sweetalert::alert')
    <div class="content-wrapper px-3">
        <!-- Content Header (Page header) -->
        <h1 class="text-center ml-3"><strong>SELAMAT DATANG</strong></h1>
        <h2 class="text-center ml-3">Sistem Peramalan Penjualan Pada Distributor</h2>
        <h2 class="text-center ml-3">Makanan CV.Wahyu Utama Abadi</h2>
        <h2 class="text-center ml-3 mb-5" style="font-size: 20px">Jl.Raya Tumapel Barat No. 14 Singosari Malang</h2>
        <div class="row">
            <div class="col-lg-6 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $barangs }}</h3>

                        <p>Barang</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-6">
                <!-- small card -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $pemesanans }}</h3>

                        <p>Pemesanan</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-university"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            {{-- <div class="col-lg-12">
              <div class="panel">
                <div id="container"></div>
              </div>
            </div> --}}
        </div>
        <!-- /.row -->
  {{-- <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
      Highcharts.chart('container', {
          chart: {
              type: 'column'
          },
          title: {
              text: 'Penjualan Pertahun'
          },
          subtitle: {
              text: 'CV.Wahyu Utama Abadi'
          },
          xAxis: {
              categories: {!! json_encode($bulan) !!},
              crosshair: true
          },
          yAxis: {
              min: 1,
              title: {
                  text: 'Tahun '
              }
          },
          tooltip: {
              headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
              pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                  '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
              footerFormat: '</table>',
              shared: true,
              useHTML: true
          },
          plotOptions: {
              column: {
                  pointPadding: 0.2,
                  borderWidth: 0
              }
          },
          series: [{
              name: 'Penjualan',
              data: [{{$januari}}, {{$februari}}, {{$maret}}, {{$april}}, {{$mei}}, {{$juni}}, {{$juli}}, {{$agustus}}, {{$september}}, {{$oktober}}, {{$november}}, {{$desember}}]
          }]
      });
    </script> --}}
    @endsection
