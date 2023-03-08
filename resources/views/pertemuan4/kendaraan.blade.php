@extends('template')
@section('content')
<table class="table">
    <tr>
        <th>Nopol</th>
        <th>Merk</th>
        <th>Jenis</th>
        <th>Tahun</th>
        <th>Warna</th>
    </tr>
    @foreach ($kendaraan as $k)
    <tr>
        <td>{{ $k->nopol }}</td>
        <td>{{ $k->merek }}</td>
        <td>{{ $k->jenis }}</td>
        <td>{{ $k->tahun_buat }}</td>
        <td>{{ $k->warna }}</td>
    </tr>
    @endforeach
</table>
@endsection

