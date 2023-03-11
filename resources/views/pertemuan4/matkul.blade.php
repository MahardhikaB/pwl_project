@extends('template')
@section('content')
<table class="table">
    <tr>
        <th>Id</th>
        <th>Matakuliah</th>
        <th>Dosen Pengampu</th>
        <th>Semester</th>
    </tr>
    @foreach ($mata_kuliah as $mk)
    <tr>
        <td>{{ $mk->id }}</td>
        <td>{{ $mk->nama_matkul}}</td>
        <td>{{ $mk->nama_dosen}}</td>
        <td>{{ $mk->semester}}</td>
    </tr>
    @endforeach
</table>
@endsection

