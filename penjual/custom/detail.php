<?php 

  $id_custom = $_GET['id_custom'];
  $my = mysqli_query($koneksi, "SELECT * FROM custom JOIN pembeli ON custom.id_pembeli=pembeli.id_pembeli WHERE custom.id_custom='$id_custom'");
  $d = mysqli_fetch_array($my);
?>       


          <div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">
                      DETAIL CUSTOM
                    </h4>
                   
                      <div class="row">
                        <div class="col-lg-4">
                          <table class="table">
                            <tr>
                              <th>Pembeli</th>
                              <td></td>
                              <td><?php echo $d['nama_pembeli'] ?></td>
                            </tr>
                            <tr>
                              <th>Telepon</th>
                              <td></td>
                              <td><?php echo $d['tlp_pembeli'] ?></td>
                            </tr>
                            <tr>
                              <th>Email</th>
                              <td></td>
                              <td><?php echo $d['email_pembeli'] ?></td>
                            </tr>
                            <tr>
                              <th>Alamat</th>
                              <td></td>
                              <td><?php echo $d['alamat_pembeli'] ?></td>
                            </tr>
                          </table>
                        </div>
                        <div class="col-lg-4">
                          <table class="table">
                            <tr>
                              <th>Tanggal</th>
                              <td></td>
                              <td><?php echo $d['tgl_custom'] ?></td>
                            </tr>
                            <tr>
                              <th>Status Pembuatan</th>
                              <td></td>
                              <td>
                            
                              <?php 

                                    if ($d['status_custom']=='Terkonfirmasi') {
                                      echo "<a href='#Proses$d[id_custom]' class='btn btn-warning' data-toggle='modal'>
                                               Proses
                                            </a>";
                                    }else if ($d['status_custom']=='Proses') {
                                      echo "<a href='#Selesai$d[id_custom]' class='btn btn-info' data-toggle='modal'>
                                               Selesai
                                            </a>";
                                    }
                                    else if ($d['status_custom']=='Selesai') {
                                      echo "Pembuatan Selesai";
                                    }


                              ?>
                            
                              </td>
                            </tr>
                            <tr>
                              <th>Status Pembayaran</th>
                              <td></td>
                              <td>
                            
                              <?php 

                                if ($d['status_pembayaran']=='Belum Bayar') {
                                  echo "Belum Bayar";
                                }else if ($d['status_pembayaran']=='DP') {
                                  echo "<a href='#modalDP$d[id_custom]' class='btn btn-info' data-toggle='modal'>
                                            Lunas
                                        </a>";
                                }else if ($d['status_pembayaran']=='Lunas') {
                                  echo "Lunas 100%";
                                }


                              ?>

                            
                            
                          </td>
                            </tr>

                            <tr>
                              <th>Status Barang</th>
                              <td></td>
                              <td>
                                 <?php 
                                    if ($d['status_barang']=='') {
                                      echo "<font color='red'>Pesanan Belum diterima</font>";
                                    }else if ($d['status_barang']=='Pesanan diterima'){
                                      echo "<font color='blue'>Pesanan Sudah diterima</font>";
                                    }

                              ?>
                              </td>
                            </tr>
                            <tr>
                              <th>Hasil Penjualan</th>
                              <td></td>
                              <td>
                                
                                <?php
                                if ($d['hasil_penjualan']=='') {
                                 echo "<font color='red'>
                                    Belum Dikirim</font>
                                 ";
                                }else{
                                 echo "
                                   <font color='blue'>Sudah Dikirim</font>
                                 ";
                                }
                                ?> 
                               
                            </td>
                            </tr>
                            <tr>
                              <th></th>
                              <td></td>
                              <td>
                            </td>
                            </tr>
                            
                          </table>

                        </div>
                        <div class="col-lg-4">
                          <table class="table">
                            <tr>
                              <th>DP</th>
                              <td></td>
                              <td>
                                <?php 
                                    if ($d['dp']==0) {
                                      echo "-";
                                    }else{
                                      echo "$d[dp]";
                                    }

                                 ?> 
                              </td>
                            </tr>
                            <tr>
                              <th>Bukti Pembayaran</th>
                              <td></td>
                              <td>
                                <?php 
                                    if ($d['bukti_bayar']=='') {
                                      echo "Belum ada bukti pembayaran";
                                    }else{
                                      echo "<a href='#bukti$d[id_custom]' data-toggle='modal'>
                                      <img src='../superadmin/custom/gambar/$d[bukti_bayar]' style='width: 150px;height: 120px'>
                                      </a>";
                                    }

                                 ?> 
                              </td>
                            </tr>
                           
                            
                          </table>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-12">
                          <table class="table">
                            <tr>
                              <th><center>Gambar</center></th>
                              <th><center>Barang</center></th>
                              <th><center>Ukuran Panjang (Meter)</center></th>
                              <th><center>Ukuran Lebar (Meter)</center></th>
                              <th><center>Harga Awal</center></th>
                              <th><center>Sisa Harga</center></th>
                              <th><center>No.Rekening Penjual</center></th>
                              <th><center>Deskripsi</center></th>
                            </tr>
                             <tr>
                              <td class="py-1">
                                  <center><a href="#ambil<?php echo $d['id_custom'] ?>" data-toggle="modal">
                                      <img src="../superadmin/custom/gambar/<?php echo $d['gambar_custom'] ?>" alt="image" />
                                  </a></center>
                              </td>
                              <td><center><?php echo $d['nama_custom'] ?></center></td>
                              <td><center><?php echo $d['ukuran_panjang'] ?></center></td>
                              <td><center><?php echo $d['ukuran_lebar'] ?></center></td>
                              <td><center><?php echo $d['harga_custom'] ?></center></td>
                              <td><center><?php echo $d['sisa_harga'] ?></center></td>
                              <td><center><?php echo $d['rekening_penjual'] ?></center></td>
                              <td><center><?php echo $d['deskripsi_custom'] ?></center></td>

                            </tr>


                          </table>
                        </div>
                      </div>

          <div class="row">
                          <div class="col-md-12 ">
                       <a href="?page=custom/index" class="btn btn-primary btn bg-teal pull-right col-white font-bold m-t-20 col-md-0" style="margin-left: 20px;">Kembali</a>
                          </div>
                        </div>

                  </div>
                </div>
              </div>

            </div>
          </div>



<!-- Modal Konfirmasi -->
<div class="modal fade" id="Proses<?php echo $d['id_custom'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_custom" value="<?php echo $d['id_custom'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center"> Yakin ingin memproses custom ini ?!</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
        <button type="submit" name="proses" class="btn btn-warning">Proses</button>
      </div>
    </div>
  </form>
  </div>
</div>
<!-- #END# Modal Konfirmasi -->


<!-- Modal Proses -->
<div class="modal fade" id="Selesai<?php echo $d['id_custom'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_custom" value="<?php echo $d['id_custom'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center"> Yakin ingin menyelesaikan custom ini ?!</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
        <button type="submit" name="selesai" class="btn btn-warning">Selesai</button>
      </div>
    </div>
  </form>
  </div>
</div>
<!-- #END# Modal Proses -->


<!-- Modal Proses -->
<div class="modal fade" id="modalDP<?php echo $d['id_custom'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_custom" value="<?php echo $d['id_custom'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center"> Yakin ingin melunasi custom ini ?!</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
        <button type="submit" name="lunas" class="btn btn-warning">Ya</button>
      </div>
    </div>
  </form>
  </div>
</div>
<!-- #END# Modal Proses -->

<!-- Modal bukti -->
<div class="modal fade" id="bukti<?php echo $d['id_custom'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <input type="hidden" name="id_t" value="<?php echo $d['id_custom'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title text-center">Bukti Pembayaran</h4>
      </div>
      <div class="modal-body">
          <img src="../superadmin/custom/gambar/<?php echo $d['bukti_bayar'] ?>" alt="" style="width: 100%;height: 400px">
      </div>

    </div>

  </div>
</div>
<!-- #END# Modal hapus -->





<?php 




// lunasi orderan
if (isset($_POST['lunas'])) {

$id_custom = $_POST['id_custom'];
$harga_custom = $_POST['harga_custom'];

$hapusData =  mysqli_query($koneksi, "UPDATE custom SET status_custom='Selesai', status_pembayaran='Lunas', dp='$harga_custom' WHERE id_custom='$id_custom'");
  if ($hapusData) {
    echo "<script>alert('Orderan telah dikonfirmasi')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/detail&id_custom=$id_custom'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/detail&id_custom=$id_custom'></script>";
  }

}


// konfirmasi orderan
if (isset($_POST['Terkonfirmasi'])) {

$id_custom = $_POST['id_custom'];

$hapusData =  mysqli_query($koneksi, "UPDATE custom SET status_custom='Proses' WHERE id_custom='$id_custom'");
  if ($hapusData) {
    echo "<script>alert('Orderan telah dikonfirmasi')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/detail&id_custom=$id_custom'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/detail&id_custom=$id_custom'></script>";
  }

}

// proses orderan
if (isset($_POST['proses'])) {

$id_custom = $_POST['id_custom'];

$hapusData =  mysqli_query($koneksi, "UPDATE custom SET status_custom='Proses' WHERE id_custom='$id_custom'");
  if ($hapusData) {
    echo "<script>alert('Orderan telah diproses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/detail&id_custom=$id_custom'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/detail&id_custom=$id_custom'></script>";
  }

}

// selesai orderan
if (isset($_POST['selesai'])) {

$id_custom = $_POST['id_custom'];

$hapusData =  mysqli_query($koneksi, "UPDATE custom SET status_custom='Selesai' WHERE id_custom='$id_custom'");
   if ($hapusData) {
    echo "<script>alert('Orderan telah selesai')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/detail&id_custom=$id_custom'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=custom/detail&id_custom=$id_custom'></script>";
  }

}



 ?>


