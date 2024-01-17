<aside class="aside-slide " >
<div class="col-md-12">
           <div class="card-produk">
               <div class="body">

                <!-- Slideshoww --> 
                 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  
                      <center> 
                        <!-- Wrapper for Slide -->
                        <div class="carousel-inner">
                            <div class="item active">
                        <img src="../assets/images/slider/1.jpg" alt="" style="width: 100%;height: 400px">
    
                            </div>
                            <div class="item">
                        <img src="../assets/images/slider/2.jpg" alt="" style="width: 100%;height: 400px">
      
                            </div>
                            <div class="item">
                        <img src="../assets/images/slider/3.jpg" alt="" style="width: 100%;height: 400px">
    
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

</aside>

<aside class="aside-slide " >
<div class="col-md-12">

    <div class="row-clearfix">
        <div class="col-md-12">
           <h2 class="font-20 font-bold col-cyan m-t-100 m-b-50">PRODUK</h2>
        </div>
    </div>

     <div class="row-clearfix">


     	<div class="data">
     		<?php 
        $my = mysqli_query($koneksi, "SELECT * FROM produk JOIN penjual on produk.id_penjual=penjual.id_penjual");
        while ($d = mysqli_fetch_array($my)) {
      ?>
        <div class="col-md-3">
           <div class="card-produk" style="margin-top: 25px;">
               <div class="header">
                   <img src="../superadmin/produk/gambar/<?php echo $d['gambar_produk'] ?>" alt="">
                   <span class="produk-name font-16"><?php echo $d['nama_produk'] ?></span>
                   <span class="produk-name font-14 col-grey"><?php echo $d['nama_penjual'] ?></span>
               </div>
               <div class="body">
                   <span class="font-20 font-bold col-cyan"><?php echo rupiah($d['harga_produk']) ?></span>
               </div>
               <div class="footer">
                   <a href="?page=masuk-keranjang&id_produk=<?php echo $d['id_produk'] ?>" class="btn btn-block bg-teal col-white font-bold">Add to Cart</a>
                   <a href="?page=detail&id_produk=<?php echo $d['id_produk'] ?>" class="btn btn-block bg-cyan col-white font-bold">Detail Produk</a>
                   <a href="?page=custom&id_produk=<?php echo $d['id_produk'] ?>" class="btn btn-block bg-orange col-white font-bold">Add Custom</a>
                   <a href="komentar1.php?id_produk=<?php echo $d['id_produk'] ?>" class="btn btn-block bg-green col-white font-bold">Chat Penjual</a>
               </div>
           </div>
        </div>
      <?php } ?>
     	</div>
     	

    </div>

</div>
</aside>


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
