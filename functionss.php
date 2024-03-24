<?php
// Code home product
add_shortcode('home_product','home_product');
function home_product($args) {
	extract($args);
	$products = explode(",",$ids );
	if($products) { 
		ob_start();
		?>
		<div class="taxonomy-products home">
			<?php foreach($products as $product) { ?>
			<div class="box-product">
				<div class="box-product-inner">
					<?php $url = get_the_post_thumbnail_url($product, 'full');
							 if(!$url) $url = '/wp-content/uploads/2024/03/logo-square.png';
					?>
					<a href="<?php echo get_the_permalink($product); ?>" title="<?php echo get_the_title($product); ?>">
						<img src="<?php echo $url; ?>" alt="<?php echo get_the_title($product); ?>"/>
						<div class="product-info">
							<h3><?php echo get_the_title($product); ?></h3>
						</div>
					</a>
				</div>
			</div>
			<?php } ?>
		</div>
		<?php		
		$home = ob_get_contents();
		ob_end_clean();
		return $home;
		
	}
}
