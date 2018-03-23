<?php
  session_start();
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
      <div class="col-md-4 logo">
        <div class="row">
          <div class="col-md-3">
            <strong>LOGO</strong>
          </div>
          <div class="col-md-9 text-left">
            <span><strong>BLAGU</strong></span> <br>
            <span><small>BL Arts Gallery Universe</small></span>
          </div>
        </div>
      </div>
      <div class="col-md-3">

      </div>
      <div class="col-md-5 indexMenu">
        <div class="row">
          <div class="col-md-8">
            <div class="row indexMenu1">
              <a class="col-md-3" href="#">
                  Gallery
              </a>
              <a class="col-md-3" href="#">
                  Event
              </a>
             <a class="col-md-3" href="#">
               ...
             </a>
             <div class="col-md-3 uploadBtn">
               <input class="btn btn-primary" type="button" name="" value="Upload">
             </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="row indexMenu2">
              <a class="col-md-6" href="sign.php?r=SignIn">
                  Login
              </a>
              <a class="col-md-6" href="sign.php?r=SignUp">
                  SignUp
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
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
        <div class="trendingNew-img">
          <?php
            for ($i=0; $i < 6; $i++) {
              echo "<div class='row'>";
              for ($j=0; $j < 3; $j++) {
          ?>
          <div class="col-md-4">
            <img class="img-fluid" src="source/img/img<?php echo rand(0, 2) ?>.jpeg" alt="pexels-photo-297648.jpeg">
          </div>
          <?php
              }
              echo "</div>";
            }
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
  </body>
</html>
