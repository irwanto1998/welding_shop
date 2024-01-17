          <div class="content-wrapper">
            <div class="row">

              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">
                      MY PROFIL
                    </h4>
                    <table class="tabel" style="width: 100%">
                      <tr>
                        <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                          <label style="display: block;margin-bottom: 1px;font-size: 12px">Nama</label>
                          <b><?php echo $namas ?></b>
                        </td>
                      </tr>
                      <tr>
                        <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                          <label style="display: block;margin-bottom: 1px;font-size: 12px">No.Telp</label>
                          <b><?php echo $notelps ?></b>
                        </td>
                      </tr>
                      <tr>
                        <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                          <label style="display: block;margin-bottom: 1px;font-size: 12px">Email</label>
                          <b><?php echo $usernames ?></b>
                        </td>
                      </tr>
                      <tr>
                        <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                          <label style="display: block;margin-bottom: 1px;font-size: 12px">Password</label>
                          <b><?php echo $passwords ?></b>
                        </td>
                      </tr>
                      <tr>
                        <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                          <label style="display: block;margin-bottom: 1px;font-size: 12px">No. Rekening</label>
                          <b><?php echo $no_reks ?></b>
                        </td>
                      </tr>

                      <tr>
                        <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                          <label style="display: block;margin-bottom: 1px;font-size: 12px">Foto KTP</label>
                            <img src="fotoktp-admin/<?php echo $foto_ktps ?>" style="width: 100%;height: 400px" />
                        </td>
                      </tr>

                      <tr>
                        <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                         <a href="#edit<?php echo $ids ?>" class="btn btn-primary btn-sm btn-block" data-toggle="modal">
                          Edit profil
                        </a>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>


        <!-- Modal edit -->
        <div class="modal fade" id="edit<?php echo $ids ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">

            <form class="mt-5" method="post" action="" enctype="multipart/form-data">
              <input type="hidden" name="id_admin" value="<?php echo $ids ?>">
              <div class="modal-content">
                <div class="modal-header text-center">
                  <h5 class="modal-title text-center">FORM EDIT DATA PRODUK</h5>
                </div>
                <div class="modal-body">

                  <table class="tabel" style="width: 100%">
                    <tr>
                      <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                        <label style="display: block;margin-bottom: 1px;font-size: 12px">Nama</label>
                        <input type="text" name="nama_admin" value="<?php echo $namas ?>" class="form-control" required="">
                      </td>
                    </tr>
                    <tr>
                      <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                        <label style="display: block;margin-bottom: 1px;font-size: 12px">Email</label>
                        <input type="text" name="username_admin" value="<?php echo $usernames ?>" class="form-control" required="">
                      </td>
                    </tr>
                    <tr>
                      <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                        <label style="display: block;margin-bottom: 1px;font-size: 12px">No.Telp</label>
                        <input type="text" name="no_telp" value="<?php echo $notelps ?>" class="form-control" required="">
                      </td>
                    </tr>
                    <tr>
                      <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                        <label style="display: block;margin-bottom: 1px;font-size: 12px">Password</label>
                        <input type="text" name="password_admin" value="<?php echo $passwords ?>" class="form-control" required="">
                      </td>
                    </tr>
                    <tr>
                      <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                        <label style="display: block;margin-bottom: 1px;font-size: 12px">No. Rekening</label>
                        <input type="number" name="no_rek_admin" value="<?php echo $no_reks ?>" class="form-control" required="">
                      </td>
                    </tr>
                    <tr>
                      <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                        <label style="display: block;margin-bottom: 1px;font-size: 12px">Ganti Foto KTP</label>
                        <input type="file" name="foto_ktp_admin" class="form-control">
                      </td>
                    </tr>

                    <tr>
                      <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                        <label style="display: block;margin-bottom: 1px;font-size: 12px">Ganti Foto</label>
                        <input type="file" name="gambar_admin" class="form-control">
                      </td>
                    </tr>

                  </table>

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


        <?php 



        if (isset($_POST['edit'])) {


          $id_admin = $_POST['id_admin'];
          $nama_admin = $_POST['nama_admin'];
          $no_telp = $_POST['no_telp'];
          $username_admin = $_POST['username_admin'];
          $password_admin = $_POST['password_admin'];
          $no_rek_admin = $_POST['no_rek_admin'];



          $gambarProduk = $_FILES['gambar_admin']['name'];
          $tmpGambar = $_FILES['gambar_admin']['tmp_name'];

          $fotoktp = $_FILES['foto_ktp_admin']['name'];
          $tmpGambar2 = $_FILES['foto_ktp_admin']['tmp_name'];



          if (empty($gambarProduk)) {
           mysqli_query($koneksi, "UPDATE admin SET nama_admin='$nama_admin', no_telp='$no_telp', username_admin='$username_admin', password_admin='$password_admin', no_rek_admin='$no_rek_admin' WHERE id_admin='$id_admin'");
           echo "<script>alert('Sukses')</script>";
           echo "<meta http-equiv='refresh' content='0; url=?page=profil'></script>";
         }else{
          move_uploaded_file($tmpGambar,"gambar-profil/".$gambarProduk);
          $simpan =  mysqli_query($koneksi, "UPDATE admin SET nama_admin='$nama_admin', username_admin='$username_admin', password_admin='$password_admin', no_rek_admin='$no_rek_admin', gambar_admin='$gambarProduk' WHERE id_admin='$id_admin'");
          echo "<script>alert('Sukses')</script>";
          echo "<meta http-equiv='refresh' content='0; url=?page=profil'></script>";
        }

         if (empty($fotoktp)) {
           mysqli_query($koneksi, "UPDATE admin SET nama_admin='$nama_admin', no_telp='$no_telp', username_admin='$username_admin', password_admin='$password_admin', no_rek_admin='$no_rek_admin' WHERE id_admin='$id_admin'");
          
           echo "<meta http-equiv='refresh' content='0; url=?page=profil'></script>";
         }else{
          move_uploaded_file($tmpGambar2,"fotoktp-admin/".$fotoktp);
          $simpan =  mysqli_query($koneksi, "UPDATE admin SET nama_admin='$nama_admin', username_admin='$username_admin', password_admin='$password_admin', no_rek_admin='$no_rek_admin', foto_ktp_admin='$fotoktp' WHERE id_admin='$id_admin'");
         
          echo "<meta http-equiv='refresh' content='0; url=?page=profil'></script>";
        }


      }

      ?>


