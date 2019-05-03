<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kecamatan;
use Auth;
use Alert;

class KecamatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Kecamatan::all();
        return view('kecamatan.index',compact('data'));
    }

    public function store(Request $req)
    {
        $cekKode = Kecamatan::where('kode', $req->kode)->first();
        if($cekKode == null)
        {
            $cekNama = Kecamatan::where('nama', $req->nama)->first();
            if($cekNama == null)
            {
                Kecamatan::create($req->all());
                Alert::Success('Senna', 'Berhasil Disimpan');
            }
            else {
                Alert::error('Senna', 'Kecamatan Sudah Ada');
            }
        }
        else {
            Alert::error('Senna', 'Kode Sudah Ada');
        }
        return back();
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
