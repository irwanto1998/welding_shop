<?php 


// Menampilkan produk berdasarkan id_produk yang dipilih
$my = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$_GET[id_produk]'");
$d = mysqli_fetch_array($my);
$id_produk = $d['id_produk'];


$c = mysqli_query($koneksi, "SELECT * FROM keranjang  WHERE id_produk='$_GET[id_produk]' AND status_user='$ids'");
$ada = mysqli_num_rows($c);

    if ($ada == 1) {

      echo "<script>alert('Produk sudah ada di keranjang')</script>";
      echo "<meta http-equiv='refresh' content='0; url=?page=app.php'></script>";

    }else{

        $simpanData = mysqli_query($koneksi, "INSERT INTO keranjang VALUES('','$kdTrans','$id_produk','$ids');");

        if ($simpanData) {        
          echo "<script>alert('Sukses')</script>";
          echo "<meta http-equiv='refresh' content='0; url=app.php'></script>";
        }else{
          echo "<script>alert('Terjadi kesalahan saat memasukan barang ke keranjang')</script>";
          echo "<meta http-equiv='refresh' content='0; url=app.php'></script>";
        }
    }

 ?>