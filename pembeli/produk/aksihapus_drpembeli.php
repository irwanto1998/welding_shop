<?php
include '../../koneksi.php';

$hapus_drpembeli   = $_POST['hapus_drpembeli'];
$nama_produk   = $_POST['nama_produk'];
$id_produk   = $_POST['id_produk'];
$nama_pengirim   = $_POST['nama_pengirim'];

 $koneksi->query("UPDATE komentar SET 
                hapus_drpembeli ='$_POST[hapus_drpembeli]'
            WHERE nama_produk ='$_POST[nama_produk]' AND id_produk ='$_POST[id_produk]' AND nama_pengirim ='$_POST[nama_pengirim]'");

?>
<script type="text/javascript">
  alert("Berhasil Dihapus..");
  window.location = "../app.php?page=produk/index1";
</script>