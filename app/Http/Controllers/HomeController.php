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
        //dd($month, $year);
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
}
