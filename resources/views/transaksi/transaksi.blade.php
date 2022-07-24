@extends('template.home_template')  
@section('home')

    @include('template.navigasi')

    
    <div class="container bg-white my-4">
        <h1 class="text-center text-bold text-uppercase text-lg">Transaksi saya</h1>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <tr>
                <td class="border-2 p-2">Id Transaksi</td>
                <td class="border-2 p-2">Status Pembayaran</td>
                <td class="border-2 p-2">Jumlah Pembayaran</td>
                <td class="border-2 p-2">Tanggal Bayar</td>
                <td class="border-2 p-2">Aksi</td>
            </tr>
            @foreach ($orders as $item)
            <tr>
                <td class="border-2 p-2"> {{ $item->order_id }}</td>
                <td class="border-2 p-2">{{ $p = $item->status }}</td>
                <td class="border-2 p-2">Rp. {{ number_format($item->gross_amount) }}</td>
                <td class="border-2 p-2">{{ $item->created_at }}</td>
                <td class="border-2 p-2 text-center "> <a class="rounded-xl p-2 bg-yellow-500 hover:bg-yellow-600 text-white" href="{{ '/cetak-transaksi/'.$item->id }}"  target="_blank">Cetak Bukti Transaksi</a></td>
            </tr>
                @endforeach
            </table> 
            <h1 class="text-center text-bold text-uppercase text-lg my-4">Daftar Pesanan Saya</h1>
            <h1 class="text-center text-white"><a {{ (isset($p) ? '' : 'hidden') }} class="rounded-xl p-2 bg-yellow-500 hover:bg-yellow-600 hover:text-white" href="/pesanan-detail">Lihat Pesanan Saya</a></h1>
    </div>

@endsection