<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use Carbon\Carbon;
use Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::today()->format('Y-m-d');
        $now = Carbon::now();
        $month = $now->month;
        $year = $now->year;
        $data = Agenda::orderBy('id','desc')->get();
        $totalAgenda = count($data);
        $agendaToday = count($data->where('tanggal', $today));
        $agendaMonth = count(Agenda::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->get());
     
        return view('home',compact('data','totalAgenda','agendaToday','agendaMonth'));
    }

    public function delete($id)
    {
        $data = Agenda::find($id);
        $data->delete();
        Alert::success('Diskominfo','Berhasil Di Hapus');
        return back();
    }

    public function edit($id)
    {
        $data = Agenda::find($id);
        return view('editagenda',compact('data'));
    }

    public function update(Request $req, $id)
    {
        $tanggal = Carbon::parse($req->tanggal)->format('Y-m-d');

        $s = Agenda::find($id);
        $s->nama_tamu   = $req->nama_tamu;
        $s->jumlah_tamu = $req->jumlah_tamu;
        $s->tanggal     = $tanggal;
        $s->jam         = $req->jam;
        $s->instansi    = $req->instansi;
        $s->telp        = $req->telp;
        $s->keperluan   = $req->keperluan;
        $s->save();
        
        Alert::success('Diskominfotik', 'Berhasil Diupdate');
        return redirect('/home');
    }
}
