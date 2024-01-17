  <?php 
  $myss = mysqli_query($koneksi, "SELECT * FROM keranjang JOIN produk ON keranjang.id_produk=produk.id_produk WHERE keranjang.status_user='$ids'");
  $dss = mysqli_fetch_array($myss);
   ?> 
      <form action="" method="post">
<section class="container m-b-125">

  <div class="row-clearfix">
    <div class="col-md-12">
      <h2 class="font-20 font-bold col-cyan m-t-125 m-b-20 text-center">KERANJANG BELANJA</h2>
    </div>
  </div>

 <div class="row-clearfix">

    <div class="col-md-12">
      <div class="card">
         <div class="body">
                        <table class="table">
              <thead>
                <tr>
                  <th><center>No.</center></th>
                  <th><center>Gambar</center></th>
                  <th><center>Produk</center></th>
                  <th><center>Harga</center></th>
                  <th><center>Banyak</center></th>
                </tr>
              </thead>
              <tbody>
                <?php 

                $no = 1;
                $my = mysqli_query($koneksi, "SELECT * FROM keranjang JOIN produk ON keranjang.id_produk=produk.id_produk WHERE keranjang.status_user='$ids'");
                $no = 1;
                while ($d = mysqli_fetch_array($my)) {
                 ?>
                 <tr>
                  <td><center><?php echo $no++ ?></center></td>
                  <td class="py-1">
                    <center>
                      <img src="../superadmin/produk/gambar/<?php echo $d['gambar_produk'] ?>" alt="image" />
                    </center>
                  </td>
                  <td><center><?php echo $d['nama_produk'] ?></center></td>
                  <td><center><?php echo rupiah($d['harga_produk']) ?></center></td>
                  <td>
                    <center>
                      <input type="hidden" id="harga" onkeyup="sum();" value="<?php echo $d['harga_produk'] ?>">
                      <input type="hidden" name="harga[]" value="<?php echo $d['harga_produk'] ?>">
                      <input type="hidden" name="id_produk[]" value="<?php echo $d['id_produk'] ?>">

                      <input type="number" name="banyak[]" onkeyup="sum();" value="1" id="banyak" class="form-control" required="" placeholder="Banyak ..." style="width: 100px !important">
                    </center>
                  </td>
                  <td>
                    <center>
                       <a href="#hapus<?php echo $d['id_keranjang'] ?>" class="btn btn-danger btn-sm" data-toggle="modal">
                          Hapus
                        </a>
                    </center>
                  </td>
                </tr>




<!-- Modal hapus -->
<div class="modal fade" id="hapus<?php echo $d['id_keranjang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999;">
  <div class="modal-dialog modal-sm" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="kode_keranjang" value="<?php echo $d['kode_keranjang'] ?>">
    <input type="hidden" name="id_keranjang" value="<?php echo $d['id_keranjang'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">Yakin ingin menghapus produk ini dari keranjang ?!</h5>
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


              <?php $no++; } ?>
            </tbody>


          </table>
                    <div class="row">
            <div class="col-md-6">
              <table class="table">
                <tr>
                  <th>Kode Transaksi</th>
                  <td>:</td>
                  <td># <?php error_reporting(0); echo $dss['kode_keranjang'] ?></td>
                  <input type="hidden" name="tgl_transaksi" value="<?php echo date('Y-m:d H:i:s'); ?>">
                </tr>
                <tr>
                  <th>Tanggal Transaksi</th>
                  <td>:</td>
                  <td><?php echo date('Y-m:d H:i:s'); ?></td>
                </tr>
                <tr>
                  <th>Pembeli</th>
                  <td>:</td>
                  <td>
                    <select class="form-control" name="id_pembeli" required="">
                      <option>...Pilih pembeli ...</option>
                      <?php 

                        $no = 1;
                        $mys = mysqli_query($koneksi, "SELECT * FROM pembeli");
                        while ($ds = mysqli_fetch_array($mys)) {
                         ?>
                         <option value="<?php echo $ds['id_pembeli'] ?>"><?php echo $ds['nama_pembeli'] ?></option>
                       <?php } ?>
                    </select>
                  </td>
                </tr>
              </table>
            </div>
            <div class="col-md-6">
              <div style=" display:block;width: 100%;height: 150px; border: dotted 1px solid green;background: #fafafa;display: flex;justify-content: space-around;align-items: center;">
                <input type="text" id="total" style="width: 100%;height: 100%;border: 0;text-align: center;font-size: 30px;font-weight: bold;color: green;cursor: pointer;">
                <script>
      function sum() {
            let dataBanyak = document.querySelectorAll('#banyak');
            let dataHarga = document.querySelectorAll('#harga');
            let result = 0;
            for(let i = 0; i < dataBanyak.length; i++) {
                result += dataBanyak[i].value * dataHarga[i].value
            }

            if (!isNaN(result)) {
                document.getElementById('total').value = 'Rp. ' + result.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            }
      }
    </script>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 ">
              <button type="submit" name="checkout" class="btn btn-info pull-right">Check-out</button>
            </div>
          </div>

         </div>
      </div>
    </div>

  </div>

</section>
</form>

<?php 



if (isset($_POST['checkout'])) {
  

$kode_keranjang = $_POST['kode_keranjang'];
$id_produk = $_POST['id_produk'];
$id_pembeli = $_POST['id_pembeli'];
$banyak = $_POST['banyak'];
$harga = $_POST['harga'];
$tgl_transaksi = $_POST['tgl_transaksi'];

$dipilih = count($id_produk);
for ($i=0; $i < $dipilih; $i++) { 
  $simpanCheckout = mysqli_query($koneksi, "INSERT INTO transaksi VALUES('','$kode_keranjang','$id_pembeli','$id_produk[$i]','$banyak[$i]','$harga[$i]','$tgl_transaksi','Selesai');");
}

   if ($simpanCheckout) { 
          mysqli_query($koneksi, "DELETE FROM keranjang WHERE kode_keranjang='$kode_keranjang'");
          echo "<script>alert('Transaski berhasil')</script>";
          echo "<meta http-equiv='refresh' content='0; url=?page=transaksi/index'></script>";
        }else{
          echo "<script>alert('Terjadi kesalahan coba ulangi kembali')</script>";
           echo "<meta http-equiv='refresh' content='0; url=?page=keranjang'></script>";
        }


}

if (isset($_POST['hapus'])) {
  
$kode_keranjang = $_POST['kode_keranjang'];
$id_keranjang = $_POST['id_keranjang'];


$hapusData =  mysqli_query($koneksi, "DELETE FROM keranjang WHERE id_keranjang='$id_keranjang'");

  if ($hapusData) {
   
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=keranjang'></script>";
  }else{

    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali !')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=keranjang'></script>";
  }

}


 ?>


