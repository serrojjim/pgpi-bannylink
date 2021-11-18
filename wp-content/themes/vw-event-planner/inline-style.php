<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_event_planner_first_color = get_theme_mod('vw_event_planner_first_color');

	$vw_event_planner_custom_css = '';

	if($vw_event_planner_first_color != false){
		$vw_event_planner_custom_css .='.book-now a:hover, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, #slider .view-more:hover, .footer .tagcloud a:hover, .sidebar .custom-social-icons i:hover, .footer .custom-social-icons i:hover, .pagination span, .pagination a, nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #comments a.comment-reply-link, .sidebar .widget_price_filter .ui-slider .ui-slider-range, .sidebar .widget_price_filter .ui-slider .ui-slider-handle, .footer .widget_price_filter .ui-slider .ui-slider-range, .footer .widget_price_filter .ui-slider .ui-slider-handle, .nav-previous a, .nav-next a, .woocommerce nav.woocommerce-pagination ul li a, #preloader{';
			$vw_event_planner_custom_css .='background-color: '.esc_attr($vw_event_planner_first_color).';';
		$vw_event_planner_custom_css .='}';
	}
	if($vw_event_planner_first_color != false){
		$vw_event_planner_custom_css .='#slider .view-more, p.site-description, .serv-box i:hover, .footer li a:hover, .sidebar ul li a:hover, .post-main-box:hover h2, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .main-navigation a:hover, .main-navigation ul.sub-menu a:hover, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, .post-main-box:hover h2 a, .post-main-box:hover .post-info a, .single-post .post-info:hover a, .logo .site-title a:hover{';
			$vw_event_planner_custom_css .='color: '.esc_attr($vw_event_planner_first_color).';';
		$vw_event_planner_custom_css .='}';
	}
	if($vw_event_planner_first_color != false){
		$vw_event_planner_custom_css .='.post-info hr, .main-navigation ul ul{';
			$vw_event_planner_custom_css .='border-top-color: '.esc_attr($vw_event_planner_first_color).';';
		$vw_event_planner_custom_css .='}';
	}
	if($vw_event_planner_first_color != false){
		$vw_event_planner_custom_css .='.header-fixed, .main-navigation ul ul{';
			$vw_event_planner_custom_css .='border-bottom-color: '.esc_attr($vw_event_planner_first_color).';';
		$vw_event_planner_custom_css .='}';
	}
	if($vw_event_planner_first_color != false){
		$vw_event_planner_custom_css .='.post-main-box, .sidebar .widget{
		box-shadow: 0px 15px 10px -15px '.esc_attr($vw_event_planner_first_color).';
		}';
	}
	if($vw_event_planner_first_color != false){
		$vw_event_planner_custom_css .='.serv-box{
		background: linear-gradient(to bottom,'.esc_attr($vw_event_planner_first_color).' 30%, transparent 80%);
		}';
	}

	/*-------------------Second highlight color-------------------*/

	$vw_event_planner_second_color = get_theme_mod('vw_event_planner_second_color');

	if($vw_event_planner_second_color != false){
		$vw_event_planner_custom_css .='.book-now a, .sidebar .custom-social-icons i, .footer .custom-social-icons i, .sidebar .tagcloud a:hover, .pagination .current, .pagination a:hover, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .nav-previous a:hover, .nav-next a:hover, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current{';
			$vw_event_planner_custom_css .='background-color: '.esc_attr($vw_event_planner_second_color).';';
		$vw_event_planner_custom_css .='}';
	}
	if($vw_event_planner_second_color != false){
		$vw_event_planner_custom_css .='a, .custom-social-icons i:hover, .logo h1 a, .logo p.site-title a, .search-box i, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, #serv-section h2, h1, h2, h3, h4, h5, h6, .post-navigation a, .sidebar h3, .sidebar caption, h2.woocommerce-loop-product__title, .woocommerce div.product .product_title, .woocommerce-message::before, .post-main-box h3, .main-navigation a, .main-navigation ul ul a, .post-main-box h2, nav.woocommerce-MyAccount-navigation ul li a:hover, #slider .inner_carousel h1 a:hover, .sidebar .wp-block-search .wp-block-search__label{';
			$vw_event_planner_custom_css .='color: '.esc_attr($vw_event_planner_second_color).';';
		$vw_event_planner_custom_css .='}';
	}
	if($vw_event_planner_second_color != false){
		$vw_event_planner_custom_css .='.woocommerce-message{';
			$vw_event_planner_custom_css .='border-top-color: '.esc_attr($vw_event_planner_second_color).';';
		$vw_event_planner_custom_css .='}';
	}
	if($vw_event_planner_second_color != false){
		$vw_event_planner_custom_css .='nav.woocommerce-MyAccount-navigation ul li{
		box-shadow: 2px 2px 0 0 '.esc_attr($vw_event_planner_second_color).';
		}';
	}
	if($vw_event_planner_second_color != false || $vw_event_planner_first_color != false){
		$vw_event_planner_custom_css .='.home-page-header, input[type="submit"], .scrollup i, .footer-2, .view-more, #comments input[type="submit"], #slider, .footer .woocommerce-product-search button, .sidebar .woocommerce-product-search button, .footer a.custom_read_more, .sidebar a.custom_read_more, .wp-block-button__link, .wp-block-button .wp-block-button__link:hover, .footer .wp-block-search .wp-block-search__button, .sidebar .wp-block-search .wp-block-search__button{
		background: linear-gradient(to right, '.esc_attr($vw_event_planner_second_color).', '.esc_attr($vw_event_planner_first_color).');
		}';
	}
	if($vw_event_planner_second_color != false || $vw_event_planner_first_color != false){
		$vw_event_planner_custom_css .='.serv-box:hover{
		background: linear-gradient(to bottom, '.esc_attr($vw_event_planner_second_color).', '.esc_attr($vw_event_planner_first_color).');
		}';
	}
	/*---------------Width Layout -------------------*/

	$vw_event_planner_theme_lay = get_theme_mod( 'vw_event_planner_width_option','Full Width');
    if($vw_event_planner_theme_lay == 'Boxed'){
		$vw_event_planner_custom_css .='body{';
			$vw_event_planner_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_event_planner_custom_css .='}';
		$vw_event_planner_custom_css .='#slider .carousel-caption{';
			$vw_event_planner_custom_css .='top: 55%;';
		$vw_event_planner_custom_css .='}';
		$vw_event_planner_custom_css .='.scrollup i{';
			$vw_event_planner_custom_css .='right: 100px;';
		$vw_event_planner_custom_css .='}';
		$vw_event_planner_custom_css .='.scrollup.left i{';
			$vw_event_planner_custom_css .='left: 100px;';
		$vw_event_planner_custom_css .='}';
	}else if($vw_event_planner_theme_lay == 'Wide Width'){
		$vw_event_planner_custom_css .='body{';
			$vw_event_planner_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_event_planner_custom_css .='}';
		$vw_event_planner_custom_css .='#slider .carousel-caption{';
			$vw_event_planner_custom_css .='top: 55%;';
		$vw_event_planner_custom_css .='}';
		$vw_event_planner_custom_css .='.scrollup i{';
			$vw_event_planner_custom_css .='right: 30px;';
		$vw_event_planner_custom_css .='}';
		$vw_event_planner_custom_css .='.scrollup.left i{';
			$vw_event_planner_custom_css .='left: 30px;';
		$vw_event_planner_custom_css .='}';
	}else if($vw_event_planner_theme_lay == 'Full Width'){
		$vw_event_planner_custom_css .='body{';
			$vw_event_planner_custom_css .='max-width: 100%;';
		$vw_event_planner_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_event_planner_theme_lay = get_theme_mod( 'vw_event_planner_slider_opacity_color','0.5');
	if($vw_event_planner_theme_lay == '0'){
		$vw_event_planner_custom_css .='#slider img{';
			$vw_event_planner_custom_css .='opacity:0';
		$vw_event_planner_custom_css .='}';
		}else if($vw_event_planner_theme_lay == '0.1'){
		$vw_event_planner_custom_css .='#slider img{';
			$vw_event_planner_custom_css .='opacity:0.1';
		$vw_event_planner_custom_css .='}';
		}else if($vw_event_planner_theme_lay == '0.2'){
		$vw_event_planner_custom_css .='#slider img{';
			$vw_event_planner_custom_css .='opacity:0.2';
		$vw_event_planner_custom_css .='}';
		}else if($vw_event_planner_theme_lay == '0.3'){
		$vw_event_planner_custom_css .='#slider img{';
			$vw_event_planner_custom_css .='opacity:0.3';
		$vw_event_planner_custom_css .='}';
		}else if($vw_event_planner_theme_lay == '0.4'){
		$vw_event_planner_custom_css .='#slider img{';
			$vw_event_planner_custom_css .='opacity:0.4';
		$vw_event_planner_custom_css .='}';
		}else if($vw_event_planner_theme_lay == '0.5'){
		$vw_event_planner_custom_css .='#slider img{';
			$vw_event_planner_custom_css .='opacity:0.5';
		$vw_event_planner_custom_css .='}';
		}else if($vw_event_planner_theme_lay == '0.6'){
		$vw_event_planner_custom_css .='#slider img{';
			$vw_event_planner_custom_css .='opacity:0.6';
		$vw_event_planner_custom_css .='}';
		}else if($vw_event_planner_theme_lay == '0.7'){
		$vw_event_planner_custom_css .='#slider img{';
			$vw_event_planner_custom_css .='opacity:0.7';
		$vw_event_planner_custom_css .='}';
		}else if($vw_event_planner_theme_lay == '0.8'){
		$vw_event_planner_custom_css .='#slider img{';
			$vw_event_planner_custom_css .='opacity:0.8';
		$vw_event_planner_custom_css .='}';
		}else if($vw_event_planner_theme_lay == '0.9'){
		$vw_event_planner_custom_css .='#slider img{';
			$vw_event_planner_custom_css .='opacity:0.9';
		$vw_event_planner_custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$vw_event_planner_theme_lay = get_theme_mod( 'vw_event_planner_slider_content_option','Center');
    if($vw_event_planner_theme_lay == 'Left'){
		$vw_event_planner_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_event_planner_custom_css .='text-align:left; left:15%; right:45%;';
		$vw_event_planner_custom_css .='}';
	}else if($vw_event_planner_theme_lay == 'Center'){
		$vw_event_planner_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_event_planner_custom_css .='text-align:center; left:22%; right:22%;';
		$vw_event_planner_custom_css .='}';
	}else if($vw_event_planner_theme_lay == 'Right'){
		$vw_event_planner_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_event_planner_custom_css .='text-align:right; left:45%; right:15%;';
		$vw_event_planner_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_event_planner_slider_height = get_theme_mod('vw_event_planner_slider_height');
	if($vw_event_planner_slider_height != false){
		$vw_event_planner_custom_css .='#slider img{';
			$vw_event_planner_custom_css .='height: '.esc_attr($vw_event_planner_slider_height).';';
		$vw_event_planner_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_event_planner_slider = get_theme_mod('vw_event_planner_slider_hide_show');
	if($vw_event_planner_slider == false){
		$vw_event_planner_custom_css .='.page-template-custom-home-page .home-page-header{';
			$vw_event_planner_custom_css .='background-image: linear-gradient(to right, #4a007d , #d1007b); padding: 0 20px 20px;';
		$vw_event_planner_custom_css .='}';
		$vw_event_planner_custom_css .='#serv-section{';
			$vw_event_planner_custom_css .='margin-top: 12em;';
		$vw_event_planner_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_event_planner_theme_lay = get_theme_mod( 'vw_event_planner_blog_layout_option','Default');
    if($vw_event_planner_theme_lay == 'Default'){
		$vw_event_planner_custom_css .='.post-main-box{';
			$vw_event_planner_custom_css .='';
		$vw_event_planner_custom_css .='}';
	}else if($vw_event_planner_theme_lay == 'Center'){
		$vw_event_planner_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$vw_event_planner_custom_css .='text-align:center;';
		$vw_event_planner_custom_css .='}';
		$vw_event_planner_custom_css .='.post-info{';
			$vw_event_planner_custom_css .='margin-top:10px;';
		$vw_event_planner_custom_css .='}';
		$vw_event_planner_custom_css .='.post-info hr{';
			$vw_event_planner_custom_css .='margin:15px auto;';
		$vw_event_planner_custom_css .='}';
	}else if($vw_event_planner_theme_lay == 'Left'){
		$vw_event_planner_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_event_planner_custom_css .='text-align:Left;';
		$vw_event_planner_custom_css .='}';
		$vw_event_planner_custom_css .='.post-info hr{';
			$vw_event_planner_custom_css .='margin-bottom:10px;';
		$vw_event_planner_custom_css .='}';
		$vw_event_planner_custom_css .='.post-main-box h2{';
			$vw_event_planner_custom_css .='margin-top:10px;';
		$vw_event_planner_custom_css .='}';
	}

	/*------------------------------Responsive Media -----------------------*/

	$vw_event_planner_resp_topbar = get_theme_mod( 'vw_event_planner_resp_topbar_hide_show',false);
	if($vw_event_planner_resp_topbar == true && get_theme_mod( 'vw_event_planner_topbar_hide_show', false) == false){
    	$vw_event_planner_custom_css .='#topbar{';
			$vw_event_planner_custom_css .='display:none;';
		$vw_event_planner_custom_css .='} ';
	}
    if($vw_event_planner_resp_topbar == true){
    	$vw_event_planner_custom_css .='@media screen and (max-width:575px) {';
		$vw_event_planner_custom_css .='#topbar{';
			$vw_event_planner_custom_css .='display:block;';
		$vw_event_planner_custom_css .='} }';
	}else if($vw_event_planner_resp_topbar == false){
		$vw_event_planner_custom_css .='@media screen and (max-width:575px) {';
		$vw_event_planner_custom_css .='#topbar{';
			$vw_event_planner_custom_css .='display:none;';
		$vw_event_planner_custom_css .='} }';
	}

	$vw_event_planner_resp_stickyheader = get_theme_mod( 'vw_event_planner_stickyheader_hide_show',false);
	if($vw_event_planner_resp_stickyheader == true && get_theme_mod( 'vw_event_planner_sticky_header',false) != true){
    	$vw_event_planner_custom_css .='.header-fixed{';
			$vw_event_planner_custom_css .='position:static;';
		$vw_event_planner_custom_css .='} ';
	}
    if($vw_event_planner_resp_stickyheader == true){
    	$vw_event_planner_custom_css .='@media screen and (max-width:575px) {';
		$vw_event_planner_custom_css .='.header-fixed{';
			$vw_event_planner_custom_css .='position:fixed;';
		$vw_event_planner_custom_css .='} }';
	}else if($vw_event_planner_resp_stickyheader == false){
		$vw_event_planner_custom_css .='@media screen and (max-width:575px){';
		$vw_event_planner_custom_css .='.header-fixed{';
			$vw_event_planner_custom_css .='position:static;';
		$vw_event_planner_custom_css .='} }';
	}

	$vw_event_planner_resp_slider = get_theme_mod( 'vw_event_planner_resp_slider_hide_show',false);
	if($vw_event_planner_resp_slider == true && get_theme_mod( 'vw_event_planner_slider_hide_show', false) == false){
    	$vw_event_planner_custom_css .='#slider{';
			$vw_event_planner_custom_css .='display:none;';
		$vw_event_planner_custom_css .='} ';
	}
    if($vw_event_planner_resp_slider == true){
    	$vw_event_planner_custom_css .='@media screen and (max-width:575px) {';
		$vw_event_planner_custom_css .='#slider{';
			$vw_event_planner_custom_css .='display:block;';
		$vw_event_planner_custom_css .='} }';
	}else if($vw_event_planner_resp_slider == false){
		$vw_event_planner_custom_css .='@media screen and (max-width:575px) {';
		$vw_event_planner_custom_css .='#slider{';
			$vw_event_planner_custom_css .='display:none;';
		$vw_event_planner_custom_css .='} }';
	}

	$vw_event_planner_resp_sidebar = get_theme_mod( 'vw_event_planner_sidebar_hide_show',true);
    if($vw_event_planner_resp_sidebar == true){
    	$vw_event_planner_custom_css .='@media screen and (max-width:575px) {';
		$vw_event_planner_custom_css .='.sidebar{';
			$vw_event_planner_custom_css .='display:block;';
		$vw_event_planner_custom_css .='} }';
	}else if($vw_event_planner_resp_sidebar == false){
		$vw_event_planner_custom_css .='@media screen and (max-width:575px) {';
		$vw_event_planner_custom_css .='.sidebar{';
			$vw_event_planner_custom_css .='display:none;';
		$vw_event_planner_custom_css .='} }';
	}

	$vw_event_planner_resp_scroll_top = get_theme_mod( 'vw_event_planner_resp_scroll_top_hide_show',true);
	if($vw_event_planner_resp_scroll_top == true && get_theme_mod( 'vw_event_planner_hide_show_scroll',true) != true){
    	$vw_event_planner_custom_css .='.scrollup i{';
			$vw_event_planner_custom_css .='visibility:hidden !important;';
		$vw_event_planner_custom_css .='} ';
	}
    if($vw_event_planner_resp_scroll_top == true){
    	$vw_event_planner_custom_css .='@media screen and (max-width:575px) {';
		$vw_event_planner_custom_css .='.scrollup i{';
			$vw_event_planner_custom_css .='visibility:visible !important;';
		$vw_event_planner_custom_css .='} }';
	}else if($vw_event_planner_resp_scroll_top == false){
		$vw_event_planner_custom_css .='@media screen and (max-width:575px){';
		$vw_event_planner_custom_css .='.scrollup i{';
			$vw_event_planner_custom_css .='visibility:hidden !important;';
		$vw_event_planner_custom_css .='} }';
	}

	/*------------- Top Bar Settings ------------------*/

	$vw_event_planner_topbar_padding_top_bottom = get_theme_mod('vw_event_planner_topbar_padding_top_bottom');
	if($vw_event_planner_topbar_padding_top_bottom != false){
		$vw_event_planner_custom_css .='#topbar{';
			$vw_event_planner_custom_css .='padding-top: '.esc_attr($vw_event_planner_topbar_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_event_planner_topbar_padding_top_bottom).';';
		$vw_event_planner_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_event_planner_sticky_header_padding = get_theme_mod('vw_event_planner_sticky_header_padding');
	if($vw_event_planner_sticky_header_padding != false){
		$vw_event_planner_custom_css .='.header-fixed{';
			$vw_event_planner_custom_css .='padding: '.esc_attr($vw_event_planner_sticky_header_padding).';';
		$vw_event_planner_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/
	
	$vw_event_planner_search_font_size = get_theme_mod('vw_event_planner_search_font_size');
	if($vw_event_planner_search_font_size != false){
		$vw_event_planner_custom_css .='.search-box i{';
			$vw_event_planner_custom_css .='font-size: '.esc_attr($vw_event_planner_search_font_size).';';
		$vw_event_planner_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_event_planner_button_padding_top_bottom = get_theme_mod('vw_event_planner_button_padding_top_bottom');
	$vw_event_planner_button_padding_left_right = get_theme_mod('vw_event_planner_button_padding_left_right');
	if($vw_event_planner_button_padding_top_bottom != false || $vw_event_planner_button_padding_left_right != false){
		$vw_event_planner_custom_css .='.content-bttn .view-more{';
			$vw_event_planner_custom_css .='padding-top: '.esc_attr($vw_event_planner_button_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_event_planner_button_padding_top_bottom).';padding-left: '.esc_attr($vw_event_planner_button_padding_left_right).';padding-right: '.esc_attr($vw_event_planner_button_padding_left_right).';';
		$vw_event_planner_custom_css .='}';
	}

	$vw_event_planner_button_border_radius = get_theme_mod('vw_event_planner_button_border_radius');
	if($vw_event_planner_button_border_radius != false){
		$vw_event_planner_custom_css .='.content-bttn .view-more{';
			$vw_event_planner_custom_css .='border-radius: '.esc_attr($vw_event_planner_button_border_radius).'px;';
		$vw_event_planner_custom_css .='}';
	}

	/*------------- Single Blog Page------------------*/

	$vw_event_planner_single_blog_post_navigation_show_hide = get_theme_mod('vw_event_planner_single_blog_post_navigation_show_hide',true);
	if($vw_event_planner_single_blog_post_navigation_show_hide != true){
		$vw_event_planner_custom_css .='.post-navigation{';
			$vw_event_planner_custom_css .='display: none;';
		$vw_event_planner_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_event_planner_copyright_font_size = get_theme_mod('vw_event_planner_copyright_font_size');
	if($vw_event_planner_copyright_font_size != false){
		$vw_event_planner_custom_css .='.copyright p{';
			$vw_event_planner_custom_css .='font-size: '.esc_attr($vw_event_planner_copyright_font_size).';';
		$vw_event_planner_custom_css .='}';
	}

	$vw_event_planner_copyright_padding_top_bottom = get_theme_mod('vw_event_planner_copyright_padding_top_bottom');
	if($vw_event_planner_copyright_padding_top_bottom != false){
		$vw_event_planner_custom_css .='.footer-2{';
			$vw_event_planner_custom_css .='padding-top: '.esc_attr($vw_event_planner_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_event_planner_copyright_padding_top_bottom).';';
		$vw_event_planner_custom_css .='}';
	}

	$vw_event_planner_copyright_alignment = get_theme_mod('vw_event_planner_copyright_alignment');
	if($vw_event_planner_copyright_alignment != false){
		$vw_event_planner_custom_css .='.copyright p{';
			$vw_event_planner_custom_css .='text-align: '.esc_attr($vw_event_planner_copyright_alignment).';';
		$vw_event_planner_custom_css .='}';
	}
	/*----------------Sroll to top Settings ------------------*/

	$vw_event_planner_scroll_to_top_font_size = get_theme_mod('vw_event_planner_scroll_to_top_font_size');
	if($vw_event_planner_scroll_to_top_font_size != false){
		$vw_event_planner_custom_css .='.scrollup i{';
			$vw_event_planner_custom_css .='font-size: '.esc_attr($vw_event_planner_scroll_to_top_font_size).';';
		$vw_event_planner_custom_css .='}';
	}

	$vw_event_planner_scroll_to_top_padding = get_theme_mod('vw_event_planner_scroll_to_top_padding');
	$vw_event_planner_scroll_to_top_padding = get_theme_mod('vw_event_planner_scroll_to_top_padding');
	if($vw_event_planner_scroll_to_top_padding != false){
		$vw_event_planner_custom_css .='.scrollup i{';
			$vw_event_planner_custom_css .='padding-top: '.esc_attr($vw_event_planner_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_event_planner_scroll_to_top_padding).';';
		$vw_event_planner_custom_css .='}';
	}

	$vw_event_planner_scroll_to_top_width = get_theme_mod('vw_event_planner_scroll_to_top_width');
	if($vw_event_planner_scroll_to_top_width != false){
		$vw_event_planner_custom_css .='.scrollup i{';
			$vw_event_planner_custom_css .='width: '.esc_attr($vw_event_planner_scroll_to_top_width).';';
		$vw_event_planner_custom_css .='}';
	}

	$vw_event_planner_scroll_to_top_height = get_theme_mod('vw_event_planner_scroll_to_top_height');
	if($vw_event_planner_scroll_to_top_height != false){
		$vw_event_planner_custom_css .='.scrollup i{';
			$vw_event_planner_custom_css .='height: '.esc_attr($vw_event_planner_scroll_to_top_height).';';
		$vw_event_planner_custom_css .='}';
	}

	$vw_event_planner_scroll_to_top_border_radius = get_theme_mod('vw_event_planner_scroll_to_top_border_radius');
	if($vw_event_planner_scroll_to_top_border_radius != false){
		$vw_event_planner_custom_css .='.scrollup i{';
			$vw_event_planner_custom_css .='border-radius: '.esc_attr($vw_event_planner_scroll_to_top_border_radius).'px;';
		$vw_event_planner_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_event_planner_social_icon_font_size = get_theme_mod('vw_event_planner_social_icon_font_size');
	if($vw_event_planner_social_icon_font_size != false){
		$vw_event_planner_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_event_planner_custom_css .='font-size: '.esc_attr($vw_event_planner_social_icon_font_size).';';
		$vw_event_planner_custom_css .='}';
	}

	$vw_event_planner_social_icon_padding = get_theme_mod('vw_event_planner_social_icon_padding');
	if($vw_event_planner_social_icon_padding != false){
		$vw_event_planner_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_event_planner_custom_css .='padding: '.esc_attr($vw_event_planner_social_icon_padding).';';
		$vw_event_planner_custom_css .='}';
	}

	$vw_event_planner_social_icon_width = get_theme_mod('vw_event_planner_social_icon_width');
	if($vw_event_planner_social_icon_width != false){
		$vw_event_planner_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_event_planner_custom_css .='width: '.esc_attr($vw_event_planner_social_icon_width).';';
		$vw_event_planner_custom_css .='}';
	}

	$vw_event_planner_social_icon_height = get_theme_mod('vw_event_planner_social_icon_height');
	if($vw_event_planner_social_icon_height != false){
		$vw_event_planner_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_event_planner_custom_css .='height: '.esc_attr($vw_event_planner_social_icon_height).';';
		$vw_event_planner_custom_css .='}';
	}

	$vw_event_planner_social_icon_border_radius = get_theme_mod('vw_event_planner_social_icon_border_radius');
	if($vw_event_planner_social_icon_border_radius != false){
		$vw_event_planner_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_event_planner_custom_css .='border-radius: '.esc_attr($vw_event_planner_social_icon_border_radius).'px;';
		$vw_event_planner_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_event_planner_products_padding_top_bottom = get_theme_mod('vw_event_planner_products_padding_top_bottom');
	if($vw_event_planner_products_padding_top_bottom != false){
		$vw_event_planner_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_event_planner_custom_css .='padding-top: '.esc_attr($vw_event_planner_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_event_planner_products_padding_top_bottom).'!important;';
		$vw_event_planner_custom_css .='}';
	}

	$vw_event_planner_products_padding_left_right = get_theme_mod('vw_event_planner_products_padding_left_right');
	if($vw_event_planner_products_padding_left_right != false){
		$vw_event_planner_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_event_planner_custom_css .='padding-left: '.esc_attr($vw_event_planner_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_event_planner_products_padding_left_right).'!important;';
		$vw_event_planner_custom_css .='}';
	}

	$vw_event_planner_products_box_shadow = get_theme_mod('vw_event_planner_products_box_shadow');
	if($vw_event_planner_products_box_shadow != false){
		$vw_event_planner_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_event_planner_custom_css .='box-shadow: '.esc_attr($vw_event_planner_products_box_shadow).'px '.esc_attr($vw_event_planner_products_box_shadow).'px '.esc_attr($vw_event_planner_products_box_shadow).'px #ddd;';
		$vw_event_planner_custom_css .='}';
	}

	$vw_event_planner_products_border_radius = get_theme_mod('vw_event_planner_products_border_radius', 0);
	if($vw_event_planner_products_border_radius != false){
		$vw_event_planner_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_event_planner_custom_css .='border-radius: '.esc_attr($vw_event_planner_products_border_radius).'px;';
		$vw_event_planner_custom_css .='}';
	}

	$vw_event_planner_products_button_border_radius = get_theme_mod('vw_event_planner_products_button_border_radius', 0);
	if($vw_event_planner_products_button_border_radius != false){
		$vw_event_planner_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$vw_event_planner_custom_css .='border-radius: '.esc_attr($vw_event_planner_products_button_border_radius).'px;';
		$vw_event_planner_custom_css .='}';
	}

	$vw_event_planner_woocommerce_sale_font_size = get_theme_mod('vw_event_planner_woocommerce_sale_font_size');
	if($vw_event_planner_woocommerce_sale_font_size != false){
		$vw_event_planner_custom_css .='.woocommerce span.onsale{';
			$vw_event_planner_custom_css .='font-size: '.esc_attr($vw_event_planner_woocommerce_sale_font_size).';';
		$vw_event_planner_custom_css .='}';
	}

	$vw_event_planner_woocommerce_sale_border_radius = get_theme_mod('vw_event_planner_woocommerce_sale_border_radius', 0);
	if($vw_event_planner_woocommerce_sale_border_radius != false){
		$vw_event_planner_custom_css .='.woocommerce span.onsale{';
			$vw_event_planner_custom_css .='border-radius: '.esc_attr($vw_event_planner_woocommerce_sale_border_radius).'px;';
		$vw_event_planner_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	// Site title Font Size
	$vw_event_planner_site_title_font_size = get_theme_mod('vw_event_planner_site_title_font_size');
	if($vw_event_planner_site_title_font_size != false){
		$vw_event_planner_custom_css .='.logo h1, .logo p.site-title{';
			$vw_event_planner_custom_css .='font-size: '.esc_attr($vw_event_planner_site_title_font_size).';';
		$vw_event_planner_custom_css .='}';
	}

	// Site tagline Font Size
	$vw_event_planner_site_tagline_font_size = get_theme_mod('vw_event_planner_site_tagline_font_size');
	if($vw_event_planner_site_tagline_font_size != false){
		$vw_event_planner_custom_css .='.logo p.site-description{';
			$vw_event_planner_custom_css .='font-size: '.esc_attr($vw_event_planner_site_tagline_font_size).';';
		$vw_event_planner_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$vw_event_planner_preloader_bg_color = get_theme_mod('vw_event_planner_preloader_bg_color');
	if($vw_event_planner_preloader_bg_color != false){
		$vw_event_planner_custom_css .='#preloader{';
			$vw_event_planner_custom_css .='background-color: '.esc_attr($vw_event_planner_preloader_bg_color).';';
		$vw_event_planner_custom_css .='}';
	}

	$vw_event_planner_preloader_border_color = get_theme_mod('vw_event_planner_preloader_border_color');
	if($vw_event_planner_preloader_border_color != false){
		$vw_event_planner_custom_css .='.loader-line{';
			$vw_event_planner_custom_css .='border-color: '.esc_attr($vw_event_planner_preloader_border_color).'!important;';
		$vw_event_planner_custom_css .='}';
	}