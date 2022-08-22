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

$(document).ready(function(){
      $(".pshow").hide();
      $("#pdone").hide();
      $("#cancol").hide();

  var imagelocation = $('#imagepreview').attr('src');
  
  $('#pedit').click(function(){
    $('.phide').hide();
    $('.pshow').show();
    $(this).hide();
    $('#pdone').show();
    $('#cancol').show();
    $('#signoutcol').hide();
    $('#resetcol').hide();

  });


$('#cancel').click(function(){
    $('.phide').show();
    $('.pshow').hide();
    $('#cancol').hide();
    $('#pdone').hide();
    $('#pedit').show();
    $('#signoutcol').show();
    $('#resetcol').show();
    $('.error').hide();
    $('#imagepreview').attr('src',imagelocation);
  }); 

})