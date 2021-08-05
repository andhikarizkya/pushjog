@extends('layouts.utama_app')

@section('content')
<div class="container">
<div class="row justify-content-center">
@foreach($barangs as $barang)
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="{{ URL::to('/') }}/images/{{ $barang->image }}" class="card-img-top"  alt="Card image cap" width="225px" height="175px">
                <div class="card-body">
                    <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                    <p class="card-text">
                    <strong>Harga :</strong> Rp. {{ number_format($barang->harga)}} <br>
                    <strong>Stok :</strong> {{ $barang->stok }} <br>
                    <hr>
                    <strong>Kategori : </strong> <br>
                    {{ $barang->kategori }} 
                    </p>
                    <a href="{{ url('pesan') }}/{{ $barang->id }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Pesan</a>
                </div>
            </div>
        </div> 
        <br />
                <br />
    @endforeach
    </div>
</div>
@endsection