<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>
<div class="breadcrumb_custom"><div class='container_bread'><?php get_breadcrumb(); ?></div></div>
<div class='container_single_post'>
<div id='left_panel_blog'>
<div class="custom_title"><?php echo get_the_title(); ?></div>
	<div class="feature_image"><?php the_post_thumbnail(); ?></div>
	<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content/content-single' );

	if ( is_attachment() ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: parent post link. */
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentytwentyone' ), '%title' ),
			)
		);
	}
?>
<h3>Comments</h3>
<?php
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

	// Previous/next post navigation.
	// $twentytwentyone_next = is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' );
	// $twentytwentyone_prev = is_rtl() ? twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' ) : twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' );

	// $twentytwentyone_next_label     = esc_html__( 'Next post', 'twentytwentyone' );
	// $twentytwentyone_previous_label = esc_html__( 'Previous post', 'twentytwentyone' );

	// the_post_navigation(
	// 	array(
	// 		'next_text' => '<p class="meta-nav">' . $twentytwentyone_next_label . $twentytwentyone_next . '</p><p class="post-title">%title</p>',
	// 		'prev_text' => '<p class="meta-nav">' . $twentytwentyone_prev . $twentytwentyone_previous_label . '</p><p class="post-title">%title</p>',
	// 	)
	// );
endwhile; // End of the loop.
?>
</div>

<div id='right_panel_blog'>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>	
<div class='clear' style="clear: both;"></div>
<div id='home_product' class='single_page_blog'>
<div class="custom_title">Related <b>Products</b></div>
<?php echo do_shortcode('[wcpscwc_pdt_slider type="featured"]')?>
</div>
</div>
<div id='bottom_subscription' class="blogbottom_subscription">
	<div class="custom_title">Be Ready For Anything</div>
	<p><span class="simple_text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the book.</span></p>
	<?php echo do_shortcode('[email-subscribers-form id="1"]') ?>
</div>
<?php 
get_footer();
