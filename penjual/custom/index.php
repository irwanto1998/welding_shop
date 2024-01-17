          <div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">
                      DATA CUSTOM
                    </h4>
                   
                    <table class="table table-striped">
                      <thead>
                          <td colspan="7"><!--
                            <a href="custom/cetak-custom.php?id_penjual=<?php echo $ids ?>" target="_BLANK" class="btn btn-info btn-sm"> 
                              <i class="fa fa-print"></i> Cetak
                            </a>-->
                          </td>
                        </tr>
                        <tr>
                          <th><center>No.</center></th>
                          <th><center>Gambar</center></th>
                          <th><center>Pembeli</center></th>
                          <th><center>DP</center></th>
                          <th><center>Harga</center></th>
                          <th><center>Sisa Harga</center></th>
                          <th><center>Status Pengerjaan</center></th>
                          <th><center>Status Pembayaran</center></th>
                          <!-- <th><center>Bukti Pembayaran</center></th> -->
                          <th><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 

                        $no = 1;
                        $my = mysqli_query($koneksi, "SELECT * FROM custom JOIN penjual ON custom.id_penjual=penjual.id_penjual JOIN pembeli ON custom.id_pembeli=pembeli.id_pembeli WHERE custom.id_penjual='$ids'");
                        while ($d = mysqli_fetch_array($my)) {
                          $jumlahkarakter=1;
                          $cetak = substr($d['nama_pembeli'], 0, $jumlahkarakter);
                         ?>
                        <tr class="default">
                          <td><center><?php echo $no++ ?></center></td>
                          <td class="py-1">
                              <center><a href="#muncul<?php echo $d['id_custom'] ?>" data-toggle="modal">
                                <img src="../superadmin/custom/gambar/<?php echo $d['gambar_custom'] ?>" alt="image" />
                              </a></center>
                          </td>
                          <td><center><?php echo $d['nama_pembeli'] ?></center></td>
                          <td><center><?php echo $d['dp'] ?></center></td>
                          <td><center><?php echo $d['harga_custom'] ?></center></td>
                          <td>
                              <center>
                                      <?php
                                          if ($d['sisa_harga']=='') {
                                            echo "Belum ada DP";
                                          }else{
                                            echo "$d[sisa_harga]";
                                          }
                                      ?>    
                              </center>
                          </td>
                          <td><center><?php echo $d['status_custom'] ?></center></td>
                          <td><center><?php echo $d['status_pembayaran'] ?></center></td>
                          
                          <!-- <td class="py-1">
                              <center>
                                <img src="../superadmin/custom/gambar/<?php echo $d['bukti_bayar'] ?>" alt="image" />
                              </center>
                          </td>
 -->                          <td>
                            <center>
                              <?php
                                            if ($d['status_custom']=='Menunggu Konfirmasi') {
                                            echo "
                                              <a href='#konfirmasiHarga$d[id_custom]' class='btn btn-info' data-toggle='modal'>
                                                 Konfirmasi Harga
                                              </a>
                                            ";
                                            }else if($d['status_custom']=='Terkonfirmasi'){
                                           echo "
                                              <a href='#Sisaharga$d[id_custom]' class='btn btn-primary' data-toggle='modal'>
                                                 Sisa Harga
                                              </a>
                                              <a href='?page=custom/detail&id_custom=$d[id_custom]' class='btn btn-success'>
                                                 Detail
                                              </a>
                                            ";
                                          }else if($d['status_custom']=='Proses'){
                                           echo "
                                              <a href='?page=custom/detail&id_custom=$d[id_custom]' class='btn btn-success'>
                                                 Detail
                                              </a>
                                            ";
                                          }else if($d['status_custom']=='Selesai'){
                                           echo "
                                              <a href='?page=custom/detail&id_custom=$d[id_custom]' class='btn btn-success'>
                                                 Detail
                                              </a>
                                              <a href='custom/cetak-custom.php?id_custom=$d[id_custom]' target='_BLANK' class='btn btn-info'>
                                                 <i class='fa fa-print'></i> Cetak
                                              </a>
                                            ";
                                          
                                          }
                                      ?> 

                              <a href="#hapus<?php echo $d['id_custom'] ?>" class="btn btn-danger btn-sm" data-toggle="modal">
                                 Hapus
                              </a>
                                     
                            </center>

                          </td>
                        </tr>



<!-- Modal Konfirmasi Harga -->
<div class="modal fade" id="konfirmasiHarga<?php echo $d['id_custom'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_custom" value="<?php echo $d['id_custom'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">Konfirmasi Harga</h5>
      </div>
      <div class="modal-body">
        <input type="text" name="harga_custom" class="form-control" required="" placeholder="Harga kustom ...">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
        <button type="submit" name="konfirmasi" class="btn btn-warning">KONFIRMASI</button>
      </div>
    </div>
  </form>
  </div>
</div>
<!-- #END# Modal Harga -->


<!-- Modal Konfirmasi Harga Sisa -->
<div class="modal fade" id="Sisaharga<?php echo $d['id_custom'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_custom" value="<?php echo $d['id_custom'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">Konfirmasi Sisa Harga</h5>
      </div>
      <div class="modal-body">
        <input type="text" name="sisa_harga" class="form-control" required="" placeholder="Sisa harga custom ...">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
        <button type="submit" name="konfirmasi" class="btn btn-warning">KONFIRMASI</button>
      </div>
    </div>
  </form>
  </div>
</div>
<!-- #END# Modal Harga Sisa -->


<!-- Modal proses -->
<div class="modal fade" id="proses<?php echo $d['id_custom'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_custom" value="<?php echo $d['id_custom'] ?>">
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
<div class="modal fade" id="selesai<?php echo $d['id_custom'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_custom" value="<?php echo $d['id_custom'] ?>">
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
<div class="modal fade" id="hapus<?php echo $d['id_custom'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_custom" value="<?php echo $d['id_custom'] ?>">
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

<!-- Modal muncul -->
<div class="modal fade" id="muncul<?php echo $d['id_custom'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <input type="hidden" name="id_t" value="<?php echo $d['id_custom'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title text-center">Produk</h4>
      </div>
      <div class="modal-body">
          <img src="../superadmin/custom/gambar/<?php echo $d['gambar_custom'] ?>" alt="" style="width: 100%;height: 400px">
      </div>

    </div>

  </div>
</div>
<!-- #END# Modal hapus -->
<!-- Modal muncul -->
<div class="modal fade" id="muncul<?php echo $d['id_custom'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <input type="hidden" name="id_t" value="<?php echo $d['id_custom'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title text-center">Produk</h4>
      </div>
      <div class="modal-body">
          <img src="../superadmin/custom/gambar/<?php echo $d['gambar_custom'] ?>" alt="" style="width: 100%;height: 400px">
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
error_reporting(0);
// konfirmasi orderan
if (isset($_POST['konfirmasi'])) {

$id_custom = $_POST['id_custom'];
$harga_custom = $_POST['harga_custom'];
$sisa_harga = $_POST['sisa_harga'];

$hapusData =  mysqli_query($koneksi, "UPDATE custom SET harga_custom='$harga_custom', sisa_harga='$sisa_harga', status_custom='Terkonfirmasi' WHERE id_custom='$id_custom'");
  if ($hapusData) {
    echo "<script>alert('Harga telah di konfirmasi.')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/index'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/index'></script>";
  }

}



// proses orderan
if (isset($_POST['proses'])) {

$id_custom = $_POST['id_custom'];

$hapusData =  mysqli_query($koneksi, "UPDATE custom SET harga_custom='Proses' WHERE id_custom='$id_custom'");
  if ($hapusData) {
    echo "<script>alert('Orderan telah diproses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/index'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/index'></script>";
  }

}

// selesai orderan
if (isset($_POST['selesai'])) {

$id_custom = $_POST['id_custom'];

$hapusData =  mysqli_query($koneksi, "UPDATE custom SET status_custom='Selesai' WHERE id_custom='$id_custom'");
  if ($hapusData) {
    echo "<script>alert('Orderan telah diselesaikan')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/index'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/index'></script>";
  }

}








if (isset($_POST['hapus'])) {
  

$id_custom = $_POST['id_custom'];


$hapusData =  mysqli_query($koneksi, "DELETE FROM custom WHERE id_custom='$id_custom'");

  if ($hapusData) {
   
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/index'></script>";
  }else{

    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/index'></script>";
  }

}







 ?>


