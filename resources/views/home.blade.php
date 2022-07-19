
@extends('template.home_template')  
@section('home')

    @include('template.navigasi')
    @include('template.produk')
    @include('template.footer')

    @if (session('alert-success'))
    
    <script>alert("{{ session('alert-success') }}")</script>
    @elseif(session('alert-failed'))
    <script>alert("{{ session('alert-failed') }}")</script>
    @endif
@endsection 
