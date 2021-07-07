<?php
/**
 * Displays the site header.
 *
 * @package WordPress
 * @subpackage gelpax
 * @since gelpax 1.0
 */

$wrapper_classes  = 'site-header';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= true === get_theme_mod( 'display_title_and_tagline', true ) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';
?>
<!-- <div id='single_top_bar'>
	<div class='single_top_bar_container'>
	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
<div class='single_top_bar_btn'>
	<button>Primary Btn</button>
	<button>Secondary Btn</button>
</div>
</div>
</div> -->
<div class="container header_masthead">

<header id="masthead" class="<?php echo esc_attr( $wrapper_classes ); ?>" role="banner">

	<?php get_template_part( 'template-parts/header/site-branding' ); ?>
	<?php //get_template_part( 'template-parts/header/site-nav' ); ?>

</header><!-- #masthead -->
</div>