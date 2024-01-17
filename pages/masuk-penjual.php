<?php 
error_reporting(0);

include '../koneksi.php';


if (isset($_POST['masuk'])) {


  $email_penjual = $_POST['email_penjual'];
  $password_penjual = $_POST['password_penjual'];


// Cek akun penjual apakah sudah aktif
  $log =  mysqli_query($koneksi, "SELECT * FROM penjual WHERE email_penjual='$email_penjual' AND password_penjual='$password_penjual'");
  $data = mysqli_fetch_array($log);

  $status = $data['status_pendaftaran'];

  if ($status == '') {
      echo "<script>alert('Akun anda belum di verifikasi, mohon bersabar.')</script>";
      echo "<meta http-equiv='refresh' content='0; url=masuk-penjual.php'></script>";
  }else if($status == 'Terverifikasi'){
    if(mysqli_num_rows($log) == 1){

    session_start();
    $_SESSION['id_penjual'] = $data['id_penjual'];

    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=../penjual/app.php'></script>";
    } else{
        echo "<script>alert('Terjadi kesalahan, coba ulangi kembali')</script>";
    echo "<meta http-equiv='refresh' content='0; url=masuk-penjual.php'></script>";
    }
  }

  
}

  ?>
    
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>WELDING SHOP</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->

    <link href="../assets/css/material-icons.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/google-fonts.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />


    <!-- Bootstrap Select Css -->
    <link href="../assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

        <!-- Sweetalert Css -->
    <link href="../assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
                <!-- OwlCarousel Css -->
    <link href="../assets/custom/css/owl.carousel.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../assets/css/style.css" rel="stylesheet">
        <!-- Custom Css -->
    <link href="../assets/custom/css/custom.css" rel="stylesheet">
</head>

<body >



<aside class="navtop">
    <ul class="navtop-menu">
        <li class="navtop-menu-item">
            <a href="../index.php">Beranda WELDING SHOP</a>
        </li>
        <li class="navtop-menu-item">
            <a href="#tentang">Tentang WELDING SHOP</a>
        </li>
    </ul>
</aside>


<section class="page-login bg-cyan p-t-125">
    
    <div class="container ">
       <div class="row-clearfix p-b-125">
        <div class="col-md-8">
            <img src="../assets/images/w3.jpg" alt="" width="100%" height="400">
            <h3 class="font-bold font-20 text-center col-white m-t-50">Jual Beli Mudah Hanya di WELDING SHOP</h3>
            <p class="col-white text-center">Gabung dan rasakan kemudahan berbelanja di WELDING SHOP</p>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="header">
                    <h3 class="font-bold font-20 text-center col-cyan">Berjualan Sekarang</h3>
                    <span class="font-14 m-t-20">
                        Sudah punya akun WELDING SHOP, <a href="daftar-penjual.php" class="font-bold">Daftar</a>
                    </span>
                </div>
                <div class="body">
                     <form action="" method="POST" id="form_advanced_validation">
                       <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="email_penjual" class="form-control" placeholder="Email/Username ..." required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="password" name="password_penjual" minlength="5" class="form-control" placeholder="Password ..." required="">
                        </div>
                    </div>


                    <button type="submit" name="masuk" class="btn bg-cyan btn-block btn-lg font-bold">MASUK</button>
                    <br>
                    <a href="../index.php"><b>Kembali</b></a>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="paralax m-t-20">
    <div class="paralax-images">
        <h2 class="font-bold font-20 text-center">
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
                        <img src="../assets/images/slider/w3.jpg" alt="" style="width: 100%;height: 250px">
                    </div>
                    <div class="item bg-light-blue">
                        <img src="../assets/images/slider/w2.jpg" alt="" style="width: 100%;height: 250px">
                    </div>
                    <div class="item bg-green">
                        <img src="../assets/images/slider/w1.jpg" alt="" style="width: 100%;height: 250px">
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

</section>


    <!-- Jquery Core Js -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../assets/plugins/node-waves/waves.js"></script>




    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

        <!-- SweetAlert Plugin Js -->
    <script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>

        <!-- Jquery Validation Plugin Css -->
    <script src="../assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="../assets/js/admin.js"></script>
    <script src="../assets/js/pages/forms/basic-form-elements.js"></script>
     <script src="../assets/custom/js/owl.carousel.js"></script>

    <script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        nav:true,
        items:1,
        dots:false,
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

	$(function () {

    //Advanced Form Validation
    $('#form_advanced_validation').validate({
        rules: {
            'date': {
                customdate: true
            },
            'creditcard': {
                creditcard: true
            }
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
        
    });

    
});
</script>

</body>
</html>
