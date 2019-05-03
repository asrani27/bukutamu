@extends('layouts.back.master')

@section('content')
<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-info"></i> Role</h4>
    Adalah Halaman Untuk membuat Hak Akses bagi user / pengguna
</div>

<div class="row">
  <div class="col-md-6">
    <button type="button" class="btn btn-primary add-user">Tambah Role</button><br /><br />
  </div>
</div>
      <div class="box box-primary">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Roles</th>
                      <th>Deskripsi</th>
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
                        <td>{{$dt->name}}</td>
                        <td>{{$dt->description}}</td>
                        <td>
                            <button type="button" class="btn btn-xs btn-success edit-user"  data-id="{{$dt->id}}" data-name="{{$dt->name}}" data-description="{{$dt->description}}"><i class="fa fa-edit"></i> </button>
                            <a href={{url("role/delete/{$dt->id}")}} class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data Ini..?');"><i class="fa fa-trash"></i> </a>
                          
                        </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
  </div>

  <div class="modal fade" id="addUser">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah Role </h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" method="post" action={{route('saverole')}}>
                  {{ csrf_field() }}
                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Role</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="namerole" name="name">
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="deskripsi" name="description">
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
              <h4 class="modal-title">Edit </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action={{route('updateRole')}}>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Nama Role</label>
                        <div class="col-sm-10">     
                          <input type="hidden" class="form-control" id="idedit" name="idedit">
                          <input type="text" class="form-control" id="editname" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">deskripsi</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="editdeskripsi" name="description">
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
  $(document).on('click', '.add-user', function() {
      document.getElementById("namerole").value = "";
      document.getElementById("deskripsi").value = "";
      $('#addUser').modal('show');
  });

  $(document).on('click', '.edit-user', function() {
    $('#idedit').val($(this).data('id'));
    $('#editname').val($(this).data('name'));
    $('#editdeskripsi').val($(this).data('description'));
    $('#editUser').modal('show');
  });
});
</script>

@endpush
