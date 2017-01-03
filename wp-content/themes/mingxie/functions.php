<?php

	/* Required External Third Party Files */

	require_once('external/starkers-utilities.php' );

	/* Cleaner theme calls...and easier to remember */

	define('BASE_URL',get_bloginfo('url'));
	define('THEME_URL',get_bloginfo('template_url'));
	define('CURRENT_PATH','http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

	/* Add Support For Post Thumbnails */

	add_theme_support('post-thumbnails');
	add_image_size( 'social-facebook', 600, 600 );

	/* Add Support For Basic Navigation */

	register_nav_menus(array('Top' => 'Top Navigation'));
	register_nav_menus(array('Side' => 'Side Navigation'));
	register_nav_menus(array('Bottom' => 'Bottom Navigation'));

	/* Necessary Actions and Filters */

	add_action( 'wp_enqueue_scripts', 'script_enqueuer' );
	add_filter( 'body_class', 'add_slug_to_body_class' );

	function script_enqueuer() {
		wp_register_script( 'site', get_template_directory_uri().'/js/custom.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );

		wp_register_style( 'screen', get_template_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}

	/* Custom Starkers Callback for Posting Comments */

	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</div></article>
		<?php endif; ?>
		</li>
		<?php
	}

	/* ACF Options Page */

	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
			'page_title' 	=> 'MX Settings',
			'menu_title'	=> 'MX Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Homepage',
			'menu_title'	=> 'Homepage',
			'parent_slug'	=> 'theme-general-settings',
		));

		// acf_add_options_sub_page(array(
		// 	'page_title' 	=> 'Theme Footer Settings',
		// 	'menu_title'	=> 'Footer',
		// 	'parent_slug'	=> 'theme-general-settings',
		// ));

	}

	/*	Change Admin Login Logo */

	add_action("login_head", "client_logo");
	add_filter( 'login_headerurl', 'client_loginlogo_url' );
	function client_logo() {
	    echo "
	    <style>
	    #login { width:340px; padding:4% 0 0; }
	    body.login { background:#ffffff; }
	    body.login #login h1 a {
	        background: url('".get_bloginfo('template_url')."/img/cv6logo.png') no-repeat scroll center top transparent;
	        height: 84px;
	        width: 340px;
	    }
	    .login #nav a, .login #backtoblog a { color:#43c5e4!important; text-shadow:none!important; }
	    .wp-core-ui .button-primary { background:#43c5e4!important; border:none; text-shadow:none; }
	    </style>
	    ";
	}
	function client_loginlogo_url($url) {
		return get_bloginfo('url');
	}

	/* Get Word Count */

	function word_count() {
    	$content = get_post_field( 'post_content', $post->ID );
    	$word_count = str_word_count( strip_tags( $content ) );
    	return $word_count;
	}

	/* Navigation 4.1.1 */

	class CSS_Menu_Walker extends Walker {
		var $db_fields = array('parent' => 'menu_item_parent', 'id' => 'db_id');
		function start_lvl(&$output, $depth = 0, $args = array()) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul>\n";
		}
		function end_lvl(&$output, $depth = 0, $args = array()) {
			$indent = str_repeat("\t", $depth);
			$output .= "$indent</ul>\n";
		}
		function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
			global $wp_query;
			$indent = ($depth) ? str_repeat("\t", $depth) : '';
			$class_names = $value = '';
			$classes = empty($item->classes) ? array() : (array) $item->classes;
			if (in_array('current-menu-item', $classes)) {
				$classes[] = 'active';
				unset($classes['current-menu-item']);
			}
			$children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
			if (!empty($children)) {
				$classes[] = 'has-sub';
			}
			$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
			$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
			$id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
			$id = $id ? ' id="' . esc_attr($id) . '"' : '';
			$output .= $indent . '<li' . $id . $value . $class_names .'>';
			$attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
			$attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target    ) .'"' : '';
			$attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) .'"' : '';
			$attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url       ) .'"' : '';
			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'><span>';
			$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
			$item_output .= '</span></a>';
			$item_output .= $args->after;
			$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
		}
		function end_el(&$output, $item, $depth = 0, $args = array()) {
			$output .= "</li>\n";
		}
	}

	// Bootstrap pagination function

	function wp_bs_pagination($pages = '', $range = 4) {
		$showitems = ($range * 2) + 1;
		global $paged;
		if(empty($paged)) $paged = 1;
		if($pages == '') {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages) {
				$pages = 1;
			}
		}
		if(1 != $pages) {
			echo '<div class="text-center">';
			echo '<nav><ul class="pagination"><li class="disabled hidden-xs"><span><span aria-hidden="true">Page '.$paged.' of '.$pages.'</span></span></li>';
			if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."' aria-label='First'>&laquo;<span class='hidden-xs'> First</span></a></li>";
			if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."' aria-label='Previous'>&lsaquo;<span class='hidden-xs'> Previous</span></a></li>";
			for ($i=1; $i <= $pages; $i++) {
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
					echo ($paged == $i)? "<li class=\"active\"><span>".$i." <span class=\"sr-only\">(current)</span></span>
					</li>":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
				}
			}
			if ($paged < $pages && $showitems < $pages) echo "<li><a href=\"".get_pagenum_link($paged + 1)."\"  aria-label='Next'><span class='hidden-xs'>Next </span>&rsaquo;</a></li>";
			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."' aria-label='Last'><span class='hidden-xs'>Last </span>&raquo;</a></li>";
			echo "</ul></nav>";
			echo "</div>";
		}
	}

?>
