<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>		
			</main><!-- #main -->	
		</div><!-- #primary -->
	</div><!-- #content -->

	<?php //get_template_part( 'template-parts/footer/footer-widgets' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<aside class="custom_footer" role="complementary">
    <div class="first quarter left widget-area_ful">
        <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
    </div><!-- .first .widget-area -->
    <div class="seccond quarter left widget-area_ful">
        <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
    </div><!-- .first .widget-area -->
    <div class="third quarter left widget-area_ful">
        <?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
    </div><!-- .first .widget-area -->
</aside>
<div id='copyright_footer'>
        <?php dynamic_sidebar( 'copyright-area' ); ?>
    </div>
    


		<?php //if ( has_nav_menu( 'footer' ) ) : ?>
			<!-- <nav aria-label="<?php //esc_attr_e( 'Secondary menu', 'twentytwentyone' ); ?>" class="footer-navigation">
				<ul class="footer-navigation-wrapper">
					<?php
					//wp_nav_menu(
						// array(
						// 	'theme_location' => 'footer',
						// 	'items_wrap'     => '%3$s',
						// 	'container'      => false,
						// 	'depth'          => 1,
						// 	'link_before'    => '<span>',
						// 	'link_after'     => '</span>',
						// 	'fallback_cb'    => false,
						// )
					//);
					?>
				</ul>
			</nav>
		<?php //endif; ?>
		<div class="site-info">
			<div class="site-name">
				<?php //if ( has_custom_logo() ) : ?>
					<div class="site-logo"><?php //the_custom_logo(); ?></div>
				<?php //else : ?>
					<?php //if ( get_bloginfo( 'name' ) && get_theme_mod( 'display_title_and_tagline', true ) ) : ?>
						<?php //if ( is_front_page() && ! is_paged() ) : ?>
							<?php //bloginfo( 'name' ); ?>
						<?php //else : ?>
							<a href="<?php //echo esc_url( home_url( '/' ) ); ?>"><?php //bloginfo( 'name' ); ?></a>
						<?php //endif; ?>
					<?php //endif; ?>
				<?php //endif; ?>
			</div>site-name -->
			<!-- <div class="powered-by">
				<?php
				//printf(
					/* translators: %s: WordPress. */
					//esc_html__( 'Proudly powered by %s.', 'twentytwentyone' ),
					/*'<a href="' . esc_url( __( 'https://wordpress.org/', 'twentytwentyone' ) ) . '">WordPress</a>'*/
				//);
				?>
			</div>

		</div> -->



	</footer>

</div><!-- #page -->



<!-- Coupon code -->
<div class='coupon_code_cover' style="display: none">
<div class='coupon_code'>
<div class="custom_title">Get your <b>Coupon Code</b></div>
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
<form action="" method="post" name="coupon_form" >
	<div class='coupon_form_div'>
	<div class='error_div'>	
	<input type='text' name='coupon_first_name' class='coupon_first_name' placeholder="First Name" >
	<span class='coupon_first_name_error'></span>
	</div>
	<div class='error_div'>	
	<input type='text' name='coupon_last_name' class='coupon_last_name' placeholder="Last Name" >
	<span class='coupon_last_name_error'></span>
	</div>
	</div>
	<div class='coupon_form_div'>
	<div class='error_div'>	
	<input type='email' name='coupon_email' class='coupon_email' placeholder="Email Address" >
	<span class='coupon_email_error'></span>
	</div>
	<div class='error_div'>	
	<input type='tel' name='coupon_phone' class='coupon_phone' placeholder="Phone Number" >
	<span class='coupon_phone_error'></span>
    </div>          
	
	<input type="hidden" name="process-with-home-coupon" value="process-with-home-coupon" />     


</div>
	<input type="submit" name='coupon_submit' value='Submit' id="coupon_submit">

</form>
<span class="close_coupon">x</span>
</div>
</div>







<?php wp_footer(); ?>

</body>
</html>
