<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <center><img src="{{url('LTE/logo1.png')}}" class="img" widht="60px" height="60px" alt="User Image"></center>
        <p>Administrator<br></p>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU UTAMA</li>
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{route('user')}}"><i class="fa fa-users"></i> Account</a></li>
    <li><a href="{{route('logout')}}"><i class="fa fa-close"></i> Logout</a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>