	function addKalender(){
		document.getElementById("add").innerHTML="Test";
	}
	
$("#btnCreatePost").on("click",function(e){
		
		var update = $("#post").val();
		
		// AJAX CALL naar ajax/save_tweet.php
		var request = $.ajax({
		url: "ajax/save_post.php",
		type: "POST",
		data: {update : update}, 
		dataType: "json"
		});
	
		
		request.done(function(msg) {
		if(msg.status = "sucess")
		{
			// OK
			var li = '<li style="display:none;" class="clearfix">'+
					'<p> '+update+'</p>'+
					'</li>';
					// prepend, bovenaan in html bijvoegen
			$("#tweets ul").prepend(li);
			// $("#tweet ul li:first-child"); //alle browsers kennen niet alle features
			$("#tweets ul li").first().slideDown(); //alle browsers kennen niet alle features
			//$("#post").empty();

		}
		else
		{
			// NIET OK
		}
		});
	
		request.fail(function(jqXHR, textStatus) {
		alert( "Request failed: " + textStatus );
		});
		
		e.preventDefault(); 
		// houdt tegen dat als je klikt op de submit knop dat er een lege post in de tbl komt 
		// en tevoorschijn komt bij de posts
		
	}); 
