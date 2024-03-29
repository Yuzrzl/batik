@extends('layouts.app')

@section('content')

    <div class="container">
            <h2 class="text-center">DAFTAR PESANAN</h2>
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex flex-row mb-2 p-2">
                        <form action="/pesanan" method="GET">
                            @csrf 
                            <div class="d-flex flex-row ">
                                <input placeholder="Cari ID Pemesanan" name="search" type="search" class="form-control mb-2" style="width: 200px">
                                <button type="submit" class="btn btn-circle p-2 mr-4">Cari</button>
                            </div>
                        </form>
                    </div>
                   
                    <div class="card mt-2">
                        <div class="card-body p-0">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>ID Pesanan</th>
                                        <th>ID Transaksi</th>
                                        <th>Status Pesanan</th>
                                        <th>Status Bayar</th>
                                        <th>Tanggal Pesan</th>
                                        {{-- <th>Tanggal Jadi</th> --}}
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesanan as $item)
                                    <tr>
                                        <td>{{ $item->orders->user->name }}</td>
                                        <td>{{ $item->id_pesanan }}</td>
                                        <td>{{ $item->order_id }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->orders->status }}</td>
                                        <td>{{ $item->tanggal_pesan }}</td>
                                        <td hidden>{{ $item->created_at }}</td>
                                        <td><a class="btn btn-primary" href="{{ '/respon-pesanan/'.$item->id }}">Lihat</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                            {{ $pesanan->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        
@endsection