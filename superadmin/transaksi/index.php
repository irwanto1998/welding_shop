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
                            <a href="transaksi/cetak-transaksi.php" target="_BLANK" class="btn btn-info btn-sm"> 
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
                           <th><center>Jumlah</center></th>
                           <th><center>Bukti Pembayaran</center></th>
                          <th><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 

                        $no = 1;
                        $my = mysqli_query($koneksi, "SELECT * FROM transaksi JOIN produk ON transaksi.id_produk=produk.id_produk JOIN penjual ON produk.id_penjual=penjual.id_penjual JOIN pembeli ON transaksi.id_pembeli=pembeli.id_pembeli");
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
                            </center>
                          </td>
                          <td>
                             <a href="?page=transaksi/detail&id_t=<?php echo $d['id_t'] ; ?>" class="btn btn-success">
                                Detail
                             </a>
                          </td>
                        </tr>


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



                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>




<?php 

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


