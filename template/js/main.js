/*price range*/

$('#sl2').slider();

var RGBChange = function () {
	$('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
};

/*scroll to top*/
$(function () {
	//2. Получить элемент, к которому необходимо добавить маску

	$("#phone").mask("+38(999)-999-9999",{placeholder: "+38(___)-___-____"});
});

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});

	
	
});

$(document).ready(function (){
	
	$('#comment_form').on('submit', function(event) {
		event.preventDefault();
		
		var form_data = $(this).serialize();
		var id = $(this).attr("data-id");
		
		$.ajax({
			url: "/comments/addNewComment/" + id,
			method: "POST",
			data: form_data,
			dataType: "JSON",
			success: function(data) 
			{
				if (data.error != '') {
					$('#comment_form')[0].reset();
					$('#comment_message').html(data.error);
					$('#comment_id').val('0');
					load_comment();
				}
			}
		})
	});

	load_comment();
	function load_comment() {
		var id = $('#comment_form').attr("data-id");
		console.log(id);
		$.ajax({
			url: "/comments/loadComments/" + id,
			method: "POST",
			success: function(data) {
				$('#display-comment').html(data);
				
			}
		})
		
	}

	

	$(document).on('click', '.reply', function() {
		var comment_id = $(this).attr("id");
		$('#comment_id').val(comment_id);
		$('.form-control').focus();
	});

});

$(document).ready(function(){
	$(".add-to-cart").click(function () {
		var id = $(this).attr("data-id");
		$.post("/cart/addAjax/"+id, {}, function (data) {
			$("#cart-count").html(data);
		});
		return false;
	});

	
});

