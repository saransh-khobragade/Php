<html>
<head>
<title>WatchFree</title>
<link rel="stylesheet" href="style.css"/>
<script src="https://code.jquery.com/jquery-1.6.2.min.js"></script>

<script type="text/javascript">
function reply_click(clicked_id)
{
    $('#lightbox').css("visibility","visible");
	$('#lightbox').css("background", "url(overlay.png) repeat");
	$('#lightbox').css("z-index", "3");
	var image_href=clicked_id;
	if ($('#lightbox').length > 0) { // #lightbox exists
			
			//place href as img src value
			$('#content').html('<video type="video/mp4" controls src="' + image_href + '" />');
		   	
			//show lightbox window - you could use .show('fast') for a transition
			$('#lightbox').show();
		}
		
		else { //#lightbox does not exist - create and insert (runs 1st time only)
			
			//create HTML markup for lightbox window
			var lightbox = 
			'<div id="lightbox">' +
				'<p>Click to close</p>' +
				'<div id="content">' + //insert clicked link's href into img src
					'<video type="video/mp4"  controls autoplay src="' + image_href +'" />' +
				'</div>' +	
			'</div>';
				
			//insert lightbox HTML into page
			$('body').append(lightbox);
		}
		
	
	
	//Click anywhere on the page to get rid of lightbox window
	$('#lightbox').live('click', function() { //must use live, as the lightbox element is inserted into the DOM
		$('#lightbox').hide();
	});
	
	
	
}
</script>
</head>
<body>

<span>
<input type="text" id="search_box"/>
<button id="search_button">Search Serials</button>

</span>


<div id="search_result"></div>
<div id="linkbox" ></div>


<script src='index.js'></script>




<div id="lightbox">
    <b1>CLOSE</b1>
    <div id="content">
       <video type="video/mp4" controls autoplay src="#" ></video>
       
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.6.2.min.js"></script>



</body>

</html>