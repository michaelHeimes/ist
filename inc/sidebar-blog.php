<div class="blog-sidebar">

	<form class="search-form" role="search" action="/" method="get">
		<input type="text" name="s" class="search-input" value="" placeholder="Search...">
		<input type="submit" class="search-submit" value="">
		<input type="hidden" name="type" value="blog">
		<i class="fa fa-search"></i>
	</form>

	<div class="socials cf">
		<a href="https://www.facebook.com/ISTIncOfficial/" class="social facebook">
			<i class="fa fa-facebook-f"></i>
		</a>
		<a href="https://twitter.com/ISTIncOfficial" class="social twitter">
			<i class="fa fa-twitter"></i>
		</a>
		<a href="https://www.linkedin.com/company-beta/2767639/" class="social linkedin">
			<i class="fa fa-linkedin"></i>
		</a>
	</div>

	<div class="categories">
		<h3>Categories</h3>
		<ul>
		    <?php wp_list_categories( array(
		        'exclude'  => array( 1 ),
		        'title_li' => '',
				'hide_empty' => false
		    ) ); ?>
		</ul>
	</div>

	<div class="subscribe">
		<h3>Subscribe By Email</h3>
		<p>Sign up now for insights and industry happenings from IST.</p>
		<form action="/" method="post" class="subscribe-form">
			<input type="text" class="subscribe-name" name="first-name" value="" style="display:none;">
			<input type="text" name="" value="" class="subscribe-input" placeholder="Your email address">
			<input type="submit" name="" value="Sign Up  >" class="subscribe-submit btn btn-orange">
		</form>
		<div class="subscribe-success">Email submitted. Thanks!</div>
	</div>
</div>
