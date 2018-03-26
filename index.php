<?php
  session_start();
  require_once 'db.php';
  $cekLogForUpload = "";
  if(isset($_GET['r']) && $_GET['r'] == "logout") {
    $logout = $_GET['r'];
    session_destroy();
    header("Location: ../IMK/");
  }
  if (isset($_GET['r'])) {
    $cekLogForUpload = $_GET['r'];
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BLAGU</title>
    <link rel="stylesheet" href="source/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="source/css/bootstrap.min.css.map">
    <script defer src="source/js/fontawesome-all.min.js"></script>
    <link rel="stylesheet" href="source/css/styleIndex.css">
    <link rel="stylesheet" href="source/css/styleHeader.css">
    <link rel="stylesheet" href="source/css/imgview.css">
    <link rel="stylesheet" href="source/css/imghoverlopelope.css">
  </head>
  <body>
    <!--  -->
      <div class="img-view-client">

      </div>
    <!--  -->
    <?php include 'source/template/navbarMenuSearch.php'; ?>
    <?php if ($cekLogForUpload  == "logfirst"): ?>
      <div class="errLog">
          <p class="h2">Sorry Gan, Login dulu biar bisa Upload</p>
      </div>
    <?php endif; ?>
    <div class="slider row">

    </div>
    <div class="trendingNew">
      <div class="trendingNew-container">
        <div class="trendingNew-menu">
          <a class="a-trendingNew-menu" value="random">
            <strong>Random</strong>
          </a>
          <a class="a-trendingNew-menu" value="trending">
            <strong>Trending</strong>
          </a>
          <a class="a-trendingNew-menu" value="new">
            <strong>New</strong>
          </a>
        </div>
        <div class="trendingNew-img row">
            <?php
            $order = "ORDER BY RAND() DESC LIMIT 16";
            $stmt = $mysqli->prepare("SELECT id_img, img_title, img_src, img_description, img_date_upload, dilihat, username FROM img $order");
            $stmt->execute();
            $stmt->store_result();
            $num_rows = $stmt->num_rows;
            $stmt->bind_result($id_img, $img_title, $img_src, $img_description, $img_date_upload, $dilihat, $username);
            $for_length = floor($num_rows/3);
            $i = 0;
            while($stmt->fetch()) {
              if(!($i % $for_length)) {
                echo "<div class='col-md-4 trendingNew-imgCol'>";
              }
              echo "<div class='img-container-lope' value='img".$id_img."'>"; //
              echo "<img class='img-fluid img-opacity imgview' src='".$img_src."' id='img".$id_img."'>";
              ?> <!-- -->
              <div class="img-hover-lopelope" value="img<?php echo $id_img ?>"> <!-- -->
                <span class="judulgamb"><small><?php echo $img_title ?></small></span> <!-- -->
                <a href="profile.php?r=<?php echo $username ?>"> <!-- -->
                  <span class="usernamegamb"><?php echo $username ?></span> <!-- -->
                </a> <!-- -->
                <i class="fas fa-heart"></i> <!-- -->
                <i class="fas fa-ellipsis-v"></i> <!-- -->
              </div> <!-- -->
              <?php
              $i++;
              echo "</div>"; //
              if ($i == $for_length) {
                $i = 0;
                echo "</div>";
              }
            }
            $stmt->close();
             ?>
        </div>
      </div>
    </div>
    <div class="footer text-center">
      <p>&copy;2018 By Us .. </p>
    </div>
    <script src="source/js/jquery-3.3.1.min.js"></script>
    <script src="source/js/popper.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="source/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="source/js/styleHeader.js" charset="utf-8"></script>
    <script src="source/js/imgview.js" charset="utf-8"></script>
    <script src="source/js/imghoverlopelope.js" charset="utf-8"></script>
    <script type="text/javascript">
      var adaErrLog = $(".errLog").length;
      if(adaErrLog) {
        setTimeout(function() {$(".errLog").fadeOut()}, 1500);
        $(document).ready(function(){
          $(".errLog").click(function(){
            $(this).fadeOut();
          })
        });
      }
      // ajax
      $(document).ready(function(){
        $(".a-trendingNew-menu").click(function(){
            var value = $(this).attr("value");
            $.ajax({    //create an ajax request to display.php
            type: "GET",
            url: "source/etc/selectIndex.php?r="+value,
            dataType: "html",   //expect html to be returned
            success: function(response){
                        $(".trendingNew-img").html(response);
                        $(".trendingNew-img").hide();
                        var i = Math.ceil(3*Math.random());
                        switch (i) {
                          case 1: $(".trendingNew-img").show("slow"); break;
                          case 2: $(".trendingNew-img").fadeIn("slow"); break;
                          case 3: $(".trendingNew-img").slideDown("slow"); break;
                        }
                    }
            });
        });
      });
    </script>
  </body>
</html>
