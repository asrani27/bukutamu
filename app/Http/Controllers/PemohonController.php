<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemohon;
use App\Kelurahan;
use App\Kecamatan;
use App\Agama;
use Auth;
use Alert;
use Carbon\Carbon;

class PemohonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Pemohon::all();
        return view('pemohon.index',compact('data'));
    }

    public function add()
    {
        $selectKec = Kecamatan::all();
        $selectAga = Agama::all();
        return view('pemohon.add',compact('selectKec','selectAga'));
    }

    public function dataDesa($id)
    {
        $d = Kelurahan::where('kecamatan_id', $id)->get();
        return response()->json($d);
    }

    public function store(Request $req)
    {
        $cekNik = Pemohon::where('nik', $req->nik)->first();
        $tgl = Carbon::parse($req->tgl_lahir)->format('Y-m-d');
        if($cekNik == null)
        {
            $s = new Pemohon;
            $s->nik                   = $req->nik;
            $s->nama                  = $req->nama;
            $s->jkel                  = $req->jkel;
            $s->tgl_lahir             = $tgl;
            $s->tempat_lahir          = $req->tempat_lahir;
            $s->alamat                = $req->alamat;
            $s->kelurahan_id          = $req->kelurahan_id;
            $s->agama_id              = $req->agama_id;
            $s->pekerjaan             = $req->pekerjaan;
            $s->save();  
            Alert::success('Senna', 'Berhasil Di Simpan!');
        }
        else {
            Alert::error('Senna', 'NIK Sudah Ada');
        }
        return redirect('/pemohon');
    }

    public function edit($id)
    {
        $data = Pemohon::find($id);
        $selectKec = Kecamatan::all();
        $selectAga = Agama::all();
        $selectKel = Kelurahan::all();
        return view('pemohon.edit',compact('data'));
    }
    public function update(Request $req)
    {
        $d = Kecamatan::find($req->idedit);
        $d->fill($req->all());
        $d->save();
        Alert::Success('Senna', 'Berhasil DiUpdate');
        return back();
    }

    public function delete($id)
    {
        try {
            $d = Kecamatan::find($id);
            $d->delete();
            Alert::Success('Senna', 'Berhasil Di hapus');
        }
        catch(\Exception $e) {
            Alert::error('Senna', 'Tidak Bisa Di Hapus! Ada Data Kelurahan Di Kecamatan Ini');
        }
        return back();
    }
}
