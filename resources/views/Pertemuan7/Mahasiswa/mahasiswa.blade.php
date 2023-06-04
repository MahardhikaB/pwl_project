@extends('template')
@section('content')
<button class="btn btn-sm btn-success my-2" data-toggle="modal" data-target="#modal_mahasiswa">Tambah Data</button>
<table class="table table-bordered table-striped" id="data_mahasiswa">
    <thead>
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
    </thead>
    <tbody>
        {{-- @if (count($mhs) > 0)
            {{-- @foreach ($mhs as $i => $m)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $m->nim }}</td>
                <td>{{ $m->nama }}</td>
                <td><img width="100px" src="{{asset('storage/'.$m->foto)}}" alt=""></td>
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
            @endforeach --}}
        {{-- @else 
            <tr>
                <td colspan="6" class="text-center">Data Tidak Ada</td>
            </tr>
        @endif --}}
    </tbody>
</table>
<div class="modal fade" id="modal_mahasiswa" style="display: none;" aria-hidden="true">
    <form method="post" action="{{ url('mahasiswa') }}" role="form" class="form-horizontal" id="form_mahasiswa" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog modal-">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row form-message"></div>
                    <div class="form-group required row mb-2">
                        <label class="col-sm-2 control-label col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="nim" name="nim" value=""/>
                        </div>
                    </div>
                    <div class="form-group required row mb-2">
                        <label class="col-sm-2 control-label col-form-label" for="kelas_id">Kelas</label>
                        <div class="col-sm-10">
                            <select name="kelas_id" id="kelas_id" class="form-control form-control-sm">
                            </select>
                        </div>
                    </div>
                    <div class="form-group required row mb-2">
                        <label class="col-sm-2 control-label col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="nama" name="nama" value=""/>
                        </div>
                    </div>
                    <div class="form-group required row mb-2">
                        <label class="col-sm-2 control-label col-form-label">JK</label>
                        <div class="col-sm-10">
                            <select name="jk" id="jk" class="form-control form-control-sm">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group required row mb-2">
                        <label class="col-sm-2 control-label col-form-label">No. HP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="hp" name="hp" value=""/>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-2 control-label col-form-label">Foto</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control form-control-sm" id="foto" name="foto" value=""/>
                        </div>
                        <div class="col-sm-2" id="imgExist"></div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal fade" id="hapus_mahasiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin menghapus?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger confirm-delete">Delete</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detail_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center">JURUSAN TEKNOLOGI INFORMASI - POLITEKNIK NEGERI MALANG</h4>
                <h3 class="text-center">KARTU HASIL STUDI (KHS)</h3>

                <p><span class="font-weight-bold">Nama:</span>
                    <span id="detailNama"></span>
                </p>
                <p><span class="font-weight-bold">NIM:</span>
                <span id="detailNim"></span>
                </p>
                <p><span class="font-weight-bold">Kelas:</span>
                <span id="detailKelas"></span>
                </p>

                <table class="table table-striped" id="detailTable">
                    <thead>
                    <tr>
                        <th>MataKuliah</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th>Nilai</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            var dataMahasiswa = $('#data_mahasiswa').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{url('mahasiswa/data')}}",
                    dataType: 'json',
                    type: 'POST'
                },
                columns: [
                    {data: 'nomor', name: 'nomor', orderable: false, searchable: false},
                    {data: 'nim', name: 'nim'},
                    {data: 'nama', name: 'nama'},
                    {data: 'foto', name: 'foto',
                    render: function (data, type, full, meta) {
                            return `<img src="{{ asset('storage') }}/${data}" width="100">`;
                        },
                        orderable: false,
                        searchable: false
                    },
                    {data: 'kelas', name: 'kelas', 
                    render: function (data, type, full, meta) {
                            return data;
                        }
                    },
                    {data: 'jk', name: 'jk'},
                    {data: 'hp', name: 'hp'},
                    {data: 'id', name: 'id', sortable: false, searchable: false,
                    render: function (data, type, row) {
                            let btn = '<a href="#" class="btn btn-xs btn-warning btn-edit" data-id="' + data + '" data-toggle="modal" data-target="#modal_mahasiswa"><i class="fa fa-edit"></i> Edit</a>' +
                                '<a href="#" class="btn btn-xs btn-info btn-detail" data-id="' + data + '"><i class="fa fa-list"></i> Detail</a>' +
                                '<button type="button" class="btn btn-xs btn-danger btn-delete" data-id="' + data + '">' +
                                '<i class="fa fa-trash"></i> Hapus' +
                                '</button>';
                            return btn;
                        }
                    },
                ]
            });

            let kelas = {!! json_encode($kelas) !!};
            let kelas_id = $('#kelas_id');
            kelas_id.empty();
            $.each(kelas, function (key, value) {
                kelas_id.append('<option value="' + value.id + '">' + value.nama_kelas + '</option>');
            })

            $(document).on('click', '.btn-edit', function () {
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ url('mahasiswa') }}/" + id + "/edit",
                    method: "GET",
                    dataType: 'json',
                    success: function (data) {
                        $('#form_mahasiswa').attr('action', "{{ url('mahasiswa') }}/" + id);
                        $('#form_mahasiswa').append('<input type="hidden" name="_method" value="PUT">');
                        $('#form_mahasiswa').find('#id').val(data.id);
                        $('#form_mahasiswa').find('#nim').val(data.nim);
                        $('#form_mahasiswa').find('#kelas_id').val(data.kelas_id);
                        $('#form_mahasiswa').find('#nama').val(data.nama);
                        $('#form_mahasiswa').find('#jk').val(data.jk);
                        $('#form_mahasiswa').find('#hp').val(data.hp);
                        $('#form_mahasiswa').find('#imgExist').html('<img class="pr-1" src="{{asset('storage')}}/' + data.foto + '" height="80"/>');
                    }
                });
            });

            $(document).on('click', '.btn-edit', function () {
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ url('mahasiswa') }}/" + id + "/edit",
                    method: "GET",
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        $('#form_mahasiswa').attr('action', "{{ url('mahasiswa') }}/" + id);
                        $('#form_mahasiswa').append('<input type="hidden" name="_method" value="PUT">');
                        $('#form_mahasiswa').find('#id').val(data.id);
                        $('#form_mahasiswa').find('#nim').val(data.nim);
                        $('#form_mahasiswa').find('#kelas_id').val(data.kelas_id);
                        $('#form_mahasiswa').find('#nama').val(data.nama);
                        $('#form_mahasiswa').find('#jk').val(data.jk);
                        $('#form_mahasiswa').find('#hp').val(data.hp);
                        $('#form_mahasiswa').find('#imgExist').html('<img class="pr-1" src="{{asset('storage')}}/' + data.foto + '" height="80"/>');
                    }
                });
            });

            $(document).on('click', '.btn-add', function () {
                $('#form_mahasiswa').attr('action', "{{ url('mahasiswa') }}");
                $('#form_mahasiswa').find('input[name=_method]').remove();
                $('#form_mahasiswa').find('#id').val('');
                $('#form_mahasiswa').find('#nim').val('');
                $('#form_mahasiswa').find('#kelas_id').val('');
                $('#form_mahasiswa').find('#nama').val('');
                $('#form_mahasiswa').find('#jk').val('');
                $('#form_mahasiswa').find('#hp').val('');
                $('#form_mahasiswa').find('#imgExist').html('');
            });

            $(document).on('click', '.btn-delete', function () {
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ url('mahasiswa') }}/" + id + "/edit",
                    method: "GET",
                    dataType: 'json',
                    success: function (data) {
                        // show modal
                        $('#hapus_mahasiswa').modal('show');
                        $('#hapus_mahasiswa').find('.modal-title').text('Yakin ingin menghapus ' + data.nim +' '+ data.nama +'?');
                        $('#hapus_mahasiswa').find('.confirm-delete').attr('data-id', data.id);
                    }
                });
            });

            $(document).on('click', '.confirm-delete', function () {
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ url('mahasiswa') }}/" + id,
                    method: "DELETE",
                    dataType: 'json',
                    success: function (data) {
                        $('#hapus_mahasiswa').modal('hide');
                        if (data.status) {
                            $('.form-message').html('<span class="alert alert-success" style="width: 100%">' + data.message + '</span>');
                            dataMahasiswa.ajax.reload();
                        } else {
                            $('.form-message').html('<span class="alert alert-danger" style="width: 100%">' + data.message + '</span>');
                            alert('error');
                        }
                    }
                });
            });

            $(document).on('click', '.btn-detail', function () {
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ url('mahasiswa') }}/" + id,
                    method: "GET",
                    dataType: 'json',
                    success: function (data) {
                        $('#detail_modal').modal('show');
                        $('#detailNama').text(data.data.nama);
                        $('#detailNim').text(data.data.nim);
                        $('#detailKelas').text(data.data.kelas_id);

                        $('#detailTable').find('tbody').empty();
                        $.each(data.khs, function (index, value) {
                            $('#detailTable').append('<tr>' +
                                '<td>' + value.matakuliah_id + '</td>' +
                                '<td>' + value.semester + '</td>' +
                                '<td>' + value.sks + '</td>' +
                                '<td>' + value.nilai + '</td>' +
                                '</tr>');
                        });
                    }
                });
            });

            $('#form_mahasiswa').submit(function (e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    url: $(this).attr('action'),
                    method: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('.form-message').html('');
                        $('#modal_mahasiswa').modal('hide');
                        if (data.status) {
                            $('.form-message').html('<span class="alert alert-success" style="width: 100%">' + data.message + '</span>');
                            $('#form_mahasiswa')[0].reset();
                            dataMahasiswa.ajax.reload();
                        } else {
                            $('.form-message').html('<span class="alert alert-danger" style="width: 100%">' + data.message + '</span>');
                            alert('error');
                        }
                    }
                });
            });
        })
    </script>
@endpush

