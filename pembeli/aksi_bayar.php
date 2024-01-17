<?php
include "../koneksi.php";

$id_t   = $_POST['id_t'];
$bukti_pembayaran   = $_FILES['bukti_pembayaran']['name'];

if (empty($bukti_pembayaran)){
      echo $koneksi->query("UPDATE transaksi SET 
                               WHERE id_t = '$_POST[id_t]'");
  }else{

    $hapus= $koneksi->query("SELECT * FROM transaksi WHERE id_t='$_POST[id_t]'");
    // menghapus bukti_pembayaran yang lama
    $nama_gambar=mysqli_fetch_array($hapus);
    // nama field bukti_pembayaran
    $lokasi=$nama_gambar['bukti_pembayaran'];

    move_uploaded_file($_FILES['bukti_pembayaran']['tmp_name'],'../superadmin/transaksi/bukti/'.$bukti_pembayaran);
    $koneksi->query("UPDATE transaksi SET 
                                         bukti_pembayaran         = '$bukti_pembayaran'
                         WHERE id_t = '$_POST[id_t]'");
  }

?>
<script type="text/javascript">
  alert("Sukses..");
  window.location = "app.php?page=akun";
</script>