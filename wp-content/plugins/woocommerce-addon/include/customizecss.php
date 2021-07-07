<?php function proceed_with_css_second(){ ?>
    <style>
        .send_copon_popup_container {
            position: fixed;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            height:300px;
            width:40%;
            background:#ffffff;
            border:solid 1px #ccc;
            display:none;
        }

        .admin-approve-token-container li{
            padding: 20px;cursor: pointer;
		    text-align: center;
		    border: 1px solid #f0f0f1;
		    margin: 0px 7px 20px;
        }

        ul.admin-approve-token-container li:nth-child(odd) {
			    background: #f9f9f9;
			}
		ul.admin-approve-token-container li:nth-child(even) {
			    background: #fff;
			}
		ul.admin-approve-token-container li p {
		    color: #000;
		}
		.admin-approve-token-container li.active {
		    background: #1891fb !important;
		    color: #ffffff;
		}	
		.admin-approve-token-container li.active p {
		    color: #fff;
		}	
		.admin-approve-token-container li p b {
		    padding-right: 5px;font-size: 15px;
		}
		.admin-approve-token-container li P {
		    font-size: 14px;
		}
		.send_copon_popup_cover {
		   display: inline-block;
		    width: 100%;
		    background: #fff;
		    padding: 20px;
		    position: relative;
		    height: 500px;
		    overflow: hidden;
		    overflow-y: scroll;
		}
		.send_copon_popup_cover .PopupActions a {
		    margin-left: 12px;
		    font-size: 15px;
		    border-radius: 3px;
		    padding: 5px 15px;
		    background: #1891fb;
		    text-decoration: none;
		    color: #fff;
		}
		.send_copon_popup_cover .PopupActions {
		    text-align: center;    margin: 40px 0 20px;
		}

		.send_copon_popup_cover::-webkit-scrollbar {
		  width: 1em;
		}
		 
		.send_copon_popup_cover::-webkit-scrollbar-track {
		  box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
		}
		 
		.send_copon_popup_cover::-webkit-scrollbar-thumb {
		  background-color: #1891fb;
		  outline: 1px solid slategrey;
		}

		.foreverhide{
			display:none;
		}
		<?php if($_GET['post_type'] == 'coupon_request'){ ?>
			.page-title-action{ display:none; }
		<?php } ?>
    </style> 
<?php } 

function front_end_css(){ ?>

<style>

.mini-cart{
	overflow-y: scroll;
}


.loader,
.loader:after {
  border-radius: 50%;
  width: 10em;
  height: 10em;
}
.loader {
  margin: 60px auto;
  font-size: 10px;
  position: relative;
  text-indent: -9999em;
  border-top: 1.1em solid rgba(255, 255, 255, 0.2);
  border-right: 1.1em solid rgba(255, 255, 255, 0.2);
  border-bottom: 1.1em solid rgba(255, 255, 255, 0.2);
  border-left: 1.1em solid #ffffff;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-animation: load8 1.1s infinite linear;
  animation: load8 1.1s infinite linear;
}
@-webkit-keyframes load8 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes load8 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

.loaderContainder{
	position: absolute;
	top:0px;
	left: :0px;
	height: 100%;
	width: 100%;
	background: rgba(0,0,0,0.5);
	display:none;
}


.productContainer{ 
	position: relative;
}


.loaderContainder .loader::before{
	visibility: hidden;
}
.loaderContainder .loader{
  width: 50px;
  height: 50px;
  position: absolute;
  top: 50%;
  left: 50%;
  margin: -25px 0 0 -25px;
}

</style> 

<?php } ?> 