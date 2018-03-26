// $(".imgview").click(function(){
//   var value = $(this).attr("id");
//   $.ajax({    //create an ajax request to display.php
//   type: "GET",
//   url: "source/template/imgview.php?re="+value,
//   dataType: "html",   //expect html to be returned
//   success: function(response){
//               $(".img-view-client").html(response);
//           }
//   });
// });
$(document).on('click', '.imgview',function() {
    var value = $(this).attr("id");
    $.ajax({    //create an ajax request to display.php
    type: "GET",
    url: "source/template/imgview.php?re="+value,
    dataType: "html",   //expect html to be returned
    success: function(response){
                $(".img-view-client").html(response);
            }
    });
});
