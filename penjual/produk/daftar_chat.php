          <div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">
                      Data Chat Produk
                      
                    </h4>
                   
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th><center>No.</center></th>
                          <th><center>Nama Produk</center></th>
                          <th><center>Nama Pembeli</center></th>
                          <th>Lainya</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        $my = mysqli_query($koneksi, "SELECT * FROM komentar  WHERE id_produk='$_GET[id_produk]' GROUP BY id_pembeli");
                        while ($d = mysqli_fetch_array($my))
                         {
                         ?>
                        <tr>
                          <td><center><?php echo $no++ ?></center></td>
                          <td><center><?php echo $d['nama_produk'] ?></center></td>
                          <td><center><?php echo $d['nama_pengirim'] ?></center></td>
 
                          <td>

                            <a href="produk/aksi_hapusS.php?id_produk=<?php echo $d['id_produk'] ?>&&id_pembeli=<?php echo $d['id_pembeli'] ?>" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>

                       <?php
                          $id_pembeli = $d['id_pembeli'];
                          $mychat = mysqli_query($koneksi, "SELECT komentar_id, count(*) AS jumlahData FROM komentar WHERE status_chat='N'
                            AND id_pembeli='$id_pembeli' AND id_produk='$_GET[id_produk]'");
                          $dC = mysqli_fetch_array($mychat);
                          $NChat = $dC['jumlahData'];

                        ?>
                              <a href="komentar.php?id_produk=<?php echo $d['id_produk'] ?>&&id_pembeli=<?php echo $d['id_pembeli'] ?>" class="btn btn-warning btn-sm" >
                                <i class="fa fa-eye"> Chat</i> 
                              </a>
                               <li class="nav-item dropdown d-none d-xl-inline-block notif-dropdown">  
                                  <?php 
                                    if ($NChat != 0) {?>
                                     <span class="counnter"><?php echo $NChat ?></span>
                                    <?php }else{ ?>
                                      <span class="counnter">0</span>
                                  <?php } ?>

                              </li>
  
                                <p><form method="POST" action="produk/aksiubah_SC.php" enctype="multipart/form-data">

                                      <input type="hidden" name="nama_produk" value="<?php echo $d['nama_produk'];?>">
                                      <input type="hidden" name="id_produk" value="<?php echo $d['id_produk'];?>">
                                      <input type="hidden" name="nama_pengirim" value="<?php echo $d['nama_pengirim'];?>">

                                    <?php $sc = $d['status_chat']; ?>
                                    <div class="col-sm-10">
                                       <select name="status_chat" hidden="hide">
                                        <option <?php echo ($sc == 'Y') ? "selected": "" ?>>Y</option>
                                      </select>
                                    </div>
                                      <button class="btn btn-primary btn-sm" href="#">Konfirmasi</button> 
                                </form>
                          </td>
                        </tr>



                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>
