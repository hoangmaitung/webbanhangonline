<?php

    
 ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="public/css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>Webbanhangonline</title>
</head>

<body>
    <div class="container-fluid">

        <!--------------------------------------------header------------------------------------>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img src="public/images/logo.png" width="100px" height="50px">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"> <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                    <li class="nav-item dropdown">

                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
                    </li>
                </ul>
                
                

            </div>
        </nav>

        <!--------------------------------------------slide------------------------------------>

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="public/images/banner2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="public/images/banner3.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="public/images/banner4.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="public/images/banner5.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!--------------------------------------------menu------------------------------------>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../webbanhangonline/index.php">Trang chủ</a>
                    </li>
                    
                </ul>

                <div class="btn-group" style="margin-right: 30px">
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-filter"></i>
                        Lọc
                      </button>
                      <div class="dropdown-menu">
                            
                        <a class="dropdown-item" href="tanggia.php"><i class=" fa fa-shopping-cart"></i>Tăng đần</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="giamgia.php"><i class="fa fa-sign-out"></i> Giảm dần</a>
                      </div>
                </div>

                <ul class="navbar-nav " style="margin-right: 20px" >

                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                    </form>

                </ul>

                
                
                



                <?php if (isset($_SESSION['name_user'])): ?>
                    <p style="margin-right: 30px; padding-top: 15px; color: red">Xin chào: <?php echo $_SESSION['name_user']  ?></p>
                    <div class="btn-group" style="margin-right: 30px">
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>
                        Tài khoản
                      </button>
                      <div class="dropdown-menu">
                            
                        <a class="dropdown-item" href="giohang.php"><i class=" fa fa-shopping-cart"></i> Giỏ hàng</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="thoat.php"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                      </div>
                    </div>

                <?php else : ?>
                    <form class="form-inline my-2 my-lg-0">
                    <a class="nav-link" href="../webbanhangonline/dangnhap.php">Đăng nhập</a>
                    <a class="nav-link" href="../webbanhangonline/dangky.php">Đăng ký</a>
                    </form>
                <?php endif ; ?>
            </div>
        </nav>
    </div>