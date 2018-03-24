<?php
  session_start();
  require_once 'db.php';
  if(!(isset($_SESSION['username']))) {
    header("Location: index.php?r=logfirst");
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
    <div class="container">
      <form class="formUpload" id="formUpload" action="upload.php" method="post" enctype="multipart/form-data">
        <div class="text-center uploadimgform">
          <div class="cameracircle fileupl">
            <input type="file" name="fileupl" id="fileupl">
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
                echo "<p><input type='checkbox' id='". $name_img_categories. $id_categories."' name='categories' value='$name_img_categories'>";
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
            var inputhidden = $("<input type='hidden' name='tags'>");
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
    </script>
  </body>
</html>
