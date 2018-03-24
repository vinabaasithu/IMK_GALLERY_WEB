<?php
  session_start();
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
  </head>
  <body>
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
    <script src="source/js/styleHeader.js" charset="utf-8"></script>
    <script type="text/javascript">
      var adaErrLog = $(".errLog").length;
      if(adaErrLog) {
        setTimeout(function() {$(".errLog").fadeOut()}, 1500);
        $(document).ready(function(){
          $(".errLog").click(function(){
            $(".errLog").fadeOut();
          })
        });
      }

    </script>
  </body>
</html>
