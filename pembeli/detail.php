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

        <div class="col-md-5">
           <div class="card-produk">
               <div class="body">

                <!-- Slideshoww --> 
                 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  
                      <center> 
                        <!-- Wrapper for Slide -->
                        <div class="carousel-inner">
                            <div class="item active"><a href="#muncul<?php echo $d['id_produk'] ?>" data-toggle="modal">
                              <img src="../superadmin/produk/gambar/<?php echo $d['gambar_produk'] ?>" style="width: 100%;height: 400px" alt="Slide 1"></a>
    
                            </div>
                            <div class="item"><a href="#muncul2<?php echo $d['id_produk'] ?>" data-toggle="modal">
                              <img src="../superadmin/produk/gambar/<?php echo $d['gambar_produk_2'] ?>" style="width: 100%;height: 400px" alt="Slide 2"></a>
      
                            </div>
                            <div class="item"><a href="#muncul3<?php echo $d['id_produk'] ?>" data-toggle="modal">
                              <img src="../superadmin/produk/gambar/<?php echo $d['gambar_produk_3'] ?>" style="width: 100%;height: 400px" alt="Slide 3"></a>
    
                            </div>
                        </div>
                      </center>   
                        <!-- Control -->
                        <a href="#carousel-example-generic" class="carousel-control left" data-slide="prev" role="button">
                          <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a href="#carousel-example-generic" class="carousel-control right" data-slide="next" role="button">
                          <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                      </div>
                <!-- //Slideshoww -->

               </div>
           </div>
        </div>


        <div class="col-md-7">
           <div class="card-produk">
               <div class="body">
                   <ul class="ul-produk-detail">
                     <li class="nama font-20 font-bold m-b-10"><?php echo $d['nama_produk'] ?></li>
                     <li class="nama font-15 font-bold m-b-10 col-grey"><?php echo $d['nama_penjual'] ?></li>
                     <li class="harga font-bold font-25 col-cyan m-b-20"><?php echo rupiah($d['harga_produk']) ?></li>
                     <li class="deskripsi"><?php echo $d['deskripsi_produk'] ?></li>
                     <li class="deskripsi">
                   <a href="?page=masuk-keranjang&id_produk=<?php echo $d['id_produk'] ?>" class="btn btn-block bg-teal col-white font-bold">Add to Cart</a>
                     </li>
                   </ul>
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

