@extends('layouts.back.master')
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

@endpush
@section('content')
<div class="box box-primary">
<form class="form-horizontal" action="{{route('updateAgenda', $data->id)}}" method="POST">
            {{ csrf_field() }}
          <div class="box-body">
            <br />
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Lengkap</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name="nama_tamu" value="{{$data->nama_tamu}}" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Jumlah Tamu</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="jumlah_tamu" value="{{$data->jumlah_tamu}}" onkeypress="return hanyaAngka(event)" required>
              </div>
            </div>
    
            <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Keperluan</label>
                <div class="col-sm-10">
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" name="tanggal" id="datepicker" value="{{ Carbon\Carbon::parse($data->tanggal)->format('m/d/Y') }}">
                    </div>
                </div>
            </div>

            <div class="bootstrap-timepicker">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Waktu Keperluan</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                        <input type="text" class="form-control timepicker" name="jam" value="{{$data->jam}}" >
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Instansi / Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="instansi" required value="{{$data->instansi}}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Nomor HP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="telp" value="{{$data->telp}}" onkeypress="return hanyaAngka(event)" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Isi Keperluan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="keperluan" value="{{$data->keperluan}}" required>
                </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-sm btn-primary">Update</button>
             <a href={{url('/home')}} class="btn btn-sm btn-danger">Kembali</a>
          </div>
          <!-- /.box-footer -->
        </form>
</div>
@endsection


@push('add_js')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<!-- Page script -->
<script>
        $(function () {
          //Initialize Select2 Elements
          $('.select2').select2()
      
          //Datemask dd/mm/yyyy
          $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
          //Datemask2 mm/dd/yyyy
          $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
          //Money Euro
          $('[data-mask]').inputmask()
      
          //Date range picker
          $('#reservation').daterangepicker()
          //Date range picker with time picker
          $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
          //Date range as a button
          $('#daterange-btn').daterangepicker(
            {
              ranges   : {
                'Today'       : [moment(), moment()],
                'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate  : moment()
            },
            function (start, end) {
              $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
          )
      
          //Date picker
          $('#datepicker').datepicker({
            autoclose: true
          })
      
          //iCheck for checkbox and radio inputs
          $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
          })
          //Red color scheme for iCheck
          $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
          })
          //Flat red color scheme for iCheck
          $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
          })
      
          //Colorpicker
          $('.my-colorpicker1').colorpicker()
          //color picker with addon
          $('.my-colorpicker2').colorpicker()
      
          //Timepicker
          $('.timepicker').timepicker({
            showInputs: false,
            showMeridian: false     
          })
        })
      </script>
      <script>
          function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
             if (charCode > 31 && (charCode < 48 || charCode > 57))
       
              return false;
            return true;
          }
        </script>
@endpush
