<?php
session_start();
include '../koneksi.php';
include 'csrf.php';

$output='';

$query = "SELECT * FROM komentar WHERE nama_produk='$_GET[nama_produk]' AND id_pembeli='$_GET[id_pembeli]' AND parent_komentar_id  = '0' ORDER BY komentar_id DESC";
$dewan1 = $koneksi->prepare($query);
$dewan1->execute();
$res1 = $dewan1->get_result();
while ($row = $res1->fetch_assoc()) {
  $output .= '
    <div class="media border p-3 mb-2"><hr>
      <img src="../images/avatar1.png" alt="foto-user" class="mr-3 mt-3 rounded-circle" style="width:60px;">
      <div class="media-body">
      <div class="row">
        <div class="col-sm-10">
          <h4><b>'.$row["nama_pengirim"] .'</b><b>'.$row["nama_penjual"] .'</b> <small> Posted on <i>'.$row["date"].'</i></small></h4>
          
          <p>'.$row["komentar"].'</p>
        </div>
        <div class="col-sm-2" align="right">
          <button type="button" class="btn btn-primary reply" id="'.$row["komentar_id"].'">Balas</button>
        </div>
      </div>
      </div>
    </div>
  ';
  $output .= ambil_reply($koneksi, $row["komentar_id"]);
}

echo json_encode([$output]);
function ambil_reply($koneksi, $parent_id = 0, $marginleft = 0){
  $output='';
  $query = "SELECT * FROM komentar WHERE parent_komentar_id=?";
  $dewan1 = $koneksi->prepare($query);
  $dewan1->bind_param("s", $parent_id);
  $dewan1->execute();
  $res1 = $dewan1->get_result();

  $count = $res1->num_rows;
  if($parent_id == 0) {
    $marginleft = 0;
  } else {
    $marginleft = $marginleft + 48;
  }

  $tingkat = $marginleft/48+1;
  
  if($count > 0){
    while ($row = $res1->fetch_assoc()) {
      $output .= '
        <div class="media border p-3 mb-2" style="margin-left:'.$marginleft.'px"><hr>
          <img src="../images/avatar1.png" alt="foto-user" class="mr-3 mt-3 rounded-circle" style="width:60px;">
          <div class="media-body">
          <div class="row">
            <div class="col-sm-10">
              <h4><b>'.$row["nama_pengirim"] .'</b><b>'.$row["nama_penjual"] .'</b>  <small> Posted on <i>'.$row["date"].'</i></small></h4>
              
              <p>'.$row["komentar"].'</p>
            </div>';

        if($tingkat < 10){
          $output .= '
              <div class="col-sm-2" align="right">
                <button type="button" class="btn btn-primary reply" id="'.$row["komentar_id"].'">Balas</button>
              </div>';
        }

        $output .= '    
          </div>
          </div>
        </div>
      ';
      $output .= ambil_reply($koneksi, $row["komentar_id"], $marginleft);
    }
  }

  return $output;
}
?>
