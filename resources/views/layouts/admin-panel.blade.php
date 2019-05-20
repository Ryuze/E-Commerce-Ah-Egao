<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | @yield('title')</title>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('node_modules\bootstrap\dist\css\bootstrap-grid.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/baru.css') }}">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" id="app">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/admin') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" data-toggle="push-menu" role="button">
        <img src="{{ asset('images/menu2.png') }}" class="img-circle">
      </a>
      
      <div class="head-kanan">
        <a id="navbarDropdown" class="nav-link dropdown-toggle warna text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name }}
          <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
           @csrf
          </form>
        </div>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="image">
          <img src="{{ asset('images/admin.png') }}" class="img-circle" alt="User Image">
          <span class="pl-3 warna info">
            {{Auth::user() -> name}}
          </span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="{{ url('/product') }}"><i class="fa fa-link"></i> <span>Product</span></a></li>
        <li class="active"><a href="{{ url('/pesanan') }}"><i class="fa fa-link"></i> <span>Pesanan</span></a></li>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      @yield('head-content')
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('node_modules\bootstrap\dist\js\bootstrap.bundle.min.js') }}"></script>
</body>
</html>