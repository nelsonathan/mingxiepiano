<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="row about">
  <div class="container">

    <h1>About</h1>

    <p><?php the_field('about_intro', $post->ID); ?></p>

    <p class="more-info">
      <a href="<?php site_url(); ?>/about">Learn More</a>
    </p>

  </div>
</div>

<div class="row gallery">
  <div class="container">

  </div>
</div>

<div class="row shows">
  <div class="container">

    <h1>Upcoming Shows</h1>

    <ul>

    <?php if( have_rows('shows', $post->ID) ): ?>
    <?php while ( have_rows('shows', $post->ID) ) : the_row(); ?>

        <li>
          <p><?php the_sub_field('date'); ?></p>
        </li>

        <li>
          <p><?php the_sub_field('venue'); ?></p>
        </li>

        <li>
          <p class="more">
            <a href="<?php the_sub_field('link'); ?>">More Info</a>
          </p>
        </li>

    <?php endwhile;
    else :
        // no rows found
    endif; ?>

  </div>
</div>

<div class="row videos">
  <div class="container">

    <h1>Videos</h1>

  </div>
</div>

<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
