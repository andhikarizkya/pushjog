@extends('layouts.home_app')

@section('content')

@if($message = Session::get('sukses'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<br />

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Beranda</li>
  </ol>
</nav>

<div style="float: left;">
  <form class="form-inline my-2 my-lg-0" action="/penjual/barang" method="GET">
  @csrf
      <input class="form-control mr-sm-2" type="search" placeholder="Cari Nama Barang" aria-label="Cari berdasarkan nama">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
  </form>
</div>
    <div style="float: right;">
      <a href="{{ route('barang.create') }}" class="btn btn-primary"><i class="icon ion-android-add-circle"></i> Tambah</a>
    </div>
    <br />
    <br />
    <br />
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
          <tr>
            <th width="10%"><center>Nama Barang</center></th>
            <th width="8%"><center>Harga</center></th>
            <th width="5%"><center>Stok</center></th>
            <th width="7%"><center>Kategori Barang</center></th>
            <th width="22%"><center>Deskripsi</center></th>
            <th width="23%"><center>Foto</center></th>
            <th width="15%"><center>Aksi</center></th>
          </tr>
        </thead>
        @foreach($data as $row)
        </tbody>
            <tr>
            <td><center>{{ $row->nama_barang }}</center></td>
            <td>Rp. {{ number_format($row->harga) }}</td>
            <td><center>{{ $row->stok }}</center></td>
            <td><center>{{ $row->kategori }}</center></td>
            <td>{{ $row->keterangan }}</td>
            <td><center><img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" witdh="175px" height="125px" /></center></td>
            <td><center>
              <form action="{{ route('barang.destroy', $row->id) }}" method="post">
                <a href="{{ route('barang.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>  
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data barang tersebut?')">Hapus</button>
        <a href="{{ route('barang.show', $row->id) }}" class="btn btn-success btn-sm"><i class="fa fa-info-circle" aria-hidden="true"></i> Detail</a></center>
      </form>
    </td>
  </tr>
</tbody>
@endforeach
</table>

{!! $data->links() !!}
@endsection