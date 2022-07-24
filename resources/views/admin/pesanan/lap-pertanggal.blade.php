@extends('layouts.app')
@section('content')
<div class="container-sm p-4">
    <h2 class="text-center">Cetak Laporan Pemesanan</h2>
    <form action="/ctk-pertgl/tglawal/tglakhir">
        @csrf
                        <label >Tanggal Awal</label>
                        <input id="tglawal" value="" name="tglawal" type="date" class="form-control m-2">
                        <label >Tanggal Akhir</label>
                        <input id="tglakhir" value="" name="tglakhir" type="date" class="form-control m-2">
                        <button class="btn-primary" type="submit" >Cetak Laporan</button>
    </form>
                    </div>
                    <div class="container-sm button">
                    </div>

                    <script>
                        
                    </script>
@endsection