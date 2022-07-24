@extends('template.home_template')  
@section('home')


    <div class="container p-4 mt-4 bg-black">
        <div class="card bg-white p-4 m-2">
            <h1 class="text-bold text-lg text-center mb-4">Nota Pembayaran</h1>

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <td class="p-2"> Nama Pemesan : {{ Auth::user()->name }}</td>
                    <td class="text-bold p-2">Tanggal Pembayaran : {{ $transaksi->created_at }}</td>
                </tr>
                <tr>
                    <td class="p-2"> Telepon : {{ Auth::user()->telp }}</td>
                    <td class="text-bold p-2">ID Transaksi : {{ $transaksi->order_id }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="p-2">Email : {{ Auth::user()->email }}</td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody >
                <tr>
                    <td class="pt-4 text-bold">Status Pembayaran</td>
                    <td class="pt-4 text-bold">Tipe Pembayaran</td>
                    <td class="pt-4 text-bold">Total Pembayaran</td>
                </tr>
                <tr>
                    <td>{{ $transaksi->status }}</td>
                    <td>{{ $transaksi->payment_type }}</td>
                    <td class="text-bold">Rp.  {{ number_format($transaksi->gross_amount) }}</td>
                </tr>
            </tbody>
        </table>
            <div class="content flex justify-end">
                <img class="mr-4" src="{{ asset('images/cap.jpg') }}" alt="" width="200px">
            </div>
        </div>
    </div>

 <script>
            window.print();
        </script>
@endsection