	</div> <!--end .wrapper-->
</div><!--end .site-container-->

<div class="footer">
	<div class="footer-wrapper">
		<div class="bs-row">

			<div class="col-sm-6 col-md-3">
				<ul class="footer-nav">
					<li>
						<a href="/approach-integrated-security-services">Our Approach</a>
						<ul>
							<li><a href="/approach-integrated-security-services/#strategy">Strategy</a></li>
							<li><a href="/approach-integrated-security-services/#engineering">Engineering &amp; Design</a></li>
							<li><a href="/approach-integrated-security-services/#implementation">Implementation</a></li>
							<li><a href="/approach-integrated-security-services/#support">Lifecycle Support</a></li>
						</ul>
					</li>
				</ul>
			</div>

			<div class="col-sm-6 col-md-3">
				<ul class="footer-nav">
					<li>
						<a href="/solutions-corporate-business-security-systems">Solutions</a>
						<ul>
							<?php wp_list_pages(array(
								'child_of' => 28,
								'title_li' => false,
								'depth' => 1,
								'exclude' => implode(',', get_option('exclude-from-nav'))
							)); ?>
						</ul>
					</li>
				</ul>
			</div>

			<div class="col-sm-6 col-md-3">
				<ul class="footer-nav">
					<li>
						<a href="/success-center">Success Center</a>
						<ul>
							<?php wp_list_pages(array(
								'child_of' => 8,
								'title_li' => false,
								'depth' => 1,
								'exclude' => implode(',', get_option('exclude-from-nav'))
							)); ?>
						</ul>
					</li>
					<li>
						<a href="/contract-vehicles">Contract Vehicles</a>
						<ul>
							<?php wp_list_pages(array(
								'child_of' => 55,
								'title_li' => false,
								'depth' => 1,
								'exclude' => implode(',', get_option('exclude-from-nav'))
							)); ?>
						</ul>
					</li>
					<li>
						<a href="/about-business-security-company-security-engineering">About IST</a>
						<ul>
							<?php wp_list_pages(array(
								'child_of' => 2,
								'title_li' => false,
								'depth' => 1,
								'exclude' => implode(',', get_option('exclude-from-nav'))
							)); ?>
	 					</ul>
					</li>
				</ul>
			</div>

			<div class="col-sm-6 col-md-3">
				<div class="text-left">
					<ul class="footer-nav">
						<li style="margin-bottom:5px;">
							<a href="/contact-us">Contact us</a>
							<ul>
								<li>Connect with us via social media</li>
							</ul>
						</li>
					</ul>
					<br>
					<?php echo do_shortcode('[ist_social]'); ?>
					<p class="contact">
						520 Herndon Pkwy, Suite C<br>
						Herndon, VA 20170<br>
						<a href="https://www.google.com/maps/dir//520+Herndon+Pkwy+c,+Herndon,+VA+20170/@38.9557748,-77.4495654,12z/data=!3m1!4b1!4m8!4m7!1m0!1m5!1m1!1s0x89b647fd41744da9:0xbde94e1e912678c3!2m2!1d-77.3795256!2d38.9557957" target="_blank">Directions &gt;</a><br>
					<a href="<?php bloginfo('template_url'); ?>/contact-us">Call us ></a><br>
						VA DCJS #11-5536  |  MD # 107-1835
					</p>
				</div>
			</div>

			<div class="col-xs-12 col-sm-6 attribution">
				<p>SITE DESIGNED BY <a href='http://www.pomagency.com/' target='_blank'>POMERANTZ MARKETING</a></p>
			</div>

			<div class="col-xs-12 col-sm-6 copyright">
				<p>&copy; IST <?php echo date('Y'); ?>, ALL RIGHTS RESERVED.</p>
			</div>
		</div>
	</div>
</div>


<?php wp_footer(); ?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-35973808-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</body>
</html>
