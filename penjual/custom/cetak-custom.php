

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>DATA KWITANSI</title>
  <!-- Bootstrap Core Css -->
  <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body onload="window.print();">



  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h3>DATA KWITANSI COSTUM</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center ">
        <table class="table" style="margin-top: 100px">
          <thead>
            <tr>
              <th><center>No.</center></th>
              <th><center>Pembeli</center></th>
              <th><center>Produk</center></th>
              <th><center>Ukuran Panjang</center></th>
              <th><center>Ukuran Lebar</center></th>
              <th><center>Status Pembayaran</center></th>
              <th><center>Harga yang Harus di Bayar</center></th>
              <th><center>Alamat</center></th>
             
            </tr>
          </thead>
          <tbody>
            <?php 
            include '../../koneksi.php';
            $no = 1;
            $my = mysqli_query($koneksi, "SELECT * FROM custom JOIN penjual ON custom.id_penjual=penjual.id_penjual JOIN pembeli ON custom.id_pembeli=pembeli.id_pembeli WHERE id_custom='$_GET[id_custom]'");
            while ($d = mysqli_fetch_array($my)) {
              $jumlahkarakter=1;
              $cetak = substr($d['nama_pembeli'], 0, $jumlahkarakter);
              ?>
              <tr class="default">
                <td><center><?php echo $no++ ?></center></td>
                <td><center><?php echo $d['nama_pembeli'] ?></center></td>
                <td><center><?php echo $d['nama_custom'] ?></center></td>
                <td><center><?php echo $d['ukuran_panjang'] ?></center></td>
                <td><center><?php echo $d['ukuran_lebar'] ?></center></td>
                <td><center><?php echo $d['status_pembayaran'] ?></center></td>
                <td><center><?php echo $d['sisa_harga'] ?></center></td>
                <td><center><?php echo $d['alamat_pembeli'] ?></center></td>
                
              </tr>



            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>



</body>
</html>
