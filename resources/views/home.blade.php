@extends('layouts.back.master')

@section('content')
<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$totalAgenda}}</h3>

              <p>TOTAL AGENDA</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('totalAgenda')}}" class="small-box-footer">Print PDF <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <h3>{{$agendaToday}}<sup style="font-size: 20px"></sup></h3>

              <p>AGENDA HARI INI</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route('agendaToday')}}" class="small-box-footer">Print PDF <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <h3>{{$agendaMonth}}</h3>

              <p>AGENDA BULAN INI</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          <a href="{{route('agendaMonth')}}" class="small-box-footer">Print PDF <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>Pdf</h3>

              <p>LAPORAN AGENDA</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          <a href="{{route('pdf')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
      </div>
      <div class="box box-primary">
          {{-- <div class="box-header">
                  <h3 class="box-title">Data Table With Full Features</h3>
                </div> --}}
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Jumlah</th>
                      <th>Tanggal</th>
                      <th>Jam</th>
                      <th>Dari</th>
                      <th>Keperluan</th>
                      <th>Telp</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <?php
                    $no = 1;
                    ?>
                    <tbody>
                      @foreach ($data as $dt)
                        <tr>
                        <td>{{$no++}}</td>
                        <td>{{$dt->nama_tamu}}</td>
                        <td>{{$dt->jumlah_tamu}}</td>
                        <td>{{Carbon\Carbon::parse($dt->tanggal)->format('d-M-Y')}}</td>
                        <td>{{$dt->jam}}</td>
                        <td>{{$dt->instansi}}</td>
                        <td>{{$dt->keperluan}}</td>
                        <td>{{$dt->telp}}</td>
                        <td>
                            <a href={{url("/home/edit/{$dt->id}")}} class="btn btn-xs btn-success"><i class="fa fa-edit"></i> </a>
                            <a href={{url("/home/delete/{$dt->id}")}} class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data Ini..?');"><i class="fa fa-trash"></i> </a>
                        </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
  </div>
@endsection
