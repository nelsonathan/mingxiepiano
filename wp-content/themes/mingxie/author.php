<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ): the_post(); ?>

<h2>Author Archives: <?php echo get_the_author() ; ?></h2>

<?php if ( get_the_author_meta( 'description' ) ) : ?>
	<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
	<h3>About <?php echo get_the_author() ; ?></h3>
	<?php the_author_meta( 'description' ); ?>
<?php endif; ?>

<?php while ( have_posts() ) : the_post(); ?>
	<article itemscope itemtype="http://schema.org/Article">
    	<div itemprop="articleBody">
		<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate itemprop="datePublished"><?php the_date(); ?> <?php the_time(); ?></time>
        <p class="muted" itemprop="author" itemscope itemtype="http://schema.org/Person">
        	Posted by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" itemprop="url"><span itemprop="name"><?php echo get_the_author() ; ?></span></a>
        </p>
        <p class="muted" itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
        	<small itemprop="name">
            	<?php bloginfo( 'name' ); ?>
            </small>
            <meta itemprop="datePublished" content="<?php the_date(); ?> <?php the_time(); ?>">
        </p>
		<?php the_excerpt(); ?>
        <div><?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?></div>
		</div>
    </article>
    <?php if (has_post_thumbnail( $post->ID ) ) { ?>
    	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?>
        <meta itemprop="thumbnailUrl" content="<?php echo $image[0]; ?>" />
        <meta itemprop="image" content="<?php echo $image[0]; ?>" />
	<?php } else { ?>
        <?php $image = ""; ?>
    <?php } ?>
    <meta itemprop="inLanguage" content="<?php bloginfo( 'language' ); ?>" />
    <meta itemprop="interactionCount" content="UserComments:<?php comments_number( '0', '1', '%' ); ?>" />
    <meta itemprop="wordCount" content="<?php echo word_count(); ?>" />
<?php endwhile; ?>

<?php else: ?>
	<h2>No posts to display for <?php echo get_the_author() ; ?></h2>	
<?php endif; ?>

<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>