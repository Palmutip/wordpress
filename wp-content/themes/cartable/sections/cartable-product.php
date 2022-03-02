<?php 
	$cartable_product_hs	= get_theme_mod('product_hs','1');
	$cartable_product_title	= get_theme_mod('product_title'); 
	$cartable_product_desc	= get_theme_mod('product_description'); 
	$cartable_product_num	= get_theme_mod('product_display_num','8'); 		
	
	if ($cartable_product_hs=='1' && class_exists( 'woocommerce' ) ) {
	$cartable_product_args  = array(
		'post_type' => 'product',
		'posts_per_page' => $cartable_product_num
	);
	/* Exclude hidden products from the loop */
	$cartable_product_args['tax_query'] = array(
		array(
			'taxonomy' => 'product_visibility',
			'field'    => 'name',
			'terms'    => 'exclude-from-catalog',
			'operator' => 'NOT IN',

		),
	);
?>

	<section id ="product-filter" class="product-version-one product-home">
		<div class="container">
			<div class="row text-center padding-top-60 padding-bottom-30">
				<div class="col-sm-12">
				<?php if ($cartable_product_title) : ?>
					<h2 class="section-heading wow zoomIn"><?php echo wp_filter_post_kses($cartable_product_title); ?></h2>
				<?php endif; ?>
				
				<?php if ($cartable_product_desc) : ?>
					<p class="section-description"><?php echo esc_html($cartable_product_desc); ?></p>
				<?php endif; ?>
				</div>
			</div>
			
			<div class="row padding-top-60 margin-bottom-60 woocommerce" id="grid">
				<?php
					$cartable_product_loop = new WP_Query( $cartable_product_args );
					while ( $cartable_product_loop->have_posts() ) : $cartable_product_loop->the_post(); global $product; ?>
						<div class="col-md-3 col-sm-6 col-xs-12 woo-shop margin-bottom-20">
							 <div class="single-product">
									<?php if ( $product->is_on_sale() ) : ?>
										<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'cartable' ) . '</span>', $post, $product ); ?>
									<?php endif; ?>
									<a href="<?php echo esc_url(the_permalink()); ?>"><?php the_post_thumbnail(); ?></a>
									<h2 class="woocommerce-loop-product__title"><a href="<?php echo esc_url(the_permalink()); ?>"><?php echo the_title(); ?></a></h2>
									<span class="price"><?php echo $product->get_price_html(); ?></span>
								<span class="button product_type_simple add_to_cart_button ajax_add_to_cart"><?php woocommerce_template_loop_add_to_cart(); ?></span>
							</div>
						</div>	
					<?php endwhile; ?>
				<?php  wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
<div class="clearfix"></div>
<?php } ?>