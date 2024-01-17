
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>WELDING SHOP</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->

    <link href="assets/css/material-icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/google-fonts.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="assets/plugins/animate-css/animate.css" rel="stylesheet" />



    <!-- Bootstrap DatePicker Css -->
    <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />


    <!-- Bootstrap Select Css -->
    <link href="assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

        <!-- Sweetalert Css -->
    <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        <!-- OwlCarousel Css -->
    <link href="assets/custom/css/owl.carousel.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="assets/css/style.css" rel="stylesheet">
        <!-- Custom Css -->
    <link href="assets/custom/css/custom.css" rel="stylesheet">
</head>

<body >


<aside class="navtop">
    <a href="" class="navtop-btn-download">
       
    </a>
    <ul class="navtop-menu">
        <li class="navtop-menu-item">
            <a href="#tentang">Tentang WELDING SHOP</a>
        </li>
        <li class="navtop-menu-item">
            <a href="pages/masuk-penjual.php">Mulai Berjualan</a>
        </li>
    </ul>
</aside>

<aside class="header-top">
    <div class="row">
        <div class="col-md-3">
            <a href="index.php" class="header-top-brand">WELDING SHOP</a>
        </div>
        <div class="col-md-5">
            <form action="" method="post">
                <div class="input-group">
                <input type="text" class="form-control" id="search" required="" placeholder="Cari produk ...">
                <button type="submit">
                    <i class="material-icons">search</i>
                </button>
            </div>
            </form>
        </div>
        <div class="col-md-4">
            <ul class="ul-right">
                <li class="dropdown">
                    <a href="javascript:void(0);" data-toggle="dropdown" class="btn-cart">
                        <i class="material-icons">local_mall</i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-cart">
                        <img src="assets/images/empty.svg" alt="" class="dropdown-menu-cart-img">
                        <span>Wah keranjang belanjaanmu kosong!</span>
                        <p>Daripada dianggurin, mending isi dengan barang-barang yang kamu butuhkan. Yuk cek sekarang!</p>
                    </div>
                </li>
                <li>
                    <a href="pages/masuk.php" class="btn-masuk">
                       Masuk
                    </a>
                </li>
                <li>
                    <a href="pages/daftar.php" class="btn-daftar">
                        Daftar
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>

<aside class="aside-slide " >
<div class="col-md-12">
           <div class="card-produk">
               <div class="body">

                <!-- Slideshoww --> 
                 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  
                      <center> 
                        <!-- Wrapper for Slide -->
                        <div class="carousel-inner">
                            <div class="item active">
                        <img src="assets/images/slider/1.jpg" alt="" style="width: 100%;height: 400px">
    
                            </div>
                            <div class="item">
                        <img src="assets/images/slider/2.jpg" alt="" style="width: 100%;height: 400px">
      
                            </div>
                            <div class="item">
                        <img src="assets/images/slider/3.jpg" alt="" style="width: 100%;height: 400px">
    
                            </div>
                        </div>
                      </center>   
                        <!-- Control -->
                        <a href="#carousel-example-generic" class="carousel-control left" data-slide="prev" role="button">
                          <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a href="#carousel-example-generic" class="carousel-control right" data-slide="next" role="button">
                          <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                      </div>
                <!-- //Slideshoww -->

               </div>
           </div>
        </div>

</aside>


<?php 
      include 'koneksi.php';
      
      if (isset($_GET['page'])) {
        $page = $_GET['page'];
        $file = "$page.php";

        if (!file_exists($file)) {
          include ("pages/home.php");
        }else{
          include ("$page.php");
        }
      }else{
        include ("pages/home.php");
      }
      ?>



<div class="paralax">
    <div class="paralax-images">
        <h2 class="font-bold font-20 text-center m-t-20 col-cyan">
            WELDING SHOP adalah sebuah sistem informasi yang dibangun untuk kebutuhan dalam memperjual belikan suatu produk pengelasan, dan sistem informasi ini dikhususkan untuk daerah Ketapang, Kalimantan Barat.
        </h2>
    </div>
</div>


<div class="container" id="tentang">
    <div class="row">
        <div class="col-md-6">
            <div class="test">
                <div class="owl-carousel">
                    <div class="item bg-amber">
                        <img src="assets/images/slider/w3.jpg" alt="" style="width: 100%;height: 250px">
                    </div>
                    <div class="item bg-light-blue">
                        <img src="assets/images/slider/w2.jpg" alt="" style="width: 100%;height: 250px">
                    </div>
                    <div class="item bg-green">
                        <img src="assets/images/slider/w1.jpg" alt="" style="width: 100%;height: 250px">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h1 class="font-bold font-30 col-cyan">
                        WELDING SHOP
                    </h1>
                </div>
                <div class="body">
                    <p class="font-16">
                        Marketplace Dengan Pilihan Produk Paling Beragam yang di Khususkan Memperjual Belikan Produk Pengelasan. Sistem informasi ini buat dalam rangka untuk mengatasi permasalahan yang ada dalam dunia pengelasan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>





    <!-- Jquery Core Js -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="assets/plugins/node-waves/waves.js"></script>




    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

        <!-- SweetAlert Plugin Js -->
    <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Custom Js -->
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
 
    <script src="assets/custom/js/owl.carousel.js"></script>
    <script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        nav:true,
        items:1,
        dots:true,
        autoplay:true
    });
    // AOS.init();
    $('.carousel-tim').owlCarousel({
        loop:true,
        nav:true,
        items:3,
        dots:true,
        margin:10,
        autoplay:true
    });
</script>

<script>
	 $(document).ready(function() {
            $('#search').on('keyup', function() {
                $.ajax({
                    type: 'POST',
                    url: 'pages/search.php',
                    data: {
                        search: $(this).val()
                    },
                    cache: false,
                    success: function(data) {
                        $('.data').html(data);
                    }
                });
            });
            $('.btn-not').on('click', function(){
                swal("Anda belum login", "Untuk dapat memesan produk, silahkan login terlebih dahulu", "warning");
            });
            $('.btn-not-2').on('click', function(){
                swal("Anda belum login", "Untuk dapat menghubungi penjual, silahkan login terlebih dahulu", "warning");
            });
        });
</script>
</body>


</html>
