@extends('layouts.front.agenda')

@push('add_css')

  <!-- daterange picker -->
  <link rel="stylesheet" href="{{url('LTE/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{url('LTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{url('LTE/plugins/iCheck/all.css')}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{url('LTE/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{url('LTE/plugins/timepicker/bootstrap-timepicker.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{url('LTE/bower_components/select2/dist/css/select2.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('LTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">


@endpush

@section('content')
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
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
        </div>
@endsection

@push('add_js')

<!-- DataTables -->
<script src="{{url('LTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('LTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script>
        $(function () {
          $('#example1').DataTable()
          $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
          })
        })
      </script>
      
<script>

</script>
      
@endpush
