<?php 

// hitung jumlah produk
$myProduk = mysqli_query($koneksi, "SELECT count(*) AS totalProduk FROM produk JOIN penjual USING(id_penjual) WHERE produk.id_penjual='$ids'");
$dataProduk = mysqli_fetch_array($myProduk);
$produk = $dataProduk['totalProduk'];

// hitung jumlah pembeli
$myPembeli = mysqli_query($koneksi, "SELECT count(*) AS totalPembeli FROM transaksi JOIN produk ON transaksi.id_produk=produk.id_produk JOIN penjual ON produk.id_penjual=penjual.id_penjual WHERE produk.id_penjual='$ids'");
$dataPembeli = mysqli_fetch_array($myPembeli);
$transaKsi = $dataPembeli['totalPembeli'];

 ?>




<div class="content-wrapper">
  <div class="row">

   <div class="col-md-6 grid-margin stretch-card average-price-card">
    <div class="card text-white">
      <div class="card-body">
        <div class="d-flex justify-content-between pb-2 align-items-center">
          <h2 class="font-weight-semibold mb-0"><?php echo $produk ?></h2>
          <div class="icon-holder">
            <i class="mdi mdi-briefcase-outline"></i>
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <h5 class="font-weight-semibold mb-0">DATA PRODUK</h5>
          <p class="text-white mb-0">Total data produk</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 grid-margin stretch-card average-price-card">
    <div class="card text-white">
      <div class="card-body">
        <div class="d-flex justify-content-between pb-2 align-items-center">
          <h2 class="font-weight-semibold mb-0"><?php echo $transaKsi ?></h2>
          <div class="icon-holder">
            <i class="mdi mdi-briefcase-outline"></i>
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <h5 class="font-weight-semibold mb-0">DATA TRANSAKSI</h5>
          <p class="text-white mb-0">Total data Trasnsaksi</p>
        </div>
      </div>
    </div>
  </div>

</div>
</div>

