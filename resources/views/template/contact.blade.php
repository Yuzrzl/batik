@extends('template.home_template')  
@section('home')
    @include('template.navigasi')

    <div class="container p-4 rounded-xl">
        <div class="content bg-white p-4 m-2">
            
            <h1 class="text-center text-lg text-uppercase text-bold mb-4 mt-4">
                kontak Kami
            </h1>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.681456160508!2d110.25628187161318!3d-7.928300516079511!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7affda82a76bed%3A0xd07b3eaf14c8943e!2sBATIK%20AMBAR%20ARUM!5e0!3m2!1sid!2sid!4v1657551560106!5m2!1sid!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <p>Nama instansi : Batik Ambar Arum</p>
            <p>Nama Pemilik  : Nanik</p>
            <p>Email  : batikambararum@gmail.com</p>
            <p>Telepon  : 085156865556</p>
        </div>
    </div>

    @include('template.footer')
@endsection