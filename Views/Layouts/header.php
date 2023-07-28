<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Util/Css/css/all.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="Util/Css/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Util/Css/adminlte.min.css">
  <link rel="stylesheet" href="Util/Css/sweetalert2.min.css">
  <link rel="stylesheet" href="Util/Css/select2.min.css">
  <link rel="icon" type="image/png" href="Util/Img/Logos/LogoCentennials.png">
</head> 
<style>
  .page-item.active .page-link{
    background-color: #17A2B8 !important;
  }
  .page-link{
    color: black !important;
  }
  .nav-link.active{
    background-color: #17A2B8 !important;
  }
</style>
<body class="sidebar-mini layout-footer-fixed layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light bg-info">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul id="menu_superior" class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <div id="loader_1" class="overlay">
        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
      </div>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-info elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="Util/Img/Logos/LogoCentennials.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CodeWar</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img id="avatar_menu" src="Util/Img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a id="usuario_menu" href="#" class="d-block"></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul id="menu_lateral" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <div id="loader_2" class="overlay">
          <i class="fas fa-2x fa-sync-alt fa-spin"></i>
        </div>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">