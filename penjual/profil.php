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
                          <label style="display: block;margin-bottom: 1px;font-size: 12px">Telepon</label>
                          <b><?php echo $tlps ?></b>
                        </td>
                      </tr>
                      <tr>
                        <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                          <label style="display: block;margin-bottom: 1px;font-size: 12px">Email</label>
                          <b><?php echo $emails ?></b>
                        </td>
                      </tr>
                      <tr>
                        <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                          <label style="display: block;margin-bottom: 1px;font-size: 12px">Password</label>
                          <b><?php echo $password ?></b>
                        </td>
                      </tr>
                      <tr>
                        <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                          <label style="display: block;margin-bottom: 1px;font-size: 12px">Alamat</label>
                          <b><?php echo $alamats ?></b>
                        </td>
                      </tr>
                      <tr>
                        <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                          <label style="display: block;margin-bottom: 1px;font-size: 12px">No.Rekening Penjual</label>
                          <b><?php echo $rek ?></b>
                        </td>
                      </tr>

                      <tr>
                        <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                          <label style="display: block;margin-bottom: 1px;font-size: 12px">Foto KTP</label>
                            <img src="../superadmin/fotoktp-penjual/<?php echo $foto_ktps ?>" style="width: 100%;height: 400px" />
                        </td>
                      </tr>
                    <tr>

                      <tr>
                        <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                         <a href="#edit<?php echo $ids ?>" class="btn btn-primary btn-sm btn-block" data-toggle="modal">
                          Edit profil
                        </a>
                      </td>
                    </tr>
                        <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                          <label style="display: block;margin-bottom: 1px;font-size: 16px">Hubungi Admin</label>
                          <a href="https://api.whatsapp.com/send?phone=+62895379407698" class="btn btn-info pull-right row-clearfix" target="_blank"  style="margin-top: -10px;">
                          <i class="material-icons">chat</i>
                          Chat Admin
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
              <input type="hidden" name="id_penjual" value="<?php echo $ids ?>">
              <div class="modal-content">
                <div class="modal-header text-center">
                  <h5 class="modal-title text-center">FORM EDIT DATA PRODUK</h5>
                </div>
                <div class="modal-body">

                  <table class="tabel" style="width: 100%">
                    <tr>
                      <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                        <label style="display: block;margin-bottom: 1px;font-size: 12px">Nama</label>
                        <input type="text" name="nama_penjual" value="<?php echo $namas ?>" class="form-control" required="">
                      </td>
                    </tr>
                    <tr>
                      <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                        <label style="display: block;margin-bottom: 1px;font-size: 12px">Telepon</label>
                        <input type="text" name="tlp_penjual" value="<?php echo $tlps ?>" class="form-control" required="">
                      </td>
                    </tr>
                    <tr>
                      <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                        <label style="display: block;margin-bottom: 1px;font-size: 12px">Email</label>
                        <input type="text" name="email_penjual" value="<?php echo $emails ?>" class="form-control" required="">
                      </td>
                    </tr>
                    <tr>
                      <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                        <label style="display: block;margin-bottom: 1px;font-size: 12px">Password</label>
                        <input type="text" name="password_penjual" value="<?php echo $password ?>" class="form-control" required="">
                      </td>
                    </tr>
                    <tr>
                      <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                        <label style="display: block;margin-bottom: 1px;font-size: 12px">Alamat</label>
                        <input type="text" name="alamat_penjual" value="<?php echo $alamats ?>" class="form-control" required="">
                      </td>
                    </tr>
                    <tr>
                      <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                        <label style="display: block;margin-bottom: 1px;font-size: 12px">No.Rekening Penjual</label>
                        <input type="text" name="no_rek" value="<?php echo $rek ?>" class="form-control" required="">
                      </td>
                    </tr>

                    <tr>
                      <td style="border-bottom: 1px solid #dedede;padding: 10px 0;">
                        <label style="display: block;margin-bottom: 1px;font-size: 12px">Ganti Foto KTP</label>
                        <input type="file" name="foto_ktp" class="form-control">
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


          $id_penjual = $_POST['id_penjual'];
          $nama_penjual = $_POST['nama_penjual'];
          $tlp_penjual = $_POST['tlp_penjual'];
          $alamat_penjual = $_POST['alamat_penjual'];
          $email_penjual = $_POST['email_penjual'];
          $password_penjual = $_POST['password_penjual'];
          $no_rek = $_POST['no_rek'];


          $fotoktp = $_FILES['foto_ktp']['name'];
          $tmpGambar = $_FILES['foto_ktp']['tmp_name'];



         if (empty($fotoktp)) {
           mysqli_query($koneksi, "UPDATE penjual SET nama_penjual='$nama_penjual', tlp_penjual='$tlp_penjual', alamat_penjual='$alamat_penjual', email_penjual='$email_penjual', password_penjual='$password_penjual', no_rek='$no_rek' WHERE id_penjual='$id_penjual'");
          
          echo "<script>alert('Sukses')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=profil'></script>";
         }else{
          move_uploaded_file($tmpGambar,"../superadmin/fotoktp-penjual/".$fotoktp);
          $simpan =  mysqli_query($koneksi, "UPDATE penjual SET nama_penjual='$nama_penjual', tlp_penjual='$tlp_penjual', alamat_penjual='$alamat_penjual', email_penjual='$email_penjual', password_penjual='$password_penjual', no_rek='$no_rek', foto_ktp='$fotoktp' WHERE id_penjual='$id_penjual'");
         
          echo "<script>alert('Sukses')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=profil'></script>";
        }

        }





        ?>


