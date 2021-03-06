@extends('layouts.home_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($barangs as $barang)
        <div class="col-md-4">
            <div class="card">
              <img src="{{ URL::to('/') }}/images/{{ $barang->image }}" class="card-img-top" alt="..." width="200px" height="175px">
              <div class="card-body">
                <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                <p class="card-text">
                    <strong>Harga :</strong> Rp. {{ number_format($barang->harga)}} <br>
                    <strong>Stok :</strong> {{ $barang->stok }} <br>
                    <hr>
                    <strong>Kategori :</strong> <br>
                    {{ $barang->kategori }} 
                </p>
                @if(auth()->user()->role == 'pemilik')  
                <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-primary"><i class="fa fa-info-circle" aria-hidden="true"></i> Detail</a>
                @else(auth()->user()->role == 'pembeli')
                <a href="{{ url('pesan') }}/{{ $barang->id }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Pesan</a>
                @endif
              </div>
            </div> 
        </div>
        @endforeach
    </div>
</div>
@endsection
