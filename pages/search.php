<?php 
function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
  
}
include '../koneksi.php';
$search = $_POST['search'];
$my = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_produk LIKE '%$search%' OR harga_produk LIKE '%$search%'");
while ($d = mysqli_fetch_array($my)) {
  ?>
  <div class="col-md-3">
   <div class="card-produk">
     <div class="header">
       <img src="superadmin/produk/gambar/<?php echo $d['gambar_produk'] ?>" alt="">
       <span class="produk-name"><?php echo $d['nama_produk'] ?></span>
     </div>
     <div class="body">
       <span class="font-20 font-bold col-cyan"><?php echo rupiah($d['harga_produk']) ?></span>
     </div>
     <div class="footer">
       <a href="" class="btn btn-block bg-teal col-white font-bold">Add to card</a>
     </div>
   </div>
 </div>
 <?php } ?>