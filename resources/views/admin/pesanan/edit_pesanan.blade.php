@extends('layouts.app')

@section('content')
<div class="container p-4">
    <div class="content p-4 ml-4 justify-center">
    <h2 class="text-center">DETAIL PESANAN</h2>
    <label>ID Pesanan : {{ $pesanan->id_pesanan}}</label><br>
    <label>No Transaksi : {{ $pesanan->order_id }}</label><br>
    <label>Nama Pemesan : {{ $pesanan->orders->user->name }}</label><br>
    <label>Status Bayar : {{ $pesanan->orders->status }}</label><br>
        <div class="card bg-success p-4 m-2" style="width: 18rem;">
        <label>Produk Pesanan: <br>
            @php
            $test = json_decode($isi, true);
            foreach ($test as $key ) {
                echo $key['name'].' : '. $key['quantity'].'<br>';
            }
        @endphp</label><br>
        </div>
    <label>Status Pesanan : </label>
    <table>

    </table>
    <form action="{{ '/update_status/'.$pesanan->id }}" method="POST">
        @csrf
        <select style="width: 18rem;" class="form-control" name="status" id="">
            <option  value="{{$pesanan->status }}">{{ $pesanan->status }}</option>
            <option value="pesanan diterima">Pesanan diterima</option>
            <option value="pesanan dibuat">Pesanan dibuat</option>
            <option value="Pesanan Selesai">Pesanan Selesai</option>
        </select>
        <label class="mt-4" for="">No Resi</label>
        <input style="width: 18rem;"  type="text" name="resi" class="form-control" value="{{ $pesanan->resi }}">
        <button class="btn btn-primary mt-4" type="submit">Proses</button>
    </form>
    </div>
</div>
@endsection