@extends('layouts.back.master')

@section('content')
<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-info"></i> Account</h4>
    Adalah Halaman Untuk membuat user admin aplikasi
</div>

<div class="row">
  <div class="col-md-6">
    <button type="button" class="btn btn-primary add-user">Tambah</button><br /><br />
  </div>
</div>
      <div class="box box-primary">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Nama Role</th>
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
                        <td>{{$dt->email}}</td>
                        <td>{{$dt->role}}</td>
                        <td>
                            @if($cekData ==1)
                            <button type="button" class="btn btn-xs btn-success edit-user"  data-id="{{$dt->id}}" data-name="{{$dt->name}}" data-email="{{$dt->email}}"><i class="fa fa-edit"></i> </button>
                           
                            @else
                            <button type="button" class="btn btn-xs btn-success edit-user"  data-id="{{$dt->id}}" data-name="{{$dt->name}}" data-email="{{$dt->email}}"><i class="fa fa-edit"></i> </button>
                            <a href={{url("user/delete/{$dt->id}")}} class="btn btn-xs btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data Ini..?');"><i class="fa fa-trash"></i> </a>
                            @endif
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
            <h4 class="modal-title">Tambah User </h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" method="post" action={{route('simpanuser')}}>
                  {{ csrf_field() }}
                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" placeholder="nama">
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">username</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                     Note : Username menggunakan email
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
              <h4 class="modal-title">Edit User </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action={{route('edituser')}}>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-10">     
                          <input type="hidden" class="form-control" id="idedit" name="idedit">
                          <input type="text" class="form-control" id="name" name="name" placeholder="nama">
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">username</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="editemail" name="email" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="editpassword" name="password" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                       Note : Username menggunakan email<br />
                       Biarkan Pass kosong jika tidak ingin diganti
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
      document.getElementById("inputEmail3").value = "";
      document.getElementById("inputPassword3").value = "";
      $('#addUser').modal('show');
      document.getElementById("inputEmail3").value = "";
      document.getElementById("inputPassword3").value = "";
  });

  $(document).on('click', '.edit-user', function() {
    $('#idedit').val($(this).data('id'));
    $('#name').val($(this).data('name'));
    $('#editemail').val($(this).data('email'));
    document.getElementById("editpassword").value = "";
    $('#editUser').modal('show');
  });
});
</script>

@endpush
