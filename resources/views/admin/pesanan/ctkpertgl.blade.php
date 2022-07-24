@extends('layouts.app')

@section('content')
    <div class="container">
            <h2 class="text-center">DAFTAR PESANAN</h2>
                    <div class="card mt-2">
                        <div class="card-body p-0">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>ID Pesanan</th>
                                        <th>ID Order</th>
                                        <th>Status Pesanan</th>
                                        <th>Tanggal Pesan</th>

                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i =1
                                @endphp
                                    @foreach ($pesanan as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->orders->user->name }}</td>
                                        <td>{{ $item->id_pesanan }}</td>
                                        <td>{{ $item->order_id }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->tanggal_pesan }}</td>
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
        </div>
        <script>
            window.print();
        </script>
@endsection