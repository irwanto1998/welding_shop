<?php
include '../../koneksi.php';

$nama_produk   = $_POST['nama_produk'];
$status_chat   = $_POST['status_chat'];
$id_produk   = $_POST['id_produk'];
$nama_pengirim   = $_POST['nama_pengirim'];

 $koneksi->query("UPDATE komentar SET 
							 	status_chat ='$_POST[status_chat]'
 						WHERE nama_produk ='$_POST[nama_produk]' AND id_produk ='$_POST[id_produk]' AND nama_pengirim ='$_POST[nama_pengirim]'");

?>
<script type="text/javascript">
  alert("Berhasil Direspon..");
  window.location = "../app.php?page=produk/index";
</script>