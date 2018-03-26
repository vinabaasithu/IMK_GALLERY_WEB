$(document).ready(function(){
  // $(".img-container-lope").hover(function(){
  //   var a = $(this).attr("value");
  //   $(".img-hover-lopelope[value='"+a+"']").fadeIn();
  // }, function(){
  //   var a = $(this).attr("value");
  //   $(".img-hover-lopelope[value='"+a+"']").fadeOut();
  // });
  $(document).on("mouseenter", ".img-container-lope", function() {
    var a = $(this).attr("value");
    $(".img-hover-lopelope[value='"+a+"']").fadeIn();
  });

$(document).on("mouseleave", ".img-container-lope", function() {
    var a = $(this).attr("value");
    $(".img-hover-lopelope[value='"+a+"']").fadeOut();
  });
});
