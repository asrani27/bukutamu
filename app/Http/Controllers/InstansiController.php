<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instansi;
use Auth;
use Alert;

class InstansiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Instansi::all();
        return view('instansi.index',compact('data'));
    }

    public function store(Request $req)
    {
        $cekKode = Instansi::where('kode', $req->kode)->first();
        if($cekKode == null)
        {
            $cekJenis = Instansi::where('jenis', $req->jenis)->first();
            if($cekJenis == null)
            {
                Instansi::create($req->all());
                Alert::Success('Senna', 'Berhasil Disimpan');
            }
            else {
                Alert::error('Senna', 'Jenis Sudah Ada');
            }
        }
        else {
            Alert::error('Senna', 'Kode Sudah Ada');
        }
        return back();
    }

    public function update(Request $req)
    {
        $d = Instansi::find($req->idedit);
        $d->fill($req->all());
        $d->save();
        Alert::Success('Senna', 'Berhasil DiUpdate');
        return back();
    }

    public function delete($id)
    {
        $d = Instansi::find($id);
        $d->delete();
        Alert::Success('Senna', 'Berhasil Di hapus');
        return back();
    }
}
