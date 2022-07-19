@extends('template.home_template')  
@section('home')
    <nav id="header" class="w-full z-30 top-0 py-1">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">

            @include('template.nav_right')

            <div class="order-2 md:order-3 flex items-center m-3" id="nav-content">
              <div class="m-2">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }} ">Home</a>
                    @else
                        <a href="{{ route('login') }}"><i class="fa fa-key fa-fw w3-margin-right"></i><span></span> Masuk</a>
                        @if (Route::has('register'))
                            <a class="bg-yellow-500 hover:bg-yellow-400 text-white py-2 px-4 rounded-full ml-2" href="{{ route('register') }}" >Registrasi</a>
                        @endif
                    @endauth
                @endif
            </div>

            </div>
        </div>
    </nav>
    

    <section id="jum" class="w-full mt-2 mx-auto rounded-b-sm flex pt-12 md:pt-0 md:items-center bg-cover bg-right bg-white" style="max-width:1600px; height: 32rem;">
        <div class="container mx-auto ">
            <div class="flex flex-col w-full lg:w-1/2 justify-center items-start  px-6 tracking-wide">
                <h1 class="text-white text-2xl mt-4 font-extrabold">Pesan Batik Mudah dan Terjamin Kualitasnya</h1>
                <h3 class="mb-3 text-white">Tersedia Berbagai Macam Pilihan Batik</h3>
                <a class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 rounded-full " href="#katalog">Katalog</a>
            </div>
        </div>
    </section>
@include('template.produk')
@include('template.about')
@include('template.footer')

@endsection

