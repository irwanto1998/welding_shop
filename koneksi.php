<?php 


$koneksi = mysqli_connect("localhost","root","","newtokopekita");



 
// mengambil dq barang dengan kode paling besar
$qq = mysqli_query($koneksi, "SELECT max(kode_keranjang) as kodeTerbesar FROM transaksi");
$dq = mysqli_fetch_array($qq);
$kdTrans = $dq['kodeTerbesar'];
$urutan = (int) substr($kdTrans, 1, 4);
$urutan++;
$huruf = "T";
$kdTrans = $huruf . sprintf("%04s", $urutan);




 ?>