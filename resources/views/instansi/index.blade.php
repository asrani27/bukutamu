@extends('layouts.back.master')

@section('content')

<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-info"></i> Instansi</h4>
    Adalah Halaman Untuk Jenis Instansi dalam aplikasi
</div>

<div class="row">
  <div class="col-md-6">
    <button type="button" class="btn btn-primary add">Tambah</button><br /><br />
  </div>
</div>
      <div class="box box-primary">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Jenis Instansi</th>
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
                        <td>{{$dt->kode}}</td>
                        <td>{{$dt->jenis}}</td>
                        <td>
                            <button type="button" class="btn btn-xs btn-success edit-user"  data-id="{{$dt->id}}" data-kode="{{$dt->kode}}" data-jenis="{{$dt->jenis}}"><i class="fa fa-edit"></i> </button>
                            <a href={{url("instansi/delete/{$dt->id}")}} class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data Ini..?');"><i class="fa fa-trash"></i> </a>
                          
                        </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
  </div>

  <div class="modal fade" id="add">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" method="post" action={{route('saveInstansi')}}>
                  {{ csrf_field() }}
                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Kode</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="kode" name="kode" required>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Jenis Instansi</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="jenis" name="jenis" required>
                    </div>
                  </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="editUser">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit  </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action={{route('updateInstansi')}}>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Kode</label>
                        <div class="col-sm-10">     
                          <input type="hidden" class="form-control" id="idedit" name="idedit">
                          <input type="text" class="form-control" id="ekode" name="kode">
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Jenis Instansi</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="ejenis" name="jenis">
                      </div>
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endsection

@push('add_js')
<script type="text/javascript">

$(document).ready(function() {
  $(document).on('click', '.add', function() {
      document.getElementById("kode").value = "";
      document.getElementById("jenis").value = "";
      $('#add').modal('show');
  });

  $(document).on('click', '.edit-user', function() {
    $('#idedit').val($(this).data('id'));
    $('#ekode').val($(this).data('kode'));
    $('#ejenis').val($(this).data('jenis'));
    $('#editUser').modal('show');
  });
});
</script>

@endpush
