          <div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">
                      DATA PEMBELI
                      
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
                                <img src="../superadmin/pembeli/gambar/<?php echo $d['gambar_pembeli'] ?>" alt="image" />
                             </td>
                          <?php } ?>
                          <td><center><?php echo $d['nama_pembeli'] ?></center></td>
                          <td><center><?php echo $d['tlp_pembeli'] ?></center></td>
                          <td><center><?php echo $d['alamat_pembeli'] ?></center></td>
                          <td><center><?php echo $d['email_pembeli'] ?></center></td>
                          <td><center><?php echo $d['password_pembeli'] ?></center></td>
                          
                        </tr>

                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>
