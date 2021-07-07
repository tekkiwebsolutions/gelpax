<?php
/*This file is part of gelpaxchild, gelpax child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/

if ( ! function_exists( 'suffice_child_enqueue_child_styles' ) ) {
	function gelpaxchild_enqueue_child_styles() {
	    // loading parent style
	    wp_register_style(
	      'parente2-style',
	      get_template_directory_uri() . '/style.css'
	    );

	    wp_enqueue_style( 'parente2-style' );
	    // loading child style
	    wp_register_style(
	      'childe2-style',
	      get_stylesheet_directory_uri() . '/style.css'
	    );
	    wp_enqueue_style( 'childe2-style');
	 }
}
add_action( 'wp_enqueue_scripts', 'gelpaxchild_enqueue_child_styles' );

/*Write here your own functions */

/* Js link */
function my_custom_scripts() {
    wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/custom.js', array( 'jquery' ),'',true );
}
add_action( 'wp_enqueue_scripts', 'my_custom_scripts' );

/* add to cart button changes */

/* get post */

function shapeSpace_recent_posts_shortcode($atts, $content = null) {
	
	global $post;
	
	extract(shortcode_atts(array(
		'cat'     => '',
		'num'     => '3',
		'order'   => 'ASC',
		'orderby' => 'post_date',
	), $atts));
	
	$args = array(
		'cat'            => $cat,
		'posts_per_page' => $num,
		'order'          => $order,
		'orderby'        => $orderby,
	);
	
	$output = '';
	
	$posts = get_posts($args);
	
	foreach($posts as $post) {
		
		setup_postdata($post);
		$output .= '<li><div class="post_div"><a href="'. get_the_permalink() .'">'. get_the_post_thumbnail().'</a>';
		$output .= '<div class="post_content_cover">';
		$output .= '<h2>'. get_the_title() .'</h2>';
		$output .= '<div class="date_time"><span class="get_date"><i class="fa fa-calendar"></i>'.get_the_date().'</span> <span class="get_time"><i class="fa fa-clock-o"></i>'.get_the_time().'</span></div>';		
		$output .= '<span class="excerpt_post">'. get_the_excerpt() .'</span>';
		$output .= '<span class="anchor_post"><a href="'. get_the_permalink() .'">Read More <i class="fa fa-angle-right"></i></a></span>';
		$output .= '</div>';
		$output .= '</div></li>';
		
	}
	
	wp_reset_postdata();
	
	return '<ul>'. $output .'</ul>';
	
}
add_shortcode('recent_posts', 'shapeSpace_recent_posts_shortcode');

/* widget */

function tutsplus_widgets_init() {
 
    // First footer widget area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'First Footer Widget Area', 'tutsplus' ),
        'id' => 'first-footer-widget-area',
        'description' => __( 'The first footer widget area', 'tutsplus' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
 
    // Second Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Second Footer Widget Area', 'tutsplus' ),
        'id' => 'second-footer-widget-area',
        'description' => __( 'The second footer widget area', 'tutsplus' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
 
    // Third Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Third Footer Widget Area', 'tutsplus' ),
        'id' => 'third-footer-widget-area',
        'description' => __( 'The third footer widget area', 'tutsplus' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => __( 'Copyright Content', 'tutsplus' ),
        'id' => 'copyright-area',
        'description' => __( 'Copyright Content', 'tutsplus' ),
    ) );
         
}
 
// Register sidebars by running tutsplus_widgets_init() on the widgets_init hook.
add_action( 'widgets_init', 'tutsplus_widgets_init' );

/* breadcrumb  */
function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow"><i class="fa fa-home"></i></a>';
    if (is_category() || is_single()) {

         echo "<i class='fa fa-chevron-right blog_bread_i'></i>";
         echo "<a id='blog_bread' href='http://175.176.184.243:2021/projects/wordpress/gelpax/blog/'>Blog</a>";
         echo "<i class='fa fa-chevron-right product_bread_i'></i>";
          echo "<a id='product_bread' href='http://175.176.184.243:2021/projects/wordpress/gelpax/product/'>Products</a>";
        // the_category(' &bull; ');
            if (is_single()) {
                echo "<i class='fa fa-chevron-right'></i>";
                the_title();
            }
    } 
    elseif (is_page()) {
        echo "<i class='fa fa-chevron-right'></i>";
        echo the_title();
    } elseif (is_search()) {
        echo "<i class='fa fa-chevron-right'></i>";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

/* sidebar post */

function sidebar_recent_posts_shortcode($atts, $content = null) {
	
	global $post;
	
	extract(shortcode_atts(array(
		'cat'     => '',
		'num'     => '5',
		'order'   => 'ASC',
		'orderby' => 'post_date',
	), $atts));
	
	$args = array(
		'cat'            => $cat,
		'posts_per_page' => $num,
		'order'          => $order,
		'orderby'        => $orderby,
	);
	
	$output = '';
	
	$posts = get_posts($args);
	
	foreach($posts as $post) {
		
		setup_postdata($post);
		$output .= '<div class="sidebar_post_div"><a class="img_id" href="'. get_the_permalink() .'">'. get_the_post_thumbnail().'</a>';
		$output .= '<div class="post_content_cover">';
		$output .= '<a href="'. get_the_permalink() .'">'. get_the_title().'</a>';
		
		$output .= '</div>';
		$output .= '</div>';
		
	}
	
	wp_reset_postdata();
	
	return '<ul>'. $output .'</ul>';
	
}
add_shortcode('sidebar_posts', 'sidebar_recent_posts_shortcode');
/* sidebar post end */

add_action('woocommerce_after_shop_loop_item_title', 'show_attr');

function show_attr()
{
    global $product;
    str_replace(',', '', $product->list_attributes());
    
}

/* single product page */

add_filter( 'template_include', 'custom_single_product_template_include', 50, 1 );
function custom_single_product_template_include( $template ) {
    if ( is_singular('product') && (has_term( 'custom', 'product_cat')) ) {
        $template = get_stylesheet_directory() . '/single-product.php';
    } 
    return $template;
}

/* remove product description */
add_filter( 'woocommerce_product_tabs', 'bbloomer_remove_product_tabs', 9999 );
  
function bbloomer_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] ); 
    return $tabs;
}


/* remove related product */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

/* change position of short description */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 15);
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 15 );
remove_action( 'woocommerce_single_product_summary',
'woocommerce_template_single_meta', 40 );


/**
 * WooCommerce plus minus option
 */
add_action( 'woocommerce_after_add_to_cart_quantity', 'ts_quantity_plus_sign' );
 
function ts_quantity_plus_sign() {
   echo '<button type="button" class="plus" >+</button>';
}
add_action( 'woocommerce_before_add_to_cart_quantity', 'ts_quantity_minus_sign' );
function ts_quantity_minus_sign() {
   echo '<button type="button" class="minus" >-</button>';
} 
add_action( 'wp_footer', 'ts_quantity_plus_minus' );
 
function ts_quantity_plus_minus() {
   if ( ! is_product() ) return;
   ?>
   <script type="text/javascript">
          
      jQuery(document).ready(function($){   
          
            $('form.cart').on( 'click', 'button.plus, button.minus', function() {
            var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
            var val   = parseFloat(qty.val());
            var max = parseFloat(qty.attr( 'max' ));
            var min = parseFloat(qty.attr( 'min' ));
            var step = parseFloat(qty.attr( 'step' ));
            if ( $( this ).is( '.plus' ) ) {
               if ( max && ( max <= val ) ) {
                  qty.val( max );
               } 
            else {
               qty.val( val + step );
                 }
            } 
            else {
               if ( min && ( min >= val ) ) {
                  qty.val( min );
               } 
               else if ( val > 1 ) {
                  qty.val( val - step );
               }
            }
             
         });
          
      });
          
   </script>
   <?php
}

/* thank you page */
add_action( 'woocommerce_thankyou', 'misha_poll_form', 50 );
 
function misha_poll_form( $order_id ) {
 echo '<div class="clear" style="clear:both"></div>';
 	echo '<div class="customer_offer_function_con"><p class="customer_offer_function">I we could get 25 new patient appointments within the next 30 days would that interest you? Because you’re a current client you qualify for our Patient Rush Program. bok your cal below with one of our experts to find out how we can book you 25 new appointments within 30 days guaranteed! P.S. If patient Rush is the right fit for you and we can’t book 25 appointments you don’t pay a dime and we’ll actually give you the Gelpax you just ordered free of charge.</p></div>';

 	echo '<div id="bottom_subscription" class="blogbottom_subscription">
	<div class="custom_title">Be Ready For Anything</div>
	<p><span class="simple_text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the book.</span></p>';
	echo do_shortcode("[email-subscribers-form id='1']");
echo '</div>';
 
}

function custom_mini_cart() { 
  echo '<a href="#" class="dropdown-back" data-toggle="dropdown"> ';
  echo '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
  echo '<div class="basket-item-count" style="display: inline;">';
  echo '<span class="cart-items-count count">';
  echo WC()->cart->get_cart_contents_count();
  echo '</span>';
  echo '</div>';
  echo '</a>';
  echo '<ul class="dropdown-menu dropdown-menu-mini-cart">';
    echo '<li> <div class="widget_shopping_cart_content">';
              woocommerce_mini_cart();
        echo '</div></li></ul>';

  }
add_shortcode( '[custom-techno-mini-cart]', 'custom_mini_cart' );

function totalInCheckout(){
  $cart=WC()->cart;
  $categories=array('sepecial-offers-products');

  $cart_items=$cart->get_cart();
  $subtotal=$cart->subtotal;
  $total=$cart->total;
  $offerPrice=0;
  foreach($cart_items as $cart_item_key=>$cart_item){
    if(has_term($categories ,'product_cat',$cart_item['product_id'])){
      $_product=wc_get_product($cart_item['product_id']);
      $offerPrice+=$_product->get_price();
    }
  }
  echo wc_price($total-$offerPrice);
}

function special_offer_button($fields){
  $ttl= WC()->cart->get_cart_contents_count();
  $cart=WC()->cart;
  $categories=array('sepecial-offers-products','sample-product');
  $cart_items=$cart->get_cart();
  $subtotal=$cart->subtotal;
  $total=$cart->total;
  $shwbtn=0;
  foreach($cart_items as $cart_item_key=>$cart_item){
    if(has_term($categories ,'product_cat',$cart_item['product_id'])){
       $shwbtn+=1;
    }
  }
  $finalcrt=$ttl-$shwbtn;
  if($finalcrt>0){
    echo "<a class='specialofferbutton' id='specialofferbutton'><span>Claim Special Offer</span></a><div class='cart-tbl'><table class='shop_table ' id='splofferproductinfocstm'>";
  }else{
    echo "<a class='specialofferbutton' id=''><span>Claim Special Offer</span></a><div class='cart-tbl'><table class='shop_table ' id='splofferproductinfocstm'>";
  }
}
add_action('woocommerce_review_order_before_payment','special_offer_button');

function special_offer_table($fields){
  $cart=WC()->cart;
  $categories=array('sepecial-offers-products');

  $cart_items=$cart->get_cart();
  $subtotal=$cart->subtotal;
  $total=$cart->total;
  $offerPrice=0;
  $t="";
  foreach($cart_items as $cart_item_key=>$cart_item){
    if(has_term($categories ,'product_cat',$cart_item['product_id'])){
      $_product=wc_get_product($cart_item['product_id']);
      $offerPrice+=$_product->get_price();

      $t.="<tr>";
      $t.="<td class='product-name'>".$_product->get_title()."</td>";
      $t.="<td class='product-total'>".$_product->get_price_html()."</td>";
      $t.="</tr>";
    }
  }
    $t.="<tr>";
    $t.="<td class='product-name'>Grand Total</td>";
    $t.="<td class='product-total'>".wc_price($total)."</td>";
    $t.="</tr>";
    echo $t;

}
add_action('woocommerce_review_order_before_payment','special_offer_table');

function endTableTag($fields){
    echo "</table></div>";
}
add_action('woocommerce_review_order_before_payment','endTableTag');


add_shortcode('SpecialProductsListPopup','getSpecialOffersProducts');
function getSpecialOffersProducts(){
  ob_start();
  $args = array('post_type' => 'product','post_status' => 'publish', 'tax_query'=>array(array('taxonomy' => 'product_cat','field'=>'slug','terms'=>array('sepecial-offers-products'),'operator'=>'IN',)));
    $loop = new WP_Query( $args ); 
    while ( $loop->have_posts() ) : $loop->the_post();  
        $product = wc_get_product( get_the_ID() ); 
        $pci=WC()->cart->generate_cart_id(get_the_ID());
        $ic=WC()->cart->find_product_in_cart($pci);

        ?>
        <div class="vc_col-md-12 offer-m" style="margin:3% 0;">
          <div class="vc_row">
            <div class="vc_col-md-2">
              <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>"/>
            </div>
            <div class="vc_col-md-7" style="padding-left:0px;">
              <h5 class="prpuproductheading"><?php echo get_the_title(); ?></h5>
              <h6 class="pricepopup"><?php echo $product->get_description();?> in <span class="bluetext">Just <?php echo $product->get_price_html();?></span></h6>
              <p class="descriptionpopup"><?php echo $product->get_short_description();?></p>
            </div>
            <div class="vc_col-md-3" id="cartbuttoncustom<?php echo get_the_ID();?>">
              <?php if(empty($ic)){?>
              <a class="addbtnpopu ajxaddproductpup" id="addbtnpopup<?php echo get_the_ID();?>" data-id="<?php echo get_the_ID(); ?>">Add</a>
              <?php }else{?>
                 <a class="addbtnpopu ajxremoveproductpup" id="removebtnpopup<?php echo get_the_ID();?>" data-id="<?php echo get_the_ID(); ?>">Remove</a>
              <?php } ?>
            </div>
          </div>
        </div>
        <hr>
    <?php
    endwhile;
    wp_reset_postdata();
    return ob_get_clean();

}

add_action('wp_ajax_my_add_cart_action','addCartPopupCustom');
add_action('wp_ajax_nopriv_my_add_cart_action','addCartPopupCustom');
function addCartPopupCustom(){
  $product=$_POST['product_id'];
  if(WC()->cart->add_to_cart($product)){
    echo "1";
  }else{
    echo "0";
  }
  die();
}

add_action('wp_ajax_my_remove_cart_action','removeCartPopupCustom');
add_action('wp_ajax_nopriv_my_remove_cart_action','removeCartPopupCustom');
function removeCartPopupCustom(){
  $product=$_POST['product_id'];
  $pci=WC()->cart->generate_cart_id($product);
  $ic=WC()->cart->find_product_in_cart($pci);
  if(WC()->cart->remove_cart_item($ic)){
    echo "1";
  }else{
    echo "0";
  }
  die();
}

add_action('wp_ajax_my_last_order_data','getLastOrderDataCustom');
add_action('wp_ajax_nopriv_my_last_order_data','getLastOrderDataCustom');
function getLastOrderDataCustom(){
  $a="";
  if ( is_user_logged_in() ) :
    $user_id = get_current_user_id(); // The current user ID
    // Get the WC_Customer instance Object for the current user
    $customer = new WC_Customer( $user_id );
    // Get the last WC_Order Object instance from current customer
    $last_order = $customer->get_last_order();
    $a="";
    foreach ( $last_order->get_items() as $item ) : 
      if(!empty($item->get_meta('logo_select'))){
        $a=$item->get_meta('logo_select');
      }
    endforeach;  
  endif;
  echo $a;
  die();
}


add_action('wp_ajax_my_update_specialoffertable_action','updateSpecialofferProductTable');
add_action('wp_ajax_nopriv_my_update_specialoffertable_action','updateSpecialofferProductTable');
function updateSpecialofferProductTable(){
  $categories=array('sepecial-offers-products');
  $cart=WC()->cart;
  $cart_items=$cart->get_cart();
  $subtotal=$cart->subtotal;
  $total=$cart->total;
  $offerPrice=0;
  foreach($cart_items as $cart_item_key=>$cart_item){
    if(has_term($categories ,'product_cat',$cart_item['product_id'])){
      $_product=wc_get_product($cart_item['product_id']);
      $offerPrice+=$_product->get_price();

      $t.="<tr>";
      $t.="<td class='product-name'>".$_product->get_title()."</td>";
      $t.="<td class='product-total'>".$_product->get_price_html()."</td>";
      $t.="</tr>";
    }
  }
    $t.="<tr>";
    $t.="<td class='product-name'>Grand Total</td>";
    $t.="<td class='product-total'>".wc_price($total)."</td>";
    $t.="</tr>";
    echo $t;
     die;
}

add_action('wp_ajax_my_update_specialoffertable_Coupon_action','updateCouponSpecialofferProductTable');
add_action('wp_ajax_my_update_specialoffertable_Coupon_action','updateCouponSpecialofferProductTable');
function updateCouponSpecialofferProductTable(){
  $categories=array('sepecial-offers-products');
  $cart=WC()->cart;
  $cart_items=$cart->get_cart();
  $subtotal=$cart->subtotal;
  $total=$cart->total;
  $offerPrice=0;
  $dtotal= $cart->get_discount_total();;
  foreach($cart_items as $cart_item_key=>$cart_item){
    if(has_term($categories ,'product_cat',$cart_item['product_id'])){
      $_product=wc_get_product($cart_item['product_id']);
      $offerPrice+=$_product->get_price();

      $t.="<tr>";
      $t.="<td class='product-name'>".$_product->get_title()."</td>";
      $t.="<td class='product-total'>".$_product->get_price_html()."</td>";
      $t.="</tr>";
    }
  }
    $t.="<tr>";
    $t.="<td class='product-name'>Grand Total</td>";
    $t.="<td class='product-total'>".wc_price($total+$dtotal)."</td>";
    $t.="</tr>";
    echo $t;
     die;
}
add_action( 'woocommerce_after_calculate_totals','add_custom_price');
function add_custom_price($cart) {

  $categories=array('sepecial-offers-products');
  $cart=WC()->cart;
  $cart_items=$cart->get_cart();
  $subtotal=$cart->subtotal;
  $total=$cart->total;
  $offerPrice=0;
  foreach($cart_items as $cart_item_key=>$cart_item){
    if(has_term($categories ,'product_cat',$cart_item['product_id'])){
      $_product=wc_get_product($cart_item['product_id']);
      $offerPrice+=$_product->get_price();
    }
  }
  $cart->subtotal=$subtotal-$offerPrice;
}


  

add_action('woocommerce_single_product_summary','Show_custom_order_field',20);
function Show_custom_order_field(){
  global $product;
  $terms=get_the_terms($product->get_id(),'product_cat');
  echo "<div id='customisershow' style='display:none;'><div><input type='checkbox' id='lastorderimage' name='lastorderimage' value='yes'> Use Last Order Image<br><span id='lastordererror' style='color:red;'></span><br></div><div><label>Choose Your Gel Color</label><div>
  <ul class='colorcustomselectul'><li class='colorcustomselect' style='background:white;' data-id='White'><i class='fa'></i></li><li class='colorcustomselect' style='background:lightgreen;' data-id='Green'><i class='fa'></i></li><li class='colorcustomselect' style='background:lightblue;' data-id='Blue'><i class='fa'></i></li><li class='colorcustomselect' style='background:orange;' data-id='Orange'><i class='fa'></i></li><li class='colorcustomselect' style='background:#f702f7;' data-id='Purple'><i class='fa'></i></li><li class='colorcustomselect' style='background:pink;' data-id='Pink'><i class='fa'></i></li></ul></div></div>";
  if($terms[0]->slug=='sample-product'){
    echo "<div><select style='width:100%;' id='sizdisplayopt'><option value=''>Choose Size</option><option value='4'>4\"</option><option value='3x3'>3x3\"</option><option value='3x5'>3x5\"</option><option value='5x5'>5x5\"</option><option value='5x7'>5x7\"</option><option value='4x10'>4x10\"</option><option value='6x10'>6x10\"</option><option value='8x10'>8x10\"</option><option value='10x12'>10x12\"</option><option value='6x20'>6x20\"</option></select></div>";
  }

  echo "<label>Upload Logo</label><div class='upload_browse'><button id='dummylogoupload'>Browse...</button><span id='chflname'> No file Selected</span><p style='    font-size: 12px;
    margin-bottom: 20px;'>JPEG and PNG File is Preferred</p></div><label>Notes</label>";

  woocommerce_form_field('extranoteshow',array(
    'type'=> "textarea",
    'class'=> array('cutsmsingleorderclass'),
    'placeholder'=>__("Would you like any more details on gelpax"),
    'required'=>false,
  ),'');
  
  ?>
  <span class="min_ord">Minimum Order (250)</span>
    <script type="text/javascript">
      jQuery(function($){
        $('.colorcustomselect').on('click',function(e){
          $('.fa').removeClass('fa-check');
          $('#color_select').val($(this).data('id'));
          $(this).children(" .fa").addClass('fa-check');
        });
        $('#extranoteshow').on('input blur', function(){
          $('#extra_notes_field').val($(this).val());
        });
        $('#dummylogoupload').on('click',function(e){
          $('#customlogofile').trigger('click');
        });
        $('#customlogofile').on('change',function(e){
          $('#chflname').html(" "+e.target.files[0].name);
        });
        $('#sizdisplayopt').on('change',function(e){
          $('#samplesizecustom').val($(this).val());
        });

      });
    </script>
  <?php
  echo  "<div><a class='pum-close popmake-close closebtnpopu popupclose save-btn scndcartbtn'>Add To Cart</a></div></div>";
}



add_action('woocommerce_after_add_to_cart_button','custom_order_field',100);
function custom_order_field(){
  
  echo "<div style='display:none;'>";
  echo "<input type='file' name='customlogo' id='customlogofile'>";
  woocommerce_form_field('lastimagecustom',array(
    'type'=> "text",
    'class'=> array(''),
    'placeholder'=>__("lastimage"),
    'required'=>false,
  ),'');
  woocommerce_form_field('lastimageoptioncustom',array(
    'type'=> "text",
    'class'=> array(''),
    'placeholder'=>__("lastimageoption"),
    'required'=>false,
  ),'no');
  woocommerce_form_field('extra_notes_field',array(
    'type'=> "text",
    'class'=> array('cutsmsingleorderclass'),
    'placeholder'=>__("Please Enter Extra Notes If Any"),
    'required'=>false,
  ),'');
  woocommerce_form_field('color_select',array(
    'type'=> "text",
    'class'=> array('cutsmsingleorderclass'),
    'placeholder'=>__("Please Enter Extra Notes If Any"),
    'required'=>false,
  ),'');
  woocommerce_form_field('samplesizecustom',array(
    'type'=> "text",
    'class'=> array(''),
    'placeholder'=>__("size"),
    'required'=>false,
  ),'');

  echo  "</div>";
}



add_filter('woocommerce_add_cart_item_data','addproduct_custom_information',10,2);
function addproduct_custom_information($cart_item,$product_id){

  // echo "<pre>";
  // print_r(wp_upload_dir());
  // die;
 
    
  
  if(isset($_POST['extra_notes_field']) ){
    $extra_notes_field=sanitize_textarea_field($_POST['extra_notes_field']);
    $cart_item['extra_notes_field']=$extra_notes_field;
  }
  if(isset($_POST['color_select']) ){
    $color_select=sanitize_text_field($_POST['color_select']);
    $cart_item['color_select']=$color_select;
  }
  if(isset($_POST['samplesizecustom']) ){
      $samplesizecustom=sanitize_text_field($_POST['samplesizecustom']);
      $cart_item['samplesizecustom']=$samplesizecustom;
    }
  if(isset($_FILES['customlogo']) && !empty($_FILES['customlogo']['name'])){
    $wordpresspath=wp_upload_dir();
    $newpath=$wordpresspath['path'].'/'.time().'-'.$_FILES['customlogo']['name'];
    $showpath=$wordpresspath['url'].'/'.time().'-'.$_FILES['customlogo']['name'];
    if(move_uploaded_file($_FILES['customlogo']['tmp_name'], $newpath)){
      $cart_item['logo_select']=$showpath;
    }
  }elseif ($_POST['lastimageoptioncustom']=='yes') {
    $previouslogo=sanitize_text_field($_POST['lastimagecustom']);
    $cart_item['logo_select']=$previouslogo;
  }
  return $cart_item;
}

add_filter('woocommerce_get_cart_item_from_session', 'getCartItemFromSession',20,2);
function getCartItemFromSession($cart_item,$values){
  if(isset($values['extra_notes_field'])){
    $cart_item['extra_notes_field']=$values['extra_notes_field'];
  }
  if(isset($values['color_select'])){
    $cart_item['color_select']=$values['color_select'];

  }
  if(isset($values['samplesizecustom'])){
    $cart_item['samplesizecustom']=$values['samplesizecustom'];

  }
  if(isset($values['logo_select'])){
    $cart_item['logo_select']=$values['logo_select'];

  }
  

  return $cart_item;
}

add_filter('woocommerce_add_order_item_meta','getCartItemMetaData',10,2);
function getCartItemMetaData($item_id,$values){
  if(!empty($values['extra_notes_field'])){
    woocommerce_add_order_item_meta($item_id,'extra_notes_field',$values['extra_notes_field']);
  }
  if(!empty($values['color_select'])){
    woocommerce_add_order_item_meta($item_id,'color_select',$values['color_select']);
  }
  if(!empty($values['samplesizecustom'])){
    woocommerce_add_order_item_meta($item_id,'samplesizecustom',$values['samplesizecustom']);
  }
  if(!empty($values['logo_select'])){
    woocommerce_add_order_item_meta($item_id,'logo_select',$values['logo_select']);
  }
  
}


add_filter('woocommerce_get_item_data','getCartItemData',10,2);
function getCartItemData($other_data,$cart_item){
  if(isset($cart_item['extra_notes_field']) && !empty($cart_item['extra_notes_field'])){
    $other_data[]=array('name'=>'Order Notes','value'=>sanitize_textarea_field($cart_item['extra_notes_field']));
  }
  if(isset($cart_item['color_select'])&& !empty($cart_item['color_select'])){
    $other_data[]=array('name'=>'Color Select','value'=>sanitize_textarea_field($cart_item['color_select']));
  }
  if(isset($cart_item['samplesizecustom'])&& !empty($cart_item['samplesizecustom'])){
    $other_data[]=array('name'=>'Sample_Size','value'=>sanitize_textarea_field($cart_item['samplesizecustom']));
  }
  if(isset($cart_item['logo_select'])&& !empty($cart_item['logo_select'])){
    $other_data[]=array('name'=>'Logo Select','value'=>htmlspecialchars_decode ('<img src="'.$cart_item['logo_select'].'">'));
  }
  return $other_data;
}

add_filter('woocommerce_order_item_product','customOrderViewCustom',10,2);
function customOrderViewCustom($cart_item,$order_item){
  if(isset($order_item['extra_notes_field'])){
    $cart_item_meta['extra_notes_field']=$order_item['extra_notes_field'];
  }
  if(isset($order_item['color_select'])){
    $cart_item_meta['color_select']=$order_item['color_select'];
  }
  if(isset($order_item['samplesizecustom'])){
    $cart_item_meta['samplesizecustom']=$order_item['samplesizecustom'];
  }
  if(isset($order_item['logo_select'])){
    $cart_item_meta['logo_select']=$order_item['logo_select'];
  }
  return $cart_item;
}

add_action('woocommerce_removed_coupon','removedCouponFunction');
function removedCouponFunction($coupon_code){
  ?>
   <script type="text/javascript">
    jQuery.post('/projects/wordpress/gelpax/wp-admin/admin-ajax.php',{'action':"my_update_specialoffertable_Coupon_action"},function(response){
        
        jQuery('#splofferproductinfocstm').html(response);
        
      });
  </script>
  <?php
}
add_action('woocommerce_applied_coupon','checkCouponFunction');
function checkCouponFunction(){
  ?>
  <script type="text/javascript">
    jQuery.post('/projects/wordpress/gelpax/wp-admin/admin-ajax.php',{'action':"my_update_specialoffertable_action"},function(response){
        
        jQuery('#splofferproductinfocstm').html(response);
        
      });
  </script>
  <?php
}



  add_action('woocommerce_check_cart_items','CheckAllCartItems');
  function CheckAllCartItems(){
    $ttl= WC()->cart->get_cart_contents_count();
    $categories=array('sepecial-offers-products');
    $samplecategories=array('sample-product');
    $cart=WC()->cart;
    $cart_items=$cart->get_cart();
  
    $splprd=0;
    $smpprd=0;
    
    foreach($cart_items as $cart_item_key=>$cart_item){
      if(has_term($categories ,'product_cat',$cart_item['product_id'])){
        $splprd+=1;
      }
      if(has_term($samplecategories ,'product_cat',$cart_item['product_id'])){
        $smpprd+=1;
      }
    }

    $finalcrt=$ttl-$splprd;
    
    if($finalcrt==0){
      WC()->cart->empty_cart();
      ?>
      <script type="text/javascript">
        jQuery.post('/projects/wordpress/gelpax/wp-admin/admin-ajax.php',{'action':"my_update_specialoffertable_action"},function(response){
            jQuery('#splofferproductinfocstm').html(response);
        });
      </script>
  <?php
    }else{
      $chksmmttl=$ttl-$smpprd;
      
      if($chksmmttl==0){
        foreach($cart_items as $cart_item_key=>$cart_item){
          if(has_term($categories ,'product_cat',$cart_item['product_id'])){
            $pci=WC()->cart->generate_cart_id($cart_item['product_id']);
            $ic=WC()->cart->find_product_in_cart($pci);
            WC()->cart->remove_cart_item($ic);
          }
        }
        ?>
      <script type="text/javascript">
        jQuery.post('/projects/wordpress/gelpax/wp-admin/admin-ajax.php',{'action':"my_update_specialoffertable_action"},function(response){
            jQuery('#splofferproductinfocstm').html(response);
        });
      </script>
  <?php
      }
    }
  }

add_action("woocommerce_cart_contents_count","changeCount",9999,1);
function changeCount($count){

    $categories=array('sepecial-offers-products');
    $cart=WC()->cart;
    $cart_items=$cart->get_cart();
    $splprd=0;
    
    foreach($cart_items as $cart_item_key=>$cart_item){
      if(has_term($categories ,'product_cat',$cart_item['product_id'])){
        $splprd+=1;
      }
    }
    $finalcrt=$count-$splprd;

  return $finalcrt;
}


function warp_ajax_product_remove()
{
  foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item)
    {
        if($cart_item['product_id'] == $_POST['product_id'] && $cart_item_key == $_POST['cart_item_key'] )
        {
            WC()->cart->remove_cart_item($cart_item_key);
        }
    }

    WC()->cart->calculate_totals();
    WC()->cart->maybe_set_cart_cookies();
  ?>
   <div class="cartItemsList">
            <ul>
               <?php global $woocommerce;
                $items = $woocommerce->cart->get_cart();
                if(!empty($items)){
                    foreach($items as $item => $values) { 
                        
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $values['data']->get_id() ), 'single-post-thumbnail' );
                        $_product =  wc_get_product( $values['data']->get_id()); 
                        $price = get_post_meta($values['product_id'] , '_price', true);  ?>


                        <li>
                            <div class="chunkProductCon">

                                <div class="productImg">
                                    
                                    <img src="<?php echo get_the_post_thumbnail_url($values['data']->get_id(),'full'); ?>" height="100px" width="100px">
                                    
                                </div>

                                <div class="productDetail">
                                    <p><?php echo $_product->get_title(); ?></p>
                                    <p>Size:<?php if(!empty($values['variation'])){ echo $values['variation']['attribute_pa_size']; }?></p>
                                    <p><?php echo $values['quantity']; ?>&#10005;<?php echo get_woocommerce_currency_symbol(); ?><?php echo $price; ?></p>
                                </div>
                            </div>
                        </li> 
                <?php }  } ?>


            </ul>
        </div>


        <div class="cartTotalContainer">
            <div class="labelcontainer">    
                Subtotal
            </div>
            <div class="valuecontainer">    
                <?php echo $woocommerce->cart->get_cart_total(); ?>
            </div>
        </div>|<?php echo $woocommerce->cart->get_cart_contents_count(); ?>

    <?php 
  die();
}

add_action( 'wp_ajax_product_remove', 'warp_ajax_product_remove' );
add_action( 'wp_ajax_nopriv_product_remove', 'warp_ajax_product_remove' );



function warp_ajax_product_undo()
{
  
    WC()->cart->restore_cart_item( $_POST['cart_item_key'] );
    WC()->cart->calculate_totals();
    WC()->cart->maybe_set_cart_cookies();

  ?>
   <div class="cartItemsList">
            <ul>
               <?php global $woocommerce;
                $items = $woocommerce->cart->get_cart();
                if(!empty($items)){
                    foreach($items as $item => $values) { 
                        
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $values['data']->get_id() ), 'single-post-thumbnail' );
                        $_product =  wc_get_product( $values['data']->get_id()); 
                        $price = get_post_meta($values['product_id'] , '_price', true);  ?>


                        <li>
                            <div class="chunkProductCon">

                                <div class="productImg">
                                    
                                    <img src="<?php echo get_the_post_thumbnail_url($values['data']->get_id(),'full'); ?>" height="100px" width="100px">
                                    
                                </div>

                                <div class="productDetail">
                                    <p><?php echo $_product->get_title(); ?></p>
                                    <p>Size:<?php if(!empty($values['variation'])){ echo $values['variation']['attribute_pa_size']; }?></p>
                                    <p><?php echo $values['quantity']; ?>&#10005;<?php echo get_woocommerce_currency_symbol(); ?><?php echo $price; ?></p>
                                </div>
                            </div>
                        </li> 
                <?php }  } ?>


            </ul>
        </div>


        <div class="cartTotalContainer">
            <div class="labelcontainer">    
                Subtotal
            </div>
            <div class="valuecontainer">    
                <?php echo $woocommerce->cart->get_cart_total(); ?>
            </div>
        </div>|<?php echo $woocommerce->cart->get_cart_contents_count(); ?>

    <?php 
  die();
}

add_action( 'wp_ajax_undo_remove', 'warp_ajax_product_undo' );
add_action( 'wp_ajax_nopriv_undo_remove', 'warp_ajax_product_undo' );


 
//  function verify_comment_meta_data( $commentdata ) {
// if (!isset($_POST['comment']))
//         wp_die( __( 'Error: please fill the required field (city).' ) );
//     return $commentdata;
// }
// add_filter( 'preprocess_comment', 'verify_comment_meta_data' );
/*Comment Validation*/




add_filter('body_class','ttm_woocommerce_body_classes');
function ttm_woocommerce_body_classes($classes){
    global $woocommerce, $post, $product;
    if ( $product->product_type == 'simple' ) $classes[] = 'simple-product';
    return $classes;
}

add_filter('woocommerce_variable_price_html', 'custom_variation_price', 10, 2); 
function custom_variation_price( $price, $product ) { 
     $price = '';
     $price .= wc_price($product->get_price()); 
     return $price. " each";  
}





