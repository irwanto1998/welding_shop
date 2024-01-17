<?php 
        $my = mysqli_query($koneksi, "SELECT * FROM produk JOIN penjual USING(id_penjual) WHERE produk.id_produk='$_GET[id_produk]'");
        $d = mysqli_fetch_array($my);
?>
<section class="container m-b-125">

    <div class="row-clearfix">
        <div class="col-md-12">
           <h2 class="font-20 font-bold col-cyan m-t-100 m-b-50">PRODUK</h2>
        </div>
    </div>

     <div class="row-clearfix">

        <div class="col-md-12">
           <form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="id_produk" value="<?php echo $d['id_produk'] ?>">
            <input type="hidden" name="id_penjual" value="<?php echo $d['id_penjual'] ?>">

            <input type="hidden" name="rekening_penjual" value="<?php echo $d['no_rek_penjual'] ?>">

            <input type="hidden" name="id_pembeli" value="<?php echo $ids ?>">
            <input type="hidden" name="tgl_custom" value="<?php echo date('Y-m-d H:i:s') ?>">
             <div class="card">
                 <div class="header">
                   <h2>PESAN CUSTOM PRODUK</h2> 
                   
                 </div>
                 <div class="body" style="padding: 0 20px !important">
                   
                  <table class="table">
                    <tr>
                      <td>
                        <label>Nama Produk</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="nama_custom" value="<?php echo $d['nama_produk'] ?>" class="form-control" placeholder="Nama ..." required="">
                            </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Ukuran (Meter)</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="ukuran_panjang" class="form-control" placeholder="Panjang ..." required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="ukuran_lebar" class="form-control" placeholder="Lebar ..." required="">
                            </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Design Custom</label>
                          <img src="../superadmin/produk/gambar/<?php echo $d['gambar_produk'] ?>" class="m-b-20" style="width: 100%;height: 250px">
                          <p class="m-t-10 font-18 col-red">Note : Jika anda ingin memakai design produk ini, silahkan download kemudian upload kembali.</p>

                          <a href="../superadmin/produk/gambar/<?php echo $d['gambar_produk'] ?>" download="<?php echo $d['gambar_produk'] ?>" class="btn bg-green btn-download">
                            <i class="material-icons">download</i>
                            <span>Download gambar</span>
                          </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <label>Upload Gambar design Custom</label>
                       <input type="file" name="gambar_custom" class="form-control" required="">

                      </td>
                    </tr>
                    <tr>
                      <td>
                        
                        <div class="row">
                          <div class="col-md-12">
                            <label style="display: block;">Keterangan</label>
                            <div class="pad">
                              <textarea class="ckeditor" id="ckedtor" name="deskripsi_custom" rows="10" cols="80"></textarea>
                            </div>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="col-md-12 ">
                       <a href="app.php" class="btn bg-teal pull-right col-white font-bold m-t-20 col-md-1" style="margin-left: 20px;">Batal</a>
                            <button type="submit" name="pesanCustom" class="btn bg-teal pull-right col-white font-bold m-t-20 col-md-1">Kirim
                            </button>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </table>

                 </div>
             </div>
           </form>
        </div>




    </div>

    <div class="row-clearfix">

        <div class="col-md-12">
             <div class="card">
                 <div class="header">
                   <h2>Jika ingin mengetahui cara mengukur barang yang akan dibuat,silahkan klik salah satu pilihan yang ada dibawah ini sesuai kebutuhan.</h2> 
                   
                 </div>
                 <div class="body" style="padding: 0 20px !important">
                   
                  <table class="table">
                    <tr>
                      <td>
                        <a href="https://www.youtube.com/watch?v=shuvQgqv44Y" target="_BLANK"><label>Cara Membuat Pintu Besi</label></a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                         <a href="https://www.youtube.com/watch?v=m7ElITcttQ0" target="_BLANK"><label>Cara Ukur Pagar</label></a>
                      </td>
                    </tr>
                  </table>

                 </div>
             </div>
        </div>
    </div>

</section>

<div class="paralax">
    <div class="paralax-images">
        <h2 class="font-bold font-20 text-center m-t-20 col-cyan">
            WELDING SHOP adalah sebuah sistem informasi yang dibangun untuk kebutuhan dalam memperjual belikan suatu produk pengelasan, dan sistem informasi ini dikhususkan untuk daerah Ketapang, Kalimantan Barat.
        </h2>
    </div>
</div>


<div class="container" id="tentang">
    <div class="row">
        <div class="col-md-6">
            <div class="test">
                <div class="owl-carousel">
                    <div class="item bg-amber">
                        <img src="../assets/images/slider/w3.jpg" alt="" style="width: 100%;height: 250px">
                    </div>
                    <div class="item bg-light-blue">
                        <img src="../assets/images/slider/w2.jpg" alt="" style="width: 100%;height: 250px">
                    </div>
                    <div class="item bg-green">
                        <img src="../assets/images/slider/w1.jpg" alt="" style="width: 100%;height: 250px">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h1 class="font-bold font-30 col-cyan">
                        WELDING SHOP
                    </h1>
                </div>
                <div class="body">
                    <p class="font-16">
                        Marketplace Dengan Pilihan Produk Paling Beragam yang di Khususkan Memperjual Belikan Produk Pengelasan. Sistem informasi ini buat dalam rangka untuk mengatasi permasalahan yang ada dalam dunia pengelasan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 



if (isset($_POST['pesanCustom'])) {
  
$id_produk = $_POST['id_produk'];
$id_penjual = $_POST['id_penjual'];
$id_pembeli = $_POST['id_pembeli'];
$nama_custom = $_POST['nama_custom'];

$ukuran_panjang = $_POST['ukuran_panjang'];
$ukuran_lebar = $_POST['ukuran_lebar'];

$deskripsi_custom = $_POST['deskripsi_custom'];

$rekening_penjual = $_POST['rekening_penjual'];

$harga_custom = $_POST['harga_custom'];
$sisa_harga = $_POST['sisa_harga'];
$status_custom = $_POST['status_custom'];
$status_pembayaran = $_POST['status_pembayaran'];
$tgl_custom = $_POST['tgl_custom'];

$status_barang = $_POST['status_barang'];
$hasil_penjualan = $_POST['hasil_penjualan'];

$namaGambar = $_FILES['gambar_custom']['name'];
$tmpGambar = $_FILES['gambar_custom']['tmp_name'];


$simpanGambar = move_uploaded_file($tmpGambar,"../superadmin/custom/gambar/" .$namaGambar);

if ($simpanGambar) { 


   mysqli_query($koneksi, "INSERT INTO custom VALUES('','$id_penjual','$id_pembeli','$nama_custom','$ukuran_panjang','$ukuran_lebar','$deskripsi_custom','$rekening_penjual','$namaGambar','','Menunggu Konfirmasi','Belum Bayar','$tgl_custom','','','','','');"); 

           echo "<meta http-equiv='refresh' content='0; url=?page=pesan-sukses-custom'></script>";
        }else{
          echo "<script>alert('Terjadi kesalahan coba ulangi kembali')</script>";
           echo "<meta http-equiv='refresh' content='0; url=?page=custom&id_produk=$id_produk'></script>";
        }
}

   





 ?>