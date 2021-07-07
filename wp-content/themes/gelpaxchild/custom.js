jQuery(document).ready(function(){



jQuery('#Mobile_view').click(function(){
jQuery('header#masthead #nav_bar').slideToggle();
// jQuery('.Mobile_view_close').show();
});	



jQuery('.coupon_code_cover').hide();
jQuery('#coupon_block .claim_now_btn').click(function(){
jQuery('.coupon_code_cover').show();
});

jQuery('.close_coupon').click(function(){
jQuery('.coupon_code_cover').hide();
});

jQuery('.woocommerce-order-received .order_details').next('p').hide();


jQuery('.search_view_con').hide();
jQuery('#search_view').click(function(){
jQuery('.search_view_con').show();
});

jQuery('.close_search_view').click(function(){
jQuery('.search_view_con').hide();
});

if (jQuery("body").hasClass("logged-in")) {
  jQuery("#login_view_login").hide();
  jQuery("#login_view_logout").show();
  jQuery(".checkout_login_div").hide();
}
else{
	jQuery("#login_view_login").show();
  jQuery("#login_view_logout").hide();
}



/* form */

jQuery("form[name='coupon_form']").submit(function(){
	var coupon_first_name = jQuery("[name='coupon_first_name']").val();
	if(coupon_first_name==""){
		jQuery(".coupon_first_name_error").html("Please Enter First Name");
		return false;
	}

	var coupon_last_name = jQuery("[name='coupon_last_name']").val();
	if(coupon_last_name==""){
		jQuery(".coupon_last_name_error").html("Please Enter Last Name");
		return false;
	}

	var coupon_email = jQuery("[name='coupon_email']").val();
	if(coupon_email==""){
		jQuery(".coupon_email_error").html("Please Enter Email Address");
		return false;
	}

	var coupon_phone = jQuery("[name='coupon_phone']").val();
	if(coupon_phone==""){
		jQuery(".coupon_phone_error").html("Please Enter Phone Number");
		return false;
	}

});

jQuery("form[name='custom_login']").submit(function(){

var subfirstname = jQuery("[name='subfirstname']").val();
if(subfirstname==''){
	jQuery('.subfirstname_error').html('Enter First Name');
	return false;
}

var sublastname = jQuery("[name='sublastname']").val();
if(sublastname==''){
	jQuery('.sublastname_error').html('Enter Last Name');
	return false;
}
var subphone = jQuery("[name='subphone']").val();
if(subphone==''){
	jQuery('.phone_error').html('Enter Phone Number');
	return false;
}
var email = jQuery("[name='email']").val();
if(email==''){
	jQuery('.email_error').html('Enter Email Address');
	return false;
}
var confirmemail = jQuery("[name='confirmemail']").val();
if(confirmemail==''){
	jQuery('.conform_email_error').html('Enter Confirm Email Address');
	return false;
}
var subpass = jQuery("[name='subpass']").val();
if(subpass==''){
	jQuery('.password_error').html('Enter Password');
	return false;
}
var consubpass = jQuery("[name='consubpass']").val();
if(consubpass==''){
	jQuery('.conform_password_error').html('Enter Confirm Password');
	return false;
}


});

if (jQuery("#pa_size option").length > 0){
    jQuery('#pa_size option')[1].selected = true;
    var var_id = jQuery('#pa_size').val();
    jQuery('.qty').val(var_id);
}

});


jQuery(document).on('click','.ajxaddproductpup',function(e){
	
	var id=jQuery(this).data('id');
	jQuery.post('/projects/wordpress/gelpax/wp-admin/admin-ajax.php',{'action':"my_add_cart_action",'product_id':id},function(response){
		
        var k=response.trim();
        if(k=="1"){
            
			jQuery('#cartbuttoncustom'+id).html('');

			jQuery('#cartbuttoncustom'+id).html('<a class="addbtnpopu ajxremoveproductpup" id="removebtnpopup'+id+'" data-id="'+id+'">Remove</a>');
			jQuery(document.body).trigger('update_checkout');
		}
	});
})


jQuery(document).on('click','.ajxremoveproductpup',function(e){
	
	var id=jQuery(this).data('id');
	jQuery.post('/projects/wordpress/gelpax/wp-admin/admin-ajax.php',{'action':"my_remove_cart_action",'product_id':id},function(response){
		
            var k=response.trim();
            
		if(k=="1"){
			
			jQuery('#cartbuttoncustom'+id).html('');

			jQuery('#cartbuttoncustom'+id).html('<a class="addbtnpopu ajxaddproductpup" id="addbtnpopup'+id+'" data-id="'+id+'">Add</a>');
			jQuery(document.body).trigger('update_checkout');
		}
	});
})



jQuery(document).on('click','.popmake-close',function(e){
	jQuery(document.body).trigger('update_checkout');
	jQuery.post('/projects/wordpress/gelpax/wp-admin/admin-ajax.php',{'action':"my_update_specialoffertable_action"},function(response){
		jQuery('#splofferproductinfocstm').html(response);
		
	});
});

jQuery(document).on('click','.personalisehidebtn',function(e){
	jQuery(this).hide();
	jQuery('#customisershow').hide();
	jQuery('.personaliseshowbtn').show();
});
jQuery(document).on('click','.personaliseshowbtn',function(e){
	jQuery(this).hide();
	jQuery('#customisershow').show();
	jQuery('.personalisehidebtn').show();
});


// function pietergoosen_comments_validation() {
// if(is_single() && comments_open() ) { 
//     wp_enqueue_script('jqueryvalidate', get_stylesheet_directory_uri().'/js/jquery.validate.pack.js', array('jquery'));
//     wp_enqueue_script('commentvalidation', get_stylesheet_directory_uri().'/js/comment-validation.js', array('jquery','jqueryvalidate'));
//     }
// }
// add_action('wp_enqueue_scripts', 'pietergoosen_comments_validation');



jQuery(function($) { 

    $(document).on('submit', '#review_form #commentform', function() {
    	var comment = $("#review_form #comment").val();
    	var author = $("#review_form #author").val();
    	var email = $("#review_form #email").val();
    	 $('#review_form #email').focusout(function(){
    $('#review_form #email').filter(function(){
      var email = $('#review_form #email').val();
      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      if ( !emailReg.test( email ) ) {
        alert('Please enter valid email');
        return false;
      } 
    });
  });  
    	if(comment===""){
    		alert("Please Enter Comment");

    		return false;
    	}  
    	
    	if(author==""){
    		alert("Please Enter Name");
    		return false;
    	} 
    	
    	 if(email==""){
    		alert("Please Enter Email");
    		return false;
    	}  
    	
    });


     $(document).on('submit', '.single-post #commentform', function() {
    	var comment_a = $(".single-post #comment").val();
    	var author_a = $(".single-post #author").val();
    	var email_a = $(".single-post #email").val();
    	 $('.single-post #email').focusout(function(){
    $('.single-post #email').filter(function(){
      var email_b = $('.single-post #email').val();
      var emailReg_b = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      if ( !emailReg_b.test( email_b) ) {
        alert('Please enter valid email');
        return false;
      } 
    });
  });  
    	if(comment_a===""){
    		alert("Please Enter Comment");

    		return false;
    	}  
    	
    	if(author_a==""){
    		alert("Please Enter Name");
    		return false;
    	} 
    	
    	 if(email_a==""){
    		alert("Please Enter Email");
    		return false;
    	}  
    	
    });


$(document).on('click', '.product-remove a.remove', function (e)
{
    e.preventDefault();
    console.log();
    
    var product_id = $(this).attr("data-product_id"),
        cart_item_key = $(this).attr("data-cart_item_key"),
        product_container = $(this).parents('.product-remove');

    // Add loader
    
    product_container.block({
        message: null,
        overlayCSS: {
            cursor: 'none'
        }
    });
    
    $.ajax({
        type: 'POST',
        url: wc_add_to_cart_params.ajax_url,
        data: {
            action: "product_remove",
            product_id: product_id,
            cart_item_key: cart_item_key
        },
        success: function(response) {
        	response = response.split('|')

            jQuery('.MiniCartReplacer').html(response[0]);   
            jQuery('#cart_view p').html(response[1]);   
            

            
           
            
        }
    });
});
$(document).on('click', '.restore-item', function (e)
{
    e.preventDefault();
    

    var cart_item_key = $(this).attr("data-site_item_key");

    
    
    $.ajax({
        type: 'POST',
        url: wc_add_to_cart_params.ajax_url,
        data: {
            action: "undo_remove",
            cart_item_key: cart_item_key
        },
        success: function(response) {
        	response = response.split('|')

            jQuery('.MiniCartReplacer').html(response[0]);   
            jQuery('#cart_view p').html(response[1]);   
            
         
        }
    });
  
});
$(document).on('click','.scndcartbtn', function(e){
    $('.single_add_to_cart_button').trigger('click');
});


$(document).on('click', '.chat_span_footer', function ()
{
    window.location = "javascript:void(Tawk_API.toggle())" + this.id;
});	
$(document).on('click', '#lastorderimage', function (){
    $('.single_add_to_cart_button').prop("disabled", true);
    if($(this).prop("checked") == true){
        $.post('/projects/wordpress/gelpax/wp-admin/admin-ajax.php',{'action':"my_last_order_data"},function(response){
            console.log(response);
            var k=response.trim();
            if(k!=""){
                $('#lastimagecustom').val(k);
                $('#lastimageoptioncustom').val('yes');
                $('.single_add_to_cart_button').prop("disabled", false);
            }
            else{
                $('#lastimagecustom').val("");
                $('#lastimageoptioncustom').val("no");
                $('#lastordererror').html("No Image Found From Last Order");
                $('.single_add_to_cart_button').prop("disabled", false);

            }
        });
        
    }
    else if($(this).prop("checked") == false){
        $('#lastimagecustom').val("");
        $('#lastimageoptioncustom').val("no");
        $('.single_add_to_cart_button').prop("disabled", false);
    }
});

$("#author, .name_valid, .coupon_first_name, .coupon_last_name, .name_val").keypress(function(event){
        var inputValue = event.charCode;
      if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
          event.preventDefault();
      }
  });

$('.wpcf7-tel, .coupon_phone, .number_val').keyup(function () {
    this.value = this.value.replace(/[^0-9\.]/g,'');
});

$("input").keypress(function(){
    $(this).siblings('span').remove();
});


$('a[target="_blank"]').removeAttr('target');


});


          
jQuery('#pa_size').change( function(){
    if( '' != jQuery('#pa_size').val() ) {
       var var_id = jQuery('#pa_size').val();
       jQuery('.qty').val(var_id);
      
    }
});

                 