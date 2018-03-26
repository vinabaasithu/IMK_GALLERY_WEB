<div class="header row text-center">
  <div class="col-md-3 logo">
    <div class="row">
      <div class="col-md-3">
        <a href="../IMK/">
          <strong>LOGO</strong>
        </a>
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
          <a class="col-md-3"></a>
          <a class="col-md-3" href="gallery.php">
              Gallery
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
              <!-- <i class="fas fa-user h4"></i> -->
              <div class="userprofiledivlogo">
                <img src="source/img/userProfileDummy.png" class="imgprofilelogo img-fluid" alt="">
              </div>
            </a>
          </span>
          <div class="iconklik" id="iconklik">
            <a href="profile.php<?php if(isset($_SESSION["username"])) echo "?r=".$_SESSION['username'] ?>"><p>Profile</p></a>
            <a href="#"><p>Notif</p></a>
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
