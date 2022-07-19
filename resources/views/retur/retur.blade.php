@extends('template.home_template')  
@section('home')
    <div class="container">
        <div class="content p-4 m-4 bg-white">
            <h1 class="text-center">Ajukan Retur</h1>
            <form action="/retur-keluhan" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="w-2/3  mb-2">
                    <label for="">Keluhan</label>
                    <input class="form-control" type="text" name="keluhan">
                </div>
                <div class="w-2/3  mb-2">
                    <label for="">Masukan nomor transaksi yang ada pada struk pembayaran</label>
                    <input class="form-control" type="text" name="transaksi">
                </div>
                <div class="w-2/3 mb-2">
                    <label for="">Masukan Gambar yang ingin diretur</label>
                    <input class="form-control" type="file" name="gambar">
                </div>
                <div class="w-2/3  mb-2">
                    <label for="">Deskripsi keluhan</label>
                    <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="w-2/3 mt-4">
                    <button type="submit" class="py-2 px-4 bg-red-500 text-white rounded-sm">Ajukan Retur</button>
                </div>
            </form>
        </div>
    </div>
@endsection