
<section class="container m-b-125">


   <div class="row-clearfix m-t-125">


    <div class="col-md-5">
     <div class="card profile-card">
        <div class="profile-header">&nbsp;</div>
        <div class="profile-body">
            <div class="image-area">
                <?php 
                    if ($gambars == '') { ?>
                        <img src="../assets/images/empty.svg" style="width: 150px;height: 150px;">

                        
                <?php    }else{ ?>

                    <img src="../superadmin/pembeli/gambar/<?php echo $gambars ?>" style="width: 150px;height: 150px;">

                <?php   } ?>
                
            </div>
            <div class="content-area">
                <h3><?php echo $namas ?></h3>
                <p><?php echo $tlps ?></p>
            </div>
        </div>
        <div class="profile-footer">
            <ul>
                <li>
                    <span>Email</span>
                    <span><?php echo $emails ?></span>
                </li>
                <li>
                    <span>Password</span>
                    <span><?php echo $passwords ?></span>
                </li>
                <li>
                    <span>Alamat</span>
                    <span><?php echo $alamats ?></span>
                </li>
            </ul>
        </div>
    </div>
</div>


<div class="col-md-12">
 <div class="card">
    <div class="header">
       <center>
        <h2>HISTORY ORDERAN</h2>
       </center> 
    </div>
     <div class="body">
                   <font style="color: blue"><i> NB: Silahkan Bayar Ke No. Rekening Yang Tertera Diproduk</i></font><p>
        <table class="table">
              <thead>
                <tr>
                  <th><center>No.</center></th>
                  <th><center>Gambar</center></th>
                  <th><center>Produk</center></th>
                  <th><center>Harga</center></th>
                  <th><center>Banyak</center></th>
                  <th><center>Harga Total</center></th>
                  <th><center>Status</center></th>
                  <th><center>No.Rekening Tujuan</center></th>
                  <th><center>Bukti Pembayaran</center></th>
                  <th><center>Status Barang</center></th>
                  <th><center>Aksi</center></th>
                </tr>
              </thead>
              <tbody>
                <?php 

                $no = 1;
                $my = mysqli_query($koneksi, "SELECT * FROM transaksi JOIN produk ON transaksi.id_produk=produk.id_produk JOIN penjual ON produk.id_penjual=penjual.id_penjual JOIN pembeli ON transaksi.id_pembeli=pembeli.id_pembeli WHERE transaksi.id_pembeli='$ids'");
                $no = 1;
                while ($d = mysqli_fetch_array($my)) {

$jumlah[]    =$d['banyak'];
$n_harga[]    =$d['banyak']*$d['harga'];

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
                  <td><center><?php echo rupiah($d['banyak']*$d['harga']) ?></center></td>
                  <td><center><?php echo $d['status_transaksi'] ?></center></td>

                        <?php
                          $admin=$koneksi->query("SELECT * FROM admin");
                          $data=mysqli_fetch_assoc($admin);
                        ?>

                  <td><center><font style="color: blue"><?php echo $data['no_rek_admin'] ?></font></center></td>
                  <td>
                    <center>
                      
                      <?php
                      if ($d['bukti_pembayaran']=='Belum Bayar') {
                       echo "
                        <a href='#bukti$d[id_t]' class='btn btn-info' data-toggle='modal'>
                          Upload
                        </a>
                       ";
                      }else{
                       echo "
                         <font color='blue'>Bukti Terkirim</font>
                       ";
                      }
                      ?> 
                     
                    </center>
                  </td>
                  <td>
                    <center>
                      
                      <?php
                      if ($d['status_barang']=='') {
                       echo "
                        <a href='#sb$d[id_t]' class='btn btn-warning' data-toggle='modal'>
                          Pesanan diterima
                        </a>
                       ";
                      }else{
                       echo "
                         <font color='blue'>Pesanan diterima</font>
                       ";
                      }
                      ?> 
                     
                    </center>
                  </td>
                  <td><center><a href="detail_transaksi.php?id_t=<?php echo $d['id_t']; ?>" class='btn btn-success'>Detail...</a></center>
                  </td>

                  <td><center><a href="hapus.php?id_t=<?php echo $d['id_t']; ?>" class="btn btn-danger btn-sm">
                                Hapus</center></td>

                </tr>

<!-- Modal hapus -->
<div class="modal fade" id="sb<?php echo $d['id_t'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999;">
  <div class="modal-dialog" role="document">

  <form class="mt-5" method="post" action="ubah_sb.php" enctype="multipart/form-data">
    <input type="hidden" name="id_t" value="<?php echo $d['id_t'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">Barang Pesanan Sudah Diterima ?</h5>
      </div>
      <div class="modal-body">

        <input type="hidden" name="status_barang" value="<?php echo $d['status_barang'] ?>">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
        <button type="submit" class="btn btn-success">Ya</button>
      </div>
    </div>
  </form>
  </div>
</div>
<!-- #END# Modal hapus -->

<!-- Modal hapus -->
<div class="modal fade" id="bukti<?php echo $d['id_t'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999;">
  <div class="modal-dialog" role="document">

  <form class="mt-5" method="post" action="aksi_bayar.php" enctype="multipart/form-data">
    <input type="hidden" name="id_t" value="<?php echo $d['id_t'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">Upload bukti pembayaran</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <input type="file" name="bukti_pembayaran" required="" class="form-control">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
        <button type="submit" class="btn btn-success">KIRIM</button>
      </div>
    </div>
  </form>
  </div>
</div>
<!-- #END# Modal hapus -->

              <?php $no++; } 
                error_reporting(0); $total_harga    =array_sum($n_harga);   

              ?>
              <tr>
                  <td colspan="4"></td>
                  <td align="center">
                      TOTAL : <b><?php echo rupiah($total_harga) ?></b>
                  </td>
              </tr>
            </tbody>


          </table>
     </div>
 </div>
</div>


<div class="col-md-12 p">
 <div class="card">
    <div class="header">
      <center>
        <h2>HISTORY ORDERAN CUSTOM</h2>
      </center>
    </div>
     <div class="body">
                   <font style="color: blue"><i> NB: Silahkan Bayar Ke No. Rekening Yang Tertera Diproduk</i></font><p>
        <table class="table">
              <thead>
                <tr>
                  <th><center>No.</center></th>
                  <th><center>Gambar</center></th>
                  <th><center>Produk</center></th>
                  <th><center>Harga</center></th>
                  <th><center>Harga yang Harus di Bayar</center></th>
                  
                  <th><center>Status Pembayaran</center></th>
                  <th><center>Status Pengerjaan</center></th>
                  <th><center>No.Rekening Tujuan</center></th>
                  <th><center>Bukti Pembayaran</center></th>
                  <th><center>Status Barang</center></th>
                  <th><center>Aksi</center></th>
                </tr>
              </thead>
              <tbody>
                <?php 

                $no = 1;
                $my = mysqli_query($koneksi, "SELECT * FROM custom JOIN penjual ON custom.id_penjual=penjual.id_penjual JOIN pembeli ON custom.id_pembeli=pembeli.id_pembeli WHERE custom.id_pembeli='$ids'");
                $no = 1;
                while ($d = mysqli_fetch_array($my)) {


                 ?>
                 <tr>
                  <td><center><?php echo $no++ ?></center></td>
                  <td class="py-1">
                    <center>
                      <img src="../superadmin/custom/gambar/<?php echo $d['gambar_custom'] ?>" alt="image" />
                    </center>
                  </td>
                  <td><center><?php echo $d['nama_custom'] ?></center></td>
                  <td>
                    <center>
                      <?php
                      if ($d['harga_custom']=='') {
                       echo "-";
                      }else{
                        echo "$d[harga_custom]";
                      }
                      ?>    
                    </center>
                  </td>
                  <td>
                    <center>
                      <?php
                      if ($d['sisa_harga']=='') {
                       echo "Sisa Harga di Proses";
                      }else{
                        echo "$d[sisa_harga]";
                      }
                      ?>    
                    </center>
                  </td>
                  
                  <td><center><?php echo $d['status_pembayaran'] ?></center></td>
                  <td><center><?php echo $d['status_custom'] ?></center></td>

                        <?php
                          $admin=$koneksi->query("SELECT * FROM admin");
                          $data=mysqli_fetch_assoc($admin);
                        ?>

                  <td><center><font style="color: blue"><?php echo $data['no_rek_admin'] ?></font></center></td>
                  <td>
                    <center>
                      
                      <?php
                      if ($d['status_pembayaran']=='Belum Bayar') {
                       echo "
                        <a href='#bayar$d[id_custom]' class='btn btn-info' data-toggle='modal'>
                          Upload
                        </a>
                       ";
                      }else{
                       echo "
                        <font color='blue'>
                          Bukti Terkirim
                        </font>
                       ";
                      }
                      ?> 
                     
                    </center>
                  </td>

                  <td>
                    <center>
                      
                      <?php
                      if ($d['status_barang']=='') {
                       echo "
                        <a href='#sb2$d[id_custom]' class='btn btn-warning' data-toggle='modal'>
                          Pesanan diterima
                        </a>
                       ";
                      }else{
                       echo "
                         <font color='blue'>Pesanan diterima</font>
                       ";
                      }
                      ?> 
                     
                    </center>
                  </td>
                  <td><center><a href="detail_custom.php?id_custom=<?php echo $d['id_custom']; ?>" class='btn btn-success'>Detail...</a></center></td>

                  <td><center><a href="hapus_c.php?id_custom=<?php echo $d['id_custom']; ?>" class="btn btn-danger btn-sm">
                                Hapus</center></td>

                </tr>



<!-- Modal hapus -->
<div class="modal fade" id="sb2<?php echo $d['id_custom'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999;">
  <div class="modal-dialog" role="document">

  <form class="mt-5" method="post" action="ubah_sb2.php" enctype="multipart/form-data">
    <input type="hidden" name="id_custom" value="<?php echo $d['id_custom'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">Barang Pesanan Sudah Diterima ?</h5>
      </div>
      <div class="modal-body">

        <input type="hidden" name="status_barang" value="<?php echo $d['status_barang'] ?>">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
        <button type="submit" class="btn btn-success">Ya</button>
      </div>
    </div>
  </form>
  </div>
</div>
<!-- #END# Modal hapus -->

<!-- Modal hapus -->
<div class="modal fade" id="bayar<?php echo $d['id_custom'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999;">
  <div class="modal-dialog" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_custom" value="<?php echo $d['id_custom'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">Upload bukti pembayaran</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <input type="text" name="dp" required="" class="form-control" placeholder="DP ...">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <input type="file" name="bukti_bayar" required="" class="form-control">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
        <button type="submit" name="upload" class="btn btn-success">KIRIM</button>
      </div>
    </div>
  </form>
  </div>
</div>
<!-- #END# Modal hapus -->


              <?php }    

              ?>
            
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

<?php 


if (isset($_POST['upload'])) {
  
$id_custom = $_POST['id_custom'];
$dp = $_POST['dp'];

$namaGambar = $_FILES['bukti_bayar']['name'];
$tmpGambar = $_FILES['bukti_bayar']['tmp_name'];


$simpanGambar = move_uploaded_file($tmpGambar,"../superadmin/custom/gambar/" .$namaGambar);

$hapusData =  mysqli_query($koneksi, "UPDATE custom SET bukti_bayar='$namaGambar', status_pembayaran='DP', dp = '$_POST[dp]' WHERE id_custom = '$_POST[id_custom]'");

  if ($hapusData) {
   
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=akun'></script>";
  }else{

    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=akun'></script>";
  }

}



 ?>