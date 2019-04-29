<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;
use App\Agenda;

class PdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function agendaAll()
    {
        $now = Carbon::now()->format('Y-m-d-h-i-s');
        $data = Agenda::orderBy('id','desc')->get();
        $pdf = PDF::loadView('pdf.totalAgenda', compact('data'))->setPaper('f4', 'landscape');
        return $pdf->download($now.'totalAgenda.pdf');
    }

    public function agendaToday()
    {
        $now = Carbon::now()->format('Y-m-d-h-i-s');
        $hariIni = Carbon::today()->format('d-M-Y');
        $today = Carbon::today()->format('Y-m-d');
        $data = Agenda::where('tanggal', $today)->get();
        $pdf = PDF::loadView('pdf.agendaToday', compact('data','hariIni'))->setPaper('f4', 'landscape');
        return $pdf->download($now.'agendaToday.pdf');
    }

    public function agendaMonth()
    {
        $now = Carbon::now()->format('Y-m-d-h-i-s');
        $bulanIni = Carbon::today()->format('M-Y');
        $now = Carbon::now();
        $month = $now->month;
        $year = $now->year;  
        $data = Agenda::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->get();
        $pdf = PDF::loadView('pdf.agendaMonth', compact('data','bulanIni'))->setPaper('f4', 'landscape');
        return $pdf->download($now.'agendaMonth.pdf');
    }

    public function pdf()
    {
        return view('pdf.pdf');
    }

    public function printpdf(Request $request)
    { 
        //dd($request->all());
        $tglmulai = $request->tgl_mulai;
        $explode  = explode('/', $tglmulai);
        $month    = $explode[0];
        $day      = $explode[1];
        $year     = $explode[2];
        $extglmulai = ($year."-".$month."-".$day);
    
        $tglakhir   = $request->tgl_akhir;
        $explode    = explode('/', $tglakhir);
        $month      = $explode[0];
        $day       = $explode[1];
        $year       = $explode[2];
        $extglakhir = ($year."-".$month."-".$day);
    
        $no   = rand(0,10000);
        $tgl  = Carbon::now()->format('d M Y');
        $data = Agenda::whereBetween('created_at', array($extglmulai, $extglakhir))->get();
        $pdf  = PDF::loadView('pdf.pdfperiode', compact('data','tglmulai','tglakhir'))->setPaper('f4', 'landscape');
        return $pdf->download($no.'pdfreport'.date("Y-m-D-H:m:s").'.pdf');
    }   
}
