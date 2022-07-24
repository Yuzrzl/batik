@extends('template.home_template')  
@section('home')
@include('template.navigasi')

    <div class="container p-4 border-2 border-black">
        <div class="container p-4  border-2  border-black ">
            <h1 style="text-align: center" class="text-xl text-bold text-uppercase px-4">{{ $products->product_name }}</h1><br>
                <div class=" flex justify-center flex-wrap ">
                    <img style="width: 25rem; height:15rem;" src="{{ url($products->gambar) }}" alt="" id="gambar" class="p-2  items-center">
                </div>
                <p class="p-2">kategori : {{ $products->kategori }}</p>
                <p class="text-bold p-2">Deskripsi : </p>
                <div class="card p-2">
                    <p>{{ $products->deskripsi }}</p>
                </div>
        </div>
        <div class="p-4 border-2 border-black ">
            <h1 class="text-lg text-center text-bold px-4 mb-4">Harga : Rp. {{ number_format($products->harga)  }}</h1>
            <form action="{{ route('cart.cart_plus') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $products->id }}" name="product_id">
                <h1 class="text-center">
                <button type="submit" class="uppercase  tracking-wide bg-yellow-500 hover:bg-yellow-400 text-white font-bold my-2 py-2 px-4 rounded-full text-lg" href="#">Tambah Ke Keranjang</button>
                </h1>
            </form>
        </div>

    </div>


@endsection