<?php

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript"></script>
<script src="https://connect.facebook.net/en_US/all.js"></script>
<script>
	window.fbAsyncInit = function() {
		FB.init({
			appId            : '223527408203302',
			autoLogAppEvents : true,
			xfbml            : true,
			version          : 'v3.2'
		});
	};

	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "https://connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
<div id="fb-feed">
	Stuff
</div>