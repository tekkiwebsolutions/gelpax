<?php 
function subscriber_login_func(){ ob_start(); ?>
    <div class="wooo-login-container">    

        <?php  if ( !is_user_logged_in() ) { ?>
        
        <?php if(isset($_GET['invalid'])){ ?>
            <p class="loginerror">Invalid login credentials</p>
        <?php } ?>

        <form id="woo-login-process" action="" method="post" >
            <input  required="required" type="text" class="wooo-email" name="wooo-email" placeholder="Enter email/username address" /> <br />
            <input required="required" type="password" class="wooo-password" name="wooo-password" placeholder="Enter your password" /> <br />

            <div class="login-action-container">
                <div class="remembercontainer">
                    <label><input type="checkbox" name="staylogin" value="staylogin" /> Remember me</label>
                </div>

                <div class="forgetcontainer">
                    <!-- <a href="javascript:void(0)">Forgot Password?</a> -->
                </div>
                <input type="hidden" value="wooo-login-sub-process" name="action" />
                <div class="submitcontainer">
                    <input type="submit" value="Login" />
                </div>
            </div>
        </form>

        <?php }else{ ?>
            <p class="alreadylogi">Login Successfully</p>
            <a id='home_url' href='<?php echo get_site_url() ?>'>Vist to HomePage</a>
        <?php } ?>
    </div>
<?php return ob_get_clean(); } 


function subscribe_login_proceed(){
    if(isset($_POST['action']) && $_POST['action'] === 'wooo-login-sub-process'){

        if(isset($_POST['staylogin']) && $_POST['staylogin'] == 'staylogin'){
            $stay = true;
        }else{
            $stay = false;
        }

        $creds = array(
            'user_login'    => $_POST['wooo-email'],
            'user_password' => $_POST['wooo-password'],
            'remember'      => $stay
        );
        $user = wp_signon( $creds, false );
        if ( is_wp_error( $user ) ) {
            wp_redirect( site_url().'/login?invalid' );
            exit;
        }else{
            wp_redirect( site_url().'/login' );
            exit;
        }
        die();
    
    }else if(isset($_POST['action']) && $_POST['action'] === 'wooo-register-sub-process'){

        /*email exist check*/
        $exists = email_exists(trim($_POST['email']));
        if ( $exists ) {
            wp_redirect( site_url().'/login?reerror' );
            exit;
        }


        $roleemail = $_POST['email'];
        $roleemail = explode('@', $roleemail);
        
        $userdata = array(
            'user_login'    =>  $roleemail[0],
            'user_pass'     =>  trim($_POST['subpass']),
            'user_email'    =>  trim($_POST['email']),
            'display_name'  =>  trim($_POST['subfirstname']).' '.trim($_POST['sublastname']),
            'first_name'    =>  trim($_POST['subfirstname']),
            'last_name'     =>  trim($_POST['sublastname']),
            'role'          =>  'subscriber',
        );

        $user_id = wp_insert_user( $userdata ) ;
        if ( ! is_wp_error( $user_id ) ) {
            add_user_meta( $user_id, '_user_phone_number', trim($_POST['subphone']));
            wp_redirect( site_url().'/login?rsuc' );
            exit;
        }else{
            wp_redirect( site_url().'/login?rerror' );
            exit;
        }
        die();
    }
} 



function subscriber_register_func(){ ob_start();?>

<?php if(isset($_GET['rsuc'])){ ?>
<p class="register-success">Success! Account registered successfully</p>
<?php } ?>

<?php if(isset($_GET['reerror'])){ ?>
<p class="register-eerror">Error! Email already exists.</p>
<?php } ?>   


<?php if(isset($_GET['rerror'])){ ?>
<p class="register-uerror">Error! User/Email already exists.</p>
<?php } ?>   


<form id="woo-register-process" action="" method="post" name="custom_login">

    <div class="twoseperatefield">
        <div class="onesep">
            <input type="text" name="subfirstname" placeholder="First Name" class="name_val" />
            <span class='subfirstname_error error'></span>
        </div>
        <div class="secsep">
        <input type="text" name="sublastname" placeholder="Last Name" class="name_val" />
        <span class='sublastname_error error'></span>
        </div>
    </div>

    <div class="twoseperatefield"> 
        <div class='custom_login_div_error'>            
        <input type="tel" name="subphone" placeholder="Phone" minlength="10" maxlength="12" class="number_val" />
        <span class='phone_error error'></span> 
       </div>
       <div class='custom_login_div_error'>  
        <input type="email" name="email" placeholder="Email" />
        <span class='email_error error'></span> 
    </div>
        <div class='custom_login_div_error'>  
        <input type="email" name="confirmemail" placeholder="Confirm Email" />
        <span class='conform_email_error error'></span> 
        </div>   
         <div class='custom_login_div_error'> 
        <input type="password" name="subpass" placeholder="Password" />
        <span class='password_error error'></span> 
        </div>   
        <div class='custom_login_div_error'>
        <input type="password" name="consubpass" placeholder="Confirm Password" />
            <span class='conform_password_error error'></span> 
        </div> 
    </div> 

    <div class="login-action-container">
        <input type="hidden" value="wooo-register-sub-process" name="action" />
        <div class="submitcontainer">
            <input type="submit" value="Create Account" />
        </div>
    </div>
</form>
<?php return ob_get_clean(); }


function request_post_type(){
    register_post_type('coupon_request',
        array(
            'labels'      => array(
                'name'          => __( 'Couple Requests', '' ),
                'singular_name' => __( 'Couple Request', '' ),
            ),
            'public'      => true,
            'has_archive' => true,
            'rewrite'     => array( 'slug' => 'coupon-requests' ),
            'supports'    => array('title'),
            'publicly_queryable'  => false

        )
    );
}

 
function modify_list_row_actions( $actions, $post ) {
    if ( $post->post_type == "coupon_request" ) {
          /*$actions = array_merge( $actions, array(
            'copy' => sprintf( '<a class="action-for-home-coupon" href="javascript:void(0)">%2$s</a>',
                esc_url( $copy_link ), 
                'Approve Coupon'
            ) 
         ) );*/
        unset($actions['inline hide-if-no-js']);
        unset($actions['edit']);
    }
    return $actions;
}


function set_custom_edit_coupon_request_columns($columns) {
    
    $columns['first_name'] = __( 'First Name', '' );
    $columns['last_name'] = __( 'Last Name', '' );
    $columns['email_address'] = __( 'Email', '' );
    $columns['phone_number'] = __( 'Phone Number', '' );
    $columns['approve_status'] = __( 'Approved Status', '' );

    return $columns;
}


function custom_book_column( $column, $post_id ) {
    switch ( $column ) {
        case 'first_name' :
            echo get_post_meta( $post_id , '_first_name' , true );
            break;
        case 'last_name' :
            echo get_post_meta( $post_id , '_last_name' , true ); 
            break;
        case 'email_address' :
            echo get_post_meta( $post_id , '_email_address' , true ); 
            break;
        case 'phone_number' :
            echo get_post_meta( $post_id , '_phone_number' , true ); 
            break;
        case 'approve_status' :

            if(get_post_meta( $post_id , '_email_status' , true ) == 'pending'){
                echo "<a data-reqpostid='".$post_id."' data-reqemail='".get_post_meta( $post_id , '_email_address' , true )."' class='reqpost".$post_id." action-for-home-coupon' href='javascript:void(0)'>Pending</a>"; 
            }elseif(get_post_meta( $post_id , '_email_status' , true ) == 'completed'){
                echo "<a class='emailsent".$post_id."' href='javascript:void(0)'>Mail Sent</a>"; 
            }else{
                echo "<a data-reqpostid='".$post_id."' data-reqemail='".get_post_meta( $post_id , '_email_address' , true )."' class='reqpost".$post_id." action-for-home-coupon' href='javascript:void(0)'>Pending</a>"; 
            }
            echo "<a class='foreverhide emailsent".$post_id."' href='javascript:void(0)'>Mail Sent</a>"; 
            break;     
    }
} 

function disable_new_posts() {
    global $submenu;
    unset($submenu['edit.php?post_type=coupon_request'][10]);
    if (isset($_GET['post_type']) && $_GET['post_type'] == 'CUSTOM_POST_TYPE') {
        echo '<style type="text/css">
        #favorite-actions, .add-new-h2, .tablenav { display:none; }
        </style>';
    }
}

function home_page_coupon_process(){
    if(isset($_POST['process-with-home-coupon']) && $_POST['process-with-home-coupon'] == 'process-with-home-coupon'){
        $dataarray = array(
            'post_title'=>$_POST['coupon_first_name'].' '.$_POST['coupon_last_name'], 
            'post_type'=>'coupon_request', 
            'post_status'=>'publish'
        );
        $postid = wp_insert_post($dataarray);
        add_post_meta( $postid, '_first_name', $_POST['coupon_first_name'], true );
        add_post_meta( $postid, '_last_name', $_POST['coupon_last_name'], true );
        add_post_meta( $postid, '_email_address', $_POST['coupon_email'], true );
        add_post_meta( $postid, '_phone_number', $_POST['coupon_phone'], true ); 
        add_post_meta( $postid, '_email_status', 'pending', true ); 

        wp_redirect( site_url().'?CSucc' );   
        exit;         
    }
}


function admin_coupon_select_popup(){ ?>
    <div class="send_copon_popup_container">
        <div class="send_copon_popup_cover">
            <ul class="admin-approve-token-container">    
            <?php $args = array(
                'post_type' => 'shop_coupon',
                'posts_per_page' => -1
            );    

            $shop_query = new WP_Query($args);
            while ($shop_query->have_posts()) : $shop_query->the_post(); ?>
                <li data-couponid="<?php echo get_the_ID(); ?>" data-cpncodetitle="<?php echo get_the_title(); ?>" data-cpncodedes="<?php echo get_the_excerpt(); ?>" data-cpncodepri="<?php echo get_post_meta( get_the_ID(), 'coupon_amount', true ); ?>" data-cpnexp="<?php echo date('Y M D', get_post_meta( get_the_ID(), 'date_expires', true )); ?>">
                    <p>
                        <b>Coupon:</b><?php echo get_the_title(); ?>
                    </p>
                    <p>
                        <b>Description:</b><?php echo get_the_excerpt(); ?>
                    </p>

                    <p>
                        <b>Coupon Amount:</b><?php echo get_post_meta( get_the_ID(), 'coupon_amount', true ); ?>
                    </p>

                    <p>
                        <b>Expire Date:</b><?php echo date('Y M D', get_post_meta( get_the_ID(), 'date_expires', true )); ?>
                    </p>
                </li>

            <?php 
            endwhile;
            wp_reset_postdata(); ?>  
            </ul>

            <div class="PopupActions">
                <a href="javascript:void(0)" class="CloseAction">Close</a>
                <a href="Javascript:void(0)" class="SentAction">Sent Email</a>
            </div>
        </div>
    </div>
<?php }

function coupon_email_customer_fun(){
    /* I will uncomment will website will be live on server
    $to = $_POST['cusemail'];
    $subject = 'Enjoy the coupon discount';
    $body = '<b>Below is the coupon detail. Check and apply.</b><br>';
    $body .= '<b>Coupon:</b>'.$_POST['cpncodetitle'].'<br>';
    $body .= '<b>Coupon Short Description:</b>'.$_POST['cpncodedes'].'<br>';
    $body .= '<b>Coupon Discount Amount:</b>'.$_POST['cpncodepri'].'<br>';
    $body .= '<b>Coupon Expiry Date:</b>'.$_POST['cpnexp'];
    $headers = array('Content-Type: text/html; charset=UTF-8');
    wp_mail( $to, $subject, $body, $headers );
    */
    update_post_meta( $_POST['reqpostid'], '_email_status', 'completed' );
    die();
}


function mini_cart_sidebar(){ ?>


<div class="container-mini-cart">
<div class="mini-cart">
    <div class="minicartheader">
        <h3>Shopping Cart<h3>
        <span class="close-minicart" style='font-size:20px;'>&#10006;</span>
    </div>


    <div class="MiniCartReplacer">

        <div class="cartItemsList">
            <ul>
               <?php global $woocommerce;
                $items = $woocommerce->cart->get_cart();
                if(!empty($items)){
                    foreach($items as $item => $values) { 
                        
                        //$image = wp_get_attachment_image_src( get_post_thumbnail_id( $values['data']->get_id() ), 'single-post-thumbnail' );
                        $_product =  wc_get_product( $values['data']->get_id()); 
                        $price = get_post_meta($values['product_id'] , '_price', true);  
                        
                        $terms=get_the_terms($_product->get_id(),'product_cat');
                        if($terms[0]->slug!='sepecial-offers-products'){
                        ?>


                        <li>
                            <div class="chunkProductCon">

                                <div class="productImg">
                                        

                                    <img src="<?php echo get_the_post_thumbnail_url($values['data']->get_id(),'full'); ?>" height="100px" width="100px">
                                    
                                </div>

                                <div class="productDetail">
                                    <p><?php echo $_product->get_title(); ?></p>
                                    <p>Size:<?php if(!empty($values['variation'])){ echo $values['variation']['attribute_pa_size']; }?></p>
                                    <p><?php echo $values['quantity']; ?>&#10005;<span><?php echo get_woocommerce_currency_symbol(); ?><?php echo $price; ?></span></p>
                                </div>
                            </div>
                        </li> 
                <?php }  } } ?>


            </ul>
        </div>


        <div class="cartTotalContainer">
            <div class="labelcontainer">    
                Subtotal
            </div>
            <div class="valuecontainer">    
                <?php echo $woocommerce->cart->get_cart_total(); ?>
            </div>
        </div>
    </div>



    <div class="mini-cart-action-container">
        <a href="<?php echo get_the_permalink(get_option('woocommerce_cart_page_id')); ?>">View Cart</a>
        <?php if(!empty($items)){ ?>
            <a href="<?php echo get_the_permalink(get_option('woocommerce_checkout_page_id')); ?>">Checkout</a>
        <?php } ?>
    </div>

</div>
</div>
<?php }

// function addproduct(){
//     global $woocommerce;
//     $arr = array();
//     $woocommerce->cart->add_to_cart( 45, 8, 271, null, null ); 
// }


function hurry_shoping_fun(){ ob_start(); 

$args = array('post_type' => 'product','post_status' => 'publish','posts_per_page' => 8, 'tax_query'=>array(array('taxonomy' => 'product_cat','field'=>'slug','terms'=>array('sepecial-offers-products','sample-product'),'operator'=>'NOT IN',)));
    $loop = new WP_Query( $args ); 
    ?>
    <div class="productContainercover">
    <?php 


     
    while ( $loop->have_posts() ) : $loop->the_post();  
        $product = wc_get_product( get_the_ID() ); ?>
        
        
            <div class="productContainer">

                 
                <div class="loaderContainder">       
                    <div class="loader">Loading...</div>
                </div>       

                <div class="productContainer_content">
                <a href='<?php echo get_permalink(get_the_ID()) ?>'>
                <img src="<?php  echo get_the_post_thumbnail_url(get_the_ID(),'full') ?>" />
              
                 <h3><?php echo get_the_title(); ?></h3>
                   </a>
                <?php 
                $handle=new WC_Product_Variable(get_the_ID());
                $variations1=$handle->get_children();
                if(!empty($variations1)){
                    $count = 1;
                    $firstVariPrice = ""; 
                    foreach ($variations1 as $value) {
                        $single_variation=new WC_Product_Variation($value);
                        //echo '<option  value="'.$value.'">'.implode(" / ", $single_variation->get_variation_attributes()).'-'.get_woocommerce_currency_symbol().$single_variation->price.'</option>';
                        if($count == 1){
                            $firstVariPrice = $single_variation->price;
                        }
                        
                        ?>
                        <a style="display: none;" class="mevariant <?php if($count == 1){ echo 'Active'; } ?>" href="javascript:void(0)" data-finalvariant="<?php echo $value; ?>" data-variantprice="<?php echo $single_variation->price; ?>"><?php echo implode(" / ", $single_variation->get_variation_attributes()) ?></a>
                        <?php 
                        $count++;
                    }
                }else{
                    $firstVariPrice = ""; 
                }
                 ?>
                <?php if(!empty($product->get_price())){ ?>
                    <?php if(empty($firstVariPrice)){ ?>
                        <div class="productprice"><?php echo get_woocommerce_currency_symbol(); ?><?php echo $product->get_price(); ?> each</div>
                    <?php }else{ ?>
                        <div class="productprice"><?php echo get_woocommerce_currency_symbol(); ?><?php echo $firstVariPrice; ?> each</div>
                    <?php } ?>
                
                <?php } ?>

                <!-- <a class="AddToCartLink" data-productID="<?php // echo get_the_ID(); ?>" data-productQuantity="1"  href="javascript:void(0)">Add To Cart</a> -->
                <a class="AddToCartLink_new" href='<?php echo get_permalink(get_the_ID()) ?>'>view detail</a>
            </div>




        </div>
    <?php endwhile; ?>
    </div>
    <?php
    wp_reset_postdata();
 return ob_get_clean(); }




 function update_the_cart(){ 
    
    global $woocommerce;

    if(!empty($_POST['variant'])){
        $woocommerce->cart->add_to_cart( $_POST['productid'], $_POST['productquantity'], $_POST['variant'], null, null ); 
    }else{
        $woocommerce->cart->add_to_cart( $_POST['productid'], $_POST['productquantity'], null, null, null ); 
    }
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
 } ?>


 