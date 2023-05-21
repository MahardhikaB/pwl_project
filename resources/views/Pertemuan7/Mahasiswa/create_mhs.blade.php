@extends('template')
@section('content')
<form method="POST" action="{{$url_form}}" enctype="multipart/form-data">
@csrf
{!!isset($mhs)?method_field('PUT'):''!!}

<div class="form-group">
    <label for="nim">NIM</label>
    <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" value="{{isset($mhs)?$mhs->nim:old('nim')}}">
    @error('nim')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="{{isset($mhs)?$mhs->nama:old('nama')}}">
    @error('nama')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="foto">Foto</label>
    <input type="file" class="form-control" id="foto" name="foto" placeholder="Lampirkan Foto" value="{{isset($mhs)?$mhs->foto:old('foto')}}">
    @error('foto')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="kelas_id">Kelas</label>
    <select class="form-control" id="kelas_id" name="kelas_id">
        @foreach ($kelas as $kls)
            <option value="{{$kls->id}}">{{$kls->nama_kelas}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="jk">Jenis Kelamin</label>
    <select class="form-control" id="jk" name="jk">
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select>
</div>

<div class="form-group">
    <label for="nama">Tempat Lahir</label>
    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="{{isset($mhs)?$mhs->tempat_lahir:old('tempat_lahir')}}">
    @error('tempat_lahir')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="nama">Tanggal Lahir</label>
    <input type="date" class="form-control" id="tanggl_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="{{isset($mhs)?$mhs->tanggal_lahir:old('tanggal_lahir')}}">
    @error('tanggal_lahir')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="nama">Alamat</label>
    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="{{isset($mhs)?$mhs->alamat:old('alamat')}}">
    @error('alamat')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="hp">No. HP</label>
    <input type="text" class="form-control" id="hp" name="hp" placeholder="Masukkan No. HP" value="{{isset($mhs)?$mhs->hp:old('hp')}}">
    @error('hp')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
@endsection