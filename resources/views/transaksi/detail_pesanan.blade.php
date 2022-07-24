@extends('template.home_template')  
@section('home')

    @include('template.navigasi')

    
    <div class="container bg-white my-4">
           
            <h1 class="text-center text-bold text-uppercase text-lg">Pesanan saya</h1>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-2 ">
                <tr>
                    <td class="border-2 p-2"> Nama Pemesan </td>
                    <td class="border-2 p-2" colspan="8">{{ Auth::user()->name }}</td>
                </tr>
                <tr>
                    <td class="border-2 p-2"> Telepon </td>
                    <td class="border-2 p-2" colspan="8">{{ Auth::user()->telp }}</td>
                </tr>
                @foreach ($pesanan as $item)
                <tr class="border-2">
                    <th class="border-2 p-2">Id Pesanan</th>
                    <th class="border-2 p-2">Id Transaksi</th>
                    <th class="border-2 p-2">Status Pemesanan</th>
                    <th class="border-2 p-2">Tanggal Pesan</th>
                    <th class="border-2 p-2">Estimasi Jadi</th>
                    <th class="border-2 p-2">Alamat Pengiriman</th>
                    <th  class="border-2 p-2">Nomor Resi</th>
                </tr>
                <tr>
                    <td class="border-2 p-2"> {{ $item[0]->id_pesanan }}</td>
                    <td class="border-2 p-2"> {{ $item[0]->order_id }}</td>
                    <td class="border-2 p-2"> {{ $item[0]->status }}</td>
                    <td class="border-2 p-2"> {{ $item[0]->tanggal_pesan}}</td>
                    <td class="border-2 p-2"> {{ $item[0]->tanggal_jadi}}</td>
                    <td class="border-2 p-2"> {{ $item[0]->alamat }}</td>
                    <td class="border-2 p-2"> {{ $item[0]->resi}}</td>
                </tr>
                <tr>
                    <th colspan="8" class="text-center text-lg">Detail Pesanan</th>
                </tr>
                <tr>
                    <th colspan="2" class="border-2 p-2">Nama Produk</th>
                    <th  class="border-2 p-2">Jumlah</th>
                    <th   class="border-2 p-2">Harga</th>
                    <th  colspan="3" class="border-2 p-2"></th>
                </tr>
                    @php $test = json_decode($item[0]->orders->item_cart, true) @endphp 
                @foreach ($test as $key ) 
                <tr>
                <td colspan="2" class="border-2 p-2">{{ $key['name'] }}</td>
                <td class="border-2 p-2">{{ $key['quantity'] }}</td>
                <td  class="border-2 p-2">Rp. {{ number_format($key['price']) }}</td>
                @endforeach
                <td colspan="3" class="border-2 p-2"></td>
            </tr>
            <tr>
                <td class="border-2 p-2" colspan="2"></td>
                <th class="border-2 p-2">Total</th>
                <td class="border-2 p-2">Rp. {{  number_format($item[0]->orders->gross_amount)  }}</td>
                <th colspan="3" class="border-2 p-2"><small class="text-red">anda baru dapat mencetak nota setelah mendapatkan nomor resi</small><br> Cetak Nota <a {{ (isset($item[0]->resi) ? '' : 'hidden') }} class="p-2 bg-yellow-500 hover:bg-yellow-600 text-white" href="">Cetak</a> </td>
                </tr>
                <tr>
                    <td colspan="8" class="text-center p-1 bg-black"></td>
                </tr>
                @endforeach
            </table>
        </table>

    </div>

@endsection