<?php
session_start();
include '../koneksi.php';
include 'csrf.php';


$komen = $_POST["komen"];
$komen_id = $_POST["komentar_id"];
$nama_penjual = $_POST["nama_penjual"];
$nama_produk = $_POST["nama_produk"];
$id_produk = $_POST["id_produk"];
$id_penjual = $_POST["id_penjual"];

$id_pembeli = $_POST["id_pembeli"];
$status_chat = $_POST["status_chat"];
$status_penjual = $_POST["status_penjual"];

$query = "INSERT INTO komentar (parent_komentar_id, komentar, nama_penjual, nama_produk,  id_produk, id_penjual, id_pembeli, status_chat, status_penjual) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$dewan1 = $koneksi->prepare($query);
$dewan1->bind_param("sssssssss", $komen_id, $komen, $nama_penjual, $nama_produk, $id_produk, $id_penjual, $id_pembeli, $status_chat, $status_penjual);
$dewan1->execute();

echo json_encode(['success' => 'Sukses']);
?>
