<?php
  session_start();
  if(isset($_SESSION['username'])) {
    header("Location: profile.php?r=".$_SESSION['username']);
  }
  include_once 'db.php';
  $pesan = "";
  if(isset($_GET['r'])) {
    $param = $_GET['r'];
    if($param === "SignUp") {
      $title = "Sign Up";
      $formActive = "signup";
    } elseif ($param === "SignIn") {
      $title = "Sign In";
      $formActive = "signin";
    } else {
      header("Location: ../IMK/");
    }
  } else {
    header("Location: ../IMK/");
  }
  if(isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $stmt = $mysqli->prepare('SELECT username, password FROM user WHERE username = ? || password = ?');
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    if ($stmt->fetch()) {
      $pesan = "Username atau Email sudah terdaftar";
      $stmt->close();
    } else {
      $stmt->close();
      $date = date("Y-m-d");
      $stmt = $mysqli->prepare('INSERT INTO user (username, email, password, user_date_register) VALUES (?, ?, ?, ?)');
      $stmt->bind_param("ssss", $username, $email, $password, $date);
      if ($stmt->execute()) {
        $_SESSION['username'] = $username;
        header("Location: profile.php?r=$username");
      }
      $stmt->close();
    }
  }
  if(isset($_POST['signin'])) {
    $loginusername = $_POST['loginusername'];
    $loginpassword = md5($_POST['loginpassword']);
    $gmail = $_POST['gmail'];
    if ($gmail == "") {
      $stmt = $mysqli->prepare('SELECT username FROM user WHERE (username = ? || email = ?) && password = ?');
      $stmt->bind_param("sss", $loginusername, $loginusername, $loginpassword);
      $stmt->execute();
      if ($stmt->fetch()) {
        $_SESSION['username'] = $loginusername;
        header("Location: ../IMK/");
      } else {
        $pesan = "Username/Email atau Password Salah";
      }
    } else {
      $stmt = $mysqli->prepare('SELECT username FROM user WHERE (username = ? || email = ?) && password = ?');
      $stmt->bind_param("sss", $gmail, $gmail, md5($gmail));
      $stmt->execute();
      if ($stmt->fetch()) {
        $_SESSION['username'] = $gmail;
        header("Location: ../IMK/");
        $stmt->close();
      } else {
        $stmt->close();
        $date = date("Y-m-d");
        $stmt = $mysqli->prepare('INSERT INTO user (username, email, password, user_date_register) VALUES (?, ?, ?, ?)');
        $stmt->bind_param("ssss", $gmail, $gmail, md5($gmail), $date);
        if ($stmt->execute()) {
          $_SESSION['username'] = $gmail;
          header("Location: profile.php?r=$gmail");
        }
        $stmt->close();
      }
    }
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="source/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="source/css/bootstrap.min.css.map">
    <link rel="stylesheet" href="source/css/styleRegNLog.css">
    <script defer src="source/js/fontawesome-all.min.js"></script>
    <!-- googlesignin function -->
    <meta name="google-signin-client_id" content="152377592712-9ir8e8rj567jitnj9q194gon715aop3c.apps.googleusercontent.com">
    <script src="source/js/googlelog.js" async defer></script>
  </head>
  <body>
    <div class="container-form">
      <!-- SignUp -->
      <form id="signupForm" action="sign.php?r=SignUp" method="post">
        <h1 class="text-center"><strong>Sign Up in Seconds !</strong></h1>
        <div class="text-center pesan">
          <?php echo $pesan; ?>
        </div>
        <br>
        <div class="form-group">
          <label for="fullname">
            <i class="fas fa-user"></i>
          </label>
          <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
        </div>
        <div class="form-group">
          <label for="email">
            <i class="fas fa-envelope"></i>
          </label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label for="password">
            <i class="fas fa-lock"></i>
          </label>
          <input type="password" class="form-control password" name="password" id="password" placeholder="Password" required>
          <small class="showhidepass"><strong>Click Here For Show Password</strong></small>
        </div>
        <div class="form-group text-center">
          <input class="btn btn-primary" type="submit" name="signup" value="Sign Up">
        </div>
        <p class="text-center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Atau Langsung Masuk Dengan Google</strong></p>
        <div class="form-group text-center">
          <div class="loginWithGoogle">
            <div class="g-signin2" data-onsuccess="onSignIn"></div>
          </div>
        </div>
        <p class="text-center">
          <small>Sudah Punya Akun ? Klik <a href="sign.php?r=SignIn">Disini</a> Untuk Login</small>
        </p>
      </form>


      <!-- SignIn -->
      <form id="signinForm" action="sign.php?r=SignIn" method="post">
        <h1 class="text-center"><strong>Ayo Login Boys ..</strong></h1>
        <div class="text-center pesan">
          <?php echo $pesan; ?>
        </div>
        <br>
        <div class="form-group">
          <label for="loginemail">
            <i class="fas fa-user"></i>
          </label>
          <input type="text" class="form-control" name="loginusername" id="loginusername" placeholder="Username / Email" required>
        </div>
        <div class="form-group">
          <label for="password">
            <i class="fas fa-lock"></i>
          </label>
          <input type="password" class="form-control password" name="loginpassword" id="loginpassword" placeholder="Password" required>
          <small class="showhidepass"><strong>Click Here For Show Password</strong></small>
        </div>
        <input id="gmail" type="hidden" name="gmail" value="">
        <div class="form-group text-center">
          <input class="btn btn-primary" type="submit" name="signin" id="signsubmit" value="Login">
        </div>
        <p class="text-center">
          <small>Lupa Password ? Klik <a href="../IMK">Disini</a> Untuk Pulihkan Kembali</small>
        </p>
        <p class="text-center"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Atau Langsung Masuk Dengan Google</strong></p>
        <div class="form-group text-center">
          <div class="loginWithGoogle">
            <div class="g-signin2" data-onsuccess="onSignIn"></div>
          </div>
        </div>
        <p class="text-center">
          <small>Belum Punya Akun ? Klik <a href="sign.php?r=SignUp">Disini</a> Untuk Sign Up</small>
        </p>
      </form>


    </div>
    <script src="source/js/jquery-3.3.1.min.js"></script>
    <script src="source/js/popper.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="source/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript">
      var formactive = "<?php echo $formActive ?>";

      function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        console.log('Name: ' + profile.getName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
        $("#loginpassword").attr("value", profile.getEmail());
        $("#loginusername").attr("value", profile.getEmail());
        $("#gmail").attr("value", profile.getEmail());
        $("#signsubmit").click();
      }
      $(document).ready(function(){
          // showhidepass
          $(".showhidepass").click(function(){
            var a = $(".password");
            var b = a.attr("type");
            if(b == "password") {
              a.attr("type", "text");
            } else {
              a.attr("type", "password");
            }
          });
          // formactive
          if(formactive == "signup") {
            $("#signinForm").fadeOut(800);
            $("#signupForm").fadeIn(800);
          } else if (formactive == "signin") {
            $("#signupForm").fadeOut(800);
            $("#signinForm").fadeIn(800);
          }
      });
    </script>
  </body>
</html>
