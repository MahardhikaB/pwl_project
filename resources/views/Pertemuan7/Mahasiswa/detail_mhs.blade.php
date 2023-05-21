@extends('template')

@section('content')
    <h4 class="text-center">JURUSAN TEKNOLOGI INFORMASI - POLITEKNIK NEGERI MALANG</h4>
    <h3 class="text-center">KARTU HASIL STUDI (KHS)</h3>

    <p><span class="font-weight-bold">Nama:</span> {{$data->nama}}</p>
    <p><span class="font-weight-bold">NIM:</span> {{$data->nim}}</p>
    <p><span class="font-weight-bold">Kelas:</span> {{$data->kelas->nama_kelas}}</p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>MataKuliah</th>
            <th>SKS</th>
            <th>Semester</th>
            <th>Nilai</th>
        </tr>
        </thead>
        <tbody>
        @if($khs->count() > 0)
            @foreach($khs as $row)
                <tr>
                    <td>{{ $row->matakuliah->nama_matkul }}</td>
                    <td>{{ $row->matakuliah->sks }}</td>
                    <td>{{ $row->matakuliah->semester }}</td>
                    <td>{{ $row->nilai}}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" class="text-center">Data tidak ada</td>
            </tr>
        @endif

        </tbody>
    </table>
    <a href="/export-pdf/{{$data->id}}" class="btn btn-sm btn-info text-center">Cetak PDF</a>
@endsection