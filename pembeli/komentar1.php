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
   <div class="row-clearfix m-t-125">

                         <?php
                           $s=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id_produk]'");
                           $data_s=mysqli_fetch_assoc($s);
                          ?>

<div class="col-md-12">
 <div class="card">
    <div class="header">
       <center> <img src="../superadmin/produk/gambar/<?php echo $data_s['gambar_produk'] ?>" alt="" style="width: 20%;height: 150px"><br>
        <span class="font-20 font-bold col-cyan"><?php echo $data_s['nama_produk'];?> - <?php echo rupiah( $data_s['harga_produk']);?></span></center>
    </div>
                       
     <div class="body">
       <form action="" method="POST" id="form_komen">
                    <div class="form-group">
                      <input type="hidden" name="nama_pengirim" id="nama_pengirim" class="form-control" value="<?php echo $namas ?>" placeholder="Masukkan Nama" />
                      <input type="hidden" name="id_pembeli" id="id_pembeli" class="form-control" value="<?php echo $ids ?>" placeholder="Masukkan Nama" />
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="nama_produk" id="nama_produk" class="form-control" value="<?php echo $data_s['nama_produk'];?>" placeholder="nama produk" />
                      <input type="hidden" name="id_produk" id="id_produk" class="form-control" value="<?php echo $data_s['id_produk'];?>" placeholder="nama produk" />
                      <input type="hidden" name="id_penjual" id="id_penjual" class="form-control" value="<?php echo $data_s['id_penjual'];?>" placeholder="nama produk" />

                      <div class="hidden"><select name="hapus_drpembeli" hidden="hide" class="form-control"  required oninvalid="this.setCustomValidity('Pilih Dahulu!')" oninput="setCustomValidity('')">
                          <option value="Y">Y</option>
                        </select></div>

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

</section>


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
          url:"ambil_komentar.php?nama_produk=<?php echo $data_s['nama_produk']; ?>&&id_pembeli=<?php echo $ids ?>",
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
