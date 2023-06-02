<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use App\Models\KelasModel;
use App\Models\Mahasiswa_MataKuliahModel;
use App\Models\MatKulMahasiswaModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas=KelasModel::all();
        return view('Pertemuan7.Mahasiswa.mahasiswa')
            ->with('kelas', $kelas);
        // $mhs = MahasiswaModel::with('kelas')->get();
        // $paginate = MahasiswaModel::orderBy('nim', 'asc')->paginate(3);
        //  ,['mhs' => $mhs, 'paginate' => $paginate]);
    }

    public function data()
    {
        $data = MahasiswaModel::all();
    
        return DataTables::of($data)
            ->addColumn('kelas', function ($data) {
            return $data->kelas->nama_kelas;
            })
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = KelasModel::all();
        return view('Pertemuan7.Mahasiswa.create_mhs')
                ->with('url_form', url('/mahasiswa'))
                ->with('kelas', $kelas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_old(Request $request)
    {
        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswa,nim',
            'nama' => 'required|string|max:50',
            'foto' => 'required',
            'kelas_id' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|string|max:15',
        ]);

        $foto = $request->file('foto')->store('images', 'public');

        $mahasiswa = new MahasiswaModel;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->foto = $foto;
        $mahasiswa->kelas_id = $request->kelas_id;
        $mahasiswa->jk = $request->jk;
        $mahasiswa->tempat_lahir = $request->tempat_lahir;
        $mahasiswa->tanggal_lahir = $request->tanggal_lahir;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->hp = $request->hp;  
        $mahasiswa->save();

        return redirect('/mahasiswa')->with('success', 'Data berhasil ditambahkan');
    }

    public function store(Request $request)
    {
        $rule = [
            'nim' => 'required|string|max:10|unique:mahasiswa,nim',
            'nama' => 'required|string|max:50',
            'hp' => 'required|digits_between:6,15',
        ];

        $data = $request->all();
        $foto = $request->foto;

        $validator = Validator::make($data, $rule);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal ditambahkan. ' .$validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        if($foto){
            $image_name = $foto->store('images', 'public');
            $data['foto'] = $image_name;

        }

        $mhs = MahasiswaModel::create($data);
        return response()->json([
            'status' => ($mhs),
            'modal_close' => false,
            'message' => ($mhs)? 'Data berhasil ditambahkan' : 'Data gagal ditambahkan',
            'data' => null
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MahasiswaModel  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = MahasiswaModel::where('id', $id)->first();
        $khs = Mahasiswa_MataKuliahModel::where('mahasiswa_id',$id)->get();
        return view('pertemuan7.mahasiswa.detail_mhs')
            ->with('data',$data)
            ->with('khs',$khs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MahasiswaModel  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = KelasModel::all();
        $mhs = MahasiswaModel::where('id',$id)->first();
        // dd($mhs);
        return view('Pertemuan7.Mahasiswa.create_mhs')
            ->with('mhs', $mhs)
            ->with('url_form',url('/mahasiswa/'.$id))
            ->with('kelas', $kelas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MahasiswaModel  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswa,nim,'.$id,
            'nama' => 'required|string|max:50',
            'jk' => 'required',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|string|max:15',
        ]);
        
        $mahasiswa = MahasiswaModel::where('id',$id)->first();
        if ($mahasiswa->foto && file_exists(storage_path('app/public/' . $mahasiswa->foto))) {
            \Storage::delete('public/' . $mahasiswa->foto);
        }
        $foto = $request->file('foto')->store('images', 'public');
        // dd($foto);
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->foto = $foto;
        $mahasiswa->kelas_id = $request->kelas_id;
        $mahasiswa->jk = $request->jk;
        $mahasiswa->tempat_lahir = $request->tempat_lahir;
        $mahasiswa->tanggal_lahir = $request->tanggal_lahir;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->hp = $request->hp;
        $mahasiswa->save();

        return redirect('/mahasiswa')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MahasiswaModel  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MahasiswaModel::where('id', '=', $id)->delete();
        return redirect('mahasiswa')
        ->with('success', 'Data berhasil dihapus');
    }

    public function export_pdf($id) 
    {
        $data = MahasiswaModel::where('id', $id)->first();
        $khs = Mahasiswa_MataKuliahModel::where('mahasiswa_id',$id)->get();
 
        $pdf = Pdf::loadView('Pertemuan7.Mahasiswa.mahasiswa_pdf', ['data'=>$data, 'khs'=>$khs]);
        return $pdf->stream();
    }
}
