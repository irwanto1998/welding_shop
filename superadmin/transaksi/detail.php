<?php 

  $id_t = $_GET['id_t'];
  $my = mysqli_query($koneksi, "SELECT * FROM transaksi JOIN pembeli ON transaksi.id_pembeli=pembeli.id_pembeli WHERE transaksi.id_t='$id_t'");
  $d = mysqli_fetch_array($my);
?>       


          <div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">
                      DETAIL CUSTOM
                    </h4>
                   
                      <div class="row">
                        <div class="col-lg-4">
                          <table class="table">
                            <tr>
                              <th>Pembeli</th>
                              <td></td>
                              <td><?php echo $d['nama_pembeli'] ?></td>
                            </tr>
                            <tr>
                              <th>Telepon</th>
                              <td></td>
                              <td><?php echo $d['tlp_pembeli'] ?></td>
                            </tr>
                            <tr>
                              <th>Email</th>
                              <td></td>
                              <td><?php echo $d['email_pembeli'] ?></td>
                            </tr>
                            <tr>
                              <th>Alamat</th>
                              <td></td>
                              <td><?php echo $d['alamat_pembeli'] ?></td>
                            </tr>
                            <tr>
                              <th></th>
                              <td></td>
                              <td></td>
                            </tr>
                          </table><br>
                        </div>
                        <div class="col-lg-4">
                           <table class="table">
                            <tr>
                              <th>Tanggal, Waktu Pemesanan</th>
                              <td></td>
                              <td><?php echo $d['tgl_transaksi'] ?></td>
                            </tr>
                            <tr>
                              <th>Status Barang</th>
                              <td></td>
                              <td>
                                 <?php 
                                    if ($d['status_barang']=='') {
                                      echo "<font color='red'>Pesanan Belum diterima</font>";
                                    }else if ($d['status_barang']=='Pesanan diterima'){
                                      echo "<font color='blue'>Pesanan Sudah diterima</font>";
                                    }

                              ?>
                              </td>
                            </tr>
                            <tr>
                              <th>Hasil Penjualan</th>
                              <td></td>
                              <td>
                                
                                <?php
                                if ($d['hasil_penjualan']=='') {
                                 echo "
                                  <a href='#sb$d[id_t]' class='btn btn-danger' data-toggle='modal'>
                                    Belum Dikirim
                                  </a>
                                 ";
                                }else{
                                 echo "
                                   <font color='blue'>Sudah Dikirim</font>
                                 ";
                                }
                                ?> 
                               
                            </td>
                            </tr>
                            <tr>
                              <th></th>
                              <td></td>
                              <td></td>
                            </tr>
                          
                            
                          </table>

                        </div>
                        <div class="col-lg-4">
                          <table class="table">
                            <tr>
                              <th>Bukti Pembayaran</th>
                              <td></td>
                              <td>
                    <center>
                      
                      <?php
                      if ($d['bukti_pembayaran']=='Belum Bayar') {
                       echo "
                        
                          Belum Upload Bukti Pembayaran
                        
                       ";
                      }else{
                       echo "
                         
                         <a href='#muncul$d[id_t]' data-toggle='modal'>
                                      <img src='../superadmin/transaksi/bukti/$d[bukti_pembayaran]' style='width: 150px;height: 120px'>
                         </a>
                       ";
                      }
                      ?> 
                     
                    </center>
                  </td>
                            </tr>
                           <tr>
                              <th></th>
                              <td></td>
                              <td></td>
                            </tr>
                            
                          </table>
                        </div>
                      </div>

<?php 

  $id_t = $_GET['id_t'];
  $my = mysqli_query($koneksi, "SELECT * FROM transaksi JOIN produk ON transaksi.id_produk=produk.id_produk WHERE transaksi.id_t='$id_t'");
  $d_s = mysqli_fetch_array($my);
?>      

                      <div class="row">
                        <div class="col-lg-12">
                           <table class="table">
                            <tr>
                              <th><center>Gambar</center></th>
                              <th><center>Produk</center></th>
                              <th><center>Harga</center></th>
                              <th><center>Banyak</center></th>
                              <th><center>Harga Total</center></th>
                              <th><center>Status</center></th>
                              <th><center>No.Rekening Penjual</center></th>
                            </tr>
                             <tr>
                              <td class="py-1">
                                  <center><a href="#ambil<?php echo $d_s['id_produk'] ?>" data-toggle="modal">
                                      <img src="../superadmin/produk/gambar/<?php echo $d_s['gambar_produk'] ?>" alt="image" />
                                  </a></center>
                              </td>
                              <td><center><?php echo $d_s['nama_produk'] ?></center></td>
                  <td><center><?php echo rupiah($d_s['harga']) ?></center></td>
                  <td><center><?php echo $d_s['banyak'] ?></center></td>
                  <td><center><?php echo rupiah($d['banyak']*$d['harga']) ?></center></td>
                  <td><center><?php echo $d_s['status_transaksi'] ?></center></td>
                  <td><center><font style="color: blue"><?php echo $d_s['no_rek_penjual'] ?></font></center></td>

                            </tr>


                          </table>
                        </div>
                      </div>
<!-- Modal hapus -->
<div class="modal fade" id="ambil<?php echo $d_s['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999;">
  <div class="modal-dialog" role="document">

  <form class="mt-5" method="post" action="aksi_bayar.php" enctype="multipart/form-data">
    <input type="hidden" name="id_produk" value="<?php echo $d_s['id_produk'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">Produk</h5>
      </div>
      <div class="modal-body">
          <img src="../superadmin/produk/gambar/<?php echo $d_s['gambar_produk'] ?>" alt="" style="width: 100%;height: 400px">
      </div>
    </div>
  </form>
  </div>
</div>
<!-- #END# Modal hapus -->

          <div class="row">
                          <div class="col-md-12 ">
                       <a href="?page=transaksi/index" class="btn btn-primary btn bg-teal pull-right col-white font-bold m-t-20 col-md-0" style="margin-left: 20px;">Kembali</a>
                          </div>
                        </div>

                  </div>
                </div>
              </div>

            </div>
          </div>
<!-- Modal hapus -->
<div class="modal fade" id="muncul<?php echo $d['id_t'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999;">
  <div class="modal-dialog" role="document">

  <form class="mt-5" method="post" action="aksi_bayar.php" enctype="multipart/form-data">
    <input type="hidden" name="id_t" value="<?php echo $d['id_t'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">Bukti Pembayaran</h5>
      </div>
      <div class="modal-body">
          <img src="../superadmin/transaksi/bukti/<?php echo $d['bukti_pembayaran'] ?>" alt="" style="width: 100%;height: 400px">
      </div>
    </div>
  </form>
  </div>
</div>
<!-- #END# Modal hapus -->
<!-- Modal hapus -->
<div class="modal fade" id="sb<?php echo $d['id_t'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999;">
  <div class="modal-dialog" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_t" value="<?php echo $d['id_t'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        
      </div>
      <div class="modal-body">
        <h5 class="modal-title text-center">Hasil Penjualan Sudah Dikirim ?</h5>

        <input type="hidden" name="hasil_penjualan" value="<?php echo $d['hasil_penjualan'] ?>">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
        <button type="submit" name="hp" class="btn btn-success">Ya</button>
      </div>
    </div>
  </form>
  </div>
</div>
<!-- #END# Modal hapus -->

<?php 




// lunasi orderan
if (isset($_POST['hp'])) {

$id_t = $_POST['id_t'];
$hasil_penjualan = $_POST['hasil_penjualan'];

$hapusData =  mysqli_query($koneksi, "UPDATE transaksi SET 
                hasil_penjualan ='Sudah Dikirim'
            WHERE id_t = '$_POST[id_t]'");
  if ($hapusData) {
    echo "<script>alert('Pembayaran Selesai')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=transaksi/detail&id_t=$id_t'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=transaksi/detail&id_t=$id_t'></script>";
  }

}



 ?>