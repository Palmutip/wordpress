<?php 
$cartable_header_cart	= get_theme_mod('header_cart','1');
?>  
   <div class="header-widget-info d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-wrapper">
                        <div class="brand-logo">
                            <div class="logo">
                                <?php
									if(has_custom_logo())
									{   
										the_custom_logo();
									}
									else { 
									?>
									<a href="<?php echo esc_url(home_url( '/' )); ?>" class="navbar-brand">
										<?php  echo esc_html(get_bloginfo('name')); ?>
									</a>
								 <?php
									}
								?>
								<?php
									$cartable_description = get_bloginfo( 'description');
									if ($cartable_description) : ?>
										<p class="site-description"><?php echo esc_html($cartable_description); ?></p>
								<?php endif; ?>
                            </div>
                        </div>
                        <div class="header-right">
                            <?php if (class_exists('WooCommerce')) { ?>
                            <div class="header-info">
                                <div class="header-categories-form">
                                    <form method="get" action="<?php echo esc_url(home_url('/')); ?>" class="search-form search-normal">
                                        <div>
                                            <span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'cartable' ); ?></span>
                                            <input type="hidden" name="post_type" value="product" />
                                            <input class="search-field" name="s" type="text" placeholder="<?php esc_attr_e('Find your product', 'cartable'); ?>"/>
                                            <div class="select-wraper">
                                                <select class="search-select" name="product_cat">
                                                    <option value=""><?php esc_html_e('All Categories', 'cartable'); ?></option> 
                                                    <?php
                                                    $categories = get_categories('taxonomy=product_cat');
                                                    foreach ($categories as $category) {
                                                        $option = '<option value="' . esc_attr($category->category_nicename) . '">';
                                                        $option .= esc_html($category->cat_name);
                                                        $option .= ' (' . absint($category->category_count) . ')';
                                                        $option .= '</option>';
                                                        echo $option; // WPCS: XSS OK.
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <button role="button" type="submit" class="search-submit" aria-label="<?php echo esc_attr_e( 'Search', 'cartable' ); ?>">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="header-single-widget">
                                <div class="menu-right">
                                    <ul class="wrap-right">
                                        <li class="search-button">
                                            <a href="#" id="view-search-btn" class="header-search-toggle"><i class="fa fa-search"></i></a>
                                            <!-- Quik search -->
                                            <div class="view-search-btn header-search-popup">
                                                <form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Site Search', 'cartable' ); ?>">
                                                    <span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'cartable' ); ?></span>
                                                    <input type="search" class="search-field header-search-field" placeholder="<?php esc_attr_e( 'Type To Search', 'cartable' ); ?>" name="s" id="popfocus" value="" autofocus>
                                                    <a href="#" class="close-style header-search-close"></a>
                                                </form>
                                            </div>
                                            <!-- / -->
                                        </li>
										<?php if($cartable_header_cart == '1'  && class_exists( 'WooCommerce' )){ ?>
                                        <li class="cart-wrapper">
                                            <div class="cart-icon-wrap">
                                                <a href="javascript:void(0)" id="cart"><i class="fa fa-shopping-bag"></i>
                                                <?php 
                                                if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                                                    $count = WC()->cart->cart_contents_count;
                                                    $cart_url = wc_get_cart_url();
                                                    
                                                    if ( $count > 0 ) {
                                                    ?>
                                                         <span><?php echo esc_html( $count ); ?></span>
                                                    <?php 
                                                    }
                                                    else {
                                                        ?>
                                                        <span><?php echo esc_html_e( '0','cartable' ); ?></span>
                                                        <?php 
                                                    }
                                                }
                                                ?>
                                                </a>
                                            </div>
                                            
                                            <!-- Shopping Cart -->
                                            <?php if ( class_exists( 'WooCommerce' ) ) { ?>
                                            <div id="header-cart" class="shopping-cart">
                                                <div class="cart-body">                                            
                                                    <?php get_template_part('woocommerce/cart/mini','cart');     ?>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <!--end shopping-cart -->
                                        </li>
										<?php } ?>
                                    </ul>                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="navigator-wrapper">
        <!-- Mobile Toggle -->
        <div class="theme-mobile-nav d-lg-none d-block <?php echo esc_attr(specia_sticky_menu()); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="theme-mobile-menu">
                            <div class="headtop-mobi">
                                <div class="headtop-shift">
                                    <a href="javascript:void(0);" class="header-sidebar-toggle open-toggle"><span></span></a>
                                    <a href="javascript:void(0);" class="header-sidebar-toggle close-button"><span></span></a>
                                    <div id="mob-h-top" class="mobi-head-top animated"></div>
                                </div>
                            </div>
                            <div class="mobile-logo">
                                 <?php
									if(has_custom_logo())
									{   
										the_custom_logo();
									}
									else { 
									?>
									<a href="<?php echo esc_url(home_url( '/' )); ?>" class="navbar-brand">
										<?php  echo esc_html(get_bloginfo('name')); ?>
									</a>
								 <?php
									}
								?>
								<?php
									$cartable_description = get_bloginfo( 'description');
									if ($cartable_description) : ?>
										<p class="site-description"><?php echo esc_html($cartable_description); ?></p>
								<?php endif; ?>
                            </div>
                            <div class="menu-toggle-wrap">
                                <div class="hamburger-menu">
                                    <a href="javascript:void(0);" class="menu-toggle">
                                        <div class="top-bun"></div>
                                        <div class="meat"></div>
                                        <div class="bottom-bun"></div>
                                    </a>
                                </div>
                            </div>
                            <div id="mobile-m" class="mobile-menu">
                                <div class="mobile-menu-shift">
                                    <a href="javascript:void(0);" class="close-style close-menu"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / -->

        <!-- Top Menu -->
        <div class="xl-nav-area d-none d-lg-block">
            <div class="navigation <?php echo esc_attr(specia_sticky_menu()); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 my-auto">
                            <div class="theme-menu">
                                <?php 
								$cartable_hs_nav_all_cat= get_theme_mod('hs_nav_all_cat','1');
								if ($cartable_hs_nav_all_cat=='1' && class_exists('WooCommerce')) { ?>
									<div class="menu-left">
										<div class="header-vertical-toggle">
											<a href="javascript:void(0);" class="bt-primary header-vertical-btn"><span> <i class="fa fa-list-ul"></i> <?php esc_html_e( 'All Categories', 'cartable' ); ?></span></a>
											<div class="header-vertical-bar">
												<ul class="main-menu menu-wrap">
													<?php
														$categories = array(
															  'taxonomy' => 'product_cat',
															  'hide_empty' => false,
															  'parent'   => 0
														  );
														$product_cat = get_terms( $categories );
														foreach ($product_cat as $parent_product_cat) {
															$child_args = array(
																'taxonomy' => 'product_cat',
																'hide_empty' => false,
																'parent'   => $parent_product_cat->term_id
															);
															$thumbnail_id = get_term_meta( $parent_product_cat->term_id, 'thumbnail_id', true );
															$image = wp_get_attachment_url( $thumbnail_id );
															$child_product_cats = get_terms( $child_args );
															if ( ! empty($child_product_cats) ) {
																echo '<li class="menu-item menu-item-has-children"><a href="'.get_term_link($parent_product_cat->term_id).'" class="nav-link">'.(!empty($image) ? "<img src='{$image}' alt='' width='20' height='20' />":''); echo $parent_product_cat->name.'</a>';
															} else {
																echo '<li class="menu-item"><a href="'.get_term_link($parent_product_cat->term_id).'" class="nav-link">'.(!empty($image) ? "<img src='{$image}' alt='' width='20' height='20' />":''); echo $parent_product_cat->name.'</a>';
															}
															if ( ! empty($child_product_cats) ) {
																echo '<ul class="dropdown-menu">';
																foreach ($child_product_cats as $child_product_cat) {
																echo '<li class="menu-item"><a href="'.get_term_link($child_product_cat->term_id).'" class="dropdown-item">'.$child_product_cat->name.'</a></li>';
																} echo '</ul>';
															} echo '</li>';
														} ?>
													</ul>
											</div>
											<div class="overlay-cover"></div>
										</div>
									</div>
								<?php } ?>
                                <nav class="menubar">
                                    <?php
                                        $cartable_btn_lbl		= get_theme_mod('button_label');
                                        $cartable_btn_url		= get_theme_mod('button_url');
                                        $cartable_btn_target	= get_theme_mod('button_target');  
                                        $cartable_hdr_btn_hs	= get_theme_mod('header_book_hide_show','1');
                                        
                                        wp_nav_menu( 
                                            array(  
                                                'theme_location' => 'primary_menu',
                                                'container'  => '',
                                                'menu_class' => 'menu-wrap',
                                                'fallback_cb' => 'specia_fallback_page_menu',
                                                'walker' => new specia_nav_walker()
                                                 ) 
                                            );
                                    ?>                               
                                </nav>
                                <div class="menu-right">
                                    <ul class="wrap-right">
                                        <?php
                                            if(($cartable_btn_target)== 1){ 
                                                $cartable_btn_target= "target='_blank'"; 
                                            }   
                                            if($cartable_hdr_btn_hs == '1' && !empty($cartable_btn_lbl)) { 
                                        ?>                            
                                        <li class="menu-item header_btn">
                                            <a href="<?php echo esc_url($cartable_btn_url); ?>" <?php echo esc_attr($cartable_btn_target); ?> class="bt-primary bt-effect-3"><?php echo esc_html($cartable_btn_lbl); ?></a>
                                        </li>
                                        <?php } ?>
                                    </ul>                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / -->
    </div>
</header>
<?php 
if ( !is_page_template( 'templates/template-homepage-one.php' )) {
		specia_breadcrumbs_style(); 
	}
?>