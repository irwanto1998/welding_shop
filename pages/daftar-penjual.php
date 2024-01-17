
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



<section class="page-login bg-cyan">
    
    <div class="container">
       <div class="row-clearfix">
        <div class="col-md-8 m-t-125">
            <img src="../assets/images/w3.jpg" alt="" width="100%" height="400">
            <h3 class="font-bold font-20 text-center col-white m-t-50">Jual Beli Mudah Hanya di WELDING SHOP</h3>
            <p class="col-white text-center">Gabung dan rasakan kemudahan berbelanja di WELDING SHOP</p>
        </div>
        <div class="col-md-4  m-t-80">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="header">
                    <h3 class="font-bold font-20 text-center col-cyan">Berjualan Sekarang</h3>
                    <span class="font-14 m-t-20">
                        Sudah punya akun WELDING SHOP, <a href="masuk-penjual.php" class="font-bold">Masuk</a>
                    </span>
                </div>
                <div class="body">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="nama_penjual" class="form-control" placeholder="Nama lengkap ..." required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="tlp_penjual" class="form-control" placeholder="No.Telepon/HP ..." required="">
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="alamat_penjual" class="form-control" placeholder="Alamat lengkap ..." required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="no_rek"  class="form-control" placeholder="No. Rekening Untuk Berjualan ..." required="">
                        </div>
                    </div>
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
                    <div class="form-group">
                        <label style="display: block;">Foto KTP</label>
                        <input type="file" name="foto_ktp"  class="form-control"  required oninvalid="this.setCustomValidity('Isi Dahulu!')" oninput="setCustomValidity('')">
                      </div>
                    <button type="submit" name="daftar" class="btn bg-cyan btn-block btn-lg font-bold">DAFTAR AKUN</button>
                    <br>
                    <a href="masuk-penjual.php"><b>Kembali</b></a>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>



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
</body>
</html>

<?php 
include '../koneksi.php';
if (isset($_POST['daftar'])) {
  

$nama_penjual = $_POST['nama_penjual'];
$tlp_penjual = $_POST['tlp_penjual'];
$alamat_penjual = $_POST['alamat_penjual'];
$email_penjual = $_POST['email_penjual'];
$password_penjual = $_POST['password_penjual'];
$status_pendaftaran = $_POST['status_pendaftaran'];
$no_rek = $_POST['no_rek'];
$foto_ktp = $_FILES['foto_ktp']['name'];

$simpanData = mysqli_query($koneksi, "INSERT INTO penjual VALUES(NULL,'$nama_penjual','$tlp_penjual','$alamat_penjual','$email_penjual','$password_penjual','$status_pendaftaran','$no_rek','$foto_ktp');");

move_uploaded_file($_FILES['foto_ktp']['tmp_name'],'../superadmin/fotoktp-penjual/'.$foto_ktp);

  if ($simpanData) {
    
    echo "<script>alert('Sukses, Data diproses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=masuk-penjual.php'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali')</script>";
    echo "<meta http-equiv='refresh' content='0; url=daftar-penjual.php'></script>";
  }



}




 ?>
