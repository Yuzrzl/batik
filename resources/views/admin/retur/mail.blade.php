@extends('layouts.app')
@section('content')

    <div class="container p-4">
        <h3>RESPON KE KONSUMEN</h3>
        <form action="/kirim_pesan" method="POST">
            @csrf 
            <label for="">Nama</label>
            <input type="text" name="user" value="{{ $returs->user->name }}" class="form-control">
            {{-- <label for="">Email</label>
            <input type="email" name="email" value="{{ $returs->user->telp }}" class="form-control" disabled>
            <label for="">Subject</label>
            <input type="text" name="subject" value="Retur Pemesanan" class="form-control" disabled>
            <label for="">Pesan</label>
            <textarea type="text" name="message" class="form-control mb-4"></textarea> --}}
            <button class="btn btn-primary" type="submit">Kirim</button>
        </form>
    </div>
@endsection