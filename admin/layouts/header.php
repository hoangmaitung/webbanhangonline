 <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Blank</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?>public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>public/admin/css/sb-admin-2.min.css" rel="stylesheet">

  <link href="../../public/css-index-admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="../../public/css-index-admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../../public/css-index-admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../../public/css-index-admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../../public/css-index-admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../../public/css-index-admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../../public/css-index-admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../../public/css-index-admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../../public/css-index-admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../../public/css-index-admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../../public/css-index-admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../../public/css-index-admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>/admin">
          <i class="fas fa-shopping-cart"></i>
          <span>Trang quản lý admin</span></a>
      </li>


      <hr class="sidebar-divider"> 

      <li class="<?php echo isset($open) && $open == 'admin' ? 'active' : ''  ?> nav-item">
        <a class="nav-link" href="<?php echo modules("admin") ?>">
          <i class="fas fa-user-shield"></i>
          <span>Admin</span></a>
      </li>   

      <li class="<?php echo isset($open) && $open == 'user' ? 'active' : ''  ?> nav-item">
        <a class="nav-link" href="<?php echo modules("user") ?>">
          <i class="fas fa-user"></i>
          <span>Khách hàng</span></a>
      </li> 

 

      <li class="<?php echo isset($open) && $open == 'category' ? 'active' : ''  ?> nav-item">
        <a class="nav-link" href="<?php echo modules("category") ?>">
          <i class="fas fa-list"></i>
          <span>Danh mục</span></a>
      </li>


      <li class="<?php echo isset($open) && $open == 'product' ? 'active' : ''  ?> nav-item">
        <a class="nav-link" href="<?php echo modules("product") ?>">
          <i class="fas fa-database"></i>
          <span>Sản phẩm</span></a>
      </li>

      <li class="<?php echo isset($open) && $open == 'transaction' ? 'active' : ''  ?> nav-item">
        <a class="nav-link" href="<?php echo modules("transaction") ?>">
          <i class="fas fa-shopping-cart"></i>
          <span>Quản lý đơn hàng</span></a>
      </li>



      
      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['admin_name'] ?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <a class="dropdown-item" href="/webbanhangonline/dangxuat.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Thoát
                </a>
              </div>
            </li>

          </ul>

        </nav>

