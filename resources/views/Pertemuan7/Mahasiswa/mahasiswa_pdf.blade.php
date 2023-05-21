<!DOCTYPE html>
<html>
    <style type="text/css">
        table tr td,
        table tr th {
        font-size: 9pt;
        }
        </style>
<h4 class="text-center">JURUSAN TEKNOLOGI INFORMASI - POLITEKNIK NEGERI MALANG</h4>
<h3 class="text-center">KARTU HASIL STUDI (KHS)</h3>

<p><span>Nama:</span> {{$data->nama}}</p>
<p><span>NIM:</span> {{$data->nim}}</p>
<p><span>Kelas:</span> {{$data->kelas->nama_kelas}}</p>

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
    ($khs->count() > 0)
        @foreach($khs as $row)
            <tr>
                <td>{{ $row->matakuliah->nama_matkul }}</td>
                <td>{{ $row->matakuliah->sks }}</td>
                <td>{{ $row->matakuliah->semester }}</td>
                <td>{{ $row->nilai}}</td>
            </tr>
        @endforeach
</html>
