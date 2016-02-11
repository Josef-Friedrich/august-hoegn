$(document).ready(function() {
  var pathname = window.location.pathname;

  $("nav#nav a").each(function(index) {
    if (pathname === $(this).attr('href') ) {
      $(this).parent('li').addClass("current");
    }
  });
});