var drop = $(".drop-1");
$(".drop-1")
  .mouseover(function() {
    if (!this.mouseout()){
      $(".dropdown-1").show(300);
    }
});
$(".drop-1")
  .mouseleave(function() {
  $(".dropdown-1").hide(300);     
});

$(".drop-2")
  .mouseover(function() {
  $(".dropdown-2").show(300);
});
$(".drop-2")
  .mouseleave(function() {
  $(".dropdown-2").hide(300);     
});

