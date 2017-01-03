<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<article itemscope itemtype="http://schema.org/Article">
    	<div itemprop="articleBody">
        	<h2><?php the_title(); ?></h2>
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
            <?php the_content(); ?>
			<?php comments_template( '', true ); ?>
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

<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>