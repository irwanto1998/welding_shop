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

        <!-- Csrf Token -->
    <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">

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
            <li class="nav-item dropdown d-none d-xl-inline-block notif-dropdown">
              <a class="nav-link dropdown-toggle dropp" id="notif" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="material-icons">local_mall</i>
                <?php 

                  if ($notif != 0) {?>
                   <span class="counnter"><?php echo $notif ?></span>
                  <?php }else{ ?>
                    <span class="counnter">0</span>
                <?php } ?>
              </a>
              <div class="dropdown-menu dropdown-notif dropdown-menu-right navbar-dropdown" aria-labelledby="notif">
                  <div class="notif-header">
                    <h2>KERANJANG BELANJA</h2>
                  </div>
                  <div class="notif-body">
                    <?php 
                        $mys = mysqli_query($koneksi, "SELECT * FROM keranjang JOIN produk USING(id_produk) WHERE status_user='$ids'");
                        while ($ds = mysqli_fetch_array($mys)) {
                         ?>
                      <div class="notif-item">
                        <img src="../superadmin/produk/gambar/<?php echo $ds['gambar_produk'] ?>" alt="">
                        <span class="name-notif"><?php echo $ds['nama_produk'] ?></span>
                        <span class="prices-notif"><?php echo rupiah($ds['harga_produk']) ?></span>
                      </div>
                    <?php } ?>
                      
                  </div>
                  <div class="notif-footer">
                    <a href="app.php?page=keranjang&kode_keranjang=<?php echo $dKeranjang['kode_keranjang'] ?>">Lihat keranjang belanja</a>
                  </div>
              </div>
            </li>&emsp;
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
                    <a href="app.php?page=produk/index">Lihat Chat</a>
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
                <a href="app.php?page=profil" class="dropdown-item">My Profile 
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
              <a class="nav-link" href="app.php?page=produk/index">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Data Produk</span>
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="app.php?page=pembeli/index">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Data Pembeli</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="app.php?page=custom/index">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Data Custom</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="app.php?page=transaksi/index">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Data Transaksi</span>
              </a>
            </li>
          </ul>
        </nav>


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
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">

                        <?php
                           $s=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id_produk]'");
                           $data_s=mysqli_fetch_assoc($s);
                        ?>

    <div class="header">
       <center> <img src="../superadmin/produk/gambar/<?php echo $data_s['gambar_produk'] ?>" alt="" style="width: 20%;height: 150px"><br>
        <span class="font-20 font-bold col-cyan"><?php echo $data_s['nama_produk'];?> - <?php echo rupiah( $data_s['harga_produk']);?></span></center>

    </div>
                       
      <div class="body">
       <form action="" method="POST" id="form_komen">
                    <div class="form-group">
                      <input type="hidden" name="nama_penjual" id="nama_penjual" class="form-control" value="<?php echo $namas ?>" placeholder="Masukkan Nama" />
                      <input type="hidden" name="id_penjual" id="id_penjual" class="form-control" value="<?php echo $ids ?>" placeholder="Masukkan Nama" />
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="nama_produk" id="nama_produk" class="form-control" value="<?php echo $data_s['nama_produk'];?>" placeholder="nama produk" />
                      <input type="hidden" name="id_produk" id="id_produk" class="form-control" value="<?php echo $data_s['id_produk'];?>" placeholder="nama produk" />

                      <?php
                           $s=$koneksi->query("SELECT * FROM komentar WHERE id_pembeli='$_GET[id_pembeli]'");
                           $P=mysqli_fetch_assoc($s);
                        ?>

                      <input type="hidden" name="id_pembeli" id="id_pembeli" class="form-control" value="<?php echo $P['id_pembeli'];?>" placeholder="nama produk" />

                      
                    
                        <select name="status_chat" hidden="hide" class="form-control"  required oninvalid="this.setCustomValidity('Pilih Dahulu!')" oninput="setCustomValidity('')">
                          <option value="Y">Y</option>
                        </select>
                        <select name="status_penjual" hidden="hide" class="form-control"  required oninvalid="this.setCustomValidity('Pilih Dahulu!')" oninput="setCustomValidity('')">
                          <option value="N">N</option>
                        </select>
                      

                    </div>
                    <div class="row">
                          <div class="col-md-12">
                            <div class="pad">
                               <textarea name="komen" id="komen" class="form-control" placeholder="Tulis Chat ..." rows="5"></textarea>
                            </div>
                          </div>
                        </div>
                    <div class="form-group">
                      <input type="hidden" name="komentar_id" id="komentar_id" value="0" />
                      <input type="submit" name="submit" id="submit" class="btn btn-info" value="Kirim" />
                    </div>
                  </form>
                  <hr>
                    <h4 class="mb-3"><b>Chat :</b></h4>
                    <span id="message"></span>
                    <div id="display_comment"></div>
                </div>

        </div>
        </div>
        </div>
        </div>
        </div>
        </div>

                        <?php
                           $s=$koneksi->query("SELECT * FROM komentar WHERE id_pembeli='$_GET[id_pembeli]'");
                           $beli=mysqli_fetch_assoc($s);
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

 <script>
    $(document).ready(function(){
      //Mengirimkan Token Keamanan
      $.ajaxSetup({
              headers : {
                  'Csrf-Token': $('meta[name="csrf-token"]').attr('content')
              }
          });
        
      $('#form_komen').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
          url:"tambah_komentar.php",
          method:"POST",
          data:form_data,
          success:function(data){
            $('#form_komen')[0].reset();
            $('#komentar_id').val('0');
            load_comment();
          }, error: function(data) {
                  console.log(data.responseText)
                }
        })
      });

      load_comment();

      function load_comment(){
        $.ajax({
          url:"ambil_komentar.php?nama_produk=<?php echo $data_s['nama_produk']; ?>&&id_pembeli=<?php echo $beli['id_pembeli'] ?>",
          method:"POST",
          success:function(data){
            $('#display_comment').html(data);
          }, error: function(data) {
                  console.log(data.responseText)
                }
        })
      }

      $(document).on('click', '.reply', function(){
        var komentar_id = $(this).attr("id");
        $('#komentar_id').val(komentar_id);
        $('#komen').focus();
      });
    });
  </script>

  </body>
</html>
<?php } ?>