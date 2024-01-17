
<section class="container m-b-125">

  <div class="row-clearfix">
    <div class="col-md-12">
      <h2 class="font-20 font-bold col-cyan m-t-125 m-b-20 text-center">Riwayat Chat</h2>
    </div>
  </div>

 <div class="row-clearfix">

    <div class="col-md-12">
      <div class="card">
         <div class="body">
                             <table class="table table-striped">
                      <thead>
                        <tr>
                          <th><center>No.</center></th>
                          <th><center>Foto</center></th>
                          <th><center>Nama</center></th>
                          <th><center>Harga</center></th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 

                        $no = 1;
                        $my = mysqli_query($koneksi, "SELECT * FROM komentar JOIN produk USING(id_produk) JOIN penjual ON komentar.id_penjual=penjual.id_penjual WHERE id_pembeli='$ids' AND hapus_drpembeli='Y' GROUP BY id_produk");
                        while ($d = mysqli_fetch_array($my))
                         {
                         ?>
                        <tr>
                          <td><center><?php echo $no++ ?></center></td>
                          <td class="py-1">
                            <center> <a href="#timbul<?php echo $d['id_produk'] ?>"  data-toggle="modal">
                            <img src="../superadmin/produk/gambar/<?php echo $d['gambar_produk'] ?>" alt="image" />
                            </a></center>
                          </td>
                          <td><center><?php echo $d['nama_produk'] ?></center></td>
                          <td><center><?php echo rupiah($d['harga_produk']) ?></center></td>
                          <td>

                            <form method="POST" action="produk/aksihapus_drpembeli.php" onclick="return confirm('Yakin ingin menghapus ?!');" enctype="multipart/form-data">

                                      <input type="hidden" name="nama_produk" value="<?php echo $d['nama_produk'];?>">
                                      <input type="hidden" name="id_produk" value="<?php echo $d['id_produk'];?>">
                                      <input type="hidden" name="nama_pengirim" value="<?php echo $d['nama_pengirim'];?>">

                                    <?php $sc = $d['hapus_drpembeli']; ?>
                                    <div class="hidden">
                                    <div class="col-sm-10">
                                       <select name="hapus_drpembeli" hidden="hide">
                                        <option <?php echo ($sc == 'N') ? "selected": "" ?>>N</option>
                                      </select>
                                    </div>
                                  </div>
                                      <button class="btn btn-danger btn-sm" href="#">Hapus Chat</button> 
                            </form>

                        <?php
                          $ids = $pembeli['id_pembeli'];
                          $id_produk = $d['id_produk'];
                          $mychat = mysqli_query($koneksi, "SELECT komentar_id, count(*) AS jumlahData FROM komentar WHERE status_penjual='N'
                            AND id_produk='$id_produk' AND id_pembeli='$ids'");
                          $dC = mysqli_fetch_array($mychat);
                          $NChat = $dC['jumlahData'];

                        ?>
                                <form method="POST" action="komentar.php?id_produk=<?php echo $d['id_produk'] ?>" enctype="multipart/form-data">

                                      <input type="hidden" name="nama_produk" value="<?php echo $d['nama_produk'];?>">
                                      <input type="hidden" name="id_produk" value="<?php echo $d['id_produk'];?>">
                                      <input type="hidden" name="id_pembeli" value="<?php echo $d['id_pembeli'];?>">
                                      <input type="hidden" name="nama_penjual" value="<?php echo $d['nama_penjual'];?>">

                                    <?php $sc = $d['status_penjual']; ?>
                                    <div class="hidden">
                                       <select name="status_penjual" hidden="hide">
                                        <option <?php echo ($sc == 'Y') ? "selected": "" ?>>Y</option>
                                      </select>
                                    </div><br>
                              <button a href="komentar.php?id_produk=<?php echo $d['id_produk'] ?>" class="btn btn-success btn">Chat &nbsp;
                                <font color="yellow">( <?php echo $NChat ?> )</font>
                              </button>   </form>
                            
                          </td>
                        </tr>


<!-- Modal hapus -->
<div class="modal fade" id="hapus<?php echo $d['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_produk" value="<?php echo $d['id_produk'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">Yakin ingin menghapus data ini ?!</h5>
      </div>
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">Yakin ingin menghapus chat ini ?!</h5>
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

<!-- Modal hapus -->
<div class="modal fade" id="timbul<?php echo $d['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <input type="hidden" name="id_produk" value="<?php echo $d['id_produk'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title text-center">Foto Produk</h4>
      </div>
      <div class="modal-header text-center">
        <h4 class="modal-title text-center">Foto Produk</h4>
      </div>
      <div class="modal-body">
          <img src="../superadmin/produk/gambar/<?php echo $d['gambar_produk'] ?>" alt="" style="width: 100%;height: 400px">
      </div>

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

</section>
</form>


<?php 

if (isset($_POST['hapus'])) {
  

$id_produk = $_POST['id_produk'];



$hapusData =  mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk='$id_produk'");


  if ($hapusData) {
   
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=produk/index'></script>";
  }else{

    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=produk/index'></script>";
  }

}

 ?>




