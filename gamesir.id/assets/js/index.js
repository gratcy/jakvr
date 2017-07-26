/* ===== Tooltips ===== */

$('#tooltip').tooltip();
$(".item:first-child").addClass("active");

$(document).ready(function(){
    $('a[href*=#index-slider],a[href*=#main-services], a[href*=#responsive-tag-banner], a[href*=#produce-video], a[href*=#link-fast]').bind("click", function(e){
      var anchor = $(this);
      $('html, body').stop().animate({
        scrollTop: $(anchor.attr('href')).offset().top
      }, 1000);
      e.preventDefault();
	  anchor.addClass("active").siblings().removeClass();
    });
   return false;
});