<?php
  session_start();
  if(isset($_GET['r']) && $_GET['r'] == "logout") {
    $logout = $_GET['r'];
    session_destroy();
    header("Location: ../IMK/");
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
  </head>
  <body>
    <div class="header row text-center">
      <div class="col-md-3 logo">
        <div class="row">
          <div class="col-md-3">
            <strong>LOGO</strong>
          </div>
          <div class="col-md-9 text-left logotitle">
            <span><strong>BLAGU</strong></span> <br>
            <span><small>BL Arts Gallery Universe</small></span>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <form class="searchindex" action="gallery.php" method="post">
          <div class="form-group form-group-search">
            <input type="text" name="search" value="" placeholder="Cari Disini.." class="form-control search">
              <button class="btn-fa-search" type="submit" name="submit">
                <i class="fas fa-search"></i>
              </button>
          </div>
        </form>
      </div>
      <div class="col-md-5 indexMenu">
        <div class="row">
          <div class="col-md-8" style="<?php if (isset($_SESSION['username'])) echo "right:-8vw" ?>" >
            <div class="row indexMenu1">
              <a class="col-md-3" href="#">
                  Gallery
              </a>
              <a class="col-md-3" href="#">
                  Event
              </a>
             <div class="col-md-3 uploadBtn">
               <a href="upload.php">
                 <button class="btn btn-primary" type="button" name="" value="Upload">Upload</button>
               </a>
             </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="row indexMenu2">
              <?php
                if (isset($_SESSION['username'])) {
              ?>
              <a href="#" class="col-md-6"></a>
              <span class="col-md-4 text-center" id="usericonklik" href="#" >
                <a class=" usericon" href="#">
                  <i class="fas fa-user h4"></i>
                </a>
              </span>
              <div class="iconklik" id="iconklik">
                <a href="profile.php<?php if(isset($_SESSION["username"])) echo "?r=".$_SESSION['username'] ?>"><p>Profile</p></a>
                <a href="#"><p>Setting</p></a>
                <a href="<?php if(isset($_SESSION['gmail'])) echo "https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=" ?>http://localhost/IMK/index.php?r=logout"><p>Logout</p></a>

              </div>
               <!-- <a class="col-md-6" href="<?php if(isset($_SESSION['gmail'])) echo "https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=" ?>http://localhost/IMK/index.php?r=logout">
                 Logout
               </a> -->
              <?php
            } else {
              ?>
              <a class="col-md-6" href="sign.php?r=SignIn">
                  Login
              </a>
              <a class="col-md-6" href="sign.php?r=SignUp">
                  SignUp
              </a>
              <?php
            }
               ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="menuMobile">
      <a href="../IMK/">
        <i class="fas fa-home"></i>
      </a>
      <a href="#" class="menuMobileSearch">
        <i class="fas fa-search"></i>
      </a>
      <a href="profile.php<?php if(isset($_SESSION["username"])) echo "?r=".$_SESSION['username'] ?>">
        <i class="fas fa-user"></i>
      </a>
      <a href="upload.php">
        <i class="fas fa-upload"></i>
      </a>
      <a href="<?php if(isset($_SESSION['gmail'])) echo "https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=" ?>http://localhost/IMK/index.php?r=logout">
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </div>
    <form class="searchindexmobile" action="gallery.php" method="post">
      <div class="form-group form-group-search">
        <input type="text" name="search" value="" placeholder="Cari Disini.." class="form-control search">
          <button class="btn-fa-search" type="submit" name="submit">
            <i class="fas fa-search"></i>
          </button>
      </div>
    </form>

    <div class="slider row">

    </div>
    <div class="trendingNew">
      <div class="trendingNew-container">
        <div class="trendingNew-menu">
          <a href="#">
            <strong>Trending</strong>
          </a>
          <a href="#">
            <strong>New</strong>
          </a>
        </div>
        <div class="trendingNew-img row">
          <div class=" col-md-4 trendingNew-imgCol">
            <?php
              for($i = 0; $i < 5; $i++) {
                echo "<img class='img-fluid' src='source/img/img".rand(0, 2).".jpeg'>";
              }
             ?>
          </div>
          <div class=" col-md-4 trendingNew-imgCol">
              <?php
                for($i = 0; $i < 5; $i++) {
                  echo "<img class='img-fluid' src='source/img/img".rand(0, 2).".jpeg'>";
                }
               ?>
          </div>
          <div class=" col-md-4 trendingNew-imgCol">
              <?php
                for($i = 0; $i < 5; $i++) {
                  echo "<img class='img-fluid' src='source/img/img".rand(0, 2).".jpeg'>";
                }
               ?>
          </div>
        </div>
      </div>
    </div>
    <div class="footer text-center">
      <p>&copy;2018 By Us .. </p>
    </div>
    <script src="source/js/jquery-3.3.1.min.js"></script>
    <script src="source/js/popper.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="source/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#usericonklik").click(function(){
          $("#iconklik").fadeToggle();
        });
        $(".menuMobileSearch").click(function(){
          $(".searchindexmobile").fadeToggle();
        });
      });
    </script>
  </body>
</html>
