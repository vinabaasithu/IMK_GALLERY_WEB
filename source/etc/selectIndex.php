<?php
  include '../../db.php';
  if (isset($_GET["r"])) {
    if($_GET["r"] == "trending") {
        $order = "dilihat";
        $order = "ORDER BY $order DESC LIMIT 16";
    } else if ($_GET["r"] == "new") {
        $order = "img_date_upload";
        $order = "ORDER BY $order DESC LIMIT 16";
    } elseif ($_GET["r"] == "random") {
        $order = "ORDER BY RAND() DESC LIMIT 16";
    }
    $stmt = $mysqli->prepare("SELECT id_img, img_title, img_src, img_description, img_date_upload, dilihat, username FROM img $order");
    $stmt->execute();
    $stmt->store_result();
    $num_rows = $stmt->num_rows; //15
    $stmt->bind_result($id_img, $img_title, $img_src, $img_description, $img_date_upload, $dilihat, $username);
    $for_length = floor($num_rows/3);
    $i = 0;
    while($stmt->fetch()) {
      if(!($i % $for_length)) {
        echo "<div class='col-md-4 trendingNew-imgCol'>";
      }
      echo "<img class='img-fluid' src='".$img_src."'>";
      $i++;
      if ($i == $for_length) {
        $i = 0;
        echo "</div>";
      }
    }
    $stmt->close();
  }
 ?>
