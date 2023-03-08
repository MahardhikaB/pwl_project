@extends('template')
@section('content')
<table class="table">
    <tr>
        <th>Id</th>
        <th>Hobi</th>
        <th>Alasan</th>
    </tr>
    @foreach ($hobi as $h)
    <tr>
        <td>{{ $h->id }}</td>
        <td>{{ $h->nama_hobi }}</td>
        <td>{{ $h->alasan }}</td>
    </tr>
    @endforeach
</table>
@endsection