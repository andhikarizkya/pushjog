@extends('layouts.home_app')

@section('content')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div align="left">
                <a href="{{ route('barang.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <br />
     <form method="post" action="{{ route('barang.update', $data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
      <div class="form-group" align="center">
       <label class="col-md-4">Nama Barang</label>
       <div class="col-md-8">
        <input type="text" name="nama_barang" value="{{ $data->nama_barang }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group" align="center">
       <label class="col-md-4">Harga</label>
       <div class="col-md-8">
        <input type="number" name="harga" value="{{ $data->harga }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group" align="center">
       <label class="col-md-4">Stok</label>
       <div class="col-md-8">
        <input type="text" name="stok" value="{{ $data->stok }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group" align="center">
      <label class="col-md-4" for="kategori">Kategori</label>
      <div class="col-md-8">
      <select class="form-control" id="kategori" required>
        <option selected disabled value="{{ $data->kategori }}">--Pilih Kategori--</option>
        <option value="makanan">Makanan Khas Yogyakarta</option>
        <option value="pakaian">Pakaian Khas Yogyakarta</option>
        <option value="celana">Celana Khas Yogyakarta</option>
        <option value="cindera">Cindera Mata Khas Yogyakarta</option>
        <option value="sandal">Sandal Khas Yogyakarta</option>
      </select>
      </div>
    </div>
    <br />
    <br />
    <br />
      <div class="form-group" align="center">
       <label class="col-md-4">Deskripsi</label>
       <div class="col-md-8">
        <textarea type="text" name="keterangan" class="form-control input-lg">{{ $data->keterangan }}</textarea>
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group" align="center">
       <label class="col-md-4">Unggah Foto</label>
       <div class="col-md-8">
        <input type="file" name="image" />
              <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" width="100" />
                        <input type="hidden" name="hidden_image" value="{{ $data->image }}" />
       </div>
      </div>
      <br /><br /><br />
      <div class="form-group text-center">
       <input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
      </div>
     </form>

@endsection
