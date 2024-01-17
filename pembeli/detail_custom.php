<?php
// error_reporting(0);
session_start();
//cek apakah user sudah login
if(!isset($_SESSION['id_pembeli'])){
echo '<script language="javascript">
                alert ("Maaf, Anda belum login silahkan login terlebih dahulu.");
                window.location="../index.php";
     </script>';//jika belum login jangan lanjut..
}else{



include '../koneksi.php';
include '../rupiah.php';

$s_pembeli = mysqli_query($koneksi, "SELECT * FROM pembeli where id_pembeli='$_SESSION[id_pembeli]'");
$pembeli = mysqli_fetch_array($s_pembeli);

$ids = $pembeli['id_pembeli'];
$namas = $pembeli['nama_pembeli'];
$tlps = $pembeli['tlp_pembeli'];
$alamats = $pembeli['alamat_pembeli'];
$emails = $pembeli['email_pembeli'];
$passwords = $pembeli['password_pembeli'];
$gambars = $pembeli['gambar_pembeli'];



$jumlahkarakter=1;
$cetaks = substr($namas, 0, $jumlahkarakter);

$myKeranjang = mysqli_query($koneksi, "SELECT kode_keranjang, count(*) AS jumlahData FROM keranjang WHERE status_user='$ids'");
  $dKeranjang = mysqli_fetch_array($myKeranjang);
  $notif = $dKeranjang['jumlahData'];


if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
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

    <!-- Csrf Token -->
      <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">

    <style>
        .btn-download{
            position: relative;
            overflow: hidden;
            height: 40px !important;
            line-height: 35px;
            width: 200px;
            transition: .5s ease;
        }
        .btn-download:hover i,
        .btn-download:focus i{
            display: block;
        }
        .btn-download span{
            transition: .5s ease; 
        }
        .btn-download:hover span,
        .btn-download:focus span{
            display: none;
        }
        .btn-download i{
            display: none;   
            transition: .5s ease;       
        }
    </style>
</head>

<body >


<aside class="navtop">
    <ul class="navtop-menu">
        <li class="navtop-menu-item">
            <a href="#tentang">Tentang WELDING SHOP</a>
        </li>
         <li class="navtop-menu-item">
            <a href="app.php">Produk WELDING SHOP</a>
        </li>
    </ul>
</aside>

<aside class="header-top">
    <div class="row">
        <div class="col-md-3">
            <a href="app.php" class="header-top-brand">WELDING SHOP</a>
        </div>

        <div class="col-md-6 ul-left">
            <form action="" method="post">
                <div class="input-group">
                <input type="text" class="form-control" id="search" required="" placeholder="Cari produk ...">
                <button type="submit">
                    <i class="material-icons">search</i>
                </button>
            </div>
            </form>
        </div>
        <div class="col-md-3">
            <ul class="ul-right">
                <li class="dropdown">
                    <a href="javascript:void(0);" data-toggle="dropdown" class="btn-cart-user">
                        <i class="material-icons">local_mall</i>
                        <span><?php echo $notif ?></span>
                    </a>
                     <?php 

                    if ($notif == 0) {?>
                         <div class="dropdown-menu dropdown-menu-cart">
                            <img src="../assets/images/empty.svg" alt="" class="dropdown-menu-cart-img">
                            <span>Wah keranjang belanjaanmu kosong!</span>
                            <p>Daripada dianggurin, mending isi dengan barang-barang yang kamu butuhkan. Yuk cek sekarang!</p>
                        </div>
                    <?php }else{?>
                        <ul class="dropdown-menu menu-notification">
    <li class="header">KERANJANG BELANJA</li>
    <li class="body">
        <ul class="menu">
           <?php 

           $tampilKeranjang = mysqli_query($koneksi, "SELECT * FROM keranjang JOIN produk ON keranjang.id_produk=produk.id_produk WHERE keranjang.status_user='$ids'");
           while ($xsc = mysqli_fetch_array($tampilKeranjang)) {
               ?>
               <li>
                <a href="javascript:void(0);">
                    <div class="img-notifications">
                        <img src="../superadmin/produk/gambar/<?php echo $xsc['gambar_produk'] ?>" alt="">
                    </div>
                    <div class="menu-info">
                        <h4><?php echo $xsc['nama_produk'] ?></h4>
                        <span><?php echo rupiah($xsc['harga_produk']) ?></span>
                    </div>
                </a>
            </li>
        <?php } ?>
    </ul>
</li>
<li class="footer">
    <a href="app.php?page=keranjang">Lihat Keranjang</a>
</li>
</ul>
                   <?php } ?>
                </li>
&nbsp;

<?php
  $ids = $pembeli['id_pembeli'];
  $my = mysqli_query($koneksi, "SELECT komentar_id, count(*) AS jumlahData FROM  komentar JOIN produk USING(id_produk) WHERE status_penjual='N' AND id_pembeli='$ids' ");
  $Chat = mysqli_fetch_array($my);
  $NCT = $Chat['jumlahData'];

?>

                <li class="dropdown">
                    <a href="javascript:void(0);" data-toggle="dropdown" class="btn-cart-user">
                        <i class="material-icons">drafts</i>
                        <span><?php echo $NCT ?></span>
                    </a>
                     <?php 

                    if ($NCT == 0) {?>
                         <div class="dropdown-menu dropdown-menu-cart">
                            <img src="../assets/images/1.png" alt="" class="dropdown-menu-cart-img">
                            <span>Belum ada balesan chat</span>
                        </div>
                    <?php }else{?>
                        <ul class="dropdown-menu menu-notification">
    <li class="header">Notifikasi Chat</li>
    <li class="body">
        <ul class="menu">
           <?php 
                        $my = mysqli_query($koneksi, "SELECT * FROM komentar JOIN produk USING(id_produk) JOIN penjual ON komentar.id_penjual=penjual.id_penjual AND status_penjual='N' WHERE id_pembeli='$ids' GROUP BY id_produk");
                        while ($CC = mysqli_fetch_array($my))
                         {
                    ?>
               <li>
                <a href="javascript:void(0);">
                    <div class="img-notifications">
                        <img src="../superadmin/produk/gambar/<?php echo $CC['gambar_produk'] ?>" alt="">
                    </div>
                    <div class="menu-info">
                        <h4><?php echo $CC['nama_produk'] ?></h4>
                        <span><?php echo rupiah($CC['harga_produk']) ?></span>
                    </div>
                </a>
            </li>
        <?php } ?>
    </ul>
</li>
<li class="footer">
    <a href="app.php?page=produk/index1">Lihat Chat</a>
</li>
</ul>
                   <?php } ?>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0);" data-toggle="dropdown" class="user-class-name">
                       <?php echo $namas ?>
                    </a>
                    <div class="dropdown-menu user-account-dropdown">
                        <ul>
                            <li>
                                <a href="app.php?page=akun">
                                    <i class="material-icons">person</i> My Account
                                </a>
                            </li>
                            <li>
                                <a href="app.php?page=produk/index1">
                                    <i class="material-icons">chat</i>Riwayat Chat
                                </a>
                            </li>
                            <li>
                                <a href="logout.php" onclick="return confirm('Yakin ingin keluar ?!');">
                                    <i class="material-icons">power_off</i> Keluar
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</aside>


<section class="container m-b-125">

  <div class="row-clearfix">
    <div class="col-md-12">
      <h2 class="font-20 font-bold col-cyan m-t-125 m-b-20 text-center">Detail Pemesanan Custom</h2>
    </div>
  </div>

 <div class="row-clearfix">

    <div class="col-md-12">
      <div class="card">
         <div class="body">
                     <?php 

  $id_custom = $_GET['id_custom'];
  $my = mysqli_query($koneksi, "SELECT * FROM custom JOIN pembeli ON custom.id_pembeli=pembeli.id_pembeli WHERE custom.id_custom='$id_custom'");
  $d = mysqli_fetch_array($my);
?>       


          <div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
          
                   
                   
                      <div class="row">
                        <div class="col-lg-4">
                          <table class="table">
                            <tr>
                              <th>Pembeli</th>
                              <td></td>
                              <td><?php echo $d['nama_pembeli'] ?></td>
                            </tr>
                            <tr>
                              <th>Telepon</th>
                              <td></td>
                              <td><?php echo $d['tlp_pembeli'] ?></td>
                            </tr>
                            <tr>
                              <th>Email</th>
                              <td></td>
                              <td><?php echo $d['email_pembeli'] ?></td>
                            </tr>
                            <tr>
                              <th>Alamat</th>
                              <td></td>
                              <td><?php echo $d['alamat_pembeli'] ?></td>
                            </tr>
                          </table>
                        </div>
                        <div class="col-lg-4">
                          <table class="table">
                            <tr>
                              <th>Tanggal, Waktu Pemesanan</th>
                              <td></td>
                              <td><?php echo $d['tgl_custom'] ?></td>
                            </tr>
                          
                            
                          </table>

                        </div>
                        <div class="col-lg-4">
                          <table class="table">
                            <tr>
                              <th>DP</th>
                              <td></td>
                              <td>
                                <?php 
                                    if ($d['dp']==0) {
                                      echo "-";
                                    }else{
                                      echo "$d[dp]";
                                    }

                                 ?> 
                              </td>
                            </tr>
                            <tr>
                              <th>Bukti Pembayaran</th>
                              <td></td>
                              <td>
                                <?php 
                                    if ($d['bukti_bayar']=='') {
                                      echo "Belum ada bukti pembayaran";
                                    }else{
                                      echo "<a href='#bukti$d[id_custom]' data-toggle='modal'>
                                      <img src='../superadmin/custom/gambar/$d[bukti_bayar]' style='width: 150px;height: 120px'>
                                      </a>";
                                    }

                                 ?> 
                              </td>
                            </tr>
                           
                            
                          </table>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-12">
                          <table class="table">
                            <tr>
                              <th><center>Gambar</center></th>
                              <th><center>Barang</center></th>
                              <th><center>Ukuran Panjang (Meter)</center></th>
                              <th><center>Ukuran Lebar (Meter)</center></th>
                              <th><center>Harga Awal</center></th>
                              <th><center>Sisa Harga</center></th>
                              <th><center>Deskripsi</center></th>
                            </tr>
                             <tr>
                              <td class="py-1">
                                  <center><a href="#ambil<?php echo $d['id_custom'] ?>" data-toggle="modal">
                                      <img src="../superadmin/custom/gambar/<?php echo $d['gambar_custom'] ?>" alt="image" />
                                  </a></center>
                              </td>
                              <td><center><?php echo $d['nama_custom'] ?></center></td>
                              <td><center><?php echo $d['ukuran_panjang'] ?></center></td>
                              <td><center><?php echo $d['ukuran_lebar'] ?></center></td>
                              <td><center><?php echo $d['harga_custom'] ?></center></td>
                              <td><center><?php echo $d['sisa_harga'] ?></center></td>
                              <td><center><?php echo $d['deskripsi_custom'] ?></center></td>

                            </tr>


                          </table>
                        </div>
                      </div>

          <div class="row">
                          <div class="col-md-12 ">
                       <a href="app.php?page=akun" class="btn btn-primary btn bg-teal pull-right col-white font-bold m-t-20 col-md-0" style="margin-left: 20px;">Kembali</a>
                          </div>
                        </div>

        
              </div>

            </div>
          </div>



<!-- Modal hapus -->
<div class="modal fade" id="bukti<?php echo $d['id_custom'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999;">
  <div class="modal-dialog" role="document">

  <form class="mt-5" method="post" action="aksi_bayar.php" enctype="multipart/form-data">
    <input type="hidden" name="id_custom" value="<?php echo $d['id_custom'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">Bukti Pembayaran</h5>
      </div>
      <div class="modal-body">
          <img src="../superadmin/custom/gambar/<?php echo $d['bukti_bayar'] ?>" alt="" style="width: 100%;height: 400px">
      </div>
    </div>
  </form>
  </div>
</div>
<!-- #END# Modal hapus -->



<!-- Modal hapus -->
<div class="modal fade" id="ambil<?php echo $d['id_custom'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999;">
  <div class="modal-dialog" role="document">

  <form class="mt-5" method="post" action="aksi_bayar.php" enctype="multipart/form-data">
    <input type="hidden" name="id_custom" value="<?php echo $d['id_custom'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">Produk</h5>
      </div>
      <div class="modal-body">
          <img src="../superadmin/custom/gambar/<?php echo $d['gambar_custom'] ?>" alt="" style="width: 100%;height: 400px">
      </div>
    </div>
  </form>
  </div>
</div>
<!-- #END# Modal hapus -->




<?php 




// lunasi orderan
if (isset($_POST['lunas'])) {

$id_custom = $_POST['id_custom'];
$harga_custom = $_POST['harga_custom'];

$hapusData =  mysqli_query($koneksi, "UPDATE custom SET status_custom='Selesai', status_pembayaran='Lunas', dp='$harga_custom' WHERE id_custom='$id_custom'");
  if ($hapusData) {
    echo "<script>alert('Orderan telah dikonfirmasi')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/detail&id_custom=$id_custom'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/detail&id_custom=$id_custom'></script>";
  }

}


// konfirmasi orderan
if (isset($_POST['Terkonfirmasi'])) {

$id_custom = $_POST['id_custom'];

$hapusData =  mysqli_query($koneksi, "UPDATE custom SET status_custom='Proses' WHERE id_custom='$id_custom'");
  if ($hapusData) {
    echo "<script>alert('Orderan telah dikonfirmasi')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/detail&id_custom=$id_custom'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/detail&id_custom=$id_custom'></script>";
  }

}

// proses orderan
if (isset($_POST['proses'])) {

$id_custom = $_POST['id_custom'];

$hapusData =  mysqli_query($koneksi, "UPDATE custom SET status_custom='Proses' WHERE id_custom='$id_custom'");
  if ($hapusData) {
    echo "<script>alert('Orderan telah diproses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/detail&id_custom=$id_custom'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/detail&id_custom=$id_custom'></script>";
  }

}

// selesai orderan
if (isset($_POST['selesai'])) {

$id_custom = $_POST['id_custom'];

$hapusData =  mysqli_query($koneksi, "UPDATE custom SET status_custom='Selesai' WHERE id_custom='$id_custom'");
   if ($hapusData) {
    echo "<script>alert('Orderan telah selesai')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/detail&id_custom=$id_custom'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/detail&id_custom=$id_custom'></script>";
  }

}



 ?>


        



         </div>
      </div>
    </div>

  </div>

</section>
</form>




<?php 

      if (isset($_GET['page'])) {
        $page = $_GET['page'];
        $file = "$page.php";

        if (!file_exists($file)) {
          
        }else{
          include ("$page.php");
        }
      }else{
    
      }
      ?>







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

    <!-- Demo Js -->
 
    <script src="../assets/custom/js/owl.carousel.js"></script>
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
                    url: 'search.php',
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
        });
</script>

  
</body>
</html>
<?php } ?>
