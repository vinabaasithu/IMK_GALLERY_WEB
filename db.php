<?php
  $mysqli = new mysqli("127.0.0.1", "root", "", "blagu");
  /* check connection */
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }

?>
