<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Alert;
use Auth;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = User::all();
        $cekData = count($data);
        return view('akun',compact('data','cekData'));
    } 

    public function store(Request $req)
    {
        $cek = User::where('email', $req->email)->first();
        if($cek == null)
        {
            User::create($req->all());
            Alert::success('Diskominfotik', 'Berhasil Disimpan');
        }
        else {
            Alert::error('Diskominfotik', 'Email Sudah Ada');
        }
        return back();
    }

    public function delete($id)
    {
        if($id == Auth::user()->id)
        {   
            Alert::error('Diskominfotik','Tidak Dapat Di Hapus, User Sedang Login');
        }
        else {
            $d = User::find($id);
            $d->delete();
            Alert::success('Diskominfotik','Berhasil Dihapus');
        }
        return back();
    }

    public function update(Request $req)
    {   
        $d = User::find($req->idedit);
        if($req->password == null)
        {
            $d->name = $req->name;
            $d->email = $req->email;
            $d->save();
        }
        else {
            $d->name = $req->name;
            $d->email = $req->email;
            $d->password = $req->password;
            $d->save();
        }
        Alert::success('Diskominfotik', 'Berhasil DiUpdate');
        return back();
    }

}
