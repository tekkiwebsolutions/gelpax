<?php
/*
 * Template Name: Faq
 */
get_header();
?>

<div class="breadcrumb_custom"><div class='container_bread'><?php get_breadcrumb(); ?></div></div>
<div id="theme-main-banner" class="banner-three gradient-banner-three">
   <?php while(have_posts()): the_post(); ?>
       <?php the_content(); ?>
   <?php endwhile; ?>
</div>


<?php get_footer(); ?>