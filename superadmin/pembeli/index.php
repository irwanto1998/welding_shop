          <div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">
                      DATA PEMBELI
                      <a href="#tambah" class="btn btn-circle btn-success pull-right mb-5" data-toggle="modal"> <i class="fa fa-plus"></i></a>
                    </h4>
                   
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th><center>No.</center></th>
                          <th><center>Foto</center></th>
                          <th><center>Nama</center></th>
                          <th><center>Telepon</center></th>
                          <th><center>Alamat</center></th>
                          <th><center>Email/Username</center></th>
                          <th><center>Password</center></th>
                          <th><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 

                        $no = 1;
                        $my = mysqli_query($koneksi, "SELECT * FROM pembeli");
                        while ($d = mysqli_fetch_array($my)) {
                          $jumlahkarakter=1;
                          $cetak = substr($d['nama_pembeli'], 0, $jumlahkarakter);
                         ?>
                        <tr>
                          <td><center><?php echo $no++ ?></center></td>
                          <?php 

                            if ($d['gambar_pembeli']=='') { ?>

                              <td>
                                <div class="div-img-default">
                                  <?php echo $cetak ?>
                                </div>
                              </td>
                            <?php }else{?>

                              <td class="py-1">
                                <img src="pembeli/gambar/<?php echo $d['gambar_pembeli'] ?>" alt="image" />
                             </td>
                          <?php } ?>
                          <td><center><?php echo $d['nama_pembeli'] ?></center></td>
                          <td><center><?php echo $d['tlp_pembeli'] ?></center></td>
                          <td><center><?php echo $d['alamat_pembeli'] ?></center></td>
                          <td><center><?php echo $d['email_pembeli'] ?></center></td>
                          <td><center><?php echo $d['password_pembeli'] ?></center></td>
                          <td>
                            <center>
                              <a href="#edit<?php echo $d['id_pembeli'] ?>" class="btn btn-primary btn-circle" data-toggle="modal">
                                <i class="material-icons">edit</i>
                              </a>
                              <a href="#hapus<?php echo $d['id_pembeli'] ?>" class="btn btn-danger btn-circle" data-toggle="modal">
                                 <i class="material-icons">delete_forever</i>
                              </a>
                            </center>
                          </td>
                        </tr>





<!-- Modal edit -->
<div class="modal fade" id="edit<?php echo $d['id_pembeli'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_pembeli" value="<?php echo $d['id_pembeli'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">FORM EDIT DATA PENJUAL</h5>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-md-12">
              <label style="display: block;">Nama</label>
              <input type="text" name="nama_pembeli" value="<?php echo $d['nama_pembeli'] ?>" class="form-control" required="" placeholder="Nama ...">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <label style="display: block;">Telepon/HP</label>
              <input type="text" name="tlp_pembeli" value="<?php echo $d['tlp_pembeli'] ?>" class="form-control" required="" placeholder="Telepon ...">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <label style="display: block;">Email/Username</label>
              <input type="text" name="email_pembeli" value="<?php echo $d['email_pembeli'] ?>" class="form-control" required="" placeholder="Email/Username ...">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <label style="display: block;">Password</label>
              <input type="text" name="password_pembeli" value="<?php echo $d['password_pembeli'] ?>" class="form-control" required="" placeholder="Telepon ...">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <label style="display: block;">Gambar /Foto</label>
              <input type="file" name="gambar_pembeli" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label style="display: block;">Alamat</label>
            <div class="pad">
              <textarea class="form-control" id="editor1" name="alamat_pembeli" rows="10" cols="80"><?php echo $d['alamat_pembeli'] ?></textarea>
            </div>
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
<div class="modal fade" id="hapus<?php echo $d['id_pembeli'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_pembeli" value="<?php echo $d['id_pembeli'] ?>">
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


<!-- Modal tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">

    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">FORM TAMBAH DATA PEMBELI</h5>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-md-12">
              <label style="display: block;">Nama</label>
              <input type="text" name="nama_pembeli" class="form-control" required="" placeholder="Nama ...">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <label style="display: block;">Telepon/HP</label>
              <input type="text" name="tlp_pembeli" class="form-control" required="" placeholder="Telepon ...">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <label style="display: block;">Email/Username</label>
              <input type="text" name="email_pembeli" class="form-control" required="" placeholder="Email/Username ...">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <label style="display: block;">Password</label>
              <input type="text" name="password_pembeli" class="form-control" required="" placeholder="Telepon ...">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <label style="display: block;">Gambar /Foto</label>
              <input type="file" name="gambar_pembeli" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label style="display: block;">Alamat</label>
            <div class="pad">
              <textarea class="form-control" id="editor1" name="alamat_pembeli" rows="10" cols="80"></textarea>
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

if (isset($_POST['hapus'])) {
  

$id_pembeli = $_POST['id_pembeli'];


$hapusData =  mysqli_query($koneksi, "DELETE FROM pembeli WHERE id_pembeli='$id_pembeli'");

  if ($hapusData) {
   
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=pembeli/index'></script>";
  }else{

    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=pembeli/index'></script>";
  }

}


if (isset($_POST['edit'])) {
  
$id_pembeli = $_POST['id_pembeli'];
$nama_pembeli = $_POST['nama_pembeli'];
$tlp_pembeli = $_POST['tlp_pembeli'];
$alamat_pembeli = $_POST['alamat_pembeli'];
$email_pembeli = $_POST['email_pembeli'];
$password_pembeli = $_POST['password_pembeli'];

$gbrPembeli = $_FILES['gambar_pembeli']['name'];
$tmpGambar = $_FILES['gambar_pembeli']['tmp_name'];

  if (empty($gbrPembeli)) {
    mysqli_query($koneksi, "UPDATE pembeli SET nama_pembeli='$nama_pembeli', tlp_pembeli='$tlp_pembeli', alamat_pembeli='$alamat_pembeli', email_pembeli='$email_pembeli', password_pembeli='$password_pembeli' WHERE id_pembeli='$id_pembeli'");
     echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=pembeli/index'></script>";
  }else{

 move_uploaded_file($tmpGambar,"pembeli/gambar/".$gbrPembeli);

     $updateData =  mysqli_query($koneksi, "UPDATE pembeli SET nama_pembeli='$nama_pembeli', tlp_pembeli='$tlp_pembeli', alamat_pembeli='$alamat_pembeli', email_pembeli='$email_pembeli', password_pembeli='$password_pembeli', gambar_pembeli='$gbrPembeli' WHERE id_pembeli='$id_pembeli'");

    if ($updateData) {

     
      echo "<script>alert('Sukses')</script>";
      echo "<meta http-equiv='refresh' content='0; url=?page=pembeli/index'></script>";
    }else{
      echo "<script>alert('Terjadi kesalahan, coba ulangi kembali')</script>";
      echo "<meta http-equiv='refresh' content='0; url=?page=pembeli/index'></script>";
    }
  }

}




if (isset($_POST['simpan'])) {
  

$nama_pembeli = $_POST['nama_pembeli'];
$tlp_pembeli = $_POST['tlp_pembeli'];
$alamat_pembeli = $_POST['alamat_pembeli'];
$email_pembeli = $_POST['email_pembeli'];
$password_pembeli = $_POST['password_pembeli'];

$gbrPembeli = $_FILES['gambar_pembeli']['name'];
$tmpGambar = $_FILES['gambar_pembeli']['tmp_name'];

$simpanData = mysqli_query($koneksi, "INSERT INTO pembeli VALUES(NULL,'$nama_pembeli','$tlp_pembeli','$alamat_pembeli','$email_pembeli','$password_pembeli','$gbrPembeli');");


  if ($simpanData) {

    move_uploaded_file($tmpGambar,"pembeli/gambar/".$gbrPembeli);
    
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=pembeli/index'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=pembeli/index'></script>";
  }



}





 ?>


