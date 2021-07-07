<?php function proceed_with_js(){ ?>
<script>
        jQuery(".container-mini-cart").hide();
jQuery(document).on('click', '.Mobile_view_ic #cart_view', function(e){
    jQuery(".container-mini-cart").show();
    return false;
});

jQuery(document).on('click', '.close-minicart', function(){
    jQuery(".container-mini-cart").hide();
});


jQuery(document).on('click', '.mevariant', function(){

    jQuery(this).parent('.productContainer_content').children('.mevariant').removeClass('Active');
    jQuery(this).addClass('Active');
    jQuery(this).parent('.productContainer_content').children('.productprice').html('$'+jQuery(this).data('variantprice'));
    jQuery(this).parent('.productContainer_content').children('.AddToCartLink').attr("data-variantid",jQuery(this).data('finalvariant'));
});



jQuery(document).on('click', '.AddToCartLink', function(){
    var selectorme = jQuery(this).parent('.productContainer_content').parent('.productContainer').children('.loaderContainder');
    selectorme.show();


    var variant;
    if(jQuery(this).parent('.productContainer_content').children('.mevariant').length){
        variant =  jQuery(this).parent('.productContainer_content').children('.Active').data('finalvariant');
    }else{
        variant = "";
    }
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    ajaxRunning = true;
    jQuery.ajax({
        url: ajaxurl,
        type: "POST",
        data:{action:'update_the_cart', productid:jQuery(this).data('productid'), productquantity:jQuery(this).data('productquantity'), variant:variant},
        success:function(data) {
            selectorme.hide();

            data = data.split('|')

            jQuery('.MiniCartReplacer').html(data[0]);   
            jQuery('#cart_view p').html(data[1]);   
       },
        complete: function() { ajaxRunning = false; }
    });
});





// jQuery(document.body ).on( 'updated_cart_totals', function(){
//     alert("Ready to proceed");
// });
</script>



<?php } function proceed_with_js_second(){ ?>    
<script>
var dataemail = ''; var reqpostid; 
jQuery(document).on('click', '.action-for-home-coupon', function(){
    jQuery(".admin-approve-token-container li").removeClass('active');   
    jQuery(".send_copon_popup_container").show();
    dataemail = jQuery(this).data('reqemail');
    reqpostid = jQuery(this).data('reqpostid'); });
jQuery(document).on('click', '.CloseAction', function(){
    jQuery(".send_copon_popup_container").hide(); });
jQuery(document).on('click', '.admin-approve-token-container li', function(){
    jQuery(".admin-approve-token-container li").removeClass('active');   
    jQuery(this).addClass('active'); });
jQuery(document).on('click', '.SentAction', function(){
    var couponid = jQuery(".admin-approve-token-container li.active").data('couponid');
    var cpncodetitle = jQuery(".admin-approve-token-container li.active").data('cpncodetitle');
    var cpncodedes = jQuery(".admin-approve-token-container li.active").data('cpncodedes');
    var cpncodepri = jQuery(".admin-approve-token-container li.active").data('cpncodepri');
    var cpnexp = jQuery(".admin-approve-token-container li.active").data('cpnexp');
    if(cpncodetitle == undefined || cpncodedes == undefined || cpncodepri == undefined || cpnexp == undefined){
        alert("Kinldy select the coupon from coupon list");
    }else{
            jQuery(".CloseAction, .SentAction").hide();
            var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
            ajaxRunning = true;
            jQuery.ajax({
                url: ajaxurl,
                type: "POST",
                data:{action:'coupon_email_customer', couponid:couponid, cusemail:dataemail, cpncodetitle:cpncodetitle, cpncodedes:cpncodedes, cpncodepri:cpncodepri, cpnexp:cpnexp, reqpostid:reqpostid},
                success:function(data) { location.reload() },
                complete: function() { ajaxRunning = false; }
            });
    }});
</script>       
<?php } ?>