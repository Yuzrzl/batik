@extends('layouts.app')

@section('content')

    <!-- Main content -->
    <div class="content">
        <h2 class="p-4 text-center">{{ __('Laporan Transaksi') }}</h2>

        
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-0">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama Pemesan</th>
                                        <th>id Order</th>
                                        <th>Tipe Pembayaran</th>
                                        <th>Status Bayar</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Tanggal Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->order_id }}</td>
                                        <td>{{ $order->payment_type }}</td>
                                        <td>{{ $order->status}}</td>
                                        <td>Rp. {{ number_format($order->gross_amount)  }}</td>
                                        <td>{{ $order->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection