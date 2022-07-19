@extends('template.home_template')  
@section('home')


    <div class="container p-4 mt-4 bg-black">
        <div class="card bg-white p-4 m-2">
            <h1 class="text-bold text-lg text-center mb-4">Nota Pemesanan</h1>
            @php
                $total = 0;
            @endphp
             <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                 <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <td> Nama Pemesan </td>
                    <td>: {{ Auth::user()->name }}</td>
                    <td>ID PEMESANAN</td>
                    <td>: ex-123456</td>
                </tr>
                <tr>
                    <td> Telepon </td>
                    <td>: {{ Auth::user()->telp }}</td>
                    <td>No Resi</td>
                    <td>: ex-2918291731</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>: {{ Auth::user()->email }}</td>
                    <td>Alamat Tujuan</td>
                    @foreach ($alamat as $item)
                    <td>: {{ $item->alamat}}, {{ $item->destination }}, {{ $item->kodepos }}</td>
                    @endforeach
                    <td></td>
                </tr>
                <tr>
                    <td>Detail Pesanan</td>
                    <td>:</td>
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
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                    <th scope="row" class="px-6 py-4 font-bold text-gray-900 dark:text-white whitespace-nowrap">
                        {{ $cart->product->product_name}}
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
                        Rp. {{ $subtotal = $cart->product->harga*$cart->jumlah }}
                    </th>
                </tr>
                @php
                    $total += ($cart->product->harga*$cart->jumlah);
                @endphp
                @endforeach
                <tr class="border-b bg-white">
                    <td>Ongkos Kirim</td>
                    <td colspan="3">:</td>
                    <td class="p-2 text-bold ">RP. 10000</td>
                </tr>
                <tr class="border-b bg-white">
                    <td class=" text-center" colspan="4"><h1 class="p-2 bold">Total</h1></td>
                    <td class=""><h1 class="p-2 text-bold ">Rp. {{number_format( $total)}}</h1></td>
                    <td class=""></td>
                </tr>
            </tbody>
        </table>
            <div class="content flex justify-end">
                <img class="mr-4" src="{{ asset('images/cap.jpg') }}" alt="" width="200px">
            </div>
        </div>
    </div>

@endsection