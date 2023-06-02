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
                            console.log(data);
                            return `<img src="{{ asset('storage') }}/${data}" width="100">`;
                        },
                        orderable: false,
                        searchable: false
                    },
                    {data: 'kelas', name: 'kelas', 
                    render: function (data, type, full, meta) {
                            console.log(data);
                            return data;
                        }
                    },
                    {data: 'jk', name: 'jk'},
                    {data: 'hp', name: 'hp'},
                    {data: 'id', name: 'id', sortable: false, searchable: false,
                    render: function (data, type, row) {
                            let btn = '<a href="#" class="btn btn-xs btn-warning btn-edit" data-id="' + data + '" data-toggle="modal" data-target="#modal_mahasiswa"><i class="fa fa-edit"></i> Edit</a>' +
                                '<a href="{{ url("/mahasiswa/") }}/' + data + '" class="btn btn-xs btn-info"><i class="fa fa-list"></i> Detail</a>' +
                                '<form method="POST" action="{{ url("/mahasiswa/") }}/' + data + '">' +
                                '@csrf @method("DELETE")' +
                                '<button type="submit" class="btn btn-xs btn-danger" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini?\')">' +
                                '<i class="fa fa-trash"></i> Hapus' +
                                '</button>' +
                                '</form>';
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

