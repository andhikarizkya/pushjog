@extends('layouts.home_app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('home') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pesanan Konsumen</li>
                </ol>
            </nav>
        </div>
        
        <div class="col-md-12">
            <div class="panel">
                <div id="chartPenjualan"></div>
            </div>
        </div>
        <div class="col-md-12">
        <br />
        <br />
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>Data Pesanan</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Tanggal</th>
                                <th>Jumlah Terjual</th>
                                <th>Jumlah Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($pesanans as $pesanan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $pesanan->nama_barang }}</td>
                                <td>{{ date('d-m-yy', strtotime($pesanan->tanggal)) }}</td>
                                <td>{{ $pesanan->jumlah }}</td>
                                <td>Rp. {{ number_format($pesanan->jumlah_harga+$pesanan->kode) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" align="right"><strong>Total Barang :</strong></td>
                                <td colspan="3"><strong>{{ $jumlah_barang }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chartPenjualan', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Laporan penjualan'
        },
        xAxis: {
            categories: {!!json_encode($categories)!!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Barang Terjual'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} Buah</b></td></tr>',
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
            name: 'Barang Terjual',
            data: {!!json_encode($jumlah)!!}
        }]
    });
</script>
@endsection