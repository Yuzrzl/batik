@extends('layouts.app')

@section('content')

    <div class="container">
            
            <div class="row">
                <div class="col-lg-12">

                    {{-- <a class="btn btn-primary" role="button" href="{{ 'tambah_produk' }}">Tambah Batik</a> --}}
                    <div class="card mt-2">
                        <div class="card-body p-0">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>ID Pesanan</th>
                                        <th>ID Order</th>
                                        <th>Status Pesanan</th>
                                        <th>Tanggal Pesan</th>
                                        {{-- <th>Tanggal Jadi</th> --}}
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesanan as $item)
                                    <tr>
                                        <td>{{ $item->cart->user->name }}</td>
                                        <td>{{ $item->id_pesanan }}</td>
                                        <td>{{ $item->order_id }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->tanggal_pesan }}</td>
                                        {{-- <td>{{ $item->tanggal_jadi }}</td> --}}
                                        <td><a class="btn btn-primary" href="{{ '/respon-pesanan/'.$item->id }}">proses</a></td>
                                    </tr>
                                    @endforeach
                                    {{-- @foreach ($cart as $row)
                                    <tr>
                                        <td>{{ $row->user->name }}</td>
                                        <td>{{ $row->product->product_name }}</td>
                                    </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                            {{-- {{ $products->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
@endsection