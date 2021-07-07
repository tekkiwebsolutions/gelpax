<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage gelpax
 * @since gelpax 1.0
 */

$blog_info    = get_bloginfo( 'name' );
$description  = get_bloginfo( 'description', 'display' );
$show_title   = ( true === get_theme_mod( 'display_title_and_tagline', true ) );
$header_class = $show_title ? 'site-title' : 'screen-reader-text';

?>

<?php if ( has_custom_logo() && $show_title ) : ?>
	<div class="site-logo"><a href='<?php get_home_url() ?>'><?php the_custom_logo(); ?></a></div>
<?php endif; ?>
<div id='nav_bar'>
<?php if ( has_nav_menu( 'primary' ) ) : ?>
	
	<nav id="site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'gelpax' ); ?>">

		<div class="menu-button-container">
			<button id="primary-mobile-menu" class="button" aria-controls="primary-menu-list" aria-expanded="false">
				<span class="dropdown-icon open"><?php esc_html_e( 'Menu', 'gelpax' ); ?>
					<?php echo twenty_twenty_one_get_icon_svg( 'ui', 'menu' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
				</span>
				<span class="dropdown-icon close"><?php esc_html_e( 'Close', 'gelpax' ); ?>
					<?php echo twenty_twenty_one_get_icon_svg( 'ui', 'close' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
				</span>
			</button><!-- #primary-mobile-menu -->
		</div><!-- .menu-button-container -->
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'menu_class'      => 'menu-wrapper',
				'container_class' => 'primary-menu-container',
				'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
				'fallback_cb'     => false,
			)
		);
		?>
	</nav><!-- #site-navigation -->
	<!-- Cart code -->
	<?php 	
global $woocommerce;
$cart_url = $woocommerce->cart->get_cart_url();
?>
<div class="Mobile_view_ic">
<a id='cart_view' href='<?php echo $cart_url ?>'><i class="fa fa-shopping-cart"></i> <p><?php echo WC()->cart->get_cart_contents_count(); ?></p></a>
<!-- Cart code end-->

<!-- Login-Logout -->
<div id='login_view'>
	<!-- <i class="fa fa-user"></i> -->	
<ul class="login_view_ul">
	<li id='login_view_login'><a href='<?php echo get_site_url(); ?>/login'>Login</a></li>
	<li id='login_view_logout'><a href='<?php echo wp_logout_url( home_url() ); ?>'>LogOut</a></li>
</ul>
</div>
<!-- Login-Logout End -->

<!-- Search Form Start -->

<a id='search_view'><i class="fa fa-search"></i></a>	
<div class='search_view_con' style="display: none">
<div class="search_view_popup"><?php get_search_form(); ?>
<span class='close_search_view'>x</span>		
</div>
</div>

<!-- Search Form Close -->
</div>

<?php endif; ?>
</div>
<div id='Mobile_view'>
	<i class="fa fa-bars"></i>
</div>

<div class="site-branding">

	<?php if ( has_custom_logo() && ! $show_title ) : ?>
		<div class="site-logo"><?php the_custom_logo(); ?></div>
	<?php endif; ?>

	<?php //if ( $blog_info ) : ?>
		<?php //if ( is_front_page() && ! is_paged() ) : ?>
			<h1 class="<?php //echo esc_attr( $header_class ); ?>"><?php //echo esc_html( $blog_info ); ?></h1>
		<?php //elseif ( is_front_page() || is_home() ) : ?>
			<h1 class="<?php //echo esc_attr( $header_class ); ?>"><a href="<?php //echo esc_url( home_url( '/' ) ); ?>"><?php //echo esc_html( $blog_info ); ?></a></h1>
		<?php //else : ?>
			<p class="<?php //echo esc_attr( $header_class ); ?>"><a href="<?php //echo esc_url( home_url( '/' ) ); ?>"><?php //echo esc_html( $blog_info ); ?></a></p>
		<?php //endif; ?>
	<?php ///endif; ?>

	<?php //if ( $description && get_theme_mod( 'display_title_and_tagline', true ) === true ) : ?>
		<p class="site-description">
			<?php //echo $description; // phpcs:ignore WordPress.Security.EscapeOutput ?>
		</p>
	<?php //endif; ?>
</div><!-- .site-branding -->
