<?php 
include '../koneksi.php';

$hapus=$koneksi->query("SELECT * FROM transaksi WHERE id_t='$_GET[id_t]'");

$koneksi->query("DELETE FROM transaksi WHERE id_t='$_GET[id_t]'");
    
?>
<script type="text/javascript">
	alert("Hapus Transaksi berhasil..");
	window.location = "app.php?page=akun";
</script>