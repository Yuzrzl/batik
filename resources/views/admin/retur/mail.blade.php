@extends('layouts.app')
@section('content')

    <div class="container p-4">
        <h3>RESPON KE KONSUMEN</h3>
        <form action="/send-mail" method="GET">
            @csrf 
            {{-- <label for="">Nama</label>
            <input type="text" name="user" value="{{ $returs->user->name }}" class="form-control"> --}}
            <label for="">Email</label>
            <input type="email" name="email" value="{{ $retur->user->email }}" class="form-control">
            <label for="">Pesan</label>
            <textarea type="text" name="body" class="form-control mb-4"></textarea>
            <button class="btn btn-primary" type="submit">Kirim</button>
        </form>
    </div>
@endsection