<?php 
include '../koneksi.php';

$hapus=$koneksi->query("SELECT * FROM custom WHERE id_custom='$_GET[id_custom]'");

$koneksi->query("DELETE FROM custom WHERE id_custom='$_GET[id_custom]'");
    
?>
<script type="text/javascript">
	alert("Hapus Custom berhasil..");
	window.location = "app.php?page=akun";
</script>