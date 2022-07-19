@extends('template.home_template')  
@section('home')

    @include('template.navigasi')
    <div class="container bg-white my-4">
        <h1 class="text-center">Transaksi saya</h1>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            
            <tr>
                <td class="border-2 p-2">Id Transaksi</td>
                <td class="border-2 p-2">Status Pembayaran</td>
                <td class="border-2 p-2">Jumlah Pembayaran</td>
                <td class="border-2 p-2">Tanggal Bayar</td>
            </tr>
            @foreach ($orders as $item)
            <tr>
                <td class="border-2 p-2"> {{ $item->order_id }}</td>
                <td class="border-2 p-2">{{ $item->status }}</td>
                <td class="border-2 p-2">Rp. {{ number_format($item->gross_amount) }}</td>
                <td class="border-2 p-2">{{ $item->created_at }}</td>
            </tr>
                @endforeach
            </table> 
            <br>
            <h1 class="text-center">Pesanan saya</h1>
            <h1>Rincian Pesanan</h1>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-2 ">
                <tr>
                    <td class="border-2 p-2"> Nama Pemesan </td>
                    <td class="border-2 p-2" colspan="5">{{ Auth::user()->name }}</td>
                </tr>
                <tr>
                    <td class="border-2 p-2"> Telepon </td>
                   <td class="border-2 p-2" colspan="5">{{ Auth::user()->telp }}</td>
                </tr>
                <tr class="border-2">
                    <th class="border-2 p-2">Id Pesanan</th>
                    <th class="border-2 p-2">Status Pemesanan</th>
                    <th class="border-2 p-2">Tanggal Pesan</th>
                    <th class="border-2 p-2">Estimasi Jadi</th>
                    <th class="border-2 p-2">Alamat Pengiriman</th>
                    <th class="border-2 p-2">Nomor Resi</th>
                </tr>
                @foreach ($pesanan as $item)
                <tr>
                    <td class="border-2 p-2"> {{ $item->id_pesanan }}</td>
                    <td class="border-2 p-2"> {{ $item->status }}</td>
                    <td class="border-2 p-2"> {{ $item->tanggal_pesan}}</td>
                    <td class="border-2 p-2"> {{ $item->tanggal_jadi}}</td>
                    <td class="border-2 p-2"> {{ $item->alamat }}</td>
                    <td class="border-2 p-2"> {{ $item->resi}}</td>
                </tr>
                @endforeach
            </table>
            @php
            $total = 0;
            @endphp
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                {{-- <tr>
                    <td class="border-2 p-2">Detail Pesanan</td>
                    <td>:</td>
                </tr> --}}
                <tr class="mt-4">
                    <th class="border-2 p-2">
                        Product name
                    </th>
                    <th class="border-2 p-2">
                        Category
                    </th>
                    <th class="border-2 p-2">
                        Price
                    </th>
                    <th class="border-2 p-2">
                        Jumlah
                    </th>
                    <th class="border-2 p-2">
                        Subtotal
                    </th>
                </tr>
                
            </thead>
            <h1>Rincian Prduk</h1>
            <tbody>
                @foreach ($carts as $cart)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                    <td class="border-2 p-2">
                        {{$produk = $cart->product->product_name}}
                    </td>
                    <td class="border-2 p-2">
                        {{ $cart->product->kategori}}
                    </td>
                    <td class="border-2 p-2">
                        Rp. {{number_format($cart->product->harga) }}
                    </td>
                    <td class="border-2 p-2">
                        <div class="flex" id="mainDiv">
                            <span class=" mx-2" id="numberPlace ">{{ $cart->jumlah }}</span>
                        </div>
                    </td>
                    <th class="border-2 p-2">
                        Rp. {{ $subtotal = $cart->product->harga*$cart->jumlah }}
                    </th>
                </tr>
                @php
                    $total += ($cart->product->harga*$cart->jumlah);
                @endphp
                @endforeach
                <tr class="border-b bg-white">
                    <td class="border-2 p-2"  colspan="4">Ongkos Kirim</td>
                    <td class="border-2 p-2"></td>
                </tr>
                <tr class="border-b bg-white">
                    <td class="border-2 p-2 text-center" colspan="4"><h1 class="p-2 bold">Total</h1></td>
                    <td class="border-2 p-2"><h1 class="p-2 text-bold ">Rp. {{number_format( $total)}}</h1></td>

                </tr>
            </tbody>
        </table>

    </div>
@endsection