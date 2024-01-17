          <div class="content-wrapper">
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">
                      DATA PRODUK
                      
                    </h4>
                   
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th><center>No.</center></th>
                          <th><center>Gambar</center></th>
                          <th><center>Penjual</center></th>
                          <th><center>Nama</center></th>
                          <th><center>Harga</center></th>
                          <th><center>Aksi</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 

                        $no = 1;
                        $my = mysqli_query($koneksi, "SELECT * FROM produk JOIN penjual USING(id_penjual)");
                        while ($d = mysqli_fetch_array($my)) {
                         ?>
                        <tr>
                          <td><center><?php echo $no++ ?></center></td>
                          <td class="py-1">
                            <img src="produk/gambar/<?php echo $d['gambar_produk'] ?>" alt="image" />
                          </td>
                          <td><center><?php echo $d['nama_penjual'] ?></center></td>
                          <td><center><?php echo $d['nama_produk'] ?></center></td>
                          <td><center><?php echo $d['harga_produk'] ?></center></td>
                          <td>
                            <center>
                              <a href="#lihat<?php echo $d['id_produk'] ?>" class="btn btn-warning btn-sm" data-toggle="modal">
                                <i class="fa fa-eye"></i>
                              </a>
                           
                              <a href="#hapus<?php echo $d['id_produk'] ?>" class="btn btn-danger btn-sm" data-toggle="modal">
                                <i class="fa fa-trash"></i>
                              </a>
                            </center>
                          </td>
                        </tr>


<!-- Modal detail -->
<div class="modal fade" id="lihat<?php echo $d['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">PENJUAL : <?php echo $d['nama_penjual'] ?></h5>
      </div>
      <div class="modal-body">

          <center>
                        <?php 
                            if ($d['gambar_produk']=='') {
                            echo " ";
                            }else{
                            echo "<a href='#muncul$d[id_produk]' data-toggle='modal'>
                                <img src='produk/gambar/$d[gambar_produk]' style='width: 32%;height: 150px'></a>
                            ";
                        } ?> 
                        <?php 
                            if ($d['gambar_produk_2']=='') {
                            echo " ";
                            }else{
                            echo "<a href='#muncul2$d[id_produk]' data-toggle='modal'>
                                <img src='produk/gambar/$d[gambar_produk_2]' style='width: 32%;height: 150px'></a>
                            ";
                        } ?>
                        <?php 
                            if ($d['gambar_produk_3']=='') {
                            echo " ";
                            }else{
                            echo "<a href='#muncul3$d[id_produk]' data-toggle='modal'>
                                <img src='produk/gambar/$d[gambar_produk_3]' style='width: 32%;height: 150px'></a>
                            ";
                        } ?>

        
    </center>     
           <h5 class="modal-title text-center"><?php echo $d['nama_produk'] ?></h5>
          <ul class="mt-5">
            <li>
              <span>Harga</span>
              <span><?php echo rupiah($d['harga_produk']) ?></span>
            </li>
            <li>
              <span>Deskripsi</span>
              <span><?php echo $d['deskripsi_produk'] ?></span>
            </li>
          </ul>

      </div>
    </div>
  </div>
</div>
<!-- #END# Modal detail -->

<!-- Modal muncul -->
<div class="modal fade" id="muncul<?php echo $d['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <input type="hidden" name="id_t" value="<?php echo $d['id_produk'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title text-center">Gambar Produk</h4>
      </div>
      <div class="modal-body">
          <img src="../superadmin/produk/gambar/<?php echo $d['gambar_produk'] ?>" alt="" style="width: 100%;height: 400px">
      </div>

    </div>

  </div>
</div>
</div>

<!-- Modal muncul -->
<div class="modal fade" id="muncul2<?php echo $d['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <input type="hidden" name="id_t" value="<?php echo $d['id_produk'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title text-center">Gambar Produk</h4>
      </div>
      <div class="modal-body">
          <img src="../superadmin/produk/gambar/<?php echo $d['gambar_produk_2'] ?>" alt="" style="width: 100%;height: 400px">
      </div>

    </div>

  </div>
</div>
</div>

<!-- Modal muncul -->
<div class="modal fade" id="muncul3<?php echo $d['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <input type="hidden" name="id_t" value="<?php echo $d['id_produk'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title text-center">Gambar Produk</h4>
      </div>
      <div class="modal-body">
          <img src="../superadmin/produk/gambar/<?php echo $d['gambar_produk_3'] ?>" alt="" style="width: 100%;height: 400px">
      </div>

    </div>

  </div>
</div>
</div>

<!-- Modal muncul -->
<div class="modal fade" id="muncul4<?php echo $d['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <input type="hidden" name="id_t" value="<?php echo $d['id_produk'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title text-center">Gambar Produk</h4>
      </div>
      <div class="modal-body">
          <img src="../superadmin/produk/gambar/<?php echo $d['gambar_produk_4'] ?>" alt="" style="width: 100%;height: 400px">
      </div>

    </div>

  </div>
</div>
</div>

<!-- Modal muncul -->
<div class="modal fade" id="muncul5<?php echo $d['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <input type="hidden" name="id_t" value="<?php echo $d['id_produk'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title text-center">Gambar Produk</h4>
      </div>
      <div class="modal-body">
          <img src="../superadmin/produk/gambar/<?php echo $d['gambar_produk_5'] ?>" alt="" style="width: 100%;height: 400px">
      </div>

    </div>

  </div>
</div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="edit<?php echo $d['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_produk" value="<?php echo $d['id_produk'] ?>">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">FORM EDIT DATA PRODUK</h5>
      </div>
      <div class="modal-body">

         <div class="row">
          <div class="col-md-12">
              <label style="display: block;">Nama Penjual</label>
              <select name="id_penjual" id="" required="" class="form-control">
                <option value="">... Pilih penjual ...</option>
                <?php 

                $my11 = mysqli_query($koneksi, "SELECT * FROM penjual");
                while ($d11 = mysqli_fetch_array($my11)) {
                 ?>
                <option value="<?php echo $d11['id_penjual'] ?>" <?php if ($d11['id_penjual']==$d['id_penjual']) {
                  echo "selected";
                } ?>><?php echo $d11['nama_penjual'] ?></option>
              <?php } ?>
              </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <label style="display: block;">Nama Produk</label>
              <input type="text" name="nama_produk" value="<?php echo $d['nama_produk'] ?>" class="form-control" required="" placeholder="Nama produk ...">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <label style="display: block;">Harga Produk</label>
              <input type="text" name="harga_produk" value="<?php echo $d['harga_produk'] ?>" class="form-control" required="" placeholder="Harga produk ...">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label style="display: block;">Deskripsi Produk</label>
            <div class="pad">
              <textarea class="form-control" id="editor1" name="deskripsi_produk" rows="10" cols="80"><?php echo $d['deskripsi_produk'] ?></textarea>
            </div>
          </div>
        </div>
           <div class="row">
          <div class="col-md-12">
            <label style="display: block;">Gambar Produk 1</label>
            <input type="file" name="gambar_produk" class="form-control">
          </div>
        </div>
          <div class="row">
          <div class="col-md-12">
            <label style="display: block;">Gambar Produk 2</label>
            <input type="file" name="gambar_produk_2" class="form-control">
          </div>
        </div>
          <div class="row">
          <div class="col-md-12">
            <label style="display: block;">Gambar Produk 3</label>
            <input type="file" name="gambar_produk_3" class="form-control">
          </div>
        </div>
          <div class="row">
          <div class="col-md-12">
            <label style="display: block;">Gambar Produk 4</label>
            <input type="file" name="gambar_produk_4" class="form-control">
          </div>
        </div>
          <div class="row">
          <div class="col-md-12">
            <label style="display: block;">Gambar Produk 5</label>
            <input type="file" name="gambar_produk_5" class="form-control">
          </div>
        </div>

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



<!-- Modal hapus -->
<div class="modal fade" id="hapus<?php echo $d['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id_produk" value="<?php echo $d['id_produk'] ?>">
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



                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>


<!-- Modal tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

  <form class="mt-5" method="post" action="" enctype="multipart/form-data">

    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title text-center">FORM TAMBAH DATA PRODUK</h5>
      </div>
      <div class="modal-body">

         <div class="row">
          <div class="col-md-12">
              <label style="display: block;">Nama Penjual</label>
              <select name="id_penjual" id="" required="" class="form-control">
                <option value="">... Pilih penjual ...</option>
                <?php 

                $my1 = mysqli_query($koneksi, "SELECT * FROM penjual");
                while ($d1 = mysqli_fetch_array($my1)) {
                 ?>
                <option value="<?php echo $d1['id_penjual'] ?>"><?php echo $d1['nama_penjual'] ?></option>
              <?php } ?>
              </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <label style="display: block;">Nama Produk</label>
              <input type="text" name="nama_produk" class="form-control" required="" placeholder="Nama produk ...">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <label style="display: block;">Harga Produk</label>
              <input type="text" name="harga_produk" class="form-control" required="" placeholder="Harga produk ...">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label style="display: block;">Deskripsi Produk</label>
            <div class="pad">
              <textarea class="form-control" id="editor1" name="deskripsi_produk" rows="10" cols="80"></textarea>
            </div>
          </div>
        </div>
          <div class="row">
          <div class="col-md-12">
            <label style="display: block;">Gambar Produk 1</label>
            <input type="file" name="gambar_produk"  class="form-control"  required oninvalid="this.setCustomValidity('Isi Dahulu!')" oninput="setCustomValidity('')">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label style="display: block;">Gambar Produk 2</label>
            <input type="file" name="gambar_produk_2"  class="form-control">
          </div>
        </div>
          <div class="row">
          <div class="col-md-12">
            <label style="display: block;">Gambar Produk 3</label>
            <input type="file" name="gambar_produk_3"  class="form-control">
          </div>
        </div>
          <div class="row">
          <div class="col-md-12">
            <label style="display: block;">Gambar Produk 4</label>
            <input type="file" name="gambar_produk_4"  class="form-control">
          </div>
        </div>
          <div class="row">
          <div class="col-md-12">
            <label style="display: block;">Gambar Produk 5</label>
            <input type="file" name="gambar_produk_5"  class="form-control">
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
        <button type="submit" name="simpan" class="btn btn-primary">SIMPAN</button>
      </div>
    </div>
  </form>
  </div>
</div>
<!-- #END# Modal tambah -->




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


if (isset($_POST['edit'])) {
  

        $nama1 = $_FILES['gambar_produk']['name'];
        $lokasi1 = $_FILES['gambar_produk']['tmp_name'];


        $nama2 = $_FILES['gambar_produk_2']['name'];
        $lokasi2 = $_FILES['gambar_produk_2']['tmp_name'];

         $nama3 = $_FILES['gambar_produk_3']['name'];
        $lokasi3 = $_FILES['gambar_produk_3']['tmp_name'];


        $nama4 = $_FILES['gambar_produk_4']['name'];
        $lokasi4 = $_FILES['gambar_produk_4']['tmp_name'];

         $nama5 = $_FILES['gambar_produk_5']['name'];
        $lokasi5 = $_FILES['gambar_produk_5']['tmp_name'];



        $bp = "produk/gambar/";
        
        // jika foto dirubah
        if (!empty($lokasi1))
    {   
        move_uploaded_file($lokasi1, "$bp".$nama1);

         $koneksi->query("UPDATE produk SET nama_produk = '$_POST[nama_produk]',
                                         harga_produk = '$_POST[harga_produk]',
                            deskripsi_produk = '$_POST[deskripsi_produk]',
                            no_rek_penjual = '$_POST[no_rek_penjual]',
                                         gambar_produk        = '$nama1'
                                         WHERE id_produk = '$_POST[id_produk]'  ");
    }   else if (!empty($lokasi2))
        {   
        move_uploaded_file($lokasi2, "$bp".$nama2);

        $koneksi->query("UPDATE produk SET nama_produk = '$_POST[nama_produk]',
                                         harga_produk = '$_POST[harga_produk]',
                            deskripsi_produk = '$_POST[deskripsi_produk]',
                            no_rek_penjual = '$_POST[no_rek_penjual]',
                                         gambar_produk_2        = '$nama2'
                                         WHERE id_produk = '$_POST[id_produk]'  ");

}   else if (!empty($lokasi3))
        {   
        move_uploaded_file($lokasi3, "$bp".$nama3);

        $koneksi->query("UPDATE produk SET nama_produk = '$_POST[nama_produk]',
                                         harga_produk = '$_POST[harga_produk]',
                            deskripsi_produk = '$_POST[deskripsi_produk]',
                            no_rek_penjual = '$_POST[no_rek_penjual]',
                                         gambar_produk_3        = '$nama3'
                                          WHERE id_produk = '$_POST[id_produk]'  ");

} else if (!empty($lokasi4))
        {   
        move_uploaded_file($lokasi4, "$bp".$nama4);

        $koneksi->query("UPDATE produk SET nama_produk = '$_POST[nama_produk]',
                                         harga_produk = '$_POST[harga_produk]',
                            deskripsi_produk = '$_POST[deskripsi_produk]',
                            no_rek_penjual = '$_POST[no_rek_penjual]',
                                         gambar_produk_4        = '$nama4'
                                          WHERE id_produk = '$_POST[id_produk]'  ");

} else if (!empty($lokasi5))
        {   
        move_uploaded_file($lokasi5, "$bp".$nama5);

        $koneksi->query("UPDATE produk SET nama_produk = '$_POST[nama_produk]',
                                         harga_produk = '$_POST[harga_produk]',
                            deskripsi_produk = '$_POST[deskripsi_produk]',
                            no_rek_penjual = '$_POST[no_rek_penjual]',
                                         gambar_produk_5        = '$nama5'
                                          WHERE id_produk = '$_POST[id_produk]'  ");

} 
    else
    {
            $koneksi->query("UPDATE produk SET nama_produk = '$_POST[nama_produk]',
                                         harga_produk = '$_POST[harga_produk]',
                            deskripsi_produk = '$_POST[deskripsi_produk]',
                            no_rek_penjual = '$_POST[no_rek_penjual]'
                                             WHERE id_produk = '$_POST[id_produk]'  ");

}   
        echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=produk/index'></script>";


}




if (isset($_POST['simpan'])) {
  
$id_penjual = $_POST['id_penjual'];
$nama_produk = $_POST['nama_produk'];
$harga_produk = $_POST['harga_produk'];
$deskripsi_produk = $_POST['deskripsi_produk'];

$gambar_produk = $_FILES['gambar_produk']['name'];
$gambar_produk_2 = $_FILES['gambar_produk_2']['name'];
$gambar_produk_3 = $_FILES['gambar_produk_3']['name'];
$gambar_produk_4 = $_FILES['gambar_produk_4']['name'];
$gambar_produk_5 = $_FILES['gambar_produk_5']['name'];

$no_rek_penjual = $_POST['no_rek_penjual'];




$simpanGambar = move_uploaded_file($_FILES['gambar_produk']['tmp_name'],'../superadmin/produk/gambar/'.$gambar_produk);
$simpanGambar = move_uploaded_file($_FILES['gambar_produk_2']['tmp_name'],'../superadmin/produk/gambar/'.$gambar_produk_2);
$simpanGambar = move_uploaded_file($_FILES['gambar_produk_3']['tmp_name'],'../superadmin/produk/gambar/'.$gambar_produk_3);
$simpanGambar = move_uploaded_file($_FILES['gambar_produk_4']['tmp_name'],'../superadmin/produk/gambar/'.$gambar_produk_4);
$simpanGambar = move_uploaded_file($_FILES['gambar_produk_5']['tmp_name'],'../superadmin/produk/gambar/'.$gambar_produk_5);


  if ($simpanGambar) {
    mysqli_query($koneksi, "INSERT INTO produk VALUES(NULL,'$id_penjual','$nama_produk','$harga_produk','$deskripsi_produk','$gambar_produk','$gambar_produk_2','$gambar_produk_3','$gambar_produk_4','$gambar_produk_5','$no_rek_penjual');");
    echo "<script>alert('Sukses')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=produk/index'></script>";
  }else{
    echo "<script>alert('Terjadi kesalahan, coba ulangi kembali')</script>";
    echo "<meta http-equiv='refresh' content='0; url=?page=produk/index'></script>";
  }



}




 ?>


