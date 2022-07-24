@extends('template.home_template')  
@section('home')
    @include('template.navigasi')
    <div class="container p-2 mt-4 bg-black">
        <div class="card bg-white p-4 m-2">
            <h1 class="text-bold text-lg text-center mb-4">Detail Pembayaran</h1>
            @php
            $total = 0;
            @endphp
             <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                 <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <td> Nama Pemesan </td>
                    <td>: {{ Auth::user()->name }}</td>
                </tr>
                <tr>
                    <td> Telepon </td>
                    <td>: {{ Auth::user()->telp }}</td>
                </tr>
                <tr>
                    <td>Alamat Tujuan</td>

                    @foreach ($alamat as $item)
                    <p hidden>{{ $dest = $item->destination ?: '39' }}</p>
                    <td>: {{ $alamat_lengkap = $item->alamat.', '.$item->destination_name.', '.$item->kodepos}}</td>
                    <td><a class="bg-yellow-500 hover:bg-yellow-400 text-white p-2 rounded-xl" href="{{ '/edit_alamat/'.$item->id }}">ubah alamat</a></td>
                    @endforeach
                </tr>
                <tr>
                    <td>Detail Pesanan</td>
                    <td></td>
                </tr>
                <tr class="mt-4">
                    <th>
                        Product name
                    </th>
                    <th>
                        Category
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Jumlah
                    </th>
                    <th>
                        Subtotal
                    </th>
                </tr>
                
            </thead>
            <tbody>
                
                @foreach ($carts as $cart)
                <p hidden>{{ $id = $cart->id }}</p>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                    <th scope="row" class="px-6 py-4 font-bold text-gray-900 dark:text-white whitespace-nowrap">
                        {{$produk = $cart->product->product_name}}
                    </th>
                    <td class="px-2 py-4">
                        {{ $cart->product->kategori}}
                    </td>
                    <td class="px-2 py-4">
                        Rp. {{number_format($cart->product->harga) }}
                    </td>
                    <td class="px-2 py-4">
                        <div class="flex" id="mainDiv">
                            <span class=" mx-2" id="numberPlace ">{{ $cart->jumlah }}</span>
                        </div>
                    </td>
                    <th class="px-2 py-4">
                        Rp. {{number_format($subtotal = $cart->product->harga*$cart->jumlah)  }}
                    </th>
                </tr>
                @php
                    $ongkir = App\Http\Controllers\RajaOngkirController::getAlamat('39', $dest , '250', 'jne');
                    $total += ($subtotal);
                    $sum = $total+$ongkir;
                @endphp
                @endforeach
                <tr class="border-b bg-white">
                    <td></td>
                    <td colspan="2"></td>
                    <td class="text-bold text-uppercase">Ongkos Kirim</td>
                    <td class="p-2 text-bold ">Rp. {{number_format($ongkir) }}</td>
                </tr>
                <tr class="border-b bg-white">
                    <td colspan="3"></td>
                    <td class="text-bold text-uppercase"><h1 class="p-2 bold">Total</h1></td>
                    <td class=""><h1 class="p-2 text-bold ">Rp. {{number_format( $sum)}}</h1></td>
                    <td class=""></td>
                </tr>
            </tbody>
        </table>
        <div class="content mt-4">
            <h1 class="text-center text-bold text-lg mb-2">KONFIRMASI PESANAN</h1>
            <div class="tipe flex justify-center">
                <a class="py-2 px-4 m-2 bg-red-500 hover:bg-red-600 text-white rounded-xl" href="/cart">Cek Ulang</a>
                <a  href="/pay" class="py-2 px-4 m-2 bg-green-500 hover:bg-green-600 text-white rounded-xl {{ (isset($alamat[0]->origin) ? '' : 'hidden') }}">Konfirmasi</a>
            </div>
            <small class="text-red-500">Setelah pembayaran data tidak dapat dirubah, mohon cek ulang pesanan anda!</small>
        </div>
        </div>
    </div>
    @endsection