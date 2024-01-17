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
        function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
 
}
        $my = mysqli_query($koneksi, "SELECT * FROM produk");
        while ($d = mysqli_fetch_array($my)) {
      ?>
        <div class="col-md-3">
           <div class="card-produk" style="margin-top: 25px;">
               <div class="header">
                   <img src="superadmin/produk/gambar/<?php echo $d['gambar_produk'] ?>" alt="" >
                   <span class="produk-name font-16"><?php echo $d['nama_produk'] ?></span>
               </div>
               <div class="body">
                   <span class="font-20 font-bold col-cyan"><?php echo rupiah($d['harga_produk']) ?></span>
               </div>
               <div class="footer">
                   <a href="#gambar2" data-toggle="modal"  class="btn btn-block bg-teal col-white font-bold">Add to Cart</a>

                   <a href="detail.php?id_produk=<?php echo $d['id_produk'] ?>" class="btn btn-block bg-cyan col-white font-bold">Detail Produk</a>

                   <a href="#gambar2" data-toggle="modal"  class="btn btn-block bg-orange col-white font-bold">Add Custom</a>

                   <a href="#gambar3" data-toggle="modal"  class="btn btn-block bg-green col-white font-bold">Chat Penjual</a>

               </div>
           </div>
        </div>
      <?php } ?>
     	</div>
     	

    </div>

</div>
</aside>

<!-- Modal button -->
<div class="modal fade" id="gambar2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="sweet-alert showSweetAlert visible" data-custom-class="" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false" data-animation="pop" data-timer="null" style="display: block; margin-top: -148px;"><div class="sa-icon sa-error" style="display: none;">
          <span class="sa-x-mark">
            <span class="sa-line sa-left"></span>
            <span class="sa-line sa-right"></span>
          </span>
        </div><div class="sa-icon sa-warning pulseWarning" style="display: block;">
          <span class="sa-body pulseWarningIns"></span>
          <span class="sa-dot pulseWarningIns"></span>
        </div><div class="sa-icon sa-info" style="display: none;"></div><div class="sa-icon sa-success" style="display: none;">
          <span class="sa-line sa-tip"></span>
          <span class="sa-line sa-long"></span>

          <div class="sa-placeholder"></div>
          <div class="sa-fix"></div>
        </div><div class="sa-icon sa-custom" style="display: none;"></div><h2>Anda belum login</h2>
        <p style="display: block;">Untuk dapat memesan produk, silahkan login terlebih dahulu</p>
        <fieldset>
          <input type="text" tabindex="3" placeholder="">
          <div class="sa-input-error"></div>
        </fieldset><div class="sa-error-container">
          <div class="icon">!</div>
          <p>Not valid!</p>
        </div><div class="sa-button-container">
          <button class="cancel" tabindex="2" style="display: none; box-shadow: none;">Cancel</button>
          <div class="sa-confirm-button-container">
              <a href="pages/masuk.php"><button href="pages/masuk.php" >OK</button></a>
              <div></div>
              <div></div>
              <div></div>
            </div>
          </div>
        </div></div>
</div>
<!-- Modal button -->

<!-- Modal button -->
<div class="modal fade" id="gambar3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="sweet-alert showSweetAlert visible" data-custom-class="" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-outside-click="false" data-has-done-function="false" data-animation="pop" data-timer="null" style="display: block; margin-top: -148px;"><div class="sa-icon sa-error" style="display: none;">
          <span class="sa-x-mark">
            <span class="sa-line sa-left"></span>
            <span class="sa-line sa-right"></span>
          </span>
        </div><div class="sa-icon sa-warning pulseWarning" style="display: block;">
          <span class="sa-body pulseWarningIns"></span>
          <span class="sa-dot pulseWarningIns"></span>
        </div><div class="sa-icon sa-info" style="display: none;"></div><div class="sa-icon sa-success" style="display: none;">
          <span class="sa-line sa-tip"></span>
          <span class="sa-line sa-long"></span>

          <div class="sa-placeholder"></div>
          <div class="sa-fix"></div>
        </div><div class="sa-icon sa-custom" style="display: none;"></div><h2>Anda belum login</h2>
        <p style="display: block;">Untuk dapat menghubungi penjual, silahkan login terlebih dahulu</p>
        <fieldset>
          <input type="text" tabindex="3" placeholder="">
          <div class="sa-input-error"></div>
        </fieldset><div class="sa-error-container">
          <div class="icon">!</div>
          <p>Not valid!</p>
        </div><div class="sa-button-container">
          <button class="cancel" tabindex="2" style="display: none; box-shadow: none;">Cancel</button>
          <div class="sa-confirm-button-container">
              <a href="pages/masuk.php"><button href="pages/masuk.php" >OK</button></a>
              <div></div>
              <div></div>
              <div></div>
            </div>
          </div>
        </div></div>
</div>
<!-- Modal button -->