<?php
include '../../koneksi.php';

$id_produk   = $_GET['id_produk'];
$id_pembeli   = $_GET['id_pembeli'];


 $koneksi->query("DELETE FROM komentar WHERE id_produk='$_GET[id_produk]' AND id_pembeli='$_GET[id_pembeli]'");

?>
<script type="text/javascript">
  alert("Berhasil Dihapus..");
  window.location = "../app.php?page=produk/index";
</script>