<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
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
        $dataRole = User::all();
        $data = $dataRole->map(function($item){
            $item->role = $item->roles->first()->name;
            return $item;
        });
        
        $cekData = count($data);
        return view('akun',compact('data','cekData'));
    } 

    public function store(Request $req)
    {
        $cek = User::where('email', $req->email)->first();
        $roleAdmin = Role::where('name','admin')->first();
        if($cek == null)
        {
            User::create($req->all())->attachRole($roleAdmin);
            Alert::success('Senna', 'Berhasil Disimpan');
        }
        else {
            Alert::error('Senna', 'Email Sudah Ada');
        }
        return back();
    }

    public function delete($id)
    {
        $roleAdmin = Role::where('name','admin')->first();
        if($id == Auth::user()->id)
        {   
            Alert::error('Senna','Tidak Dapat Di Hapus, User Sedang Login');
        }
        else {
            $d = User::find($id)->detachRole($roleAdmin);
            $d->delete();
            Alert::success('Senna','Berhasil Dihapus');
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
            $d->password = bcrypt($req->password);
            $d->save();
        }
        Alert::success('Senna', 'Berhasil DiUpdate');
        return back();
    }

}
