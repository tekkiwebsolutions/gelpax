<?php
/*
 * Template Name: Become a partner
 */
get_header();
?>

<div class="feature_image"><?php the_post_thumbnail(); ?></div>
<div class="breadcrumb_custom"><div class='container_bread'><?php get_breadcrumb(); ?></div></div>
<div id="theme-main-banner" class="banner-three gradient-banner-three">
   <?php while(have_posts()): the_post(); ?>
       <?php the_content(); ?>
   <?php endwhile; ?>
</div>


<?php get_footer(); ?>