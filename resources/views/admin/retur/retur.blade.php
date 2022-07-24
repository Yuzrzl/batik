@extends('layouts.app')
@section('content')

<div class="container p-4">
    <h2 class="text-center text-uppercase">Retur Masuk</h2>
    <div class="content p-4">
        <table class="table p-4">
            <tr>
                <th>Dari</th>
                <th>Email</th>
                <th>Keluhan</th>
                <td></td>
            </tr>
            @foreach ($returs as $retur)
            <tr>
                <td>{{ $retur->user->name }}</td>
                <td>{{ $retur->user->email}}</td>
                <td>{{ $retur->keluhan }}</td>
                <td><a class="btn btn-primary" href="{{ '/detail-retur/'.$retur->id }}">Lihat</a></td>
            </tr>
            @endforeach
        </table>
        {{ $returs->links() }}
    </div>
</div>
@endsection