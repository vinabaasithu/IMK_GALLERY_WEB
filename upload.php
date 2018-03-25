<?php
  session_start();
  require_once 'db.php';
  $username;
  if(!(isset($_SESSION['username']))) {
    header("Location: index.php?r=logfirst");
  } else {
    $username = $_SESSION['username'];
  }
  $pesanUpload = "";
  if(isset($_POST['uploadgambar'])) {

    $target_dir = "userimg/".$username."/";
    if (!(file_exists($target_dir))) {
      mkdir($target_dir);
    }
    $target_file = $target_dir . basename($_FILES["fileupl"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $nama_file_baru = basename($_FILES["fileupl"]["name"]);
    $i = 0;
    while (file_exists($target_file)) {
      $nama_file_baru = basename($_FILES["fileupl"]["name"], ".".$imageFileType). $i.".".$imageFileType;
      $target_file = $target_dir.$nama_file_baru;
      $i++;
    }
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileupl"]["tmp_name"]);
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $pesanUpload .= "<p>File is not an image.</p>";
        $uploadOk = 0;
    }
    // check categories

    if(!isset($_POST["categories"])) {
      $pesanUpload .= "<p>Categories belum diisi, Harap Isi Terlebih dahulu</p>";
      $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileupl"]["size"] > 15000000) {
        $pesanUpload .= "<p>Sorry, your file is too large.</p>";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $pesanUpload .= "<p>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      $pesanUpload .= "<p>Sorry, your file was not uploaded.</p>";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileupl"]["tmp_name"], $target_file)) {
            $pesanUpload .= "<p>The file ". $nama_file_baru. " has been uploaded.</p>";
        } else {
            $pesanUpload .= "<p>Sorry, there was an error uploading your file.</p>";
        }
    }

    if ($uploadOk) {
      $img_title = $_POST["imgtitle"];
      $categories = $_POST["categories"];
      $img_description = $_POST["imgdesc"];
      $tags = array_unique(array_map('strtolower', $_POST["tags"]));
      $date = date("Y-m-d h:i:s");
      $stmt = $mysqli->prepare("INSERT INTO img (img_title, img_src, img_description, img_date_upload, username) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param("sssss", $img_title, $target_file, $img_description, $date, $username);
      $stmt->execute();
      $stmt->close();
      $stmt = $mysqli->prepare("SELECT id_img FROM img WHERE img_title = ? && img_src = ? && img_description = ? && img_date_upload = ? && username = ?");
      $stmt->bind_param("sssss", $img_title, $target_file, $img_description, $date, $username);
      $stmt->execute();
      $stmt->bind_result($id_img);
      $stmt->fetch();
      $stmt->close();
      for ($i=0; $i < count($categories); $i++) {
        $stmt = $mysqli->prepare("INSERT INTO img_categories_img (id_img, id_img_categories) VALUES (?, ?)");
        $stmt->bind_param("ii", $id_img, $categories[$i]);
        $stmt->execute();
        $stmt->close();
      }
      $id_img_tags;
      for ($i=0; $i < count($tags); $i++) {
        $stmt = $mysqli->prepare("SELECT img_tags_name FROM img_tags WHERE img_tags_name = ?");
        $stmt->bind_param("s", $tags[$i]);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        if(!$num_rows) {
          $stmt->close();
          $stmt = $mysqli->prepare("INSERT INTO img_tags (img_tags_name) VALUES (?)");
          $stmt->bind_param("s", $tags[$i]);
          $stmt->execute();
          $stmt->close();
        } else {
          $stmt->close();
        }
        $stmt = $mysqli->prepare("SELECT id_img_tags FROM img_tags WHERE img_tags_name = ?");
        $stmt->bind_param("s", $tags[$i]);
        $stmt->execute();
        $stmt->bind_result($id_img_tags[$i]);
        $stmt->fetch();
        $stmt->close();
      }
      for ($i=0; $i < count($id_img_tags); $i++) {
        $stmt = $mysqli->prepare("INSERT INTO img_tags_img (id_img, id_img_tags) VALUES (?, ?)");
        $stmt->bind_param("ii", $id_img, $id_img_tags[$i]);
        $stmt->execute();
        $stmt->close();
      }
    }
  }

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Upload</title>
    <link rel="stylesheet" href="source/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="source/css/bootstrap.min.css.map">
    <script defer src="source/js/fontawesome-all.min.js"></script>
    <link rel="stylesheet" href="source/css/styleHeader.css">
    <link rel="stylesheet" href="source/css/styleUpload.css">
  </head>
  <body>
    <?php include 'source/template/navbarMenuSearch.php'; ?>
    <?php if (isset($pesanUpload)): ?>
      <div class="pesan-upload">
        <?php echo $pesanUpload ?>
      </div>
    <?php endif; ?>
    <div class="container">
      <form class="formUpload" id="formUpload" action="upload.php" method="post" enctype="multipart/form-data">
        <div class="text-center uploadimgform">
          <div class="cameracircle fileupl">
            <input type="file" name="fileupl" id="fileupl" required>
            <i class="fas fa-camera h2"></i>
          </div><br>
          <small>Click Disini Untuk Pilih Gambar</small>
        </div>
        <div class="previewimg">
          <img src="#" id="previewimg" class="img-fluid" alt="Your Image">
          <div class="closeimg">
            <span class="h1 hapusgambar">x</span>
          </div>
        </div>
        <hr>
        <div class="form-group">
          <label for="imgtitle">Judul Gambar : </label>
          <input required class="form-control" id="imgtitle" type="text" name="imgtitle" value="" placeholder="Input Judul Gambarmu Disini">
        </div>
        <br>
        <div class="form-group">
          <label class="categories" for="categories" value="eye-slash">Pilih Kategori Gambarmu : <strong class="cursor"><i class="fas fa-eye"></i><i class="fas fa-eye-slash"></i></strong> </label>
          <div class="categories-container row">
            <?php
              $stmt = $mysqli->prepare("SELECT img_categories, name_img_categories FROM img_categories");
              $stmt->execute();
              $stmt->store_result();
              $num_rows = $stmt->num_rows;
              $lengthfor = intval($num_rows/3);
              $stmt->bind_result($id_categories, $name_img_categories);
              $i = 0;
              while($stmt->fetch()) {
                if(!$i) {
                  echo "<div class='col-md-4'>";
                }
                echo "<p><input type='checkbox' id='". $name_img_categories. $id_categories."' name='categories[]' value='$id_categories'>";
                echo " <label for='". $name_img_categories. $id_categories."'> $name_img_categories</label></p>";
                $i++;
                if($i > $lengthfor) {
                  $i = 0;
                  echo "</div>";
                }
              }

             ?>
          </div>
        </div><br>
        <div class="form-group">
          <label for="imgdesc" class="imgdesc" value="eye-slash">Deskripsi Gambar : <strong class="cursor"><i class="fas fa-eye"></i><i class="fas fa-eye-slash"></i></strong> </label>
          <textarea name="imgdesc" id="imgdesc" rows="8" class="form-control imgdesc-container"></textarea>
        </div><br>
        <div class="after">
        </div>
        <div class="form-group">
          <label for="imgtags">Tag untuk Gambar : </label>
          <br>
          <input type="text" name="imgtags" id="imgtags" class="form-control" placeholder="Masukan Tag Disini. Tekan Enter Untuk Memisahkan Tag">
        </div><br>
        <div class="form-group">
          <input type="submit" name="uploadgambar" value="Upload Sekarang" class="btn btn-primary">
        </div>
      </form>
    </div>

    <script src="source/js/jquery-3.3.1.min.js"></script>
    <script src="source/js/popper.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="source/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="source/js/styleHeader.js" charset="utf-8"></script>
    <script type="text/javascript">
      var eye = function(e, f) {
            var a = $(e).attr("value");
            if(a == "eye-slash") {
              $(f).slideUp();
              $(e+" .fa-eye-slash").css("display", "none");
              $(e+" .fa-eye").css("display", "inline-block");
              $(e).attr("value", "eye");
            } else if (a == "eye") {
              $(f).slideDown();
              $(e+" .fa-eye").css("display", "none");
              $(e+" .fa-eye-slash").css("display", "inline-block");
              $(e).attr("value", "eye-slash");
            }
      }
      $(document).ready(function(){
        $(".categories").click(function(){
          eye(".categories", ".categories-container");
        });
        $(".imgdesc").click(function(){
          eye(".imgdesc", ".imgdesc-container");
        });
        $('#imgtags').keyup(function(e){
           if(e.keyCode == 13){
            // alert("space"); 32
            // alert("backspace"); 8
            // 13 Enter
            var value = $(this).val();
            value = value.trim();
            var inputhidden = $("<input type='hidden' name='tags[]'>");
            inputhidden.attr("value", value);
            $(".after").after(inputhidden);
            var span = $("<span class='spandescgambar'></span>").text(value+" x");
            span.attr("value", value);
            $("#imgtags").before(span);
            $(this).val("");
           }
        });
      });
      $(document).ready(function(){
        $(document).on('click', '.spandescgambar', function(){
          var value = $(this).attr("value");
          $("input[value='"+value+"']").remove();
          $("span[value='"+value+"']").remove();
        })
      });
      $(document).ready(function(){
        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              $('#previewimg').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
          }
        }
        $("#fileupl").change(function() {
          readURL(this);
          // $(".uploadimgform").css("display", "none");
          // $(".previewimg").css("display", "block");

          $(".uploadimgform").fadeOut();
          setTimeout(function(){
            $(".previewimg").fadeIn();
          }, 1500);
        });
      });
      $(document).ready(function(){
        $(".previewimg").hover(function(){
          $(".closeimg").fadeIn();
        }, function(){
          $(".closeimg").fadeOut();
        });
      });
      // cancel img
      $(document).ready(function(){
        $(".closeimg").click(function(){
          $("#fileupl").val("");
          // $(".previewimg").css("display", "none");
          // $(".uploadimgform").css("display", "block");
          $(".previewimg").fadeOut();
          setTimeout(
            function(){
              $(".uploadimgform").fadeIn();
            }
            , 1000);

        });
      });
      // disable enter submit
      $(document).ready(function(){
        $('#formUpload').on('keyup keypress', function(e) {
          var keyCode = e.keyCode || e.which;
          if (keyCode === 13) {
            e.preventDefault();
            return false;
          }
        });
      });
      // pesan-upload
      $(document).ready(function(){
        var adaPesanUpload = $(".pesan-upload").length;
        if(adaPesanUpload) {
          setTimeout(function() {$(".pesan-upload").fadeOut()}, 1500);
          $(".pesan-upload").click(function(){
              $(this).fadeOut();
          });
        }
      });
    </script>
  </body>
</html>
