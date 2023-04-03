@extends('template')
@section('content')
<a href="{{url('mahasiswa/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>
<table class="table table-bordered table-striped">
    <Head>
        <tr>
            <th>No.</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>JK</th>
            <th>HP</th>
            <th>Action</th>
        </tr>
    </Head>
    <tbody>
        @if (count($mhs) > 0)
            @foreach ($mhs as $i => $m)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $m->nim }}</td>
                <td>{{ $m->nama }}</td>
                <td>{{ $m->jk }}</td>
                <td>{{ $m->hp }}</td>
                <td>
                    <a href="/mahasiswa/{{ $m->id }}/edit" class="btn btn-warning">Edit</a>
                    <a href="/mahasiswa/{{ $m->id }}/delete" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        @else 
            <tr>
                <td colspan="6" class="text-center">Data Tidak Ada</td>
            </tr>
        @endif
    </tbody>
</table>
@endsection

