@extends('layouts.app')

@section('content')
<div class="container p-4">

    <label>ID Pesanan : {{ $pesanan->id_pesanan}}</label><br>
    <label>No Transaksi : {{ $pesanan->order_id }}</label><br>
    <label>Nama Pemesan : {{ $pesanan->cart->user->name }}</label><br>
    {{-- @foreach ($pesanan as $item)
        <label>Nama Produk : {{ $item->cart->product->product_name }}</label><br>
    @endforeach --}}
    <label>Status Bayar : {{ $pesanan->orders->status }}</label><br>
    <label>Status Pesanan : </label>
    <table>
        {{-- @foreach ($cart as $row)

        <tr>
            <td>{{ $row->user->name }}</td>
            <td>{{ $row->product->product_name }}</td>
        </tr>
        @endforeach --}}
    </table>
    <form action="{{ '/update_status/'.$pesanan->id }}" method="POST">
        @csrf
        <select class="form-control" name="status" id="">
            <option value="pesanan diterima">pesanan diterima</option>
            <option value="pesanan dibuat">pesanan dibuat</option>
            <option value="diproses">diproses</option>
            <option value="pesanan jadi">pesanan jadi</option>
        </select>
        <label for="">No Resi</label>
        <input type="text" name="resi" class="form-control" value="{{ $pesanan->resi }}">
        <button class="btn btn-primary" type="submit">Proses</button>
    </form>
</div>
@endsection