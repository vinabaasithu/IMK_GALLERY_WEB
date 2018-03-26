<?php
  session_start();
  require_once 'db.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gallery</title>
    <link rel="stylesheet" href="source/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="source/css/bootstrap.min.css.map">
    <script defer src="source/js/fontawesome-all.min.js"></script>
    <link rel="stylesheet" href="source/css/styleHeader.css">
    <link rel="stylesheet" href="source/css/styleGallery.css">
    <link rel="stylesheet" href="source/css/imgview.css">
    <link rel="stylesheet" href="source/css/imghoverlopelope.css">
  </head>
  <body>
    <?php include 'source/template/navbarMenuSearch.php'; ?>

      <!--  -->
        <div class="img-view-client">

        </div>
      <!--  -->
      <div class="fa-bars-con fa-bars-click-in">
        <i class="fas fa-bars"></i>
      </div>
      <div class="categorybar">
        <p class="h4 background-pink fa-bars-click-out">Categories
          <i class="fas fa-bars"></i>
        </p>
        <?php
        $stmt = $mysqli->prepare("SELECT img_categories, name_img_categories FROM `img_categories`
ORDER BY `img_categories`.`name_img_categories` ASC");
        $stmt->execute();
        $stmt->bind_result($img_categories, $name_img_categories);
        while($stmt->fetch()) {
          echo "<p class='list-categories' value='cat".$img_categories."'>";
          echo $name_img_categories;
          echo "</p>";
        }
         ?>
      </div>
    <div class="row here">
      <?php
      $stmt = $mysqli->prepare("SELECT id_img, img_title, img_src, img_description, img_date_upload, dilihat, username FROM img ORDER BY RAND() DESC LIMIT 16");
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
       ?>
    </div>

    <script src="source/js/jquery-3.3.1.min.js"></script>
    <script src="source/js/popper.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="source/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="source/js/styleHeader.js" charset="utf-8"></script>
    <script src="source/js/imgview.js" charset="utf-8"></script>
    <script src="source/js/imghoverlopelope.js" charset="utf-8"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".fa-bars-click-in").click(function(){
          $(".categorybar").animate({
            left: '0'
          });
        });
        $(".fa-bars-click-out").click(function(){
          $(".categorybar").animate({
            left: '-55vw'
          });
        });
      });

      $(document).ready(function(){
        $(".list-categories").click(function(){
            var value = $(this).attr("value");
            $.ajax({    //create an ajax request to display.php
            type: "GET",
            url: "source/etc/selectgallery.php?rem="+value,
            dataType: "html",   //expect html to be returned
            success: function(response){
                        $(".here").html(response);
                        $(".here").css("display", "none");
                        var i = Math.ceil(3*Math.random());
                        switch (i) {
                          case 1: $(".here").show("slow"); break;
                          case 2: $(".here").fadeIn("slow"); break;
                          case 3: $(".here").slideDown("slow"); break;
                        }
                    }
            });
        });
      });
    </script>
  </body>
</html>
