@extends('template.home_template')  
@section('home')


    
<div class="container mt-4">
    <label for="">Keranjang Saya</label>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        @php
            $total = 0;
        @endphp
        <h1 class="mt-2">{{ $carts->count() }} Produk Pesanan Saya</h1>
        <br>
        <a class="py-2 px-4 bg-yellow-500 text-white rounded-full m-3" href="/home">belanja lagi</a>
        
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jumlah
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Subtotal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $cart)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4"><img src="{{ $cart->product->gambar}}" alt="" style="width: 50px; height:50px"> </td>
                    <th scope="row" class="px-6 py-4 font-bold text-gray-900 dark:text-white whitespace-nowrap">
                        {{ $cart->product->product_name}}
                    </th>
                    <td class="px-6 py-4">
                        {{ $cart->product->kategori}}
                    </td>
                    <td class="px-6 py-4">
                        Rp. {{number_format($cart->product->harga) }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex" id="mainDiv">
                            <form action="/minus" method="POST">
                                @csrf
                                <input type="hidden" name="id_produk" value="{{ $cart->id }}">
                                <button class="px-2 py-1 bg-red-500 text-white rounded-full hover:bg-red-400" type="submit" id="minus">-</button>
                            </form>
                            <span class="py-1 px-2 mx-2 text-lg" id="numberPlace ">{{ $cart->jumlah }}</span>
                            <form action="/plus" method="post">
                                @csrf
                                <input type="hidden" name="id_produk" value="{{ $cart->id }}">
                                <button class="px-2 py-1 bg-blue-500 text-white rounded-full hover:bg-blue-400" type="submit" id="plus">+</button>
                            </form>
                        </div>
                    </td>
                    <th class="px-6 py-4 text-lg">
                        Rp. {{ $subtotal = $cart->product->harga*$cart->jumlah }}
                    </th>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ 'hapus/'.$cart->id }}" class="font-medium p-2 rounded-full bg-red-500 text-white hover:bg-red-400">Hapus</a>
                    </td>
                </tr>
                @php
                    $total += ($cart->product->harga*$cart->jumlah);
                @endphp
                @endforeach
                <tr class="border-b bg-white">
                    <td class="px-6 py-4 text-center" colspan="3">
                            <form action="/kirim" method="POST">
                            @csrf   
                            <button type="submit" class="p-3 bg-green-500 hover:bg-green-300 text-white text-bold rounded-xl">Check Out</button>
                            </form>
                    </td>
                    <td class="bg-yellow-500 px-6 py-4 rounded-bl-lg text-center" colspan="2"><h1 class="p-2 text-xl bold text-white">Total</h1></td>
                    <td class="bg-yellow-500" px-6 py-4 colspan="1"><h1 class="p-2 text-xl bold text-white">Rp. {{number_format( $total)}}</h1></td>
                    <td class="bg-yellow-500" px-6 py-4></td>
                </tr>
                
            </tbody>
        </table>
        
        
    </div>
    
</div>
<script>
    window.onload=function(){
    var minusBtn = document.getElementById("minus"),
        plusBtn = document.getElementById("plus"),
        numberPlace = document.getElementById("numberPlace"),
        submitBtn = document.getElementById("submit"),
        number = 0, /// number value
        min = 0, /// min number
        max = 30; /// max number
        
    minusBtn.onclick = function(){
        if (number>min){
           number = number-1; /// Minus 1 of the number
           numberPlace.innerText = number ; /// Display the value in place of the number
           
        }
        if(number == min) {        
            numberPlace.style.color= "red";
            setTimeout(function(){numberPlace.style.color= "black"},500)
        }
        else {
          numberPlace.style.color="black";            
           }
                
    }
    plusBtn.onclick = function(){
        if(number<max){
           number = number+1;
           numberPlace.innerText = number ; /// Display the value in place of the number
        }     
        if(number == max){
               numberPlace.style.color= "red";
               setTimeout(function(){numberPlace.style.color= "black"},500)
        }
           
        else {
               numberPlace.style.color= "black";
               
        }
     
           
    }
    submitBtn.onclick = function(){
        alert("you choice : " + number);
    }
    
}
</script>


@endsection