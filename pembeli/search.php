<?php 
include '../koneksi.php';
include '../rupiah.php';
$search = $_POST['search'];
        $my = mysqli_query($koneksi, "SELECT * FROM produk JOIN penjual on produk.id_penjual=penjual.id_penjual WHERE produk.nama_produk LIKE '%$search%' OR produk.harga_produk LIKE '%$search%'");
        while ($d = mysqli_fetch_array($my)) {
      ?>
        <div class="col-md-3">
           <div class="card-produk">
               <div class="header">
                   <img src="../superadmin/produk/gambar/<?php echo $d['gambar_produk'] ?>" alt="">
                   <span class="produk-name font-16"><?php echo $d['nama_produk'] ?></span>
                   <span class="produk-name font-14 col-grey"><?php echo $d['nama_penjual'] ?></span>
               </div>
               <div class="body">
                   <span class="font-20 font-bold col-cyan"><?php echo rupiah($d['harga_produk']) ?></span>
               </div>
               <div class="footer">
                   <a href="?page=masuk-keranjang&id_produk=<?php echo $d['id_produk'] ?>" class="btn btn-block bg-teal col-white font-bold">Add to card</a>
                   <a href="?page=detail&id_produk=<?php echo $d['id_produk'] ?>" class="btn btn-block bg-cyan col-white font-bold">Detail Produk</a>
               </div>
           </div>
        </div>
<?php } ?>