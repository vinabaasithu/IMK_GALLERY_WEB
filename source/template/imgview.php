<?php
require_once '../../db.php';
$re = "tes";
if(isset($_GET['re'])) {
  $re = substr($_GET['re'], 3);
}
 ?>
   <div class="img-view">
    <div class="img-con-n-com row">
      <div class="img-view-container col-md-12">
        <?php
         // $re = 48;
          $stmt = $mysqli->prepare("SELECT id_img, img_title, img_src, img_description, img_date_upload, dilihat FROM img WHERE id_img = ?");
          $stmt->bind_param("s", $re);
          $stmt->execute();
          $stmt->bind_result($id_img, $img_title, $img_src, $img_description, $img_date_upload, $dilihat);
          $stmt->fetch();
          echo "<img class='img-fluid img-view-fluid' id='img".$id_img."' src='".$img_src."' alt='".$img_title."'></img>";
          $stmt->close();
         ?>
      </div>
    </div>
   </div>
