<?php
/**
 * VW Event Planner Theme Customizer
 *
 * @package VW Event Planner
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_event_planner_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_event_planner_custom_controls' );

function vw_event_planner_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_event_planner_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_event_planner_customize_partial_blogdescription', 
	));

	//add home page setting pannel
	$VWEventPlannerParentPanel = new VW_Event_Planner_WP_Customize_Panel( $wp_customize, 'vw_event_planner_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => 'VW Settings',
		'priority' => 10,
	));

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_event_planner_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => esc_html__( 'VW Settings', 'vw-event-planner' ),
	) );

	// Layout
	$wp_customize->add_section( 'vw_event_planner_left_right', array(
    	'title'      => esc_html__( 'General Settings', 'vw-event-planner' ),
		'panel' => 'vw_event_planner_panel_id'
	) );

	$wp_customize->add_setting('vw_event_planner_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_event_planner_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Event_Planner_Image_Radio_Control($wp_customize, 'vw_event_planner_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-event-planner'),
        'description' => __('Here you can change the width layout of Website.','vw-event-planner'),
        'section' => 'vw_event_planner_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_event_planner_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_event_planner_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_event_planner_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-event-planner'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-event-planner'),
        'section' => 'vw_event_planner_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-event-planner'),
            'Right Sidebar' => __('Right Sidebar','vw-event-planner'),
            'One Column' => __('One Column','vw-event-planner'),
            'Three Columns' => __('Three Columns','vw-event-planner'),
            'Four Columns' => __('Four Columns','vw-event-planner'),
            'Grid Layout' => __('Grid Layout','vw-event-planner')
        ),
	));

	$wp_customize->add_setting('vw_event_planner_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'vw_event_planner_sanitize_choices'
	));
	$wp_customize->add_control('vw_event_planner_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-event-planner'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-event-planner'),
        'section' => 'vw_event_planner_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-event-planner'),
            'Right Sidebar' => __('Right Sidebar','vw-event-planner'),
            'One Column' => __('One Column','vw-event-planner')
        ),
	) );

	//Pre-Loader
	$wp_customize->add_setting( 'vw_event_planner_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_event_planner_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Event_Planner_Toggle_Switch_Custom_Control( $wp_customize, 'vw_event_planner_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-event-planner' ),
        'section' => 'vw_event_planner_left_right'
    )));

	$wp_customize->add_setting('vw_event_planner_preloader_bg_color', array(
		'default'           => '#d1007b',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_event_planner_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-event-planner'),
		'section'  => 'vw_event_planner_left_right',
	)));

	$wp_customize->add_setting('vw_event_planner_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_event_planner_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-event-planner'),
		'section'  => 'vw_event_planner_left_right',
	)));

	//Topbar
	$wp_customize->add_section( 'vw_event_planner_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-event-planner' ),
		'panel' => 'vw_event_planner_panel_id'
	) );

	$wp_customize->add_setting( 'vw_event_planner_topbar_hide_show',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_event_planner_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Event_Planner_Toggle_Switch_Custom_Control( $wp_customize, 'vw_event_planner_topbar_hide_show',array(
		'label' => esc_html__( 'Show / Hide Topbar','vw-event-planner' ),
		'section' => 'vw_event_planner_topbar'
    )));

    $wp_customize->add_setting('vw_event_planner_topbar_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_topbar_padding_top_bottom',array(
		'label'	=> __('Topbar Padding Top Bottom','vw-event-planner'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_topbar',
		'type'=> 'text'
	));

    //Sticky Header
	$wp_customize->add_setting( 'vw_event_planner_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_event_planner_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Event_Planner_Toggle_Switch_Custom_Control( $wp_customize, 'vw_event_planner_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-event-planner' ),
        'section' => 'vw_event_planner_topbar'
    )));

    $wp_customize->add_setting('vw_event_planner_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-event-planner'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_event_planner_header_search',array(
	  	'default' => 1,
	  	'transport' => 'refresh',
	  	'sanitize_callback' => 'vw_event_planner_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Event_Planner_Toggle_Switch_Custom_Control( $wp_customize, 'vw_event_planner_header_search',array(
	   	'label' => esc_html__( 'Show / Hide Search','vw-event-planner' ),
	  	'section' => 'vw_event_planner_topbar'
    )));

    $wp_customize->add_setting('vw_event_planner_search_icon',array(
		'default'	=> 'fas fa-search',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Event_Planner_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_event_planner_search_icon',array(
		'label'	=> __('Add Search Icon','vw-event-planner'),
		'transport' => 'refresh',
		'section'	=> 'vw_event_planner_topbar',
		'setting'	=> 'vw_event_planner_search_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_event_planner_search_close_icon',array(
		'default'	=> 'fa fa-window-close',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Event_Planner_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_event_planner_search_close_icon',array(
		'label'	=> __('Add Search Close Icon','vw-event-planner'),
		'transport' => 'refresh',
		'section'	=> 'vw_event_planner_topbar',
		'setting'	=> 'vw_event_planner_search_close_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('vw_event_planner_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_search_font_size',array(
		'label'	=> __('Search Font Size','vw-event-planner'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_topbar',
		'type'=> 'text'
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_event_planner_call_text', array( 
		'selector' => '#topbar span', 
		'render_callback' => 'vw_event_planner_customize_partial_vw_event_planner_call_text', 
	));

    $wp_customize->add_setting('vw_event_planner_phone_no_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Event_Planner_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_event_planner_phone_no_icon',array(
		'label'	=> __('Add Phone Icon','vw-event-planner'),
		'transport' => 'refresh',
		'section'	=> 'vw_event_planner_topbar',
		'setting'	=> 'vw_event_planner_phone_no_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_event_planner_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_event_planner_sanitize_phone_number'
	));
	$wp_customize->add_control('vw_event_planner_call_text',array(
		'label'	=> __('Add Phone Number','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( '+00 987 654 1230', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_event_planner_email_icon',array(
		'default'	=> 'far fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Event_Planner_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_event_planner_email_icon',array(
		'label'	=> __('Add Email Icon','vw-event-planner'),
		'transport' => 'refresh',
		'section'	=> 'vw_event_planner_topbar',
		'setting'	=> 'vw_event_planner_email_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_event_planner_email_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('vw_event_planner_email_text',array(
		'label'	=> __('Add Email Address','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( 'example@gmail.com', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_event_planner_time_icon',array(
		'default'	=> 'far fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Event_Planner_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_event_planner_time_icon',array(
		'label'	=> __('Add Timing Icon','vw-event-planner'),
		'transport' => 'refresh',
		'section'	=> 'vw_event_planner_topbar',
		'setting'	=> 'vw_event_planner_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_event_planner_timming_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_timming_text',array(
		'label'	=> __('Add Open Timming','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( 'Mon to Fri 8:00am - 9:00pm ', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_event_planner_buynow_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('vw_event_planner_buynow_url',array(
		'label'	=> __('Add Button URL','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( 'www.example.com', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_topbar',
		'type'=> 'url'
	));

	$wp_customize->add_setting('vw_event_planner_buynow_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_buynow_text',array(
		'label'	=> __('Add Button Text','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( 'Book Now', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_event_planner_book_button_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Event_Planner_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_event_planner_book_button_icon',array(
		'label'	=> __('Add Button Icon','vw-event-planner'),
		'transport' => 'refresh',
		'section'	=> 'vw_event_planner_topbar',
		'setting'	=> 'vw_event_planner_book_button_icon',
		'type'		=> 'icon'
	)));
    
	//Slider
	$wp_customize->add_section( 'vw_event_planner_slidersettings' , array(
    	'title'      => __( 'Slider Section', 'vw-event-planner' ),
		'panel' => 'vw_event_planner_panel_id'
	) );

	$wp_customize->add_setting( 'vw_event_planner_slider_hide_show',array(
	  	'default' => 0,
	  	'transport' => 'refresh',
	  	'sanitize_callback' => 'vw_event_planner_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Event_Planner_Toggle_Switch_Custom_Control( $wp_customize, 'vw_event_planner_slider_hide_show',array(
	   	'label' => esc_html__( 'Show / Hide Slider','vw-event-planner' ),
	  	'section' => 'vw_event_planner_slidersettings'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_event_planner_slider_hide_show',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'vw_event_planner_customize_partial_vw_event_planner_slider_hide_show',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'vw_event_planner_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_event_planner_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_event_planner_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-event-planner' ),
			'description' => __('Slider image size (1500 x 590)','vw-event-planner'),
			'section'  => 'vw_event_planner_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('vw_event_planner_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_event_planner_slider_button_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Event_Planner_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_event_planner_slider_button_icon',array(
		'label'	=> __('Add Slider Button Icon','vw-event-planner'),
		'transport' => 'refresh',
		'section'	=> 'vw_event_planner_slidersettings',
		'setting'	=> 'vw_event_planner_slider_button_icon',
		'type'		=> 'icon'
	)));

	//content layout
	$wp_customize->add_setting('vw_event_planner_slider_content_option',array(
        'default' => 'Center',
        'sanitize_callback' => 'vw_event_planner_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Event_Planner_Image_Radio_Control($wp_customize, 'vw_event_planner_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-event-planner'),
        'section' => 'vw_event_planner_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_event_planner_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_event_planner_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_event_planner_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-event-planner' ),
		'section'     => 'vw_event_planner_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_event_planner_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_event_planner_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_event_planner_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_event_planner_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-event-planner' ),
	'section'     => 'vw_event_planner_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_event_planner_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-event-planner'),
      '0.1' =>  esc_attr('0.1','vw-event-planner'),
      '0.2' =>  esc_attr('0.2','vw-event-planner'),
      '0.3' =>  esc_attr('0.3','vw-event-planner'),
      '0.4' =>  esc_attr('0.4','vw-event-planner'),
      '0.5' =>  esc_attr('0.5','vw-event-planner'),
      '0.6' =>  esc_attr('0.6','vw-event-planner'),
      '0.7' =>  esc_attr('0.7','vw-event-planner'),
      '0.8' =>  esc_attr('0.8','vw-event-planner'),
      '0.9' =>  esc_attr('0.9','vw-event-planner')
	),
	));

	//Slider height
	$wp_customize->add_setting('vw_event_planner_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_slider_height',array(
		'label'	=> __('Slider Height','vw-event-planner'),
		'description'	=> __('Specify the slider height (px).','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_event_planner_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'vw_event_planner_sanitize_float'
	) );
	$wp_customize->add_control( 'vw_event_planner_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-event-planner'),
		'section' => 'vw_event_planner_slidersettings',
		'type'  => 'number',
	) );
    
	//Event Services section
	$wp_customize->add_section( 'vw_event_planner_best_services_section' , array(
    	'title'      => __( 'Best Event Services', 'vw-event-planner' ),
		'priority'   => null,
		'panel' => 'vw_event_planner_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_event_planner_section_title', array( 
		'selector' => '#serv-section h2', 
		'render_callback' => 'vw_event_planner_customize_partial_vw_event_planner_section_title',
	));

	$wp_customize->add_setting('vw_event_planner_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_section_title',array(
		'label'	=> __('Add Section Title','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( 'Best Event Services', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_best_services_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_event_planner_section_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_section_text',array(
		'label'	=> __('Add Section Text','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( 'Lorem Ipsum has been the industrys standard dummy text ever since the 1500s.s', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_best_services_section',
		'type'=> 'text'
	));

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_event_planner_best_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_event_planner_sanitize_choices',
	));
	$wp_customize->add_control('vw_event_planner_best_services',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Event Services','vw-event-planner'),
		'description' => __('Image Size (533 x 333)','vw-event-planner'),
		'section' => 'vw_event_planner_best_services_section',
	));

	$wp_customize->add_setting('vw_event_planner_service_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Event_Planner_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_event_planner_service_icon',array(
		'label'	=> __('Add Services Icon','vw-event-planner'),
		'transport' => 'refresh',
		'section'	=> 'vw_event_planner_best_services_section',
		'setting'	=> 'vw_event_planner_service_icon',
		'type'		=> 'icon'
	)));

	//Blog Post
	$wp_customize->add_panel( $VWEventPlannerParentPanel );

	$BlogPostParentPanel = new VW_Event_Planner_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-event-planner' ),
		'panel' => 'vw_event_planner_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_event_planner_post_settings', array(
		'title' => __( 'Post Settings', 'vw-event-planner' ),
		'panel' => 'blog_post_parent_panel',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_event_planner_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_event_planner_customize_partial_vw_event_planner_toggle_postdate', 
	));

	$wp_customize->add_setting( 'vw_event_planner_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_event_planner_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Event_Planner_Toggle_Switch_Custom_Control( $wp_customize, 'vw_event_planner_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-event-planner' ),
        'section' => 'vw_event_planner_post_settings'
    )));

    $wp_customize->add_setting( 'vw_event_planner_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_event_planner_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Event_Planner_Toggle_Switch_Custom_Control( $wp_customize, 'vw_event_planner_toggle_author',array(
		'label' => esc_html__( 'Author','vw-event-planner' ),
		'section' => 'vw_event_planner_post_settings'
    )));

    $wp_customize->add_setting( 'vw_event_planner_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_event_planner_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Event_Planner_Toggle_Switch_Custom_Control( $wp_customize, 'vw_event_planner_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-event-planner' ),
		'section' => 'vw_event_planner_post_settings'
    )));

    $wp_customize->add_setting( 'vw_event_planner_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_event_planner_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Event_Planner_Toggle_Switch_Custom_Control( $wp_customize, 'vw_event_planner_toggle_time',array(
		'label' => esc_html__( 'Time','vw-event-planner' ),
		'section' => 'vw_event_planner_post_settings'
    )));

    $wp_customize->add_setting( 'vw_event_planner_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_event_planner_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Event_Planner_Toggle_Switch_Custom_Control( $wp_customize, 'vw_event_planner_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','vw-event-planner' ),
		'section' => 'vw_event_planner_post_settings'
    )));

    $wp_customize->add_setting( 'vw_event_planner_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_event_planner_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_event_planner_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-event-planner' ),
		'section'     => 'vw_event_planner_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_event_planner_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_event_planner_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-event-planner'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-event-planner'),
		'section'=> 'vw_event_planner_post_settings',
		'type'=> 'text'
	));

	//Blog layout
    $wp_customize->add_setting('vw_event_planner_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_event_planner_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Event_Planner_Image_Radio_Control($wp_customize, 'vw_event_planner_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-event-planner'),
        'section' => 'vw_event_planner_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_event_planner_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_event_planner_sanitize_choices'
	));
	$wp_customize->add_control('vw_event_planner_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-event-planner'),
        'section' => 'vw_event_planner_post_settings',
        'choices' => array(
        	'Content' => __('Content','vw-event-planner'),
            'Excerpt' => __('Excerpt','vw-event-planner'),
            'No Content' => __('No Content','vw-event-planner')
        ),
	) );

	$wp_customize->add_setting('vw_event_planner_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_event_planner_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_event_planner_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Event_Planner_Toggle_Switch_Custom_Control( $wp_customize, 'vw_event_planner_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','vw-event-planner' ),
      'section' => 'vw_event_planner_post_settings'
    )));

	$wp_customize->add_setting( 'vw_event_planner_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_event_planner_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_event_planner_blog_pagination_type', array(
        'section' => 'vw_event_planner_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-event-planner' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-event-planner' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-event-planner' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'vw_event_planner_button_settings', array(
		'title' => __( 'Button Settings', 'vw-event-planner' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_event_planner_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-event-planner'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_event_planner_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-event-planner'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_event_planner_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_event_planner_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_event_planner_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-event-planner' ),
		'section'     => 'vw_event_planner_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_event_planner_button_text', array( 
		'selector' => '.post-main-box a.view-more', 
		'render_callback' => 'vw_event_planner_customize_partial_vw_event_planner_button_text', 
	));

	$wp_customize->add_setting('vw_event_planner_button_text',array(
		'default'=> esc_html__( 'READ MORE', 'vw-event-planner' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_button_text',array(
		'label'	=> __('Add Button Text','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_event_planner_blog_page_button_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Event_Planner_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_event_planner_blog_page_button_icon',array(
		'label'	=> __('Add Button Icon','vw-event-planner'),
		'transport' => 'refresh',
		'section'	=> 'vw_event_planner_button_settings',
		'setting'	=> 'vw_event_planner_blog_page_button_icon',
		'type'		=> 'icon'
	)));

	// Related Post Settings
	$wp_customize->add_section( 'vw_event_planner_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-event-planner' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_event_planner_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_event_planner_customize_partial_vw_event_planner_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_event_planner_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_event_planner_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Event_Planner_Toggle_Switch_Custom_Control( $wp_customize, 'vw_event_planner_related_post',array(
		'label' => esc_html__( 'Related Post','vw-event-planner' ),
		'section' => 'vw_event_planner_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_event_planner_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_event_planner_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_event_planner_sanitize_float'
	));
	$wp_customize->add_control('vw_event_planner_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'vw_event_planner_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-event-planner' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_event_planner_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_event_planner_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Event_Planner_Toggle_Switch_Custom_Control( $wp_customize, 'vw_event_planner_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-event-planner' ),
		'section' => 'vw_event_planner_single_blog_settings'
    )));

	$wp_customize->add_setting( 'vw_event_planner_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_event_planner_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Event_Planner_Toggle_Switch_Custom_Control( $wp_customize, 'vw_event_planner_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Post Navigation','vw-event-planner' ),
		'section' => 'vw_event_planner_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('vw_event_planner_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_event_planner_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_single_blog_settings',
		'type'=> 'text'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_event_planner_404_page',array(
		'title'	=> __('404 Page Settings','vw-event-planner'),
		'panel' => 'vw_event_planner_panel_id',
	));	

	$wp_customize->add_setting('vw_event_planner_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_event_planner_404_page_title',array(
		'label'	=> __('Add Title','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_event_planner_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_event_planner_404_page_content',array(
		'label'	=> __('Add Text','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_event_planner_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_event_planner_404_page_button_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Event_Planner_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_event_planner_404_page_button_icon',array(
		'label'	=> __('Add Button Icon','vw-event-planner'),
		'transport' => 'refresh',
		'section'	=> 'vw_event_planner_404_page',
		'setting'	=> 'vw_event_planner_404_page_button_icon',
		'type'		=> 'icon'
	)));

	//Social Icon Setting
	$wp_customize->add_section('vw_event_planner_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-event-planner'),
		'panel' => 'vw_event_planner_panel_id',
	));	

	$wp_customize->add_setting('vw_event_planner_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-event-planner'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_event_planner_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-event-planner'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_event_planner_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_social_icon_width',array(
		'label'	=> __('Icon Width','vw-event-planner'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_event_planner_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_social_icon_height',array(
		'label'	=> __('Icon Height','vw-event-planner'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_event_planner_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_event_planner_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_event_planner_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-event-planner' ),
		'section'     => 'vw_event_planner_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_event_planner_responsive_media',array(
		'title'	=> __('Responsive Media','vw-event-planner'),
		'panel' => 'vw_event_planner_panel_id',
	));

	$wp_customize->add_setting( 'vw_event_planner_resp_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_event_planner_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Event_Planner_Toggle_Switch_Custom_Control( $wp_customize, 'vw_event_planner_resp_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-event-planner' ),
      'section' => 'vw_event_planner_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_event_planner_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_event_planner_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Event_Planner_Toggle_Switch_Custom_Control( $wp_customize, 'vw_event_planner_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-event-planner' ),
      'section' => 'vw_event_planner_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_event_planner_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_event_planner_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Event_Planner_Toggle_Switch_Custom_Control( $wp_customize, 'vw_event_planner_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-event-planner' ),
      'section' => 'vw_event_planner_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_event_planner_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_event_planner_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Event_Planner_Toggle_Switch_Custom_Control( $wp_customize, 'vw_event_planner_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-event-planner' ),
      'section' => 'vw_event_planner_responsive_media'
    )));

     $wp_customize->add_setting( 'vw_event_planner_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_event_planner_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Event_Planner_Toggle_Switch_Custom_Control( $wp_customize, 'vw_event_planner_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-event-planner' ),
      'section' => 'vw_event_planner_responsive_media'
    )));

    $wp_customize->add_setting('vw_event_planner_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Event_Planner_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_event_planner_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-event-planner'),
		'transport' => 'refresh',
		'section'	=> 'vw_event_planner_responsive_media',
		'setting'	=> 'vw_event_planner_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_event_planner_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Event_Planner_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_event_planner_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-event-planner'),
		'transport' => 'refresh',
		'section'	=> 'vw_event_planner_responsive_media',
		'setting'	=> 'vw_event_planner_res_close_menus_icon',
		'type'		=> 'icon'
	)));

	//Footer Text
	$wp_customize->add_section('vw_event_planner_footer',array(
		'title'	=> __('Footer','vw-event-planner'),
		'panel' => 'vw_event_planner_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_event_planner_footer_text', array( 
		'selector' => '.footer-2 .copyright p', 
		'render_callback' => 'vw_event_planner_customize_partial_vw_event_planner_footer_text', 
	));
	
	$wp_customize->add_setting('vw_event_planner_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_event_planner_footer_text',array(
		'label'	=> __('Copyright Text','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_footer',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('vw_event_planner_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','vw-event-planner'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_event_planner_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-event-planner'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_event_planner_copyright_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_event_planner_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Event_Planner_Image_Radio_Control($wp_customize, 'vw_event_planner_copyright_alignment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-event-planner'),
        'section' => 'vw_event_planner_footer',
        'settings' => 'vw_event_planner_copyright_alignment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

	$wp_customize->add_setting( 'vw_event_planner_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_event_planner_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Event_Planner_Toggle_Switch_Custom_Control( $wp_customize, 'vw_event_planner_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-event-planner' ),
      	'section' => 'vw_event_planner_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_event_planner_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_event_planner_customize_partial_vw_event_planner_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('vw_event_planner_scroll_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Event_Planner_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_event_planner_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-event-planner'),
		'transport' => 'refresh',
		'section'	=> 'vw_event_planner_footer',
		'setting'	=> 'vw_event_planner_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_event_planner_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-event-planner'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_event_planner_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-event-planner'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_event_planner_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-event-planner'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_event_planner_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-event-planner'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_event_planner_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_event_planner_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_event_planner_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-event-planner' ),
		'section'     => 'vw_event_planner_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_event_planner_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_event_planner_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Event_Planner_Image_Radio_Control($wp_customize, 'vw_event_planner_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-event-planner'),
        'section' => 'vw_event_planner_footer',
        'settings' => 'vw_event_planner_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

    //Woocommerce settings
	$wp_customize->add_section('vw_event_planner_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-event-planner'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_event_planner_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product .sidebar', 
		'render_callback' => 'vw_event_planner_customize_partial_vw_event_planner_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_event_planner_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_event_planner_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Event_Planner_Toggle_Switch_Custom_Control( $wp_customize, 'vw_event_planner_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-event-planner' ),
		'section' => 'vw_event_planner_woocommerce_section'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_event_planner_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product .sidebar', 
		'render_callback' => 'vw_event_planner_customize_partial_vw_event_planner_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_event_planner_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_event_planner_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Event_Planner_Toggle_Switch_Custom_Control( $wp_customize, 'vw_event_planner_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-event-planner' ),
		'section' => 'vw_event_planner_woocommerce_section'
    )));

    //Products per page
    $wp_customize->add_setting('vw_event_planner_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'vw_event_planner_sanitize_float'
	));
	$wp_customize->add_control('vw_event_planner_products_per_page',array(
		'label'	=> __('Products Per Page','vw-event-planner'),
		'description' => __('Display on shop page','vw-event-planner'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_event_planner_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_event_planner_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_event_planner_sanitize_choices'
	));
	$wp_customize->add_control('vw_event_planner_products_per_row',array(
		'label'	=> __('Products Per Row','vw-event-planner'),
		'description' => __('Display on shop page','vw-event-planner'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'vw_event_planner_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('vw_event_planner_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-event-planner'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_event_planner_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-event-planner'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_event_planner_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_event_planner_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_event_planner_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-event-planner' ),
		'section'     => 'vw_event_planner_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_event_planner_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_event_planner_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_event_planner_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-event-planner' ),
		'section'     => 'vw_event_planner_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_event_planner_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_event_planner_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_event_planner_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','vw-event-planner' ),
		'section'     => 'vw_event_planner_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_event_planner_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_event_planner_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','vw-event-planner'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-event-planner'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-event-planner' ),
        ),
		'section'=> 'vw_event_planner_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_event_planner_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_event_planner_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_event_planner_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','vw-event-planner' ),
		'section'     => 'vw_event_planner_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Event_Planner_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Event_Planner_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_event_planner_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Event_Planner_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_event_planner_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Event_Planner_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_event_planner_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_event_planner_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_event_planner_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Event_Planner_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Event_Planner_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Event_Planner_Customize_Section_Pro($manager,'vw_event_planner_upgrade_pro_link',array(
				'priority'   => 1,
				'title'    => esc_html__( 'VW Event Planner', 'vw-event-planner' ),
				'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-event-planner' ),
				'pro_url'  => esc_url('https://www.vwthemes.com/themes/event-wordpress-theme/'),
			)));

		$manager->add_section(new VW_Event_Planner_Customize_Section_Pro($manager,'vw_event_planner_get_started_link',array(
				'priority'   => 1,
				'title'    => esc_html__( 'DOCUMENTATION', 'vw-event-planner' ),
				'pro_text' => esc_html__( 'DOCS', 'vw-event-planner' ),
				'pro_url'  => admin_url('themes.php?page=vw_event_planner_guide'),
			)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-event-planner-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-event-planner-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Event_Planner_Customize::get_instance();