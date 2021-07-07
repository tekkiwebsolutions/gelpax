<?php
/*
 * Template Name: Checkout
 */
get_header();
?>

<div class="feature_image"><?php the_post_thumbnail(); ?></div>
<div class="breadcrumb_custom"><div class='container_bread'><?php get_breadcrumb(); ?></div></div>
<div class='checkout_login_div'>Already have an account?<a id='checkout_id' href='<?php echo get_site_url(); ?>/login'>Click here to login</a></div>
<div id="theme-main-banner" class="banner-three gradient-banner-three">
   <?php while(have_posts()): the_post(); ?>
       <?php the_content(); ?>
   <?php endwhile; ?>
</div>


<?php get_footer(); ?>