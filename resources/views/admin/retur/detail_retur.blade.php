@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="content p-4 mt-4">
            <h2 class="text-center">Detail Retur</h2>
            <div class="d-flex flex-row p-4">
                <div class="content2 p-4 mt-4">
                    <p>ID Pemesanan</p>
                    <p>Nama Konsumen</p>
                    <p>Keluhan</p>
                    <p>Deskripsi</p>
                    <p>gambar Produk</p>
                </div>
                <div class="content2 p-4 mt-4">
                    <input disabled id="myInput" value="{{ $retur->transaksi }} "> <button onclick="myFunction()">Copy text</button>
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

    <script>
        function myFunction() {
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
    </script>
@endsection