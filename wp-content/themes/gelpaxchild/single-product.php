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
<div id='left_panel_product'>
<div class="custom_title"><?php //echo get_the_title(); ?></div>
	<div class="feature_image"><?php //the_post_thumbnail(); ?></div>
	<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content/content-single-product' );

	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

endwhile; // End of the loop.
?>
</div>	
<!-- review tab end -->

<div id="reviews">
<div id="comments">
    <h2><?php
        if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_rating_count() ) )
            printf( _n( '%s review for %s', '%s reviews for %s', $count, 'woocommerce' ), $count, get_the_title() );
        else
            _e( 'Reviews', 'woocommerce' );
    ?></h2>

    <?php if ( have_comments() ) : ?>

        <ol class="commentlist">
            <?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
        </ol>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
            echo '<nav class="woocommerce-pagination">';
            paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
                'prev_text' => '&larr;',
                'next_text' => '&rarr;',
                'type'      => 'list',
            ) ) );
            echo '</nav>';
        endif; ?>

    <?php else : ?>

        <p class="woocommerce-noreviews"><?php _e( 'There are no reviews yet.', 'woocommerce' ); ?></p>

    <?php endif; ?>
</div>

<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>

    <div id="review_form_wrapper">
        <div id="review_form">
            <?php
                $commenter = wp_get_current_commenter();

                $comment_form = array(
                    'title_reply'          => have_comments() ? __( 'Add a review', 'woocommerce' ) : __( 'Be the first to review', 'woocommerce' ) . ' &ldquo;' . get_the_title() . '&rdquo;',
                    'title_reply_to'       => __( 'Leave a Reply to %s', 'woocommerce' ),
                    'comment_notes_before' => '',
                    'comment_notes_after'  => '',
                    'fields'               => array(
                        'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'woocommerce' ) . ' <span class="required">*</span></label> ' .
                                    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></p>',
                        'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'woocommerce' ) . ' <span class="required">*</span></label> ' .
                                    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></p>',
                    ),
                    'label_submit'  => __( 'Submit', 'woocommerce' ),
                    'logged_in_as'  => '',
                    'comment_field' => ''
                );

                if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
                    $comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . __( 'Your Rating', 'woocommerce' ) .'</label><select name="rating" id="rating">
                        <option value="">' . __( 'Rate&hellip;', 'woocommerce' ) . '</option>
                        <option value="5">' . __( 'Perfect', 'woocommerce' ) . '</option>
                        <option value="4">' . __( 'Good', 'woocommerce' ) . '</option>
                        <option value="3">' . __( 'Average', 'woocommerce' ) . '</option>
                        <option value="2">' . __( 'Not that bad', 'woocommerce' ) . '</option>
                        <option value="1">' . __( 'Very Poor', 'woocommerce' ) . '</option>
                    </select></p>';
                }

                $comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . __( 'Your Review', 'woocommerce' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';

                comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
            ?>
        </div>
    </div>

<?php else : ?>

    <p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>

<?php endif; ?>
<!-- review tab end -->
<div class='clear' style="clear: both;"></div>
<div id='home_product' class='single_page_blog'>
<div class="custom_title">Related <b>Products</b></div>
<?php echo do_shortcode('[wcpscwc_pdt_slider type="featured"]')?>
</div>
</div>
</div>
<div id='bottom_subscription' class="blogbottom_subscription">
	<div class="custom_title">Be Ready For Anything</div>
	<p><span class="simple_text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the book.</span></p>
	<?php echo do_shortcode('[email-subscribers-form id="1"]') ?>
</div>
<?php 
get_footer();
