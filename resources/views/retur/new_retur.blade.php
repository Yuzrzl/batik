@extends('template.home_template')  
@section('home')
@include('template.navigasi')

<div class="container flex justify-center">
    <div class="card m-4 p-4" style="width: 60%; ">
        <h1 class="text-center text-lg uppercase text-bold">Ajukan Retur</h1>
    <form action="{{ route('retur.simpan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="w-2/3  mb-2">
                    <label for="">Keluhan</label>
                    <input class="form-control" type="text" name="keluhan">
                    @error('keluhan')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-2/3  mb-2">
                    <label for="">Masukan nomor transaksi yang ada pada struk pembayaran</label>
                    <input class="form-control" type="text" name="transaksi">
                    @error('transaksi')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div> 
                <div class="w-2/3 mb-2">
                    <label for="">Masukan Gambar yang ingin diretur</label>
                    <input class="form-control" type="file" id="file_input" name="gambar">
                    @error('gambar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-2/3  mb-2">
                    <label for="">Deskripsi keluhan</label>
                    <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10"></textarea>
                    @error('deskripsi')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                </div>
                <div class="w-2/3 mt-4">
                    <button type="submit" class="py-2 px-4 bg-red-500 text-white rounded-sm">Ajukan Retur</button>
                </div>
            </form>
  </div> 
</div>

@endsection