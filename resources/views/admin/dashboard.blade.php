@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Dashboard') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
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
                <div class="content bg-yellow bor p-3 m-2 rounded shadow">
                    <h4>Jumlah Pengguna</h4>
                    <h1 class="text-center">{{ $users->count() }}</h1>
                </div>
                <div class="content bg-yellow bor p-3 m-2 rounded shadow">
                    <h4>Jumlah Produk</h4>
                    <h1 class="text-center">{{ $products->count() }}</h1>
                </div>
                <div class="content bg-yellow bor p-3 m-2 rounded shadow">
                    <h4>Jumlah Transaksi</h4>
                    <h1 class="text-center">{{ $orders->count() }}</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection