<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Alert;

class RoleController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Role::all();
        return view('role.index',compact('data'));
    }

    public function store(Request $req)
    {
        $cek = Role::where('name', $req->name)->first();
        if($cek == null)
        {
            Role::create($req->all());
            Alert::Success('Senna', 'Berhasil Disimpan');
        }
        else {
            Alert::error('Senna', 'Nama role Sudah Ada');
        }
        return back();
    }

    public function update(Request $req)
    {
        $d = Role::find($req->idedit);
        $d->fill($req->all());
        $d->save();
        Alert::Success('Senna', 'Berhasil DiUpdate');
        return back();
    }

    public function delete($id)
    {
        $d = Role::find($id);
        $cek = $d->users()->first();
        if($cek == null)
        {
            $d->delete();
            Alert::Success('Senna', 'Berhasil Dihapus');
            return back();
        }
        else {
            Alert::error('Senna', 'Role Memiliki user');
            return back();
        }
    }
}
