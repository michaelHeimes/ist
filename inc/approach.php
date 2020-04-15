<?php include('ist-options.php'); ?>

<div class="approach-panel strategy">
			<h2>Strategy</h2>
		<?php if ($options['approach-strategy-sub'] == true){ ?>
			<h4><?php echo $options['approach-strategy-sub']; ?></h4>
		<?php }else{ ?>
			<h4>We listen. We do our homework. We think from the end.</h4>
		<?php } ?>
		<?php if($options['approach-strategy-editor'] == true) { ?>
			<?php echo wpautop($options['approach-strategy-editor']); ?>
		<?php }else { ?>
			<p>Using a holistic perspective, IST assesses your entire security landscape and determines the requirements for meeting your objectives. We then define a multi-faceted strategy for implementing a state-of-the-art solution that evolves with your ever-changing environment. Here are the steps we take to define a strategy that is on-target for achieving your goals:</p>
	
			<p><span class="orange">Needs Assessment:</span> Using a holistic approach, we assess your business environment, operations and security challenges. We then determine risk and strategize on how to eliminate and mitigate its impact on your organization.</p>
	
			<p><span class="orange">Technology Recommendations:</span> Leveraging years of industry experience and relationships with best-of-breed technology partners, we recommend the appropriate technologies for your software, hardware and infrastructure that will support your immediate requirements and evolve with you in the future.</p>
	
			<p><span class="orange">Finalization of Strategy:</span> Once your technology solution has been selected, we define a rough order of magnitude for budgetary funding requirement purposes. We then develop a mutually agreeable project plan with timeline and, if necessary, provide you with guidance on options for contract vehicle.</p>
		
		<?php } ?>	
			
			<p>Once the strategy has been defined, we move into the <span class="panel-nexter engineering">Engineering & Design Phase &gt;</span></p>
</div><!--end .approach-panel-->

<div class="approach-panel engineering">
			<h2>Engineering &amp; Design</h2>
			
		<?php if ($options['approach-engineering-sub'] == true){ ?>
			<h4><?php echo $options['approach-engineering-sub']; ?></h4>
		<?php }else{ ?>
			<h4>Solutions that are created to live well within the environments they are intended to secure</h4>
		<?php } ?>
		<?php if($options['approach-engineering-editor'] == true) { ?>
			<?php echo wpautop($options['approach-engineering-editor']); ?>
		<?php }else { ?>
			<p>Once the strategy has been defined, IST’s seasoned team of technology specialists and engineers devise a customized solution based on your objectives. We develop comprehensive technical designs and documentation demonstrating the software, hardware and infrastructure of your system including critical components such as:</p>

			<ul>
				<li>Security Management Systems</li>
				<li>Physical Security Detection and Deterrence</li> 
				<li>Video Surveillance and Analysis</li> 
				<li>Network Engineering and Cyber Security</li> 
				<li>Software Application Development</li> 
			</ul>

			<p>Through a thorough check and balance method, we perform in-house engineering reviews, provide managerial oversight and recommendations. Our eyes are trained on security at all times, and we maintain a strict client confidentiality code throughout the engineering and designing process. As a certified systems integrator of top-tier technology products and high-level vendor certifications, we are able to leverage our strategic partnerships to compound our expertise. Additionally, our engineering team holds up-to-date certifications in all key technologies, setting us worlds apart from most security providers.</p>
			
			<p>IST designs security solutions that live seamlessly within the environments that they are intended to secure. We rigorously assess, analyze, strategize, refine, implement, test and evaluate each solution we create. We make certain the solutions we deploy are continuously working properly and achieving our clients’ ongoing security needs and objectives.</p>
			
			<?php } ?>

			<p>Once this phase is complete, we move into the <span class="panel-nexter implementation">Implementation Phase &gt;</span></p>
</div><!--end .approach-panel-->

<div class="approach-panel implementation">
			<h2>Implementation</h2>
			<?php if ($options['approach-implementation-sub'] == true){ ?>
				<h4><?php echo $options['approach-implementation-sub']; ?></h4>
			<?php }else{ ?>
				<h4>Our disciplined approach ensures the quality of your investment</h4>
			<?php } ?>
			<?php if($options['approach-implementation-editor'] == true) { ?>
				<?php echo wpautop($options['approach-implementation-editor']); ?>
			<?php }else { ?>

			<p>In this phase, concept gives way to IST’s disciplined, ISO-driven process. We’re ISO 9001:2008 registered without exceptions. This enables our highly trained support team of project managers, engineers, and technicians to effectively manage the sophisticated integration requirements and the demands of complex installations.</p> 
			
			<p>Our project managers oversee all aspects of the project, including the authority to task the engineering department, procure materials, and allocate personnel resources as required. They manage critical milestones, like construction schedules, material delivery schedules, manpower loading requirements, and ultimately, the successful completion of the project within the established schedule and budget. They also interact regularly with key corporate management. This is how we ensure that our project managers shepherd the deployment of your solution smoothly through to completion.</p>
			
			<p>Beyond the physical installation of your system, IST believes it is equally important to provide you with a complete understanding of your system post turnover. To that end, we walk you through a complete system test and checkout and create and deliver a customized training program tailored to your specific needs. We also provide you with comprehensive documentation on your system to support your investment.</p>
			
			<?php } ?>
			
			<p>Now, we move into the final phase: <span class="panel-nexter support">Lifecycle Support &gt;</span></p>
</div><!--end .approach-panel-->

<div class="approach-panel support">
			<h2>Lifecycle Support</h2>
			<?php if ($options['approach-support-sub'] == true){ ?>
				<h4><?php echo $options['approach-support-sub']; ?></h4>
			<?php }else{ ?>
				<h4>Securing your investment well into the future</h4>
			<?php } ?>
			<?php if($options['approach-support-editor'] == true) { ?>
				<?php echo wpautop($options['approach-support-editor']); ?>
			<?php }else { ?>

			

			<p>As your long-term partner, IST will create a custom support plan tailored to your specific needs. From maintenance, ongoing training and change management, we are committed to securing your investment for years to come.</p>

			<p><span class="orange">Our support services include:</span></p>
			<ul>
				<li>A real-time response center with a 24/7 support</li>
				<li>Ongoing preventive maintenance including C&A requirements</li>
				<li>Refresher training to address personnel changes</li> 
				<li>Continual reassessment of your requirements as your business environment changes</li> 
				<li>Insight into leading edge technologies through our state-of-the-art demo center</li>
			</ul>

			<p>Rather than have you conform to our needs, we tailor our support services to your particular needs and budget. It’s the support you need without the excess programs or costs you don’t.</p>

			<p><a href="/solutions">View a complete list of our other support services &gt;</a></p>
			<?php } ?>
			
</div><!--end .approach-panel-->