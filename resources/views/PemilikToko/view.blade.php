@extends('layouts.home_app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('barang.index') }}">Beranda</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail Barang</li>
  </ol>
</nav>

<div class="card">
  <h5 class="card-header">Detail Barang</h5>
  <div class="card-body">
    <div align="left">
        <a href="{{ route('barang.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
    <br />
    <center><img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" width="175px" height="125px"/></center>
    <br />
        <h3><center>Nama Barang : {{ $data->nama_barang }} </center></h3>
        <h3><center>Harga : Rp. {{ number_format($data->harga) }} </center></h3>
        <h3><center>Stok : {{ $data->stok }} </center></h3>
        <h3><center>Kategori : {{ $data->kategori }} </center></h3>
        <h3><center>Deskripsi : {{ $data->keterangan }} </center></h3>
    </div>
  </div>
</div>
@endsection