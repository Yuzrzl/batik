@extends('layouts.app')
@section('content')


<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Batik') }}</h1>
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

                    <a class="btn btn-primary" role="button" href="{{ 'tambah_produk' }}">Tambah Batik</a>
                    <div class="card mt-2">
                        <div class="card-body p-0">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama Batik</th>
                                        <th>gambar Batik</th>
                                        <th>Harga</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $produk)
                                    <tr>
                                        <td>{{ $produk->product_name }} </td>
                                        <td><img src="{{ $produk->gambar}}" alt="" style="width: 50px; height:50px"> </td>
                                        <td>{{ $produk->harga }} </td>
                                        <td>{{ $produk->kategori }} </td>
                                        <td><a role="button" href="{{ 'edit_p/' .$produk->id}}" class="btn btn-warning">Edit</a>
                                                <span></span> 
                                            <a role="button" href="{{ 'destroy_p/'.$produk->id }}" class="btn btn-danger">Hapus</a></td>
                                    </tr>
                                @endforeach
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
    </div>
@endsection