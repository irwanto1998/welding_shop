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
                          <th><center></center></th>
                          <th><center>Aksi</center></th>
                          <th><center></center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 

                        $no = 1;
                        $my = mysqli_query($koneksi, "SELECT * FROM custom JOIN penjual ON custom.id_penjual=penjual.id_penjual JOIN pembeli ON custom.id_pembeli=pembeli.id_pembeli");
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

 -->                          
                        
                          <td>
                              <?php
                                            if ($d['status_custom']=='Menunggu Konfirmasi') {
                                            echo "
                                              <font color='purple'>
                                                 Konfirmasi Harga</font>
                                              
                                            ";
                                            }else if($d['status_custom']=='Terkonfirmasi'){
                                           echo "
                                              <font color='orange'>
                                                 Sisa Harga</font>
                                            ";
                                          }else if($d['status_custom']=='Proses'){
                                           echo "

                                            ";
                                          }else if($d['status_custom']=='Selesai'){
                                           echo "
                                            ";
                                          
                                          }
                                      ?>
                            </td>
                            <td>
                             <a href="?page=custom/detail&id_custom=<?php echo $d['id_custom'] ; ?>" class="btn btn-success">
                                Detail
                             </a>
                          </td>  <td><center>

                              <a href="#hapus<?php echo $d['id_custom'] ?>" class="btn btn-danger btn-circle" data-toggle="modal">
                                 <i class="material-icons">delete_forever</i>
                              </a></center>

                          </td>
                        </tr>



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


