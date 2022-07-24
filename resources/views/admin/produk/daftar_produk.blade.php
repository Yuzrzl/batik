@extends('layouts.app')
@section('content')


<!-- Content Header (Page header) -->
    
    <!-- /.content-header -->
    
    <!-- Main content -->
    <div class="content">
        <h2 class="m-0 text-center">{{ __('PRODUK') }}</h2>
        <div class="container-fluid">
            <div class="d-flex flex-row-reverse mb-2 p-2">
             <form action="/daftar_produk" method="GET">
                    @csrf
                    <div class="d-flex flex-row ">
                        <h5 class="m-2 ">Cari Batik </h5>
                        <input name="search" type="search" class="form-control mb-2" style="width: 200px">
                        <button type="submit" class=" p-2 mr-4"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 
                        3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg></button>
                    </div>
                </form>
            </div>
            <a class="btn btn-primary" role="button" href="{{ 'tambah_produk' }}">Tambah Batik</a>
            <div class="row">
                <div class="col-lg-12">
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
                                        <td><a  role="button" href="{{ 'edit_p/' .$produk->id}}" class="btn btn-warning">Edit</a>
                                                <span></span> 
                                            <a data-toggle="modal" data-target="#exampleModal" role="button" onclick="hapus({{ $produk->id }})" class="btn btn-danger">Hapus</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Yakin Ingin hapus data?
                                </div>
                                <div class="modal-footer">
                                    <a role="button" id="delete" class="btn btn-danger">Hapus</a>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                            {{ $products->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <script>
        function hapus(id){
            document.querySelector('#delete').href="destroy_p/"+id;
            // console.log('hapus')
        }
    </script>
    <script>
function myFunction() {
  var txt = confirm("Hapus Produk?");
  if (txt == false) {
    close();
  } 
}
</script>
@endsection