@extends('layouts.app')
@section('content')

<div class="card m-4 p-4" style="width: 60%; ">
  <form action="{{ route('produk.simpan') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">nama</label>
        <input type="text" class="form-control" id="product_name" placeholder="mis. Batik xx" name="product_name">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Harga</label>
        <input type="text" class="form-control" id="harga" placeholder="mis. 120000" name="harga">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">gambar</label>
        <input class="form-control " type="file" id="formFile" name="gambar">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Pilih Kategori</label><br>
        <select class="form-select" aria-label=".form-select-sm example" name="kategori">
        <option value="Batik Tulis">Batik Tulis</option>
        <option value="Batik Cap">Batik Cap</option>
        </select>
    </div>
    <input type="hidden" name="berat" value="250">
    
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi"></textarea>
    </div>
  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Tambah</button>
</form>
</div>



@endsection