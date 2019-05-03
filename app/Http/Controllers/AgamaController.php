<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agama;
use Auth;
use Alert;

class AgamaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Agama::all();
        return view('agama.index',compact('data'));
    }

    public function store(Request $req)
    {
        $cekNama = Agama::where('nama', $req->nama)->first();
        if($cekNama == null)
        {
            $s = new Agama;
            $s->nama = $req->nama;
            $s->save();
            Alert::Success('Senna', 'Berhasil Disimpan');
        }
        else {
            Alert::error('Senna', 'Nama Agama Sudah Ada');
        }
        return back();
    }

    public function update(Request $req)
    {
        $d = Agama::find($req->idedit);
        $d->nama = $req->nama;
        $d->save();
        Alert::Success('Senna', 'Berhasil DiUpdate');
        return back();
    }

    public function delete($id)
    {
        try {
            $d = Agama::find($id);
            $d->delete();
            Alert::Success('Senna', 'Berhasil Di hapus');
        }
        catch(\Exception $e) {
            Alert::error('Senna', 'Tidak Bisa Di Hapus! Ada Data Pemohon Yang Terkait dengan Agama Ini');
        }
        return back();
    }
}
