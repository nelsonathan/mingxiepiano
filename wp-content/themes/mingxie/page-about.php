<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="row about">
  <div class="container">

    <h1>About</h1>

    <p><?php the_field('about_content', $post->ID); ?></p>

  </div>
</div>

<div class="row gallery">
  <div class="container">

  </div>
</div>

<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
