

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CETAK DATA ORDERAN</title>
  <!-- Bootstrap Core Css -->
  <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
</head>
<body onload="window.print();">



  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h3>DATA ORDERAN TOKOKITA.COM</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center ">
        <table class="table" style="margin-top: 100px">
          <thead>
            <tr>
              <th><center>No.</center></th>
              <th><center>Pembel</center></th>
              <th><center>Produk</center></th>
              <th><center>Banyak</center></th>
              <th><center>Harga</center></th>
              <th><center>Jumlah</center></th>
            </tr>
          </thead>
          <tbody>
            <?php 
            include '../../koneksi.php';
include '../../rupiah.php';
            $no = 1;
            $my = mysqli_query($koneksi, "SELECT * FROM transaksi JOIN produk ON transaksi.id_produk=produk.id_produk JOIN penjual ON produk.id_penjual=penjual.id_penjual JOIN pembeli ON transaksi.id_pembeli=pembeli.id_pembeli");
            while ($d = mysqli_fetch_array($my)) {
              $jumlahkarakter=1;
              $cetak = substr($d['nama_pembeli'], 0, $jumlahkarakter);
              ?>
              <tr class="default">
                <td><center><?php echo $no++ ?></center></td>
                <td><center><?php echo $d['nama_pembeli'] ?></center></td>
                <td><center><?php echo $d['nama_produk'] ?></center></td>
                <td><center><?php echo $d['banyak'] ?></center></td>
                <td><center><?php echo rupiah($d['harga_produk']) ?></center></td>
                <td>
                  <center>
                    <?php 
                    $h = $d['harga_produk'];
                    $b = $d['banyak'];
                    $total = $h * $b;
                    echo rupiah($total);
                    ?>
                    
                  </center>
                </td>
                
              </tr>



            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>



</body>
</html>
