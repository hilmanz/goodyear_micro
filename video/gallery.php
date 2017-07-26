<?php
include('config.php');

include("config.inc.php");

$results = mysqli_query($connecDB,"SELECT COUNT(*) FROM $tbl_name WHERE n_status=1");
$get_total_rows = mysqli_fetch_array($results); //total records

//break total records into pages
$total_pages = ceil($get_total_rows[0]/$item_per_page);	

?>
<script type="text/javascript">
$(document).ready(function() {
	var track_click = 0; //track user click on "load more" button, righ now it is 0 click
	var track_click2 = 0; //track user click on "load more" button, righ now it is 0 click
	var total_pages = <?php echo $total_pages; ?>;
	$('#results').load("fetch_pages.php", {'page':track_click}, function(){
		track_click++;	   
		$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
		$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: false});
		$('a.origin').each(function() {
			var src = $(this).attr("href");
			$(this).attr("href", src.replace(/\.png$/i, ".original.jpeg"));
		});
	}); //initial data to load
	$(".load_more").click(function (e) { //user clicks on button
		$(this).hide(); //hide load more button on click
		$('.animation_image').show(); //show loading image
		if(track_click <= total_pages) //make sure user clicks are still less than total pages
		{
			//post page number and load returned data into result element
			$.post('fetch_pages.php',{'page': track_click}, function(data) {
			
				$(".load_more").show(); //bring back load more button
				
				$("#results").append(data); //append data received from server
				
				//scroll page to button element
				$("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);
				
				//hide loading image
				$('.animation_image').hide(); //hide loading image once data is received
	
				track_click++; //user click increment on load button
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
				$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: false});
				$('a.origin').each(function() {
					var src = $(this).attr("href");
					$(this).attr("href", src.replace(/\.png$/i, ".original.jpeg"));
				});
			
			}).fail(function(xhr, ajaxOptions, thrownError) { 
				alert(thrownError); //alert any HTTP error
				$(".load_more").show(); //bring back load more button
				$('.animation_image').hide(); //hide loading image once data is received
			});
			if(track_click >= total_pages-1)
			{
				//reached end of the page yet? disable load button
				$(".load_more").attr("disabled", "disabled");
			}
		 }
		  
	});
	
	$('#results2').load("fetch_pages2.php", {'page':track_click2}, function() {
		track_click2++;
		
		$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
		$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: false});
		$('a.origin').each(function() {
			var src = $(this).attr("href");
			$(this).attr("href", src.replace(/\.png$/i, ".original.jpeg"));
		});
		}); //initial data to load
	$(".load_more2").click(function (e) { //user clicks on button
		$(this).hide(); //hide load more button on click
		$('.animation_image2').show(); //show loading image
		if(track_click2 <= total_pages) //make sure user clicks are still less than total pages
		{
			//post page number and load returned data into result element
			$.post('fetch_pages2.php',{'page': track_click2}, function(data) {
			
				$(".load_more2").show(); //bring back load more button
				
				$("#results2").append(data); //append data received from server
				
				//scroll page to button element
				$("html, body").animate({scrollTop: $("#load_more_button2").offset().top}, 500);
				
				//hide loading image
				$('.animation_image2').hide(); //hide loading image once data is received
	
				track_click2++; //user click increment on load button
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
				$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: false});
				$('a.origin').each(function() {
					var src = $(this).attr("href");
					$(this).attr("href", src.replace(/\.png$/i, ".original.jpeg"));
				});
			
			}).fail(function(xhr, ajaxOptions, thrownError) { 
				alert(thrownError); //alert any HTTP error
				$(".load_more2").show(); //bring back load more button
				$('.animation_image2').hide(); //hide loading image once data is received
			});
			if(track_click2 >= total_pages-1)
			{
				//reached end of the page yet? disable load button
				$(".load_more2").attr("disabled", "disabled");
			}
		 }
		  
	});
});
</script>
<div id="gallery" class="sections">    
    <section id="listImages">
    
    	<div class="container gallery">
        	<div class="rowImages">
            	<h2 class="titleList">PERSIAPAN MUDIK</h2>
            	<div class="row">
                                                            
                    <div id="results"></div>
                    <div class="pagingrow">
                        <button class="load_more button" id="load_more_button">load More</button>
                        <div class="animation_image" style="display:none;"><img src="images/loading.gif"></div>
                    </div>
					
                </div><!--.row-->
            </div><!--end.rowImages-->
            
            
        	<div class="rowImages">
            	<h2 class="titleList">MOMEN MUDIK</h2>
            	<div class="row">               
                    <div id="results2"></div>
                    <div class="pagingrow">
                        <button class="load_more2 button" id="load_more_button2">load More</button>
                        <div class="animation_image2" style="display:none;"><img src="images/loading.gif"></div>
                    </div>
                </div><!--.row-->
            </div><!--end.rowImages-->
        </div><!--end.container-->
    </section>
</div><!---#hompage--->

