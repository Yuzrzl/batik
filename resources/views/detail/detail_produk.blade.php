@extends('template.home_template')  
@section('home')
@include('template.navigasi')
    <div class="container mb-4">
    <section class="border-2 rounded-xl border-yellow-400" style="width: 60%">
        <div class="container p-4  border-2 rounded-xl border-yellow-400 ">
            <h1 style="text-align: center" class="text-xl text-bold text-uppercase px-4">{{ $products->product_name }}</h1><br>
                <div class=" flex justify-center flex-wrap">
                    <img style="width: 25rem; height:15rem;" src="{{ url($products->gambar) }}" alt="" id="gambar" class="p-2  items-center">
                </div>
                <p>kategori : {{ $products->kategori }}</p>
                <div class="card">
                    <p class="text-bold">Deskripsi : </p>
                    <p>{{ $products->deskripsi }}</p>
                </div>
        </div>
        <div class="p-4">
            <h1 class="text-lg text-center text-bold px-4 mb-4">Harga : Rp. {{  $products->harga }}</h1>
            <form action="{{ route('cart.cart_plus') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $products->id }}" name="product_id">
                <button type="submit" class="uppercase tracking-wide bg-yellow-500 hover:bg-yellow-400 text-white font-bold my-2 py-2 px-4 rounded-full text-lg" href="#">Tambah Ke Keranjang</button>
            </form>
        </div>

    </section>
    </div>

@endsection