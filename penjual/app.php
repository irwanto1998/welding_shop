<?php
// error_reporting(0);
session_start();
//cek apakah user sudah login
if(!isset($_SESSION['id_penjual'])){
echo '<script language="javascript">
                alert ("Maaf, Anda belum login silahkan login terlebih dahulu.");
                window.location="../index.php";
     </script>';//jika belum login jangan lanjut..
}else{



include '../koneksi.php';
include '../rupiah.php';

$s_penjual = mysqli_query($koneksi, "SELECT * FROM penjual where id_penjual='$_SESSION[id_penjual]'");
$penjual = mysqli_fetch_array($s_penjual);

$ids = $penjual['id_penjual'];
$namas = $penjual['nama_penjual'];
$tlps = $penjual['tlp_penjual'];
$alamats = $penjual['alamat_penjual'];
$no_rek = $penjual['no_rek'];
$emails = $penjual['email_penjual'];
$password = $penjual['password_penjual'];
$rek = $penjual['no_rek'];
$foto_ktps = $penjual['foto_ktp'];

$jumlahkarakter=1;
$cetaks = substr($namas, 0, $jumlahkarakter);

$myKeranjang = mysqli_query($koneksi, "SELECT kode_keranjang, count(*) AS jumlahData FROM keranjang WHERE status_user='$ids'");
$dKeranjang = mysqli_fetch_array($myKeranjang);
$notif = $dKeranjang['jumlahData'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PENJUAL | WELDING SHOP</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../superadmin/assets/vendors/css/material-icons.css">
    <link rel="stylesheet" href="../superadmin/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../superadmin/assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="../superadmin/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../superadmin/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../superadmin/assets/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
        <!-- plugin css for this page -->
    <link rel="stylesheet" href="../superadmin/assets/vendors/iconfonts/font-awesome/css/font-awesome.min.css" />
    <!-- End plugin css for this page -->
            <!-- Sweetalert Css -->
    <!-- <link href="../superadmin/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" /> -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../superadmin/assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../superadmin/assets/css/demo_1/style.css">
      <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../superadmin/assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="../superadmin/assets/images/favicon.ico" />


  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="app.php" style="font-size: 20px">
            PENJUAL | WELDING SHOP
          <a class="navbar-brand brand-logo-mini" href="app.php">
            A 
          </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">

          <ul class="navbar-nav ml-auto">
           &emsp;
<?php
$ids = $penjual['id_penjual'];
$mychat = mysqli_query($koneksi, "SELECT komentar_id, count(*) AS jumlahData FROM komentar WHERE status_chat='N' AND id_penjual='$ids'");
$dChat = mysqli_fetch_array($mychat);
$notifChat = $dChat['jumlahData'];

?>
             <li class="nav-item dropdown d-none d-xl-inline-block notif-dropdown">
              <a class="nav-link dropdown-toggle dropp" id="notif" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="material-icons">drafts</i>
                <?php 

                  if ($notifChat != 0) {?>
                   <span class="counnter"><?php echo $notifChat ?></span>
                  <?php }else{ ?>
                    <span class="counnter">0</span>
                <?php } ?>
              </a>
              <div class="dropdown-menu dropdown-notif dropdown-menu-right navbar-dropdown" aria-labelledby="notif">
                  <div class="notif-header">
                    <h2>Chat Pembeli</h2>
                  </div>
                  <div class="notif-body">

                     <?php 
                        $my = mysqli_query($koneksi, "SELECT * FROM komentar JOIN produk USING(id_produk) JOIN penjual ON komentar.id_penjual=penjual.id_penjual AND status_chat='N' WHERE produk.id_penjual='$ids' GROUP BY id_produk");
                        while ($chat = mysqli_fetch_array($my))
                         {
                    ?>


                      <div class="notif-item">
                        <img src="../superadmin/produk/gambar/<?php echo $chat['gambar_produk'] ?>" alt="">
                        <span class="name-notif">- <?php echo $chat['nama_produk'] ?> </span>
                        <span>- <font style="color: blue"><?php echo rupiah($chat['harga_produk']) ?></font></span>
                      </div>
                    <?php } ?>
                      
                  </div>
                  <div class="notif-footer">
                    <a href="?page=produk/index">Lihat Chat</a>
                  </div>
              </div>
            </li>

            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <div class="div-img-defaults">
                    <?php echo $cetaks ?>
                  </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <div class="div-img-defaults">
                    <?php echo $cetaks ?>
                  </div>
                  <p class="mb-1 mt-3 font-weight-semibold"><?php echo $namas ?></p>
                  <p class="font-weight-light text-muted mb-0"><?php echo $emails ?></p>
                </div>
                <a href="?page=profil" class="dropdown-item">My Profile 
                  <i class="dropdown-item-icon ti-dashboard"></i>
                </a>
                <a href="logout.php" class="dropdown-item">Sign Out
                  <i class="dropdown-item-icon ti-power-off"></i>
                </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <div class="div-img-defaults">
                    <?php echo $cetaks ?>
                  </div>
                  <div class="dot-indicator"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $namas ?></p>
                  <p class="designation"><?php echo $emails ?></p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item">
              <a class="nav-link" href="app.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="?page=produk/index">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Data Produk</span>
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="?page=pembeli/index">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Data Pembeli</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="?page=custom/index">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Data Custom</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="?page=transaksi/index">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Data Transaksi</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">


<?php 
     

      if (isset($_GET['page'])) {
        $page = $_GET['page'];
        $file = "$page.php";

        if (!file_exists($file)) {
          include ("home.php");
        }else{
          include ("$page.php");
        }
      }else{
        include ("home.php");
      }
      ?>


          <!-- content-wrapper ends -->

        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../superadmin/assets/js/jquery/jquery.min.js"></script>
    <script src="../superadmin/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../superadmin/assets/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="../superadmin/assets/js/shared/off-canvas.js"></script>
    <script src="../superadmin/assets/js/shared/misc.js"></script>
    <!-- endinject -->
            <!-- SweetAlert Plugin Js -->
    <!-- <script src="../superadmin/assets/plugins/sweetalert/sweetalert.min.js"></script> -->
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../superadmin/assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- CK Editor -->
    <script src="../superadmin/assets/css/ckeditor/ckeditor.js"></script>
    <!-- Custom js for this page-->
    <!-- <script src="../superadmin/assets/js/shared/jquery.cookie.js" type="text/javascript"></script> -->
    <!-- End custom js for this page-->
    <script>
       // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    CKEDITOR.replace('editor2')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
    </script>


  </body>
</html>
<?php } ?>