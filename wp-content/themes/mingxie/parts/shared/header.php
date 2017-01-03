<header itemscope itemtype="http://schema.org/WPHeader" style="background:url('<?php the_field('background_image', $post->ID); ?>')">

	<div class="logo">
		<div class="container">
			<img src="<?php the_field('logo', $post->ID); ?>" />
		</div>
	</div>

	<div class="row title">
		<div class="container">

			<div class="col-md-6 name">
				<h1>Ming Xie</h1>
				<h2>Classical Pianist</h2>
			</div>

			<div class="col-md-6 intro">
				<p><?php the_field('intro_text', $post->ID); ?></p>
			</div>

		</div>
	</div>

</header>
