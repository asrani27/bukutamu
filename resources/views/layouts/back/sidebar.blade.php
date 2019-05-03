<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    {{-- <div class="user-panel">
        <center><img src="{{url('LTE/logo1.png')}}" class="img" widht="60px" height="60px" alt="User Image"></center>
        <p>Administrator<br></p>
    </div> --}}
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU UTAMA</li>
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Ajukan Berkas</a></li>
    </ul>

    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MASTER DATA</li>
        <li><a href="{{route('pemohon')}}"><i class="fa fa-circle"></i> Pemohon</a></li>
        <li><a href="{{route('kecamatan')}}"><i class="fa fa-circle"></i> Kecamatan</a></li>
        <li><a href="{{route('kelurahan')}}"><i class="fa fa-circle"></i> Kelurahan / Desa</a></li>
      <li><a href="{{route('instansi')}}"><i class="fa fa-circle"></i> jenis Instansi</a></li>
      <li><a href="{{route('agama')}}"><i class="fa fa-circle"></i> Agama</a></li>
    </ul>

    {{-- <ul class="sidebar-menu" data-widget="tree">
        <li class="header">REPORT</li>
        <li><a href="{{route('home')}}"><i class="fa fa-circle"></i> Laporan</a></li>
    </ul> --}}
    
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">SETTING</li>
        <li><a href="{{route('role')}}"><i class="fa fa-circle"></i> Roles</a></li>
        <li><a href="{{route('user')}}"><i class="fa fa-users"></i> Account</a></li>
      <li><a href="{{route('logout')}}"><i class="fa fa-close"></i> Logout</a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>