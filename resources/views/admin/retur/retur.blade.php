@extends('layouts.app')
@section('content')

<div class="container p-4">

    <h1>Retur Masuk</h1>
    <div class="content p-4">
        <table class="table p-4">
            <tr>
                <th>Dari</th>
                <th>Keluhan</th>
                <td></td>
            </tr>
            @foreach ($returs as $retur)
            <tr>
                <td>{{ $retur->user->name }}</td>
                <td>{{ $retur->keluhan }}</td>
                <td><a href="{{ '/detail-retur/'.$retur->id }}">Lihat</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection