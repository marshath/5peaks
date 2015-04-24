<?php
	
/************* CHANGE THE URL *****************/
// update_option('siteurl','http://localhost:8888/5peaks.com');
// update_option('home','http://localhost:8888/5peaks.com');


/************* ADMIN MENU & DASHBOARD *****************/

// LOAD ADVANCED CUSTOM FIELDS PLUGIN
define( 'ACF_LITE', true ); // hide the ACF menu item in the left sidebar of the Admin Area

add_action('admin_init', 'remove_dashboard_meta');
function remove_dashboard_meta() {
	/************* REMOVE ADMIN DASHBOARD WIDGETS *************/
	remove_meta_box('dashboard_primary', 'dashboard', 'side'); // wordpress news
	// remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); // incoming links
	remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); // quick press
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side'); // drafts
	// remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // comments
	// remove_meta_box('dashboard_activity', 'dashboard', 'normal'); // recent activity

	/************* REMOVE WELCOME PANEL *************/
	remove_action('welcome_panel', 'wp_welcome_panel');

	/************* REMOVE ADMIN SIDEBAR MENU ITEMS *************/
	// remove_menu_page('index.php'); // dashboard
	// remove_menu_page('edit.php'); // posts
	// remove_menu_page('edit-comments.php'); // comments
	// remove_menu_page('themes.php'); // appearance
	// remove_menu_page('plugins.php'); // plugins
	// remove_menu_page('users.php'); //users
	remove_menu_page('tools.php'); //tools
	// remove_menu_page('options-general.php'); // settings
	// remove_menu_page('wpseo_dashboard'); // Yoast SEO
} 

// REMOVE APPEARANCE SUBMENU ITEMS
add_action('admin_init', 'remove_theme_submenus');
function remove_theme_submenus() {
    global $submenu; 
    unset($submenu['themes.php'][5]); // appearance > themes
    unset($submenu['themes.php'][6]); // appearance > customize
    // unset($submenu['themes.php'][7]); // appearance > widgets
    // unset($submenu['themes.php'][10]); // appearance > menus
    unset($submenu['themes.php'][11]); // appearance > editor
    unset($submenu['themes.php'][20]); // appearance > background
}

// REMOVE ADMIN BAR MENU ITEMS
add_action('wp_before_admin_bar_render', 'my_remove_admin_bar_links');
function my_remove_admin_bar_links() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('themes'); // view sites > themes
	$wp_admin_bar->remove_menu('customize'); // view sites > customize
	$wp_admin_bar->remove_menu('widgets'); // view sites > widgets
	$wp_admin_bar->remove_menu('menus'); // view sites > menus
	$wp_admin_bar->remove_menu('customize-background'); // view sites > background
	$wp_admin_bar->remove_menu('updates'); // updates
	$wp_admin_bar->remove_menu('comments'); // comments
	$wp_admin_bar->remove_menu('new-content'); // new post
	// $wp_admin_bar->remove_menu('edit'); // edit post 
	// $wp_admin_bar->remove_menu('wpseo-menu'); // Yoast SEO 
}

// ENQUENE SCRIPTS
function enqueue_scripts_function() {
	if ( ! is_admin() ) {
		$script_path = get_template_directory_uri() . '/javascript/';
		wp_enqueue_script('jquery');
		// wp_enqueue_script( 'bootstrap_javascript', $script_path . 'jquery.bootstrap.min.js', array( 'jquery', '7868789' ) );
		wp_enqueue_script( 'flexslider', $script_path . 'jquery.flexslider.min.js', array( 'jquery' ), '8675309');
		wp_enqueue_script( 'superfish', $script_path . 'jquery.superfish.min.js', array( 'jquery' ), '7897859765');
		wp_enqueue_script( 'hoverIntent', $script_path . 'jquery.hoverIntent.min.js', array( 'jquery' ), '5551111');
		wp_register_script('meanmenu', $script_path . 'jquery.meanmenu.js', array('jquery'), false );
		wp_enqueue_script('meanmenu');
		wp_enqueue_script( '5peaks-jquery', $script_path . 'custom-jquery.min.js', array( 'jquery' ), '7869869869');
	}
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts_function' );

// // Callback function to insert 'styleselect' into the $buttons array
// function my_mce_buttons_2( $buttons ) {
// 	array_unshift( $buttons, 'styleselect' );
// 	return $buttons;
// }
// // Register our callback to the appropriate filter
// add_filter('mce_buttons_2', 'my_mce_buttons_2');



// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {
	// Define the style_formats array
	$style_formats = array(
		// Each array child is a format with it's own settings
		array(
				'title' => '.translation',
				'block' => 'blockquote',
				'classes' => 'translation',
				'wrapper' => true,

				),
		array(
				'title' => '.Register Button',
				'block' => 'a',
				'classes' => 'btn btn-large register',
				'wrapper' => true,

				),
		array(
				'title' => '⇠.rtl',
				'block' => 'blockquote',
				'classes' => 'rtl',
				'wrapper' => true,
				),
		array(
				'title' => '.ltr⇢',
				'block' => 'blockquote',
				'classes' => 'ltr',
				'wrapper' => true,
				),
		);
	// Insert the array, JSON ENCODED, into 'style_formats'
$init_array['style_formats'] = json_encode( $style_formats );

return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );



function sButton($atts, $content = null) {
	extract(shortcode_atts(array('link' => '#'), $atts));
	return '<a class="register-btn" href="'.$link.'">' . do_shortcode($content) . '</a>';
}
add_shortcode('register', 'sButton');



// This theme supports a variety of post formats.
add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// This theme uses wp_nav_menu() in one location.
register_nav_menu( 'primary', __( 'Primary Menu' ) );
register_nav_menu( 'secondary', __( 'Secondary Menu' ) );


add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop

	add_image_size( 'sidebar-news-thumb', 132, 84, 'true' );
	add_image_size( 'category-thumb', 250, 250, 'true' );

// Multiple Excerpts
	function excerpt($limit) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
			array_pop($excerpt);
			$excerpt = implode(" ",$excerpt).'...';
		} else {
			$excerpt = implode(" ",$excerpt);
		}
		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt;
	}

	function content($limit) {
		$content = explode(' ', get_the_content(), $limit);
		if (count($content)>=$limit) {
			array_pop($content);
			$content = implode(" ",$content).'...';
		} else {
			$content = implode(" ",$content);
		}
		$content = preg_replace('/\[.+\]/','', $content);
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		return $content;
	}


// Categories for media files
	function wptp_add_categories_to_attachments() {
		register_taxonomy_for_object_type( 'category', 'attachment' );
	}
	add_action( 'init' , 'wptp_add_categories_to_attachments' );

// Lets fix the events titles with translations, qtranslate plugin
	function _fix_event_title($replace, $_this, $tag) {
	// Do this only if the tag is for Event link AND there are actually qTranslate tags in the title
		if ( in_array(strtoupper($tag), array('#_LINKEDNAME', '#_EVENTLINK')) && preg_match('~&lt;\!--:([A-Za-z]*?)--&gt;~', $replace) ) {
			$event_link = esc_url($_this->get_permalink());
			$event_name = apply_filters('the_title', $_this->event_name);
			$replace = '<a href="'.$event_link.'" title="'.esc_attr($event_name).'">'.esc_attr($event_name).'</a>';
		}

		return $replace;
	}

	add_filter('em_event_output_placeholder', '_fix_event_title', 10, 3);

//Fix for event sorting
	add_filter('em_location_output_placeholder','my_em_placeholder_mod',1,3);
	function my_em_placeholder_mod($replace, $EM_Location, $result){
		switch( $result ){
			case '#_LOCATIONNEXTEVENTS':
			$events = EM_Events::get( array('location'=>$EM_Location->location_id, 'scope'=>'future', 'limit'=>3) );
			if ( count($events) > 0 ){
				$replace = get_option('dbem_location_event_list_item_header_format');
				foreach($events as $event){
					$replace .= $event->output(get_option('dbem_location_event_list_item_format'));
				}
				$replace .= get_option('dbem_location_event_list_item_footer_format');
			} else {
				$replace = get_option('dbem_location_no_events_message');
			}
			break;
		}
		return $replace;
	}


/*-----------------------------
SIDEBAR WIDGET AREAS START HERE
*/

//Register Default Right-Hand Sidebar
register_sidebar(array(
		'name' => __( 'Right Hand Sidebar' ),
		'id' => 'right-sidebar',
		'description' => __( 'Widgets in this area will be shown on the right-hand side.' ),
		'before_title' => '<h1>',
		'after_title' => '</h1>'
		));

// Register Homepage-only Sidebar
function home_sidebar()  {

	$args = array(
		'id'            => 'home-sb',
		'name'          => __( 'Homepage Sidebar', '33_degrees' ),
		'description'   => __( 'Sidebar widgetized area for the home page ONLY.', '33_degrees' ),
		'class'         => 'home-sb',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
		'before_widget' => '',
		'after_widget'  => '',
		);
	register_sidebar( $args );

}

// Hook into the 'widgets_init' action

add_action( 'widgets_init', 'home_sidebar' );



// Register Event-only Sidebar
function event_sidebar()  {

	$args = array(
		'id'            => 'events-sb',
		'name'          => __( 'Events Sidebar', '33_degrees' ),
		'description'   => __( 'Sidebar widgetized area for the events page ONLY.', '33_degrees' ),
		'class'         => 'events-sb',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		);
	register_sidebar( $args );

}

// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'event_sidebar' );


// Register Sidebar
function default_sidebar()  {

	$args = array(
		'id'            => 'default-sb',
		'name'          => __( 'Default Sidebar', '33_degrees' ),
		'description'   => __( 'Sidebar widgetized area for all pages EXCEPT Home and Events.', '33_degrees' ),
		'class'         => 'default-sb',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		);
	register_sidebar( $args );

}

// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'default_sidebar' );

// Register Sidebar
function banner_ad()  {

	$args = array(
		'id'            => 'banner_advertisement',
		'name'          => __( 'Banner Ad', '33_degrees' ),
		'description'   => __( 'Sitewide banner ad widget area.', '33_degrees' ),
		'class'         => 'banner-ad',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
		'before_widget' => '',
		'after_widget'  => '',
		);
	register_sidebar( $args );

}

// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'banner_ad' );

/*-----------------------------
SIDEBAR WIDGET AREAS END HERE
*/



/**
 * CUSTOM POST TYPES BEGIN HERE
 */
add_action('init', 'cptui_register_my_cpt_slideshow');
function cptui_register_my_cpt_slideshow() {
	register_post_type('slideshow', array(
		'label' => 'SlideShow',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'slideshow', 'with_front' => true),
		'query_var' => true,
		'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes'),
		'labels' => array (
		'name' => 'SlideShow',
		'singular_name' => 'SlideShow',
		'menu_name' => 'SlideShow',
		'add_new' => 'Add SlideShow',
		'add_new_item' => 'Add New SlideShow',
		'edit' => 'Edit',
		'edit_item' => 'Edit SlideShow',
		'new_item' => 'New SlideShow',
		'view' => 'View SlideShow',
		'view_item' => 'View SlideShow',
		'search_items' => 'Search SlideShow',
		'not_found' => 'No SlideShow Found',
		'not_found_in_trash' => 'No SlideShow Found in Trash',
		'parent' => 'Parent SlideShow',
		)
) ); }

add_action('init', 'cptui_register_my_cpt_sponsors');
function cptui_register_my_cpt_sponsors() {
	register_post_type('sponsors', array(
		'label' => 'Sponsors',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'sponsors', 'with_front' => true),
		'query_var' => true,
		'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes','post-formats'),
		'labels' => array (
		'name' => 'Sponsors',
		'singular_name' => 'Sponsor',
		'menu_name' => 'Sponsors',
		'add_new' => 'Add Sponsor',
		'add_new_item' => 'Add New Sponsor',
		'edit' => 'Edit',
		'edit_item' => 'Edit Sponsor',
		'new_item' => 'New Sponsor',
		'view' => 'View Sponsor',
		'view_item' => 'View Sponsor',
		'search_items' => 'Search Sponsors',
		'not_found' => 'No Sponsors Found',
		'not_found_in_trash' => 'No Sponsors Found in Trash',
		'parent' => 'Parent Sponsor',
		)
) ); }


/**
 * CUSTOM POST TYPES END HERE
 */
?>