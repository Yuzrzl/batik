@extends('template.home_template')  
@section('home')
 @include('template.navigasi')

    <div class="container bg-white p-4 mt-4">
        <h1 class="mb-3 text-center p-2 rounded-xl text-uppercase text-lg text-bold bg-yellow-500 text-white">Sedikit Tentang Batik Ambar Arum</h1>
        <p class="text-justify mb-3 p-2">Batik Ambar Arum Adalah Sebuah produsen yang melayani pesanan batik tulis maupun batik cap. Kami melayani setiap pemesanan kain batik dengan cara yang sederhana yaitu datang langsung ke tempat produksi kami. Dikarenakan perkembangan teknologi yang kian maju, kami memutuskan untuk mengembangkan usaha ini dengan membuat web pemesanan khusus kain batik</p>
        <h2 class="mb-3 text-center p-2 rounded-xl text-uppercase text-lg text-bold bg-yellow-500 text-white">Bagaimana Cara Memesan Batik?</h2>
        <div class="content">
            <p class="p-2">1. Pilih Produk di Katalog</p>
            <p class="p-2">2. Masukan Keranjang</p>
            <p class="p-2">3. Masukan Jumlah Produk</p>
            <p class="p-2">4. Klik Tombol Checkout</p>
            <p class="p-2">5. Masukan Alamat Anda</p>
            <p class="p-2">6. Klik Bayar Untuk Memilih metode pembayaran!</p>
            <p class="p-2">7. Tunggu Pesanan Anda</p>
            <p class="p-2">8. Pesanan Anda Siap dikirim</p>
        </div>
        <div class="content2 mt-4 mb-4 border-b border-1 border-black">
                <h1 class="text-center p-2 rounded-xl mb-2 text-uppercase text-lg text-bold bg-yellow-500 text-white">Keluhan Produk</h1>
                <p class="pl-4 mt-3">Tentang Transaksi Pemesanan :</p>
                <p class="pl-4 mb-4">Bila menemukan kesalahan dalam pengiriman produk kami, segera ajukan Keluhan mengenai produk yang kami kirim, dan akan kami proses secepat mungkin</p>
                <h1 class="text-center mb-4">
                    <a class="py-2 px-4  text-white bg-red-500 rounded-xl text-center" href="/retur">Ajukan Retur</a>
                </h1>
            </div>
    </div>
    @include('template.footer')
@endsection