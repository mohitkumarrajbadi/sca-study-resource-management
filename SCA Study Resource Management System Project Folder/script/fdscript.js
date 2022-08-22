function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.getElementById("openbtn").style.visibility = "hidden";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.getElementById("openbtn").style.visibility = "visible";
}


$(document).ready(function(){
  closeNav();
  $('ul li a').click(function(){
    $('li a').removeClass("active");
    $(this).addClass("active");
  });
});

//Query for the filename preview while uploading
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});


$(document).ready(function(){
	$('.fa-check').hide();
	$(".edit").hide();
  $("#pencil").click(function(){
    $(".notedit").hide();
    $(".edit").show();
    $('.fa-check').show();
  });

  $(".fa-check").click(function(){
  	$(".notedit").show();
  	$(".edit").hide();;
  });

});



