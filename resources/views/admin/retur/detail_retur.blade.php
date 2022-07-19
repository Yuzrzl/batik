@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="content p-4 mt-4">
            <h2 class="text-center">Detail Retur</h2>
            <div class="d-flex flex-row p-4">
                <div class="content2 p-4 mt-4">
                    <p>No Transaksi</p>
                    <p>Nama Konsumen</p>
                    <p>Keluhan</p>
                    <p>Deskripsi</p>
                    <p>gambar Produk</p>
                </div>
                <div class="content2 p-4 mt-4">
                    <p>: {{ $retur->transaksi }}</p>
                    <p>: {{ $retur->user->name }}</p>
                    <p>: {{ $retur->keluhan }}</p>
                    <p>: {{ $retur->deskripsi }}</p>
                    <p>: <img style="width: 25rem; height:15rem;" src="{{ url($retur->gambar) }}" alt="" id="gambar" class="p-2  items-center"></p>
                </div>
            </div>
            <div class="content p-4">
                <h3>Respon Ke Konsumen</h3>
                <a class="btn btn-success" href="{{'../mail/'.$retur->id }}">Kirim Respon</a>
            </div>
        </div>
    </div>
@endsection