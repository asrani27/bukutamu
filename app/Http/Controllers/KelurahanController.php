<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelurahan;
use App\Kecamatan;
use Auth;
use Alert;

class KelurahanController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Kelurahan::all();
        $select = Kecamatan::all();
        return view('kelurahan.index',compact('data','select'));
    }

    public function store(Request $req)
    {
        $cekKode = Kelurahan::where('kode', $req->kode)->first();
        if($cekKode == null)
        {
            $cekNama = Kelurahan::where('nama', $req->nama)->first();
            if($cekNama == null)
            {
                Kelurahan::create($req->all());
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
        $d = Kelurahan::find($req->idedit);
        $d->fill($req->all());
        $d->save();
        Alert::Success('Senna', 'Berhasil DiUpdate');
        return back();
    }

    public function delete($id)
    {
        $d = Kelurahan::find($id);
        $d->delete();
        Alert::Success('Senna', 'Berhasil Di hapus');
        return back();
    }
}
