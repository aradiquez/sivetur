
// ########################
// BACK TO TOP FUNCTION
// ########################


jQuery(document).ready(function(){
"use strict";
	jQuery("#OfertaCheckin, #OfertaCheckout" ).datepicker({
	  dateFormat: "dd/mm/yy"
	});
	// hide #back-top first
	jQuery("#back-top").hide();
	
	// fade in #back-top
	jQuery(function () {
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 700) {
				jQuery('#back-top').fadeIn();
			} else {
				jQuery('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		jQuery('#back-top a').click(function () {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 500);
			return false;
		});
		
				// scroll body to 0px on click
		jQuery('a#gotop2').click(function () {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 500);
			return false;
		});
		
		var jQueryih = jQuery('body').innerHeight();
		
		jQuery(".scroll").click(function(event){		
			event.preventDefault();
			jQuery('html,body').animate({scrollTop:jQuery(this.hash).offset().top - jQueryih}, 1500);
		});
		
		
		
		
		
	});
});

// ##################################
// INICTIALIZE CAROUSEL DETAILS PAGE
// #################################

$(function() {
"use strict";
	var $carousel = $('#carousel'),
		$pager = $('#pager');

	function getCenterThumb() {
		var $visible = $pager.triggerHandler( 'currentVisible' ),
			center = Math.floor($visible.length / 2);
		
		return center;
	}

	$carousel.carouFredSel({
		responsive: true,
		items: {
			visible: 1,
			width: 800,
			height: (500/800*100) + '%'
		},
		scroll: {
			fx: 'crossfade',
			onBefore: function( data ) {
				var src = data.items.visible.first().attr( 'src' );
				src = src.split( '/large/' ).join( '/small/' );

				$pager.trigger( 'slideTo', [ 'img[src="'+ src +'"]', -getCenterThumb() ] );
				$pager.find( 'img' ).removeClass( 'selected' );
			},
			onAfter: function() {
				$pager.find( 'img' ).eq( getCenterThumb() ).addClass( 'selected' );
			}
		},
		prev: {
			button: "#prev_btn2",
			key: "left"
		},
		next: {
			button: "#next_btn2",
			key: "right"
		},	
	});
	$pager.carouFredSel({
		width: '100%',
		auto: false,
		height: 120,
		items: {
			visible: 'odd'
		},
		onCreate: function() {
			var center = getCenterThumb();
			$pager.trigger( 'slideTo', [ -center, { duration: 0 } ] );
			$pager.find( 'img' ).eq( center ).addClass( 'selected' );
		}
	});
	$pager.find( 'img' ).click(function() {
		var src = $(this).attr( 'src' );
		src = src.split( '/small/' ).join( '/large/' );
		$carousel.trigger( 'slideTo', [ 'img[src="'+ src +'"]' ] );
	});
});










