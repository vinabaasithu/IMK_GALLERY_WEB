<?php
session_start();
require_once 'db.php';
if(isset($_GET['r'])) {
  $r = $_GET['r'];
} else if (isset($_SESSION['username'])) {
  header("Location: profile.php?r=".$_SESSION['username']);
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profile</title>
    <link rel="stylesheet" href="source/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="source/css/bootstrap.min.css.map">
    <link rel="stylesheet" href="source/css/styleProfile.css">
    <link rel="stylesheet" href="source/css/imgview.css">
    <script defer src="source/js/fontawesome-all.min.js"></script>
  </head>
  <body>
    <!--  -->
      <div class="img-view-client">

      </div>
    <!--  -->
    <div class="menuleft text-center">
      <div>
        <a href="../IMK/">Logo</a>
      </div>
      <div>
        <a href="#">
          <i class="fas fa-search"></i>
        </a>
      </div>
      <div>
        <a href="upload.php">
          <i class="fas fa-upload"></i>
        </a>
      </div>
      <div>
        <a href="#">
          <i class="fas fa-bell"></i>
        </a>
      </div>
      <div>
        <a href="#">
          <i class="fas fa-cog"></i>
        </a>
      </div>
      <div>
        <a href="<?php if(isset($_SESSION['gmail'])) echo "https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=" ?>http://localhost/IMK/index.php?r=logout">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </div>
    </div>
    <div class="header">
      <div class="gantiSampul text-center h1">
        x
      </div>
      <p class="whitecoverheader"></p>
    </div>
    <div class="profilecontent row">
      <div class="userprofiledivcon col-md-4">
        <div class="userprofilediv">
          <img src="source/img/userProfileDummy.png" class="img-fluid" alt="">
          <div class="changePP">
            Ganti PP
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 userabout">
            <p class="h2"><?php echo $r ?></p>
            <hr>
            <p class="h3 aboutme">About Me</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div>
      </div>
      <div class="userprofilegallery col-md-8">
        <?php
        $order = "WHERE username = ? ORDER BY RAND() DESC LIMIT 5";
        $stmt = $mysqli->prepare("SELECT id_img, img_title, img_src, img_description, img_date_upload, dilihat FROM img $order");
        $stmt->bind_param("s", $r);
        $stmt->execute();
        $stmt->bind_result($id_img, $img_title, $img_src, $img_description, $img_date_upload, $dilihat);
        $i = 0;
        while ($stmt->fetch()) {
          $arrimg[$i][0] = $id_img;
          $arrimg[$i][1] = $img_title;
          $arrimg[$i][2] = $img_src;
          $arrimg[$i][3] = $img_description;
          $arrimg[$i][4] = $img_date_upload;
          $arrimg[$i][5] = $dilihat;
          $arrimg[$i][6] = $r;
          $i++;
        }
        $stmt->close();
        ?>
        <div class="row galleryUserProfile">
          <div class="col-md-4">
            <?php
            for ($i=0; $i < 2; $i++) {
              if (isset($arrimg[$i][1])) {
                echo "<img class='imgview img-fluid img-opacity' id='img".$arrimg[$i][0]."' src='".$arrimg[$i][2]."' alt='".$arrimg[$i][1]."'></img>";
              }
            }
             ?>
          </div>
          <div class="col-md-4">
                <?php
                if (isset($arrimg[2][1])) {
                  echo "<img class='imgview img-fluid img-opacity' id='img".$arrimg[2][0]."' src='".$arrimg[2][2]."' alt='".$arrimg[2][1]."'></img>";
                }
                  ?>
          </div>
          <div class="col-md-4">
            <?php
            for ($i=3; $i < 5; $i++) {
                if (isset($arrimg[$i][1])) {
                  echo "<img class='imgview img-fluid img-opacity' id='img".$arrimg[$i][0]."' src='".$arrimg[$i][2]."' alt='".$arrimg[$i][1]."'></img>";
                }
            }
             ?>
          </div>
        </div>
      </div>
    </div>
    <script src="source/js/jquery-3.3.1.min.js"></script>
    <script src="source/js/popper.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="source/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
      var a = "<?php echo "img".$arrimg[2][0] ?>";
      var img = document.getElementById(a);
      $("#"+a).css("height", img.clientHeight*2+"px");

      $(document).ready(function(){
        $(".header").hover(function(){
          $(".gantiSampul").fadeIn(800);
        }, function(){
          $(".gantiSampul").fadeOut(800);
        });
        $(".userprofilediv").hover(function(){
          $(".changePP").fadeIn(800);
        }, function(){
          $(".changePP").fadeOut(800);
        });

        $(".imgview").click(function(){
          var value = $(this).attr("id");
          $.ajax({    //create an ajax request to display.php
          type: "GET",
          url: "source/template/imgview.php?r="+value,
          dataType: "html",   //expect html to be returned
          success: function(response){
                      $(".img-view-client").html(response);
                  }
          });
        });
      });
    </script>
  </body>
</html>
