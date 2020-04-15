<?php $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
<div class="fixed-socials">
	<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" class="social facebook" target="_blank">
		<i class="fa fa-facebook-f"></i>
	</a>
	<a target="_blank" href="https://twitter.com/home?status=<?php echo urlencode($url); ?>" class="social twitter">
		<i class="fa fa-twitter"></i>
	</a>
	<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($url); ?>&title=IST%20Online&summary=&source=" class="social linkedin">
		<i class="fa fa-linkedin"></i>
	</a>
</div>
