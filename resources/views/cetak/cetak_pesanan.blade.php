@extends('template.home_template')  
@section('home')

<div class="container bg-white my-4">
           
            <h1 class="text-center text-bold text-uppercase text-lg">Pesanan saya</h1>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
                <tr>
                    <td class="border-2 p-2 border-black "> Nama Pemesan </td>
                    <td class="border-2 p-2 border-black " colspan="8">{{ Auth::user()->name }}</td>
                </tr>
                <tr>
                    <td class="border-2 p-2 border-black "> Telepon </td>
                    <td class="border-2 p-2 border-black " colspan="8">{{ Auth::user()->telp }}</td>
                </tr>
                
                <tr class="border-2">
                    <th class="border-2 p-2 border-black ">Id Pesanan</th>
                    <th class="border-2 p-2 border-black ">Id Transaksi</th>
                    <th class="border-2 p-2 border-black ">Status Pemesanan</th>
                    <th class="border-2 p-2 border-black ">Tanggal Pesan</th>
                    <th class="border-2 p-2 border-black ">Estimasi Jadi</th>
                    <th class="border-2 p-2 border-black ">Alamat Pengiriman</th>
                    <th class="border-2 p-2 border-black ">Nomor Resi</th>
                </tr>
                <tr>
                    <td class="border-2 p-2 border-black "> {{ $pesanan->id_pesanan }}</td>
                    <td class="border-2 p-2 border-black "> {{ $pesanan->order_id }}</td>
                    <td class="border-2 p-2 border-black "> {{ $pesanan->status }}</td>
                    <td class="border-2 p-2 border-black "> {{ $pesanan->tanggal_pesan}}</td>
                    <td class="border-2 p-2 border-black "> {{ $pesanan->tanggal_jadi}}</td>
                    <td class="border-2 p-2 border-black "> {{ $pesanan->alamat }}</td>
                    <td class="border-2 p-2 border-black "> {{ $pesanan->resi}}</td>
                </tr>
                <tr>
                    <th colspan="8" class=" text-lg">Detail Pesanan</th>
                </tr>
                <tr>
                    <th colspan="2" class="border-2 p-2 border-black ">Nama Produk</th>
                    <th class="border-2 p-2 border-black ">Jumlah</th>
                    <th class="border-2 p-2 border-black ">Harga</th>

                </tr>
                    @php $test = json_decode($pesanan->orders->item_cart, true) @endphp 
                @foreach ($test as $key ) 
                <tr>
                <td colspan="2" class="border-2 p-2 border-black ">{{ $key['name'] }}</td>
                <td class="border-2 p-2 border-black ">{{ $key['quantity'] }}</td>
                <td  class="border-2 p-2 border-black ">Rp. {{ number_format($key['price']) }}</td>
                @endforeach
                
            </tr>
            @foreach ($alamat as $item)
                    <p hidden>{{ $dest = $item->destination}}</p>
            @endforeach
            <tr>
                <td class="border-2 p-2 border-black " colspan="2"></td>
                <th class="border-2 p-2 border-black ">Ongkir</th>
                <td class="border-2 p-2 border-black ">Rp. {{ number_format($ongkir = App\Http\Controllers\RajaOngkirController::getAlamat('39', $dest , '250', 'jne'))  }}</td>
                
            </tr>
            <tr>
                <td class="border-2 p-2 border-black " colspan="2"></td>
                <th class="border-2 p-2 border-black ">Total</th>
                <td class="border-2 p-2 border-black ">Rp. {{  number_format($pesanan->orders->gross_amount)  }}</td>
                
            </tr>
                <tr>
                    <td colspan="8" class="text-center p-4 bg-white"></td>
                </tr>
            </table>
            <div class="content flex justify-end">
                <img class="mr-4" src="{{ asset('images/cap.jpg') }}" alt="" width="200px">
            </div>

    </div>
        <script>
            window.print();
        </script>
@endsection