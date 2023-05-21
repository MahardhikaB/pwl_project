@extends('template')
@section('content')
<a href="{{url('mahasiswa/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>
<table class="table table-bordered table-striped">
    <Head>
        <tr>
            <th>No.</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Kelas</th>
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
                <td><img width="150px" src="{{asset('storage/'.$m->foto)}}" alt=""></td>
                <td>{{ $m->kelas->nama_kelas }}</td>
                <td>{{ $m->jk }}</td>
                <td>{{ $m->hp }}</td>
                <td style="width: 17%">
                    <a href="/mahasiswa/{{ $m->id }}" class="btn btn-sm btn-info w-50">Detail</a>
                    <a href="/mahasiswa/{{ $m->id }}/edit" class="btn btn-sm btn-warning my-1 w-50">Edit</a>
                    <form method="POST" action="{{url('/mahasiswa/'.$m->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger w-50">Delete</button>
                    </form>
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

