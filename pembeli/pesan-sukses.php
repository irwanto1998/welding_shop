<?php 
    $my = mysqli_query($koneksi, "SELECT * FROM transaksi JOIN produk ON transaksi.id_produk=produk.id_produk JOIN penjual ON produk.id_penjual=penjual.id_penjual JOIN pembeli ON transaksi.id_pembeli=pembeli.id_pembeli WHERE transaksi.kode_keranjang='$_GET[kode]'");
    $d = mysqli_fetch_array($my);
?>
<section class="container m-b-125">

    <div class="row-clearfix">
        <div class="col-md-12">
           <h2 class="font-20 font-bold col-cyan m-t-100 m-b-50"></h2>
        </div>
    </div>

     <div class="row-clearfix">




        <div class="col-md-4">
           <div class="card-produk">
               <div class="header">
                  <table class="table">
                      <tr>
                          <th># <?php echo $d['kode_keranjang'] ?></th>
                      </tr>
                      <tr>
                        <th>Tanggal</th>
                        <td>:</td>
                        <td><?php echo $d['tgl_transaksi'] ?></td>
                      </tr>
                      <tr>
                        <th>Status</th>
                        <td>:</td>
                        <td><?php echo $d['status_transaksi'] ?></td>
                      </tr>
                  </table>
               </div>
           </div>
        </div>
        <div class="col-md-8">
           <div class="card-produk">
               <div class="body">
                    <table class="table">
              <thead>
                <tr>
                  <th><center>No.</center></th>
                  <th><center>Gambar</center></th>
                  <th><center>Produk</center></th>
                  <th><center>Harga</center></th>
                  <th><center>Banyak</center></th>
                </tr>
              </thead>
              <tbody>
                <?php 

                $no = 1;
                $my = mysqli_query($koneksi, "SELECT * FROM transaksi JOIN produk ON transaksi.id_produk=produk.id_produk JOIN penjual ON produk.id_penjual=penjual.id_penjual JOIN pembeli ON transaksi.id_pembeli=pembeli.id_pembeli WHERE transaksi.kode_keranjang='$_GET[kode]'");
                $no = 1;
                while ($d = mysqli_fetch_array($my)) {
                 ?>
                 <tr>
                  <td><center><?php echo $no++ ?></center></td>
                  <td class="py-1">
                    <center>
                      <img src="../superadmin/produk/gambar/<?php echo $d['gambar_produk'] ?>" alt="image" />
                    </center>
                  </td>
                  <td><center><?php echo $d['nama_produk'] ?></center></td>
                  <td><center><?php echo rupiah($d['harga']) ?></center></td>
                  <td><center><?php echo $d['banyak'] ?></center></td>

                </tr>


              <?php $no++; } 

$myh = mysqli_query($koneksi, "SELECT sum(transaksi.harga) AS Total FROM transaksi JOIN produk ON transaksi.id_produk=produk.id_produk JOIN penjual ON produk.id_penjual=penjual.id_penjual JOIN pembeli ON transaksi.id_pembeli=pembeli.id_pembeli WHERE transaksi.kode_keranjang='$_GET[kode]'");
$dar = mysqli_fetch_array($myh);
$tot =  $dar['Total'];
              ?>
              <tr>
                  <td colspan="4"></td>
                  <td align="center">
                      TOTAL : <b><?php echo rupiah($tot) ?></b>
                  </td>
              </tr>
            </tbody>


          </table>
               </div>
           </div>
        </div>

     	</div>
     	


</section>

<div class="paralax">
    <div class="paralax-images">
        <h2 class="font-bold font-20 text-center m-t-20 col-cyan">
            WELDING SHOP adalah sebuah sistem informasi yang dibangun untuk kebutuhan dalam memperjual belikan suatu produk pengelasan, dan sistem informasi ini dikhususkan untuk daerah Ketapang, Kalimantan Barat.
        </h2>
    </div>
</div>


<div class="container" id="tentang">
    <div class="row">
        <div class="col-md-6">
            <div class="test">
                <div class="owl-carousel">
                    <div class="item bg-amber">
                        <img src="../assets/images/slider/w3.jpg" alt="" style="width: 100%;height: 250px">
                    </div>
                    <div class="item bg-light-blue">
                        <img src="../assets/images/slider/w2.jpg" alt="" style="width: 100%;height: 250px">
                    </div>
                    <div class="item bg-green">
                        <img src="../assets/images/slider/w1.jpg" alt="" style="width: 100%;height: 250px">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h1 class="font-bold font-30 col-cyan">
                        WELDING SHOP
                    </h1>
                </div>
                <div class="body">
                    <p class="font-16">
                        Marketplace Dengan Pilihan Produk Paling Beragam yang di Khususkan Memperjual Belikan Produk Pengelasan. Sistem informasi ini buat dalam rangka untuk mengatasi permasalahan yang ada dalam dunia pengelasan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

