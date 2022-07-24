@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <div class="content">
        <h2 class="p-4 text-center">{{ __('DASHBOARD ADMIN') }}</h2>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">
                                {{ __('Selamat Datang Admin') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="d-flex justify-content-center">
                <div class="content bg-primary bor p-3 m-2 rounded shadow">
                    <h4>Jumlah Pengguna</h4>
                    <h1 class="text-center">{{ $user->count() }}</h1>
                </div>
                <div class="content bg-info bor p-3 m-2 rounded shadow">
                    <h4>Jumlah Produk</h4>
                    <h1 class="text-center">{{ $product->count() }}</h1>
                </div>
                <div class="content bg-secondary bor p-3 m-2 rounded shadow">
                    <h4>Jumlah Transaksi</h4>
                    <h1 class="text-center">{{ $orders->count() }}</h1>
                </div>
                <div class="content bg-success bor p-3 m-2 rounded shadow">
                    <h4>Jumlah Pesanan</h4>
                    <h1 class="text-center">{{ $pesanan->count() }}</h1>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="content bg-danger bor p-4 m-2 rounded shadow justify-center" style="width: 200px">
                    <h4>Jumlah Retur</h4>
                    <h1 class="text-center">{{ $retur->count() }}</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection