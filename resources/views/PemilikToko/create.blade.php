@extends('layouts.home_app')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('barang.index') }}">Beranda</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Data Barang</li>
  </ol>
</nav>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<br />
    <div align="left">
        <a href="{{ url('penjual/barang') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>
<br />
<br />
<br />

<form method="post" action="{{ url('penjual/barang') }}" enctype="multipart/form-data">

 @csrf
    <div class="form-group col-md-6" align="center">
        <label class="col-md-4">Nama Barang</label>
        <div class="col-md-8">
            <input type="text" name="nama_barang" class="form-control input" />
        </div>
    </div>
<br />
<br />

    <div class="form-group col-md-6" align="center">
        <label class="col-md-4">Harga</label>
        <div class="col-md-8">
            <input type="number" name="harga" class="form-control input-lg" placeholder="Rp." />
        </div>
    </div>
<br />
<br />

    <div class="form-group col-md-6" align="center">
        <label class="col-md-4">Stok</label>
        <div class="col-md-8">
            <input type="number" name="stok" class="form-control input-lg"/>
        </div>
    </div>
<br />
<br />

<div class="form-group col-md-6" align="center">
      <label class="col-md-4" for="kategori">Kategori</label>
      <div class="col-md-8">
      <select class="form-control" name="kategori" required>
        <option selected disabled value="">--Pilih Kategori--</option>
        <option value="Makanan Khas Yogyakarta">Makanan Khas Yogyakarta</option>
        <option value="Pakaian Khas Yogyakarta">Pakaian Khas Yogyakarta</option>
        <option value="Celana Khas Yogyakarta">Celana Khas Yogyakarta</option>
        <option value="Cindera Mata Khas Yogyakarta">Cindera Mata Khas Yogyakarta</option>
        <option value="Sandal Khas Yogyakarta">Sandal Khas Yogyakarta</option>
      </select>
      </div>
    </div>
<br />
<br />

    <div class="form-group col-md-6" align="center">
        <label class="col-md-4">Deskripsi</label>
        <div class="col-md-8">
            <textarea type="text" name="keterangan" class="form-control input-lg"></textarea>
        </div>
    </div>
<br />
<br />

    <div class="form-group col-md-6" align="center">
        <label class="col-md-4">Unggah Foto</label>
        <div class="col-md-8">
            <img id="blah" src="http://placehold.jp/225x175.png" alt="your image" width="225px" height="175px" class="padtop"/>
            <div class="form-group txt padbot">Unggah Foto Barang*</div>
            <div class="fileUpload btn btn-orange pad panjangbtn">
        <input type="file" name="image" onchange="readURL(this);"  accept=".jpg,.jpeg,.png"/>
    </div>
    <script type="text/javascript">                        
        function readURL(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                    .attr('src', e.target.result);
                };    

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</div>
<br />
<br />
 
    <div class="form-group text-center">
        <input type="submit" name="add" class="btn btn-primary" value="Tambah" />
    </div>
</form>
@endsection
