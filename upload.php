<?php
  session_start();  
  if(!isset($_SESSION["username"])) {
    header("Location: sign.php?r=SignIn");
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  </body>
</html>
