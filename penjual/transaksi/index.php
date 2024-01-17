          <div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">
                      DATA TRANSAKSI
                    </h4>
                   
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <td colspan="7">
                            <a href="transaksi/cetak-transaksi.php?id_penjual=<?php echo $ids ?>" target="_BLANK" class="btn btn-info btn-sm"> 
                              <i class="fa fa-print"></i> Cetak
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <th><center>No.</center></th>
                          <th><center>Pembeli</center></th>
                          <th><center>Produk</center></th>
                          <th><center>Banyak</center></th>
                          <th><center>Harga</center></th>
                           <th><center>Total</center></th>
                           <th><center>Status</center></th>
                           <th><center>Bukti Pembayaran</center></th>
                          <th><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 

                        $no = 1;
                        $my = mysqli_query($koneksi, "SELECT * FROM transaksi JOIN produk ON transaksi.id_produk=produk.id_produk JOIN penjual ON produk.id_penjual=penjual.id_penjual JOIN pembeli ON transaksi.id_pembeli=pembeli.id_pembeli WHERE produk.id_penjual='$ids'");
                        while ($d = mysqli_fetch_array($my)) {
                          $jumlahkarakter=1;
                          $cetak = substr($d['nama_pembeli'], 0, $jumlahkarakter);
                         ?>
                        <tr class="default">
                          <td><center><?php echo $no++ ?></center></td>
                          <td><center><?php echo $d['nama_pembeli'] ?></center></td>
                          <td><center><?php echo $d['nama_produk'] ?></center></td>
                          <td><center><?php echo $d['banyak'] ?></center></td>
                          <td><center><?php echo rupiah($d['harga_produk']) ?></center></td>

                          <td>
                            <center>
                              <?php 
                                  $h = $d['harga_produk'];
                                  $b = $d['banyak'];
                                  $total = $h * $b;
                                  echo rupiah($total);
                              ?>
                                
                              </center>
                          </td>
                          <td><center><?php echo $d['status_transaksi'] ?></center></td>
                          <td><center>
                             <?php 
                                    if ($d['bukti_pembayaran']=='Belum Bayar') {
                                      echo "<font color='red'>Belum ada bukti pembayaran</font>";
                                    }else{
                                      echo "<a href='#gambar$d[id_t]' data-toggle='modal'>
                                      <img src='../superadmin/transaksi/bukti/$d[bukti_pembayaran]' style='width: 80px;height: 80px'>
                                            </a>";
                                    }

                              ?>
                          </center></td>
                          <td>
                            <center>
                              <a href="#hapus<?php echo $d['id_t'] ?>" class="btn btn-danger btn-circle" data-toggle="modal">
                                 <i class="material-icons">delete_forever</i>
                              </a>


                              <!-- tombol kondisi status pemesanan -->
                                  <?php 

                                    if ($d['status_transaksi']=='Menunggu konfirmasi') {
                                      echo "<a href='#Konfirmasi$d[id_t]' class='btn btn-warning' data-toggle='modal'>
                                               Konfirmasi
                                            </a>";
                                    }else if ($d['status_transaksi']=='Konfirmasi') {
                                      echo "<a href='#proses$d[id_t]' class='btn btn-info' data-toggle='modal'>
                                             Proses
                                            </a>";
                                    }else if ($d['status_transaksi']=='Proses') {
                                      echo "<a href='#selesai$d[id_t]' class='btn btn-success' data-toggle='modal'>
                                             Selesai
                                            </a>";
                                    }else if ($d['status_transaksi']=='Selesai') {
                                      echo "Transaksi Selesai";
                                    }


                                   ?>
                              <!-- #END# tombol kondisi status pemesanan -->
                            </center>
                          </td>
                          <td>
                             <a href="?page=transaksi/detail&id_t=<?php echo $d['id_t'] ; ?>" class="btn btn-success">
                                Detail
                             </a>
                          </td>
                        </tr>

<!-- Modal Konfirmasi -->
<div class="modal fade" id="Konfirmasi<?php echo $d['id_t'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_t" value="<?php echo $d['id_t'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">Konfirmasi orderan ini</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
        <button type="submit" name="konfirmasi" class="btn btn-warning">Konfirmasi</button>
      </div>
    </div>
  </form>
  </div>
</div>
<!-- #END# Modal hapus -->



<!-- Modal proses -->
<div class="modal fade" id="proses<?php echo $d['id_t'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_t" value="<?php echo $d['id_t'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">Proses orderan ini</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
        <button type="submit" name="proses" class="btn btn-success">Proses</button>
      </div>
    </div>
  </form>
  </div>
</div>
<!-- #END# Modal proses -->


<!-- Modal selesai -->
<div class="modal fade" id="selesai<?php echo $d['id_t'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_t" value="<?php echo $d['id_t'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">Selesaikan orderan ini</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
        <button type="submit" name="selesai" class="btn btn-info">Selesai</button>
      </div>
    </div>
  </form>
  </div>
</div>
<!-- #END# Modal selesai -->


<!-- Modal hapus -->
<div class="modal fade" id="hapus<?php echo $d['id_t'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_t" value="<?php echo $d['id_t'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">Yakin ingin menghapus data ini ?!</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
        <button type="submit" name="hapus" class="btn btn-danger">HAPUS</button>
      </div>
    </div>
  </form>
  </div>
</div>
<!-- #END# Modal hapus -->


<!-- Modal gambar -->
<div class="modal fade" id="gambar<?php echo $d['id_t'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <input type="hidden" name="id_t" value="<?php echo $d['id_t'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title text-center">Bukti Pembayaran</h4>
      </div>
      <div class="modal-body">
          <img src="../superadmin/transaksi/bukti/<?php echo $d['bukti_pembayaran'] ?>" alt="" style="width: 100%;height: 400px">
      </div>

    </div>

  </div>
</div>
<!-- #END# Modal hapus -->

                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>




<?php 

// konfirmasi orderan
if (isset($_POST['konfirmasi'])) {

$id_t = $_POST['id_t'];

$hapusData =  mysqli_query($koneksi, "UPDATE transaksi SET status_transaksi='Konfirmasi' WHERE id_t='$id_t'");
  if ($hapusData) {
    echo "<script>alert('Orderan telah dikonfirmasi')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=transaksi/index'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=transaksi/index'></script>";
  }

}

// proses orderan
if (isset($_POST['proses'])) {

$id_t = $_POST['id_t'];

$hapusData =  mysqli_query($koneksi, "UPDATE transaksi SET status_transaksi='Proses' WHERE id_t='$id_t'");
  if ($hapusData) {
    echo "<script>alert('Orderan telah diproses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=transaksi/index'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=transaksi/index'></script>";
  }

}

// selesai orderan
if (isset($_POST['selesai'])) {

$id_t = $_POST['id_t'];

$hapusData =  mysqli_query($koneksi, "UPDATE transaksi SET status_transaksi='Selesai' WHERE id_t='$id_t'");
  if ($hapusData) {
    echo "<script>alert('Orderan telah diselesaikan')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=transaksi/index'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=transaksi/index'></script>";
  }

}








if (isset($_POST['hapus'])) {
  

$id_t = $_POST['id_t'];


$hapusData =  mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_t='$id_t'");

  if ($hapusData) {
   
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=transaksi/index'></script>";
  }else{

    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=transaksi/index'></script>";
  }

}







 ?>


