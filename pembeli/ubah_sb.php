<?php
include "../koneksi.php";

$id_t   = $_POST['id_t'];
$status_barang   = $_POST['status_barang'];

 $koneksi->query("UPDATE transaksi SET 
							 	status_barang ='Pesanan diterima'
 						WHERE id_t = '$_POST[id_t]'");

?>
<script type="text/javascript">
  alert("Terimakasih..");
  window.location = "app.php?page=akun";
</script>