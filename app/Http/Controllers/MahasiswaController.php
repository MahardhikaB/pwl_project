<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use App\Models\KelasModel;
use App\Models\Mahasiswa_MataKuliahModel;
use App\Models\MatKulMahasiswaModel;
use Barryvdh\DomPDF\Facade\Pdf;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = MahasiswaModel::with('kelas')->get();
        $paginate = MahasiswaModel::orderBy('nim', 'asc')->paginate(3);
        return view('Pertemuan7.Mahasiswa.mahasiswa', ['mhs' => $mhs, 'paginate' => $paginate]);
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
    public function store(Request $request)
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
