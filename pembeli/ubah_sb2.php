<?php
include "../koneksi.php";

$id_custom   = $_POST['id_custom'];
$status_barang   = $_POST['status_barang'];

 $koneksi->query("UPDATE custom SET 
							 	status_barang ='Pesanan diterima'
 						WHERE id_custom = '$_POST[id_custom]'");

?>
<script type="text/javascript">
  alert("Terimakasih..");
  window.location = "app.php?page=akun";
</script>