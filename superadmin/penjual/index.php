          <div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">
                      DATA PENJUAL
                      
                    </h4>
                   
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th><center>No.</center></th>
                          <th><center>Foto KTP</center></th>
                          <th><center>Nama</center></th>
                          <th><center>Telepon</center></th>
                          <th><center>Alamat</center></th>
                          <th><center>Status Pendaftaran</center></th>
                          <th><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 

                        $no = 1;
                        $my = mysqli_query($koneksi, "SELECT * FROM penjual");
                        while ($d = mysqli_fetch_array($my)) {
                         ?>
                        <tr>
                          <td><center><?php echo $no++ ?></center></td>
                          <td class="py-1">
                            <center><a href="#muncul<?php echo $d['id_penjual'] ?>" data-toggle="modal">
                            <img src="fotoktp-penjual/<?php echo $d['foto_ktp'] ?>" alt="image" />
                            </a></center>
                          </td>
                          <td><center><?php echo $d['nama_penjual'] ?></center></td>
                          <td><center><?php echo $d['tlp_penjual'] ?></center></td>
                          <td><center><?php echo $d['alamat_penjual'] ?></center></td>
                          <td><center><?php echo $d['status_pendaftaran'] ?></center></td>
                          <td>
                            <center>
                              <a href="#edit<?php echo $d['id_penjual'] ?>" class="btn btn-primary btn-sm" data-toggle="modal">
                                <i class="fa fa-edit"></i>
                              </a>
                              <a href="#hapus<?php echo $d['id_penjual'] ?>" class="btn btn-danger btn-sm" data-toggle="modal">
                                <i class="fa fa-trash"></i>
                              </a>
                              <a href="#verifikasi<?php echo $d['id_penjual'] ?>" class="btn btn-success btn-sm" data-toggle="modal">
                                <i class="fa fa-check"></i>
                              </a>
                            <!-- tombol kondisi status pendaftaran -->
                            <?php

                            if ($d['status_pendaftaran']=='Menunggu Verifikasi') {
                              echo "<a href='#verifikasi$d[id_penjual]' class='btn btn-warning' data-toggle='modal'>
                                      Terverifikasi
                                    </a>";
                            }

                            ?>
                            <!-- #END# tombol kondisi status pendaftaran -->
                            </center>




                          </td>
                        </tr>

<!-- Modal Verifikasi -->
  <div class="modal fade" id="verifikasi<?php echo $d['id_penjual'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <form class="mt-5" method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="id_penjual" value="<?php echo $d['id_penjual'] ?>">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h5 class="modal-title text-center">Verifikasi Pendaftaran</h5>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
              <button type="submit" name="verifikasi" class="btn btn-warning">Verifikasi</button>
            </div>
          </div>
      </form>
    </div>
  </div>
<!-- #END# Modal Verifikasi -->




<!-- Modal edit -->
<div class="modal fade" id="edit<?php echo $d['id_penjual'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_penjual" value="<?php echo $d['id_penjual'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">FORM EDIT DATA PENJUAL</h5>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-md-12">
              <label style="display: block;">Nama</label>
              <input type="text" name="nama_penjual" value="<?php echo $d['nama_penjual'] ?>" class="form-control" required="" placeholder="Nama penjual ...">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <label style="display: block;">Telepon/HP</label>
              <input type="text" name="tlp_penjual" value="<?php echo $d['tlp_penjual'] ?>" class="form-control" required="" placeholder="Telepon ...">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label style="display: block;">Alamat</label>
            <div class="pad">
              <textarea class="form-control" id="editor1" name="alamat_penjual" rows="10" cols="80"><?php echo $d['alamat_penjual'] ?></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <label style="display: block;">Foto KTP</label>
              <img src="fotoktp-penjual/<?php echo $d['foto_ktp'] ?>" style='width: 40%; height: 150px' />
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
        <button type="submit" name="edit" class="btn btn-primary">EDIT</button>
      </div>
    </div>
  </form>
  </div>
</div>
<!-- #END# Modal edit -->



<!-- Modal hapus -->
<div class="modal fade" id="hapus<?php echo $d['id_penjual'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_penjual" value="<?php echo $d['id_penjual'] ?>">
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
<div class="modal fade" id="muncul<?php echo $d['id_penjual'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <input type="hidden" name="id_t" value="<?php echo $d['id_penjual'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title text-center">Foto KTP</h4>
      </div>
      <div class="modal-body">
          <img src="../superadmin/fotoktp-penjual/<?php echo $d['foto_ktp'] ?>" alt="" style="width: 100%;height: 400px">
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


<!-- Modal tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">

    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">FORM TAMBAH DATA PENJUAL</h5>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-md-12">
              <label style="display: block;">Nama</label>
              <input type="text" name="nama_penjual" class="form-control" required="" placeholder="Nama penjual ...">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <label style="display: block;">Telepon/HP</label>
              <input type="text" name="tlp_penjual" class="form-control" required="" placeholder="Telepon ...">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label style="display: block;">Alamat</label>
            <div class="pad">
              <textarea class="form-control" id="editor1" name="alamat_penjual" rows="10" cols="80"></textarea>
            </div>
          </div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
        <button type="submit" name="simpan" class="btn btn-primary">SIMPAN</button>
      </div>
    </div>
  </form>
  </div>
</div>
<!-- #END# Modal tambah -->




<?php

// verifikasi orderan
if (isset($_POST['verifikasi'])) {

$id_penjual = $_POST['id_penjual'];

$hapusData =  mysqli_query($koneksi, "UPDATE penjual SET status_pendaftaran='Terverifikasi' WHERE id_penjual='$id_penjual'");
  if ($hapusData) {
    echo "<script>alert('Akun telah di verifikasi')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=penjual/index'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=penjual/index'></script>";
  }

} 

if (isset($_POST['hapus'])) {
  

$id_penjual = $_POST['id_penjual'];


$hapusData =  mysqli_query($koneksi, "DELETE FROM penjual WHERE id_penjual='$id_penjual'");
$hapusData1 =  mysqli_query($koneksi, "DELETE FROM produk WHERE id_penjual='$id_penjual'");
  if ($hapusData AND $hapusData1) {
   
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=penjual/index'></script>";
  }else{

    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=penjual/index'></script>";
  }

}


if (isset($_POST['edit'])) {
  

$id_penjual = $_POST['id_penjual'];
$nama_penjual = $_POST['nama_penjual'];
$tlp_penjual = $_POST['tlp_penjual'];
$alamat_penjual = $_POST['alamat_penjual'];


$simpanUpdate =  mysqli_query($koneksi, "UPDATE penjual SET nama_penjual='$nama_penjual', tlp_penjual='$tlp_penjual', alamat_penjual='$alamat_penjual' WHERE id_penjual='$id_penjual'");

  if ($simpanUpdate) {
   
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=penjual/index'></script>";
  }else{
    
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=penjual/index'></script>";
  }

}




if (isset($_POST['simpan'])) {
  

$nama_penjual = $_POST['nama_penjual'];
$tlp_penjual = $_POST['tlp_penjual'];
$alamat_penjual = $_POST['alamat_penjual'];


$simpanData = mysqli_query($koneksi, "INSERT INTO penjual VALUES(NULL,'$nama_penjual','$tlp_penjual','$alamat_penjual');");


  if ($simpanData) {
    
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=penjual/index'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=penjual/index'></script>";
  }



}





 ?>


