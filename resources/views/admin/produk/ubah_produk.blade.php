@extends('layouts.app')
@section('content')

<div class="card m-4 p-4" style="width: 60%; ">
  <form action="{{ url('update_p/' . $products->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">nama</label>
        <input type="text" class="form-control" id="product_name" placeholder="mis. Batik xxx" name="product_name" 
        value="{{ old('product_name') ? old('product_name') :$products->product_name }}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Harga</label>
        <input type="text" class="form-control" id="harga" placeholder="mis. 120000" name="harga"
       value=" {{ old('harga') ? old('harga') :$products->harga }}"> 
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">gambar</label><br>
        <img style="width: 100px;height:100px" src="{{ url($products->gambar) }}" alt="" id="gambar" class="p-2">
        <input class="form-control" type="file" id="formFile" name="gambar" accept="data_file/*" 
        onchange="document.getElementById('gambar').src = window.URL.createObjectURL(this.file)">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Pilih Kategori</label><br>
        <select class="form-select" aria-label=".form-select-sm example" name="kategori">
        <option selected value="Batik Tulis">{{ old('kategori') ? old('kategori') :$products->kategori}}</option>
        <option  value="Batik Tulis">Batik Tulis</option>
        <option  value="Batik Cap">Batik Cap</option>
        </select>
    </div>
    <input type="hidden" value="250" name="berat">
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi"
            value=" ">{{ old('deskripsi') ? old('deskripsi') :$products->deskripsi }}</textarea>
    </div>
  <!-- Submit button -->
  <button type="submit" class="btn btn-warning btn-block mb-4">Update</button>
</form>
</div>
@endsection