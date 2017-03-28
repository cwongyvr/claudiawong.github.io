

jQuery(document).ready(function($) {

	/* MOBILE MENU STUFF */
	 $(' .mobile_menu_button ').on( "click", function() {
		 	$('.mobile_menu').find('.menu').slideToggle(200);
		});

	 $('.page_item_has_children').hover(
		function() {
		$( this).find('.children').slideToggle(200);
		}
	);

	 /* Slider Reset */
	$(".slide-marker:first-of-type").addClass("active");
	$(".slide:first-of-type").addClass("active");
	
	/* Set the Height of the slider wrapper and the slides */
	var viewportHeight = $(window).height() - 200;

	$('.slider-wrapper').height(viewportHeight);
	$('.slide').height(viewportHeight);
	/* Make Slider Height Update on Windows Resize */
	$(window).resize(function() {
		viewportHeight = $(window).height() - 200;
		
		$('.slider-wrapper').height(viewportHeight);
		$('.slide').height(viewportHeight);
	});
	
	/* Slider Marker Click */
	$(".slide-marker").click(function () {
		if (! $(this).hasClass("active")) {
			var active_marker = $(".slide-marker.active");
			var current_marker = $(this);
			
			var active_slide = $(".slide.active");
			
			//var distance = current_marker.index() - active_marker.index();
			var new_slide = $(".slide").eq(current_marker.index());
			
			active_marker.removeClass("active");
			current_marker.addClass("active");
			
			new_slide.fadeIn("slow", "easeInOutQuad", function () {
				active_slide.fadeOut("slow","easeInOutQuad");
			});
			new_slide.addClass("active");
			active_slide.removeClass("active");
		}
	});
	
	/* Slider Next */
	var index = 0;
	$(".slide-next").click(function () {
		var length = $(".slide-marker").length-1;
		//2
		var active_marker = $(".slide-marker.active");
		
		
		if (active_marker.index() == length) {
			index = 0;
		}
		else {
			index++;
		}
	
		active_marker.removeClass("active");
		$(".slide-marker").eq(index).addClass("active");
		
		var active_slide = $(".slide.active");
		var next_slide = $(".slide").eq(index);
		
		next_slide.fadeIn("slow", "easeInOutQuad", function () {
			active_slide.fadeOut("slow","easeInOutQuad");
		});
		
		next_slide.addClass("active");
		active_slide.removeClass("active");
	});
	
	
	/* Slider Prev */
	$(".slide-prev").click(function () {
		var length = $(".slide-marker").length-1;
		
		var active_marker = $(".slide-marker.active");
		var index = active_marker.index();
		
		if (active_marker.index() < 0) {
			index = 0;
		}
		else {
			index--;
		}
		
		active_marker.removeClass("active");
		$(".slide-marker").eq(index).addClass("active");
		
		var active_slide = $(".slide.active");
		var next_slide = $(".slide").eq(index);
		
		next_slide.fadeIn("slow", "easeInOutQuad", function () {
			active_slide.fadeOut("slow","easeInOutQuad");
		});
		
		next_slide.addClass("active");
		active_slide.removeClass("active");
	});
	

/*
.page-template-page-products-php .custom-table td:nth-of-type(1):before { content: "Grade A"; }
$( "td:nth-of-type(1)" )
.append( "<span> is 2nd sibling span</span>" )
.addClass( "nth" );

    $(".custom-table th").html;
	$( "td:nth-of-type(1)" ).attr('data-content','Grade A');
*/
//TODO - Chech if the page is contact or find a distributor
	 $('.gfield_required').html("(Required)");
});