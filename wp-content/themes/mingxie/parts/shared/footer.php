	<footer itemscope itemtype="http://schema.org/WPFooter">

		<div class="row contact">
		  <div class="container">

		    <h1>Contact</h1>

				<p><?php the_field('contact_intro', $post->ID); ?></p>

				<p>Phone: <?php the_field('phone_number', $post->ID); ?></p>

				<p>Email: <?php the_field('email_address', $post->ID); ?></p>

		  </div>
		</div>

		<div class="credit">
		  <div class="container">

		    <p>Designed &amp; Developed by Nathan Nelson</p>

		  </div>
		</div>

	</footer>
