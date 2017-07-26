 //Example #3
$(function(){
	$("#momentStory").characterCounter({
		counterFormat: '%1 Karakter lagi.'
	});
});

$(document).ready(function() {
						   
	$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
	$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: false});
	$('a.origin').each(function() {
		var src = $(this).attr("href");
		$(this).attr("href", src.replace(/\.png$/i, ".original.jpeg"));
	});
	
	$("#dataform").validate();
	
	$('#email_check').blur(function(){
		var query_string = $(this).val();
		if(query_string.length>6)
		{
			var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
			if (!(filter.test(query_string))) {
				$('#result_email').html('Please enter a valid email address');
				$('#result_email').addClass('show');
				return false;
			}
			
			$.ajax({
				type: "POST",
				url: "email_valid.php",
				data: { name:query_string },
				success: function(data)
				{
					if(data=='exist')
					{
						$('#result_email').html('Email already exist');
						$('#result_email').addClass('show');
						$('.login-submit').attr('disabled', 'disabled');
					}
					else
					{
						$('#result_email').removeClass('show');
					}				
				}
			});
		}
	});
	

});