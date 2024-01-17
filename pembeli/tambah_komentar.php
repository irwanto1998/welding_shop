<?php
session_start();
include '../koneksi.php';
include 'csrf.php';


$komen = $_POST["komen"];
$komen_id = $_POST["komentar_id"];
$nama_pengirim = $_POST["nama_pengirim"];
$nama_produk = $_POST["nama_produk"];
$id_pembeli = $_POST["id_pembeli"];
$id_produk = $_POST["id_produk"];
$id_penjual = $_POST["id_penjual"];
$hapus_drpembeli = $_POST["hapus_drpembeli"];

$query = "INSERT INTO komentar (parent_komentar_id, komentar, nama_pengirim, nama_produk, id_pembeli, id_produk, id_penjual, hapus_drpembeli) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$dewan1 = $koneksi->prepare($query);
$dewan1->bind_param("ssssssss", $komen_id, $komen, $nama_pengirim, $nama_produk, $id_pembeli, $id_produk, $id_penjual, $hapus_drpembeli);
$dewan1->execute();

echo json_encode(['success' => 'Sukses']);
?>
