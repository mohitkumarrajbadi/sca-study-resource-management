
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

$(document).ready(function(){
    $(".hidden").hide();
  $('#pencil').click(function(){
    $('.show').hide();
    $('.hidden').show();
  });

$('.pdone').click(function(){
    $('.show').show();
    $('.hidden').hide();
      });
});


