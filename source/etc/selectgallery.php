<?php
  require_once '../../db.php';
  if (isset($_GET['rem'])) {
    $rem = substr($_GET['rem'], 3);
  } else {
    header("Location: ../../");
  }


    $stmt = $mysqli->prepare("SELECT a.id_img, img_title, img_src, img_description, img_date_upload, dilihat, username, name_img_categories FROM img a, img_categories_img c, img_categories b WHERE a.id_img = c.id_img && c.id_img_categories = b.img_categories && b.img_categories = ?");
    $stmt->bind_param("s", $rem);
    $stmt->execute();
    $stmt->store_result();
    $num_rows = $stmt->num_rows; //15
    $stmt->bind_result($id_img, $img_title, $img_src, $img_description, $img_date_upload, $dilihat, $username, $name_img_categories);
    $for_length = floor($num_rows/3);
    $i = 0;
    $k = 0;
    if (!$num_rows) {
      $k = 1;
    }
    while($stmt->fetch()) {
      if (!$for_length) {
        $k = 1;
        break;
      }
      if(!($i % $for_length)) {
        echo "<div class='col-md-4 trendingNew-imgCol'>";
      }
      echo "<div class='img-container-lope' value='img".$id_img."'>";
      echo "<img class='img-fluid img-opacity imgview' src='".$img_src."' id='img".$id_img."' val='".$name_img_categories."'>";
      ?>
      <div class="img-hover-lopelope" value="img<?php echo $id_img ?>">
        <span class="judulgamb"><small><?php echo $img_title ?></small></span>
        <a href="profile.php?r=<?php echo $username ?>">
          <span class="usernamegamb"><?php echo $username ?></span>
        </a>
        <i class="fas fa-heart"></i>
        <i class="fas fa-ellipsis-v"></i>
      </div>
      <?php
      $i++;
      echo "</div>";
      if ($i == $for_length) {
        $i = 0;
        echo "</div>";
      }
    }
    $stmt->close();
    if($k) {
      ?>
      <div class="col-md-12">
        <h1 class="text-center" style="color:#fff;">Maaf Gambar Belum Tersedia</h1>
      </div>
      <?php
    }
 ?>
