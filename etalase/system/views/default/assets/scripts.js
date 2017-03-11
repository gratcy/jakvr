// Set the minimum height for the right side
function jgtMinHeight(){
	var leftWrap = $('.left-wrap'),
		rightWrap = $('.right-wrap');

	if ( Modernizr.mq('only screen and (max-width: 1200px)') == true ) {
		rightWrap.css({ 'min-height': $(window).height() - leftWrap.height() });
	} else {
		rightWrap.removeAttr('style');
	}
}


function product_ajax_click(classname) {
	
		$('.'+classname+' > li > a').click(function(){
			$('#keyword').val($(this).attr('title'));
			$.post($('#newsletter-form').attr('action'), $('#newsletter-form').serialize(), function(data){
				$('.newsletter').find('.spinner').animate({opacity: 0}, function(){
					$(this).hide();
					$('.fadeInRight').html('');
					$('.fadeInRight').append(data);
					$(window).Slider();
				});
			});
		});
		
}

// Add tabs functionality to the right side content
function jgtContentTabs(){
	var tabsNav = $('#menu'),
		tabsWrap = $('#main');

	tabsWrap.find('.main-section:gt(0)').hide();
	//~ tabsNav.find('li:first').addClass('active');
	tabsNav.find('a').click(function(e){
		tabsWrap.find('.main-section').hide();
		tabsWrap.find($($(this).attr('href'))).fadeIn(800);
		//~ tabsNav.find('li').removeClass('active');
		//~ $(this).parent().addClass('active');
		e.preventDefault();

			$('#keyword').val($(this).attr('title'));
			$.post($('#newsletter-form').attr('action'), $('#newsletter-form').serialize(), function(data){
				$('.newsletter').find('.spinner').animate({opacity: 0}, function(){
					$(this).hide();
					$('.fadeInRight').html('');
					$('.fadeInRight').append(data);
					$(window).Slider();
				});
			});

		// Fix background
		$('.left-wrap .bg').backstretch('resize');

	});
}

(function($){

	$.fn.Slider = function() {
	var jssor_1_options = {
	  $AutoPlay: true,
	  $BulletNavigatorOptions: {
		$Class: $JssorBulletNavigator$
	  },
	  $ThumbnailNavigatorOptions: {
		$Class: $JssorThumbnailNavigator$,
		$Cols: 3,
		$Align: 200
	  }
	};

	var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

	/*responsive code begin*/
	/*you can remove responsive code if you don't want the slider scales while window resizing*/
	function ScaleSlider() {
		var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
		if (refSize) {
			refSize = Math.min(refSize, 600);
			jssor_1_slider.$ScaleWidth(refSize);
		}
		else {
			window.setTimeout(ScaleSlider, 30);
		}
	}
	ScaleSlider();
	$(window).bind("load", ScaleSlider);
	$(window).bind("resize", ScaleSlider);
	$(window).bind("orientationchange", ScaleSlider);
};
	// Declare global variables
	$(window).on('load', function(){

		// Remove loading indicator
		setTimeout(function(){
			$('#preload-content').fadeOut(400, function(){
				$('#preload').fadeOut(800);				
				$('.fadeInLeft, .fadeInRight').addClass('animate');
			});
		}, 400);

	});

	$(document).ready( function(){
		$('select[name="categories"]').change(function() {
			var order = $('select[name="order"]').val()
			$.post(SITE_URL + 'process/variation_all', {categories: $(this).val(),order: order}, function(data){
				$('.all-variation > li').remove();
				$('.all-variation').html(data);
			});
		});
		$('select[name="order"]').change(function() {
			var categories = $('select[name="categories"]').val()
			$.post(SITE_URL + 'process/variation_all', {categories: categories,order: $(this).val()}, function(data){
				$('.all-variation > li').remove();
				$('.all-variation').html(data);
			});
		});
		product_ajax_click('all-variation');
		// Create a countdown instance. Change the launchDay according to your needs.
		// The month ranges from 0 to 11. I specify the month from 1 to 12 and manually subtract the 1.
		// Thus the launchDay below denotes 5 December, 2015.
		var launchDay = new Date(2017, 12-1, 5);
		$('#countdown-timer').countdown({
			until: launchDay,
			format: 'DHMS'
		});

		// Add background image
		$('.left-wrap .bg').backstretch([
			ASSETS + 'bg4.jpg',
			ASSETS + 'bg2.jpg',
			ASSETS + 'bg3.jpg'
		], {
			fade: 750,
			duration: 4000
		});

		// Invoke the Placeholder plugin
		$('input, textarea').placeholder();

		// Validate newsletter form
		$('<div class="spinner"><div class="square"></div><div class="square"></div><div class="square"></div><div class="square"></div></div>').hide().appendTo('.newsletter');
		$('<div class="success"></div>').hide().appendTo('.newsletter');
		$('#newsletter-form').validate({
			rules: {
				keyword: { required: true }
			},
			messages: {
				keyword: {
					required: 'Keyword required'
				}
			},
			errorElement: 'span',
			errorPlacement: function(error, element){
				error.appendTo(element.parent());
			},
			submitHandler: function(form){
				//~ $(form).hide();
				$('.newsletter').find('.spinner').css({ opacity: 0 }).show().animate({ opacity: 1 });
				$.post($(form).attr('action'), $(form).serialize(), function(data){
					$('.newsletter').find('.spinner').animate({opacity: 0}, function(){
						$(this).hide();
						$('.fadeInRight').html('');
						$('.fadeInRight').append(data);
						if ($('#jssor_1').length > 0) {
							$(window).Slider();
						}
					});
				});
				return false;
			}
		});

		// Add tabs functionality to the right side content
		jgtContentTabs();
		
		// Set the minimum height for the right side and bind on resize or orientation change
		jgtMinHeight();
		$(window).bind('resize orientationchange', function(){
			jgtMinHeight();
		});

	});

    $( "#keyword" ).autocomplete({
      source: SITE_URL + "process/variation_list"
    });
    
	$( document ).ajaxComplete(function() {
		jgtContentTabs();
		jgtMinHeight();
		$(window).bind('resize orientationchange', function(){
			jgtMinHeight();
		})
	});

})(jQuery);

	
