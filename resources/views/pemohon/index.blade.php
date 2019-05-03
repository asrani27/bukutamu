@extends('layouts.back.master')

@section('content')
<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-info"></i> Pemohon</h4>
    Adalah Halaman Untuk membuat biodata pemohon yang mengajukan berkas sertifikat
</div>

<div class="row">
  <div class="col-md-6">
  <a href="{{route('addPemohon')}}" class="btn btn-primary">Tambah</a><br /><br />
  </div>
</div>
      <div class="box box-primary">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>NIK</th>
                      <th>Nama Pemohon</th>
                      <th>Gender</th>
                      <th>Akun</th>
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
                        <td>{{$dt->nik}}</td>
                        <td>{{$dt->nama}}</td>
                        <td>{{$dt->jkel}}</td>
                        <td>
                          @if($dt->user_id == null)
                          <button type="button" class="btn btn-xs btn-primary">Buat Akun</button>
                          @else
                          {{$dt->user_id}}
                          @endif
                        </td>
                        <td>
                          <a href={{url("pemohon/edit/{$dt->id}")}} class="btn btn-xs btn-success"><i class="fa fa-edit"></i> </a>
                          <a href={{url("pemohon/delete/{$dt->id}")}} class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data Ini..?');"><i class="fa fa-trash"></i> </a>
                          
                        </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
  </div>

@endsection

@push('add_js')
<script type="text/javascript">

$(document).ready(function() {
});
</script>

@endpush
