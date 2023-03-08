@extends('template')
@section('content')
<table class="table">
    <tr>
        <th>Id</th>
        <th>Nama</th>
        <th>Relasi</th>
    </tr>
    @foreach ($keluarga as $k)
    <tr>
        <td>{{ $k->id }}</td>
        <td>{{ $k->nama }}</td>
        <td>{{ $k->relasi}}</td>
    </tr>
    @endforeach
</table>
@endsection