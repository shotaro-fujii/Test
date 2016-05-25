<?php
/**
 * Transfer functions and definitions
 *
 * @package Transfer
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) $content_width = 1000; /* pixels */
add_filter( 'show_admin_bar', '__return_false' );

/* Makes theme available for translation. */
load_theme_textdomain( 'mes-framework', get_template_directory() . '/languages' );

/**
 * Include Framework. (Theme options)
 */ 
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/theme-options/ReduxCore/framework.php' ) ) {
	require_once( dirname( __FILE__ ) . '/theme-options/ReduxCore/framework.php' );
}

if ( !isset( $ct_options ) && file_exists( dirname( __FILE__ ) . '/theme-options/options.php' ) ) {
	require_once( dirname( __FILE__ ) . '/theme-options/options.php' );
}

/* ------------------------------------------------------------------------ */
/* Theme Stylesheets */
/* ------------------------------------------------------------------------ */

function mes_theme_styles_basic() {   
		/* Enqueue Stylesheets */
		wp_enqueue_style( 'stylesheet', get_stylesheet_uri(), array(), '1', 'all' ); // Main Stylesheet
		wp_enqueue_style( 'mes_bxslider_css', get_template_directory_uri() . '/framework/css/jquery.bxslider.css', array(), '1', 'all' );
		wp_enqueue_style( 'flex-slider', get_template_directory_uri() . '/framework/FlexSlider/flexslider.css', array(), '1', 'all' );
		wp_enqueue_style( 'mes_prettyPhoto_css', get_template_directory_uri() . '/framework/css/prettyPhoto.css', array(), '1', 'all' );
		wp_enqueue_style( 'mes_main_css', get_template_directory_uri() . '/framework/css/main_style.css', array(), '1', 'all' );
		wp_enqueue_style( 'mes_options_css', get_template_directory_uri() . '/framework/css/options.css', array(), '1', 'all' );
		//Internet Explorer Styles
		if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') == true) { 
		wp_enqueue_style( 'mes_iestyles_css', get_template_directory_uri() . '/framework/css/iestyles.css', array(), '1', 'all' );
		};
	}  
add_action( 'wp_enqueue_scripts', 'mes_theme_styles_basic', 1 ); 


/* ------------------------------------------------------------------------ */
/* Loading Theme Scripts */
/* ------------------------------------------------------------------------ */
add_action('wp_enqueue_scripts', 'mes_load_scripts');
if ( !function_exists( 'mes_load_scripts' ) ) {
	function mes_load_scripts() {
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script('mes_bootstrap', get_template_directory_uri().'/framework/bootstrap/bootstrap.min.js', false, null , true);
		wp_enqueue_script('mes_modernizr', get_template_directory_uri().'/framework/js/modernizr.custom.js', false, null , true);
		wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?sensor=false');
		wp_enqueue_script('mes_inst', get_template_directory_uri().'/framework/js/instagram.min.js', false, null , true);
		wp_enqueue_script('mes_bxslider', get_template_directory_uri().'/framework/js/jquery.bxslider.min.js', false, null , true);
		wp_enqueue_script('mes_prettyPhoto', get_template_directory_uri().'/framework/js/jquery.prettyPhoto.js', false, null , true);		
		wp_enqueue_script('mes_waitforimages', get_template_directory_uri().'/framework/js/jquery.waitforimages.js', false, null , true);
		wp_enqueue_script('mes_flexslider', get_template_directory_uri().'/framework/FlexSlider/jquery.flexslider-min.js', false, null , true);
    	wp_enqueue_script('mes_custom', get_template_directory_uri().'/framework/js/custom.js', false, null , true);

		global $mes_options;
		$mes_theme = array( 
				'theme_url' => get_template_directory_uri(),
			);
    	wp_localize_script( 'mes_custom', 'mes_theme', $mes_theme );
	}    
}



/* ------------------------------------------------------------------------ */
/* Theme Menus */
/* ------------------------------------------------------------------------ */

function mes_menu() { 
  register_nav_menus(
    array(
      'main_menu' => 'Header Menu',
      'secondary_menu' => 'Footer Navigation',
    )
  );
}
add_action( 'init', 'mes_menu' );

/* Custom menu Walker */
class MES_Walker extends Walker_Nav_Menu
	{
	function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='my_drop'><ul class='sub-menu'>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
	
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . ' menu-item-'. $item->ID . '"';

		$output .= $indent . '<li id="menu-item-id-'. $item->ID . '"' . $value . $class_names .' >';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .' data-description="' . $item->description . '">';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		
		$item_output .= $args->after;
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

// additional image sizes
add_image_size( 'portfolio-squrex2', 762,762, true );
add_image_size( 'portfolio-squre-lit', 400,400, true );
add_image_size( 'portfolio-wide', 762, 480, true );
/*=======================================
	Register Sidebar UNLIMITED 
=======================================*/

if ( function_exists('register_sidebar') ){
	register_sidebar(array(
		'name' => 'Blog Sidebar',
		'id' => 'blog_sidebar',
        'before_widget' => '<div class="mes_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="mes_widget_title">',
        'after_title' => '</h6>'
    ));
	register_sidebar(array(
		'name' => 'Top Left Widget',
		'id' => 'top_left_widget',
        'before_widget' => '<div class="mes_widget">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="mes_widget_title">',
        'after_title' => '</h6>'
    ));

	register_sidebar( array(
		'name' => 'WooCommerce Page Sidebar',
		'id' => 'woocommerce_sidebar',
		'before_widget' => '<div id="%1$s" class="widgetSidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar(array(
		'name' => 'Page Sidebar',
		'id' => 'page_sidebar',
		'before_widget' => '<div class="mes_widget">',
        'after_widget' => '</div><div class="clearfix"></div>',
        'before_title' => '<div class="clearfix"></div><h6 class="mes_widget_title">',
        'after_title' => '</h6>'
	));
	register_sidebar(array(
		'name' => 'Footer Sidebar 1',
		'id' => 'footer_sidebar1',
		'before_widget' => '<div class="mes_widget">',
        'after_widget' => '</div><div class="clearfix"></div>',
        'before_title' => '<div class="clearfix"></div><h5 class="mes_widget_title_single">',
        'after_title' => '</h5>'
	));
	register_sidebar(array(
		'name' => 'Footer Sidebar 2',
		'id' => 'footer_sidebar2',
		'before_widget' => '<div class="mes_widget">',
        'after_widget' => '</div><div class="clearfix"></div>',
        'before_title' => '<div class="clearfix"></div><h5 class="mes_widget_title_single">',
        'after_title' => '</h5>'
	));
	register_sidebar(array(
		'name' => 'Footer Sidebar 3',
		'id' => 'footer_sidebar3',
		'before_widget' => '<div class="mes_widget">',
        'after_widget' => '</div><div class="clearfix"></div>',
        'before_title' => '<div class="clearfix"></div><h5 class="mes_widget_title_single">',
        'after_title' => '</h5>'
	));
	register_sidebar(array(
		'name' => 'Footer Sidebar 4',
		'id' => 'footer_sidebar4',
		'before_widget' => '<div class="mes_widget">',
        'after_widget' => '</div><div class="clearfix"></div>',
        'before_title' => '<div class="clearfix"></div><h3 class="mes_widget_title_single">',
        'after_title' => '</h3>'
	));
	
	register_sidebar( array(
		'name' => 'Portfolio Page Sidebar',
		'id' => 'portfolio_sidebar',
		'before_widget' => '<div id="%1$s" class="widgetSidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

add_filter('widget_text', 'do_shortcode');

if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );
}



//if woocommerce is active
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
$url = site_url();
if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ){
	// WooCommerce
	require_once(dirname( __FILE__ ) . '/framework/woocommerce/index.php');
} ;
if (is_plugin_active( 'woocommerce/woocommerce.php' ) && ($url == 'http://www.mestowabo.com/theme/news-board') ) {

add_action( 'template_redirect', 'add_product_to_cart' );
function add_product_to_cart() {
	if ( 1 == 1 ) {
		$product_id = 31;
		$product_id2 = 76;
		$product_id3 = 60;
		$found = false;
		//check if product already in cart
		if ( sizeof( WC()->cart->get_cart() ) > 0 ) {
			foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
				$_product = $values['data'];
				if ( $_product->id == $product_id )
					$found = true;
			}
			// if product not found, add it
			if ( ! $found )
				WC()->cart->add_to_cart( $product_id );
		} else {
			// if no products in cart, add it
			WC()->cart->add_to_cart( $product_id );
			WC()->cart->add_to_cart( $product_id2 );
			WC()->cart->add_to_cart( $product_id3 );
		}
	}
}

}

    /* ------------------------------------------------------------------------ */
	/* Automatic Plugin Activation */
	require_once('framework/plugin-activation.php');
	
	add_action('tgmpa_register', 'goodchoice_register_required_plugins');
	function goodchoice_register_required_plugins() {
		$plugins = array(			
			array(
				'name'     				=> 'Ultimate VC Addons', // The plugin name
				'slug'     				=> 'ultimate_vc', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory_uri() . '/framework/plugins/Ultimate_VC_Addons.zip', // The plugin source
				'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'     				=> 'Slider Revolution', // The plugin name
				'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory_uri() . '/framework/plugins/revslider.zip', // The plugin source
				'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
			array(
				'name'     				=> 'CF-Post-Formats', // The plugin name
				'slug'     				=> 'cf-post-formats', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory_uri() . '/framework/plugins/cf-post-formats.zip', // The plugin source
				'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),			
			array(
				'name'     				=> 'Essential Grid', // The plugin name
				'slug'     				=> 'essential-grid', // The plugin slug (typically the folder name)
				'source'   				=> get_template_directory_uri() . '/framework/plugins/essential-grid.zip', // The plugin source
				'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
		);
	
		// Change this to your theme text domain, used for internationalising strings
		$theme_text_domain = 'goodchoice-framework';
	
		/**
		 * Array of configuration settings. Amend each line as needed.
		 * If you want the default strings to be available under your own theme domain,
		 * leave the strings uncommented.
		 * Some of the strings are added into a sprintf, so see the comments at the
		 * end of each line for what each argument will be.
		 */
		$config = array(
			'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
			'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
			'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
			'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
			'menu'         		=> 'install-required-plugins', 	// Menu slug
			'has_notices'      	=> true,                       	// Show admin notices or not
			'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
			'message' 			=> '',							// Message to output right before the plugins table
			'strings'      		=> array(
				'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
				'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
				'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
				'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
				'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
				'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
				'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
				'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
				'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
				'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
				'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
				'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
				'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
			)
		);
	
		tgmpa($plugins, $config);
		
	}

/* ------------------------------------------------------------------------ */
/* Shortcodes.  */
/* ------------------------------------------------------------------------ */
include ('framework/shortcodes.php');
include("framework/widgets/twitter/mes_twitter_widget.php");
include("framework/widgets/mes_flickr_widget.php");


//SEARCH FORM
function mes_search_func( $atts ){
	return '<form role="search" method="get" class="mes-search-form" action="'.home_url( "/" ).'">
			<input type="search" class="mes-search-field" placeholder="'. esc_attr_x( '', "placeholder" ) .'" value="'. get_search_query() .'" name="s" title="'. esc_attr_x( 'Search for:', 'label' ) .'" />   
            <input type="submit" class="mes-search-submit" value=""/>
		    <i class="fa fa-search mes-search-magnif"></i>
		  </form>'
		  ;
}
add_shortcode( 'mes_search', 'mes_search_func' );



/*=======================================
	Include VC extends
=======================================*/

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active('js_composer/js_composer.php')){
include('framework/vc.php');
}



/* ------------------------------------------------------------------------ */
/* Post Formats  */
/* ------------------------------------------------------------------------ */

add_theme_support( 'post-formats',      // post formats
		array( 
			'image',    //image
			'quote',   // a quick quote
			'video',   // video 
			'audio',   // audio
			'gallery',   // audio
		)
);


add_filter('get_avatar','change_avatar_css');

function change_avatar_css($class) {
$class = str_replace("class='avatar", "class='avatar img-circle mes_avatar ", $class) ;
return $class;
}





/* ------------------------------------------------------------------------ */
/* Extra Fields.  */
/* ------------------------------------------------------------------------ */
add_action('admin_init', 'extra_fields', 1);
function extra_fields() {
	add_meta_box( 'extra_fields', 'Additional Description', 'extra_fields_for_blog', 'post', 'normal', 'high'  );
	add_meta_box( 'extra_fields', 'Additional settings', 'extra_fields_for_testimonials', 'testimonials', 'normal', 'high'  );
	add_meta_box( 'extra_fields', 'Additional settings', 'extra_fields_for_portfolio', 'portfolio', 'normal', 'high'  );
	add_meta_box( 'extra_fields', 'Additional settings', 'extra_fields_for_pages', 'page', 'normal', 'high'  );

}
@the_post_thumbnail();
@wp_link_pages( $args );
@comments_template( $file, $separate_comments );
@add_theme_support( 'automatic-feed-links' );
@add_theme_support( 'custom-header', $args );
@add_theme_support( 'custom-background', $args );


function extra_fields_for_testimonials ( $post ){
?>
 <h4>Company Name</h4>
 <input type="text" name="extra[testum-text-color]" value="<?php echo get_post_meta($post->ID, 'testum-text-color', true); ?>" />
<?php }



//Extra Field for Pages
function extra_fields_for_pages( $post ){
?>
    <h4>You can use any sidebar, just choose it. <span style="color:red">Don't forget set page template as "With Sidebars"</span></h4>
    <?php global $wp_registered_sidebars;
  	?>
    <select name="extra[sidebarss]">
    <?php foreach ($wp_registered_sidebars as $val){ ?>
    <option <?php if ($val['name'] == get_post_meta($post->ID, 'sidebarss', 1)) { echo 'selected';} ?> value="<?php echo $val['name'] ?>"><?php echo $val['name'] ?></option>
	<?php } ?>
    </select>
    <br>
  <h4>SideBar Position</h4>
  <select name="extra[sidebarss_position]">
  	<?php
	$mes_sidebars_position = array (
		"rs"  => array("name" => "Right Sidebar"),
		"ls"  => array("name" => "Left Sidebar"),
	);
	?>
    <?php foreach ($mes_sidebars_position as $val){ ?>
    <option <?php if ($val['name'] == get_post_meta($post->ID, 'sidebarss_position', 1)) { echo 'selected';} ?> value="<?php echo $val['name'] ?>"><?php echo $val['name'] ?></option>
	<?php } ?>
   </select>
   <h4>Show tagline</h4>
  <select name="extra[tagline_position]">
  	<?php
	$mes_sidebars_position = array (
		"sh"  => array("name" => "Show"),
		"hd"  => array("name" => "Hide"),
	);
	?>
    <?php foreach ($mes_sidebars_position as $val){ ?>
    <option <?php if ($val['name'] == get_post_meta($post->ID, 'tagline_position', 1)) { echo 'selected';} ?> value="<?php echo $val['name'] ?>"><?php echo $val['name'] ?></option>
	<?php } ?>
   </select>
   <?php }



//Extra Field for Portfolio
function extra_fields_for_portfolio( $post ){
	?>

<?php };



//Extra Field for Blog
function extra_fields_for_blog( $post ){
	global $mes_options;
	?>
	<h4>Show tagline</h4>
  <select name="extra[tagline_position]">
  	<?php
	$mes_sidebars_position = array (
		"sh"  => array("name" => "Show"),
		"hd"  => array("name" => "Hide"),
	);
	?>
    <?php foreach ($mes_sidebars_position as $val){ ?>
    <option <?php if ($val['name'] == get_post_meta($post->ID, 'tagline_position', 1)) { echo 'selected';} ?> value="<?php echo $val['name'] ?>"><?php echo $val['name'] ?></option>
	<?php } ?>
   </select>


<h4>You can upload up to 5 additional images (Optional. For Gallery)</h4>
    <div>
    <p>
		<label for="upload_image">Image 1: </label>
		<input id="upload_image" type="text" style="width:70%;" name="extra[image]" value="<?php echo get_post_meta($post->ID, 'image', true); ?>" />
		<input class="upload_image_button" type="button" value="Upload" /><br/>

	</p>	
	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
	<p>
		<label for="upload_image">Image 2: </label>
		<input id="upload_image" type="text" style="width:70%;" name="extra[image2]" value="<?php echo get_post_meta($post->ID, 'image2', true); ?>" />
		<input class="upload_image_button" type="button" value="Upload" /><br/>

	</p>	
	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />

	<p>
		<label for="upload_image">Image 3: </label>
		<input id="upload_image" type="text" style="width:70%;" name="extra[image3]" value="<?php echo get_post_meta($post->ID, 'image3', true); ?>" />
		<input class="upload_image_button" type="button" value="Upload" /><br/>

	</p>
    <p>
		<label for="upload_image">Image 4: </label>
		<input id="upload_image" type="text" style="width:70%;" name="extra[image4]" value="<?php echo get_post_meta($post->ID, 'image4', true); ?>" />
		<input class="upload_image_button" type="button" value="Upload" /><br/>

	</p>
    <p>
		<label for="upload_image">Image 5: </label>
		<input id="upload_image" type="text" style="width:70%;"name="extra[image5]" value="<?php echo get_post_meta($post->ID, 'image5', true); ?>" />
		<input class="upload_image_button" type="button" value="Upload" /><br/>

	</p>
    </div>
<?php };




//Save Extra Fields
add_action('save_post', 'extra_fields_update', 0);


function extra_fields_update( $post_id ){
	
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; 
	if ( !current_user_can('edit_post', $post_id) ) return false; 
	if( !isset($_POST['extra']) ) return false;	

	
	$_POST['extra'] = array_map('trim', $_POST['extra']);
	foreach( $_POST['extra'] as $key=>$value ){
		if( empty($value) )	delete_post_meta($post_id, $key);
		update_post_meta($post_id, $key, $value);
	}
	return $post_id;
}


function upload_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', get_template_directory_uri().'/framework/js/custom_uploader.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
}



function upload_styles() {
	wp_enqueue_style('thickbox');
}
add_action('admin_enqueue_scripts', 'upload_scripts'); 
add_action('admin_enqueue_scripts', 'upload_styles');



/**
* Custom widgets
**/


add_filter('wp_list_categories', 'add_span_cat_count');
function add_span_cat_count($links) {
$links = str_replace('</a> (', '</a> <span class="mes_cat_count">', $links);
$links = str_replace(')', '</span>', $links);
return $links;
}

add_filter('wp_list_archive', 'add_spann_cat_count');
function add_spann_cat_count($links) {
$links = str_replace('</a> (', '</a> <span class="mes_cat_count">', $links);
$links = str_replace(')', '</span>', $links);
return $links;
}



function tcr_tag_cloud_filter($args = array()) {
    $args['smallest'] = 8;
    $args['largest'] = 14;
    $args['unit'] = 'pt';
    return $args;
}

add_filter('widget_tag_cloud_args', 'tcr_tag_cloud_filter', 90);


//PAGINATION
function wp_corenavi() {
    global $wp_query;

    $big = 999999999; // This needs to be an unlikely integer

    // For more options and info view the docs for paginate_links()
    // http://codex.wordpress.org/Function_Reference/paginate_links
    $paginate_links = paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'mid_size' => 5
    ) );

    // Display the pagination if more than one page is found
    if ( $paginate_links ) {
        echo '<div class="pagination">';
        echo $paginate_links;
        echo '</div><!--// end .pagination -->';
    }
}


/*=======================================
	Add WP Breadcrumbs
=======================================*/



function mes_breadcrumbs(){
	/* === OPTIONS === */
    $text['home']     = __( 'Home', 'mestowabo' ); // text for the 'Home' link
    $text['category'] = __( 'Archive by Category "%s"', 'mestowabo' ); // text for a category page
    $text['search']   = __( 'Search Results for "%s" Query', 'mestowabo' ); // text for a search results page
    $text['tag']      = __( 'Posts Tagged "%s"', 'mestowabo' ); // text for a tag page
    $text['author']   = __( 'Articles Posted by %s', 'mestowabo' ); // text for an author page
    $text['404']      = __( 'Error 404', 'mestowabo' ); // text for the 404 page
 
    $show_current   = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show
    $show_on_home   = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
    $show_title     = 1; // 1 - show the title for the links, 0 - don't show
    $delimiter      = ' &nbsp;&nbsp;›&nbsp;&nbsp;'; // delimiter between crumbs
    $before         = '<h4 class="current">'; // tag before the current crumb
    $after          = '</h4>'; // tag after the current crumb
    /* === END OF OPTIONS === */
 
    global $post;
    $home_link    = home_url('/');
    $link_before  = '<h4 typeof="v:Breadcrumb">';
    $link_after   = '</h4>';
    $link_attr    = ' rel="v:url" property="v:title"';
    $link         = $link_before . '<a style="color: #999;" ' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
    $parent_id    = $parent_id_2 = $post->post_parent;
    $frontpage_id = get_option('page_on_front');
 
    if (is_home() || is_front_page()) {
 
        if ($show_on_home == 1) echo '<div class="breadcrumbs"><a style="color: #999;" href="' . $home_link . '">' . $text['home'] . '</a></div>';
 
    } else {
 
        echo '<div class="breadcrumbs">';
        if ($show_home_link == 1) {
            echo '<h4><a style="color: #999;" href="' . $home_link . '" rel="v:url" property="v:title">' . $text['home'] . '</a></h4>';
            if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
        }
 
        if ( is_category() ) {
            $this_cat = get_category(get_query_var('cat'), false);
            if ($this_cat->parent != 0) {
                $cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
                if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a  class="colored"', $link_before . '<a' . $link_attr, $cats);
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo $cats;
            }
            if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
 
        } elseif ( is_search() ) {
            echo $before . sprintf($text['search'], get_search_query()) . $after;
 
        } elseif ( is_day() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
            echo $before . get_the_time('d') . $after;
 
        } elseif ( is_month() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo $before . get_the_time('F') . $after;
 
        } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;
 
        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $delimiter);
                if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $link_before . '<a  class="colored"' . $link_attr, $cats);
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo $cats;
                if ($show_current == 1) echo $before . get_the_title() . $after;
            }
 
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
 
        } elseif ( is_attachment() ) {
            $parent = get_post($parent_id);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            if ($cat) {
                $cats = get_category_parents($cat, TRUE, $delimiter);
                $cats = str_replace('<a class="colored"', $link_before . '<a' . $link_attr, $cats);
                $cats = str_replace('</a>', '</a>' . $link_after, $cats);
                if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
                echo $cats;
            }
            printf($link, get_permalink($parent), $parent->post_title);
            if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
 
        } elseif ( is_page() && !$parent_id ) {
            if ($show_current == 1) echo $before . get_the_title() . $after;
 
        } elseif ( is_page() && $parent_id ) {
            if ($parent_id != $frontpage_id) {
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    if ($parent_id != $frontpage_id) {
                        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                    }
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo $breadcrumbs[$i];
                    if ($i != count($breadcrumbs)-1) echo $delimiter;
                }
            }
            if ($show_current == 1) {
                if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
                echo $before . get_the_title() . $after;
            }
 
        } elseif ( is_tag() ) {
            echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
 
        } elseif ( is_author() ) {
             global $author;
            $userdata = get_userdata($author);
            echo $before . sprintf($text['author'], $userdata->display_name) . $after;
 
        } elseif ( is_404() ) {
            echo $before . $text['404'] . $after;
        }
 
        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo __('Page','mestowabo') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
 
        echo '</div><!-- .breadcrumbs -->';
 
    }
	
	
}
function crumbs_tax($term_id, $tax, $sep){
	$termlink = array();
	while( (int)$term_id ){
		$term2 = get_term( $term_id, $tax );
		$termlink[] = '<a class="subpage_block" href="'. get_term_link( (int)$term2->term_id, $term2->taxonomy ) .'">'. $term2->name .'</a>'. $sep;
		$term_id = (int)$term2->parent;
	}
	$termlinks = array_reverse($termlink);
	return implode('', $termlinks);
}

if(!function_exists('_log')){
  function _log($message) {
    if (WP_DEBUG === true) {
      if (is_array($message) || is_object($message)) {
        error_log(print_r($message, true));
      } else {
        error_log($message);
      }
    }
  }
}




function start_form($content) {
  if( is_page( 'forum' ) )
  {
    if(isset($_SESSION['error_messege'])) {
      $message = $_SESSION['error_messege'];
      unset($_SESSION['error_messege']);
    }
    if(isset($_POST['post_method']) && $_POST['post_method'] == 'Y')
    {
      $name = specialchars($_POST['namae'], ENT_htmlQUOTES);
      $kana = htmlspecialchars($_POST['kana'], ENT_QUOTES);
      $affiliation = htmlspecialchars($_POST['affiliation'], ENT_QUOTES);
      $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
      if (empty($_POST['status'])){
          $status = 0;
      }else{
      	 $status = htmlspecialchars($_POST['status'], ENT_QUOTES);
      }
    }
?>
  <div class="updated"><p><strong><?php if(isset($message)) { echo $message;}; ?></strong></p></div>
  				<img class="col-xs-12" src="https://dl.dropboxusercontent.com/u/31225734/forum/img/inv-01.png">
          <div class="col-xs-12">
            <form class="form-horizontal" method="POST" action="/forum/confirm">
              <fieldset>
              <div class="form-group">
              <label class="col-md-4 control-label" for="namae">お名前</label>
              <div class="col-md-4">
              <?php if (isset($name)) { ?>
                <input id="name" name="namae" type="text" placeholder="お名前を入力してください" value="<?php echo $name; ?>" class="form-control input-md" required="">
              <?php } else { ?>
                <input id="name" name="namae" type="text" placeholder="お名前を入力してください" class="form-control input-md" required="">
              <?php } ?>
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="name-kana">おなまえ(かな)</label>
              <div class="col-md-4">
              <?php if (isset($kana)) { ?>
                <input id="name-kana" name="kana" type="text" placeholder="全角ひらがな" value="<?php echo $kana; ?>" class="form-control input-md" required="">
              <?php } else { ?>
                <input id="name-kana" name="kana" type="text" placeholder="全角ひらがな" class="form-control input-md" required="">
              <?php } ?>
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="affiliation">所属</label>
              <div class="col-md-4">
              <?php if (isset($affiliation)) { ?>
                <input id="affiliation" name="affiliation" type="text" placeholder="会社、研究室など" value="<?php echo $affiliation; ?>" class="form-control input-md" required="">
              <?php } else { ?>
                <input id="affiliation" name="affiliation" type="text" placeholder="会社、研究室など" class="form-control input-md" required="">
              <?php } ?>
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="mail">メールアドレス</label>
              <div class="col-md-5">
              <?php if (isset($email)) { ?>
                <input id="mail" name="email" type="text" placeholder="メールアドレス" value="<?php echo $email; ?>" class="form-control input-md" required="">
              <?php } else { ?>
                <input id="mail" name="email" type="text" placeholder="メールアドレス" class="form-control input-md" required="">
              <?php } ?>
              </div>
              </div>
              <div class="form-group">
              <div class="col-md-5">
              <?php if (isset($status) && $status == 1) { ?>
                <input id="status" name="status" type="hideen" value="0" class="form-control input-md" checked>
              <?php } else { ?>
                <input id="status" name="status" type="hidden" value="0" class="form-control input-md" >
              <?php } ?>
              </div>
              </div>

              <div class="form-group">
              <input type="hidden" name="post_method" value="Y">
              </div>
              <!-- Button -->
              <div class="form-group center" style="text-align:center;">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
                  <button id="submit" name="submit" class="btn btn-default submit--button">確認</button>
                </div>
              </div>
              </fieldset>
            </form>
          </div>
<?php
 }
   else
  {
  	return $content;
  }
}
add_filter('the_content', 'start_form');


function confirm_form($content) {
  if( is_page( 'forum/confirm' ) )
  {
    if(isset($_POST['post_method']) && $_POST['post_method'] == 'Y')
    {
      $name = htmlspecialchars($_POST['namae'], ENT_QUOTES);
      $kana = htmlspecialchars($_POST['kana'], ENT_QUOTES);
      $affiliation = htmlspecialchars($_POST['affiliation'], ENT_QUOTES);
      $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
      if (empty($_POST['status'])){
          $status = 0;
      }else{
      	 $status = htmlspecialchars($_POST['status'], ENT_QUOTES);
      }
        // メールのバリデーションチェック
        if( is_email($email) )
    {

    }
    else
    {
      $message = '不正なメールアドレスです';
      $_SESSION['error_messege'] = $message;
      wp_safe_redirect( home_url('/forum'), 303 );
    }

  } else {
    wp_safe_redirect( home_url('/forum'), 303 );
    exit;
  }
  // ワンタイムチケットの生成とセッションへの保存
  $session_key = md5(sha1(uniqid(mt_rand(), true)));
  $_SESSION['key'] = $session_key;
?>
          <img class="col-xs-12" src="https://dl.dropboxusercontent.com/u/31225734/forum/img/inv-02.png">
          <div class="col-xs-12">
            <form class="form-horizontal" method="POST" action="/forum/thanks">
              <fieldset>
              <div class="form-group">
              <label class="col-md-4 control-label" for="namae">お名前</label>  
              <div class="col-md-4">
              <p id="name" class="form-control input-md"><?php echo $name; ?></p>
              <input name="namae" type="hidden" value="<?php echo $name; ?>">
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="name-kana">おなまえ(かな)</label>  
              <div class="col-md-4">
              <p id="name-kana" class="form-control input-md"><?php echo $kana; ?></p>
              <input name="kana" type="hidden" value="<?php echo $kana; ?>">
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="affiliation">所属</label>  
              <div class="col-md-4">
              <p id="affiliation" class="form-control input-md"><?php echo $affiliation; ?></p>
              <input name="affiliation" type="hidden" value="<?php echo $affiliation; ?>">
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="mail">メールアドレス</label>  
              <div class="col-md-5">
              <p id="email" class="form-control input-md"><?php echo $email; ?></p>
              <input name="email" type="hidden" value="<?php echo $email; ?>">
              </div>
              </div>
              <div class="form-group">
              <input name="status" type="hidden" value="<?php echo $status; ?>">
              </div>
              </div>

              <div class="form-group">
              <input type="hidden" name="post_method" value="Y">
              <input type="hidden" name="ticket" value="<?php echo $session_key; ?>">
              </div>
              <!-- Button -->
              <div class="form-group center" style="text-align:center;">
                <div class="col-md-4 col-md-offset-3">
                  <button id="submit" name="submit" class="btn btn-default submit--button">招待状を受け取る</button>
                </div>
                <div class="col-md-2">
                <button class="btn btn-default submit--button" name="submit" value="修正する" class="btn btn-default submit--button" onClick="form.action='/forum#update';return true">修正する</button>
                </div>
              </div>
              </fieldset>
            </form>
          </div>
<?php
  }
  else
  {
  	return $content;
  }
}
add_filter('the_content', 'confirm_form');


function thanks_form($content) {
  if( is_page( 'forum/thanks' ) )
  {
    if(isset($_POST['post_method']) && $_POST['post_method'] == 'Y')
    {
      global $wpdb;
      $name = $_POST['namae'];
      $kana = $_POST['kana'];
      $affiliation = $_POST['affiliation'];
      $email = $_POST['email'];
      $status = $_POST['status'];
      // セッションキーとチケットが一致しているどうか
      if ( $_SESSION['key'] and $_POST['ticket'] and $_SESSION['key'] == $_POST['ticket'] )
      {
      $wpdb->insert('wp_maillist',
        array(
        	'name' => $name,
        	'kana' => $kana,
        	'affiliation' => $affiliation,
          'email' => $email,
          'status' => $status,
          'date' => current_time('mysql', 0)
        ),
        array(
          '%s',
          '%s',
          '%s',
          '%s',
          '%d',
          '%s'
        )
      );
      $last_id = $wpdb->get_var('SELECT LAST_INSERT_ID();');
      $serial_num = sprintf("%04d",$last_id);
      preg_match_all("([0-9])", $serial_num, $m);
      if($status == 1){
      	$sanka = "希望する";
      	$to="forum2015.music@gmail.com";
      	$subject="Special Blues ROCK LIVE参加希望者の連絡";
      	$headers = array ( 'From: KMD Forum <kmdforum2015@gmail.com>',
              'Bcc: kmdforum2015@gmail.com',
              'Content-Type: text; charset=UTF-8'
        );
      	$body=<<<BODY
　　　    【Special Blues ROCK LIVE参加希望者】
　　　　お名前: {$name}({$kana})
　　　　所属: {$affiliation}
　　　　メールアドレス: {$email}
BODY;
      	//$return = wp_mail ( $to, $subject, $body, $headers );
      }else{
      	$sanka = "希望しない";
      }

      $to="$email";
      $subject="KMDFACTORY登録完了通知";
      $body=<<< EOD
<html>
  <head>
    <meta http-equiv=3D"Content-Type" content=3D"text/html; charset=3DUTF-8">
  </head>
  <body style="background-color:#1A1A1A; font-family: Verdana, "游ゴシック", YuGothic, "Hiragino Kaku Gothic ProN", Meiryo, sans-serif;">
    <div style="background-color:#1A1A1A; padding:15px; font-family: Verdana, "游ゴシック", YuGothic, "Hiragino Kaku Gothic ProN", Meiryo, sans-serif;">
    <div style=" border:1px solid #C7B299; color:#C7B299; text-align:center; position:relative">
        <div style="padding:100px 25px;">
          <h1 style="font-size:24px;">INVITATION</h1>
          <p style="font-size:16px;">
            <span class="name">{$name}</span>さま、こんにちは。
          </p>
          <p style="font-size:16px;" style="font-size:16px;">
            この度は、KMD FACTORY・KMD Forum2015への招待状をご登録いただき、誠にありがとうございます！
          </p>
          <p style="font-size:16px;">開催当日まで、KMD一同、全力で準備に取り組んで参ります。また、ご登録いただいた方限定の特別コンテンツや抽選会等もご用意しております。お楽しみに！</p>
          <p style="font-size:16px;">本メールを保管して頂き、会場にお越しの際、受付で下記の４桁のシリアル番号をご提示ください。</p>
          <p style="font-size:16px;">
            <span class="name" >{$name}</span>さまのお越しを心よりお待ちしております！
          </p>
          <span style="font-size:16px; padding:10px; display:inline-block; border:1px solid; margin:10px;">{$m[0][0]}</span><span style="font-size:16px; padding:10px; display:inline-block; border:1px solid; margin:10px;">{$m[0][1]}</span><span style="font-size:16px; padding:10px; display:inline-block; border:1px solid; margin:10px;">{$m[0][2]}</span><span style="font-size:16px; padding:10px; display:inline-block; border:1px solid; margin:10px;">{$m[0][3]}</span>
        </div>
    <table class="meta-info--table" style="color:#C7B299; margin:0 auto; font-size:12px;">
          <tbody><tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>日時 　:　</th>
            <td style="text-align: left; ">2015年11月27・28日（金・土）<br>10:00 〜 18:00</td>
          </tr>
          <tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>会場　:　</th>
            <td style="text-align: left;">五反田　東京デザインセンター<br><a href="https://goo.gl/maps/qim1UBAaJaU2" style="color: #C7B299;">地図アプリで確認する</a></td>
          </tr>
          <tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>アクセス　:　</th>
            <td style="text-align: left;">JR山手線五反田駅東口より徒歩2分<br>
都営浅草線五反田駅A7出口正面<br>
東急池上線五反田駅より徒歩3分<br>
首都高速2号線目黒ランプ　車3分</td>
          </tr>
          <tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>WEB　:　</th>
            <td style="text-align: left;"><a href="https://goo.gl/maps/qim1UBAaJaU2" style="color: #C7B299;">http://kmd-media.com/forum/</a></td>
          </tr>
              <tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>つなぎ女子　:　</th>
            <td style="text-align: left;"><a href="https://goo.gl/maps/qim1UBAaJaU2" style="color: #C7B299;">http://kmd-media.com/static/tsunagi/</a></td>
          </tr>
              <tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>Journal　:　</th>
            <td style="text-align: left;"><a href="https://goo.gl/maps/qim1UBAaJaU2" style="color: #C7B299;">http://kmd-media.com/</a></td>
          </tr>
        </tbody></table>
    </div>
    </div>
  </body>
</html>
EOD;
      $headers = array ( 'From: KMD Forum <kmdforum2015@gmail.com>',
                   'Bcc: kmdforum2015@gmail.com',
                   'Content-Type: text/html; charset=UTF-8',
                  );
       $return = wp_mail ( $to, $subject, $body, $headers );
      }
      else
      {
        $message = 'メールアドレスは送信済みです';
      }
      // セッションの破棄
      unset($_SESSION['key']);
?>
  <!-- <div class="updated col-xs-12"><img style="width:100%;" src="https://dl.dropboxusercontent.com/u/31225734/forum/img/inv-03.png"><p><strong><?php echo $message; ?></strong></p></div>
  </div> -->
  <div style="background-color:#1A1A1A; padding:15px; font-family: Verdana, "游ゴシック", YuGothic, "Hiragino Kaku Gothic ProN", Meiryo, sans-serif;">
    <div style=" border:1px solid #C7B299; color:#C7B299; text-align:center; position:relative">
        <div style="padding:100px 25px;">
          <h1 style="font-size:24px;">INVITATION</h1>
          <p style="font-size:16px; margin-top:24px;">
            <span class="name"><?php echo $name; ?></span>さま、こんにちは。
          </p>
          <p style="font-size:16px;" style="font-size:16px;">
            この度は、KMD FACTORY・KMD Forum2015への招待状をご登録いただき、誠にありがとうございます！
          </p>
          <p style="font-size:16px;">開催当日まで、KMD一同、全力で準備に取り組んで参ります。また、ご登録いただいた方限定の特別コンテンツや等もご用意しております。お楽しみに！</p>
          <p style="font-size:16px;">本シリアル番号を保管して頂き、会場にお越しの際、受付で下記の４桁のシリアル番号をお伝えください。
また、ご登録いただいたメールアドレスにも、同じシリアル番号が自動配信されております。ご確認ください。</p>
          <p style="font-size:16px;">
            <span class="name" ><?php echo $name; ?></span>さまのお越しを心よりお待ちしております！
          </p>
          <span style="font-size:16px; padding:10px; display:inline-block; border:1px solid; margin:10px;"><?php echo $m[0][0]; ?></span><span style="font-size:16px; padding:10px; display:inline-block; border:1px solid; margin:10px;"><?php echo $m[0][1]; ?></span><span style="font-size:16px; padding:10px; display:inline-block; border:1px solid; margin:10px;"><?php echo $m[0][2]; ?></span><span style="font-size:16px; padding:10px; display:inline-block; border:1px solid; margin:10px;"><?php echo $m[0][3]; ?></span>
        </div>
    <table class="meta-info--table" style="color:#C7B299; margin:0 auto; font-size:12px;">
          <tbody><tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>日時 　:　</th>
            <td style="text-align: left; ">2015年11月27・28日（金・土）<br>10:00 〜 18:00</td>
          </tr>
          <tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>会場　:　</th>
            <td style="text-align: left;">五反田　東京デザインセンター<br><a href="https://goo.gl/maps/qim1UBAaJaU2" style="color: white;">地図アプリで確認する</a></td>
          </tr>
          <tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>アクセス　:　</th>
            <td style="text-align: left;">JR山手線五反田駅東口より徒歩2分<br>
都営浅草線五反田駅A7出口正面<br>
東急池上線五反田駅より徒歩3分<br>
首都高速2号線目黒ランプ　車3分</td>
          </tr>
          <tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>WEB　:　</th>
            <td style="text-align: left;"><a href="http://kmd-media.com/forum/" style="color: white;">http://kmd-media.com/forum/</a></td>
          </tr>
              <tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>つなぎ女子　:　</th>
            <td style="text-align: left;"><a href="http://kmd-media.com/static/tsunagi/" style="color: white;">http://kmd-media.com/static/tsunagi/</a></td>
          </tr>
              <tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>Journal　:　</th>
            <td style="text-align: left;"><a href="http://kmd-media.com/" style="color: white;">http://kmd-media.com/</a></td>
          </tr>
        </tbody></table>
    </div>
    </div>
<?php
  } else {
    wp_safe_redirect( home_url('/forum'), 303 );
    exit;
  }
  // ワンタイムチケットの生成とセッションへの保存
  $session_key = md5(sha1(uniqid(mt_rand(), true)));
  $_SESSION['key'] = $session_key;
  }
  else
  {
    return $content;
  }
}
add_filter('the_content', 'thanks_form');

function start_form_en($content) {
  if( is_page( 'forum-en' ) )
  {
    if(isset($_SESSION['error_messege'])) {
      $message = $_SESSION['error_messege'];
      unset($_SESSION['error_messege']);
    }
    if(isset($_POST['post_method']) && $_POST['post_method'] == 'Y')
    {
      $name = specialchars($_POST['namae'], ENT_htmlQUOTES);
      $kana = htmlspecialchars($_POST['kana'], ENT_QUOTES);
      $affiliation = htmlspecialchars($_POST['affiliation'], ENT_QUOTES);
      $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
      if (empty($_POST['status'])){
          $status = 0;
      }else{
         $status = htmlspecialchars($_POST['status'], ENT_QUOTES);
      }
    }
?>
  <div class="updated"><p><strong><?php if(isset($message)) { echo $message;}; ?></strong></p></div>
          <img class="col-xs-12" src="https://dl.dropboxusercontent.com/u/31225734/forum/img/inv-01-en.png">
          <div class="col-xs-12">
            <form class="form-horizontal" method="POST" action="/forum-en/confirm-en">
              <fieldset>
              <div class="form-group">
              <label class="col-md-4 control-label" for="namae">NAME</label>
              <div class="col-md-4">
              <?php if (isset($name)) { ?>
                <input id="name" name="namae" type="text" placeholder="name" value="<?php echo $name; ?>" class="form-control input-md" required="">
              <?php } else { ?>
                <input id="name" name="namae" type="text" placeholder="name" class="form-control input-md" required="">
              <?php } ?>
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="name-kana">NAME(Confirm)</label>
              <div class="col-md-4">
              <?php if (isset($kana)) { ?>
                <input id="name-kana" name="kana" type="text" placeholder="name" value="<?php echo $kana; ?>" class="form-control input-md" required="">
              <?php } else { ?>
                <input id="name-kana" name="kana" type="text" placeholder="name" class="form-control input-md" required="">
              <?php } ?>
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="affiliation">Affiliation</label>
              <div class="col-md-4">
              <?php if (isset($affiliation)) { ?>
                <input id="affiliation" name="affiliation" type="text" placeholder="Company etc" value="<?php echo $affiliation; ?>" class="form-control input-md" required="">
              <?php } else { ?>
                <input id="affiliation" name="affiliation" type="text" placeholder="Company etc" class="form-control input-md" required="">
              <?php } ?>
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="mail">E-mail</label>
              <div class="col-md-5">
              <?php if (isset($email)) { ?>
                <input id="mail" name="email" type="text" placeholder="E-mail" value="<?php echo $email; ?>" class="form-control input-md" required="">
              <?php } else { ?>
                <input id="mail" name="email" type="text" placeholder="E-mail" class="form-control input-md" required="">
              <?php } ?>
              </div>
              </div>
              <div class="form-group">
              <div class="col-md-5">
              <?php if (isset($status) && $status == 1) { ?>
                <input id="status" name="status" type="hidden" value="1" class="form-control input-md">
              <?php } else { ?>
                <input id="status" name="status" type="hidden" value="1" class="form-control input-md" >
              <?php } ?>
              </div>
              </div>

              <div class="form-group">
              <input type="hidden" name="post_method" value="Y">
              </div>
              <!-- Button -->
              <div class="form-group center" style="text-align:center;">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
                  <button id="submit" name="submit" class="btn btn-default submit--button">Confirm</button>
                </div>
              </div>
              </fieldset>
            </form>
          </div>
<?php
 }
   else
  {
    return $content;
  }
}
add_filter('the_content', 'start_form_en');


function confirm_form_en($content) {
  if( is_page( 'forum-en/confirm-en' ) )
  {
    if(isset($_POST['post_method']) && $_POST['post_method'] == 'Y')
    {
      $name = htmlspecialchars($_POST['namae'], ENT_QUOTES);
      $kana = htmlspecialchars($_POST['kana'], ENT_QUOTES);
      $affiliation = htmlspecialchars($_POST['affiliation'], ENT_QUOTES);
      $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
      if (empty($_POST['status'])){
          $status = 0;
      }else{
         $status = htmlspecialchars($_POST['status'], ENT_QUOTES);
      }
        // メールのバリデーションチェック
        if( is_email($email) )
    {

    }
    else
    {
      $message = '不正なメールアドレスです';
      $_SESSION['error_messege'] = $message;
      wp_safe_redirect( home_url('/forum-en'), 303 );
    }

  } else {
    wp_safe_redirect( home_url('/forum-en'), 303 );
    exit;
  }
  // ワンタイムチケットの生成とセッションへの保存
  $session_key = md5(sha1(uniqid(mt_rand(), true)));
  $_SESSION['key'] = $session_key;
?>
          <img class="col-xs-12" src="https://dl.dropboxusercontent.com/u/31225734/forum/img/inv-02-en.png">
          <div class="col-xs-12">
            <form class="form-horizontal" method="POST" action="/forum-en/thanks-en">
              <fieldset>
              <div class="form-group">
              <label class="col-md-4 control-label" for="namae">NAME</label>  
              <div class="col-md-4">
              <p id="name" class="form-control input-md"><?php echo $name; ?></p>
              <input name="namae" type="hidden" value="<?php echo $name; ?>">
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="name-kana">NAME(Confirm)</label>  
              <div class="col-md-4">
              <p id="name-kana" class="form-control input-md"><?php echo $kana; ?></p>
              <input name="kana" type="hidden" value="<?php echo $kana; ?>">
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="affiliation">Affiliation</label>  
              <div class="col-md-4">
              <p id="affiliation" class="form-control input-md"><?php echo $affiliation; ?></p>
              <input name="affiliation" type="hidden" value="<?php echo $affiliation; ?>">
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
              <label class="col-md-4 control-label" for="mail">E-mail</label>  
              <div class="col-md-5">
              <p id="email" class="form-control input-md"><?php echo $email; ?></p>
              <input name="email" type="hidden" value="<?php echo $email; ?>">
              </div>
              </div>
              <div class="form-group">
              <input name="status" type="hidden" value="<?php echo $status; ?>">
              </div>
              </div>

              <div class="form-group">
              <input type="hidden" name="post_method" value="Y">
              <input type="hidden" name="ticket" value="<?php echo $session_key; ?>">
              </div>
              <!-- Button -->
              <div class="form-group center" style="text-align:center;">
                <div class="col-md-4 col-md-offset-3">
                  <button id="submit" name="submit" class="btn btn-default submit--button">Receive the invitation</button>
                </div>
                <div class="col-md-2">
                <button class="btn btn-default submit--button" name="submit" value="修正する" class="btn btn-default submit--button" onClick="form.action='/forum#update';return true">Modification</button>
                </div>
              </div>
              </fieldset>
            </form>
          </div>
<?php
  }
  else
  {
    return $content;
  }
}
add_filter('the_content', 'confirm_form_en');


function thanks_form_en($content) {
  if( is_page( 'forum-en/thanks-en' ) )
  {
    if(isset($_POST['post_method']) && $_POST['post_method'] == 'Y')
    {
      global $wpdb;
      $name = $_POST['namae'];
      $kana = $_POST['kana'];
      $affiliation = $_POST['affiliation'];
      $email = $_POST['email'];
      $status = $_POST['status'];
      // セッションキーとチケットが一致しているどうか
      if ( $_SESSION['key'] and $_POST['ticket'] and $_SESSION['key'] == $_POST['ticket'] )
      {
      $wpdb->insert('wp_maillist',
        array(
          'name' => $name,
          'kana' => $kana,
          'affiliation' => $affiliation,
          'email' => $email,
          'status' => $status,
          'date' => current_time('mysql', 0)
        ),
        array(
          '%s',
          '%s',
          '%s',
          '%s',
          '%d',
          '%s'
        )
      );
      $last_id = $wpdb->get_var('SELECT LAST_INSERT_ID();');
      $serial_num = sprintf("%04d",$last_id);
      preg_match_all("([0-9])", $serial_num, $m);
      if($status == 1){
        $sanka = "希望する";
        $to="forum2015.music@gmail.com";
        $subject="Special Blues ROCK LIVE参加希望者の連絡";
        $headers = array ( 'From: KMD Forum <kmdforum2015@gmail.com>',
              'Bcc: kmdforum2015@gmail.com',
              'Content-Type: text; charset=UTF-8'
        );
        $body=<<<BODY
　　　    【Special Blues ROCK LIVE参加希望者】
　　　　お名前: {$name}({$kana})
　　　　所属: {$affiliation}
　　　　メールアドレス: {$email}
BODY;
        // $return = wp_mail ( $to, $subject, $body, $headers );
      }else{
        $sanka = "希望しない";
      }

      $to="$email";
      $subject="KMDFACTORY登録完了通知";
      $body=<<< EOD
<html>
  <head>
    <meta http-equiv=3D"Content-Type" content=3D"text/html; charset=3DUTF-8">
  </head>
  <body style="background-color:#1A1A1A; font-family: Verdana, "游ゴシック", YuGothic, "Hiragino Kaku Gothic ProN", Meiryo, sans-serif;">
    <div style="background-color:#1A1A1A; padding:15px; font-family: Verdana, "游ゴシック", YuGothic, "Hiragino Kaku Gothic ProN", Meiryo, sans-serif;">
    <div style=" border:1px solid #C7B299; color:#C7B299; text-align:center; position:relative">
        <div style="padding:100px 25px;">
          <h1 style="font-size:24px;">INVITATION</h1>
          <p style="font-size:16px;">
            Hello, Dear <span class="name">{$name}</span>
          </p>
          <p style="font-size:16px;" style="font-size:16px;">
            Thank you very much for your registration to KMD Factory and KMD Forum  ! 
          </p>
          <p style="font-size:16px;">Let's prepared for the forum together ! We also have special gifts to the people have done registration. Please looking forward to it!</p>
          <p style="font-size:16px;">Keep the cereal number carefully and when you come to the exhibition. please show tyour 4 cereal numbers which are showing below to the reception.</p>
          <span style="font-size:16px; padding:10px; display:inline-block; border:1px solid; margin:10px;">{$m[0][0]}</span><span style="font-size:16px; padding:10px; display:inline-block; border:1px solid; margin:10px;">{$m[0][1]}</span><span style="font-size:16px; padding:10px; display:inline-block; border:1px solid; margin:10px;">{$m[0][2]}</span><span style="font-size:16px; padding:10px; display:inline-block; border:1px solid; margin:10px;">{$m[0][3]}</span>
        </div>
    <table class="meta-info--table" style="color:#C7B299; margin:0 auto; font-size:12px;">
          <tbody><tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>Data 　:　</th>
            <td style="text-align: left; ">November 27(Fri)・28(Sat), 2015<br>10:00 〜 18:00</td>
          </tr>
          <tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>Venue　:　</th>
            <td style="text-align: left;">Tokyo Design Center  Gotanda<br><a href="https://goo.gl/maps/qim1UBAaJaU2" style="color: #C7B299;">Check in app</a></td>
          </tr>
          <tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>Getting There  :　</th>
            <td style="text-align: left;">2minutes walk from JR Yamanote Line / Gotanda Station
<br>
Located in front of the Exit A7 of Asakusa Line<br>
3minutes walk from Tokyu Ikegami Line / Gotanda Station<br>
3minutes from Meguro exit ramp of Expressway Route 2</td>
          </tr>
          <tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>WEB　:　</th>
            <td style="text-align: left;"><a href="http://kmd-media.com/forum-en/" style="color: #C7B299;">http://kmd-media.com/forum/</a></td>
          </tr>
              <tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>つなぎ女子　:　</th>
            <td style="text-align: left;"><a href="http://kmd-media.com/static/tsunagi/" style="color: #C7B299;">http://kmd-media.com/static/tsunagi/</a></td>
          </tr>
              <tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>Journal　:　</th>
            <td style="text-align: left;"><a href="http://kmd-media.com/" style="color: #C7B299;">http://kmd-media.com/</a></td>
          </tr>
        </tbody></table>
    </div>
    </div>
  </body>
</html>
EOD;
      $headers = array ( 'From: KMD Forum <kmdforum2015@gmail.com>',
                   'Bcc: kmdforum2015@gmail.com',
                   'Content-Type: text/html; charset=UTF-8',
                  );
      $return = wp_mail ( $to, $subject, $body, $headers );
      }
      else
      {
        $message = 'メールアドレスは送信済みです';
      }
      // セッションの破棄
      unset($_SESSION['key']);
?>
  <!-- <div class="updated col-xs-12"><img style="width:100%;" src="https://dl.dropboxusercontent.com/u/31225734/forum/img/inv-03.png"><p><strong><?php echo $message; ?></strong></p></div>
  </div> -->
  <div style="background-color:#1A1A1A; padding:15px; font-family: Verdana, "游ゴシック", YuGothic, "Hiragino Kaku Gothic ProN", Meiryo, sans-serif;">
    <div style=" border:1px solid #C7B299; color:#C7B299; text-align:center; position:relative">
        <div style="padding:100px 25px;">
          <h1 style="font-size:24px;">INVITATION</h1>
          <p style="font-size:16px; margin-top:24px;">
            Hello, Dear <span class="name">{$name}</span>
          </p>
          <p style="font-size:16px;" style="font-size:16px;">
            Thank you very much for your registration to KMD Factory and KMD Forum  ! 
          </p>
          <p style="font-size:16px;">Let's prepared for the forum together ! We also have special gifts to the people have done registration. Please looking forward to it!  Keep the cereal number carefully and when you come to the exhibition.</p>
          <p style="font-size:16px;"> please show tyour 4 cereal numbers which are showing below to the reception.The same cereal number will also be sent to your registrated email-address automaticaly. Please comfirm the information in your email. We are waiting for  the last person to register.</p>
          <p style="font-size:16px;">For the people who applys to join Special Blues Rock LIve event on 28th, we will send the draw result to your email later. </p>
          <span style="font-size:16px; padding:10px; display:inline-block; border:1px solid; margin:10px;"><?php echo $m[0][0]; ?></span><span style="font-size:16px; padding:10px; display:inline-block; border:1px solid; margin:10px;"><?php echo $m[0][1]; ?></span><span style="font-size:16px; padding:10px; display:inline-block; border:1px solid; margin:10px;"><?php echo $m[0][2]; ?></span><span style="font-size:16px; padding:10px; display:inline-block; border:1px solid; margin:10px;"><?php echo $m[0][3]; ?></span>
        </div>
    <table class="meta-info--table" style="color:#C7B299; margin:0 auto; font-size:12px;">
          <tbody><tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>Data 　:　</th>
            <td style="text-align: left; ">November 27(Fri)・28(Sat), 2015<br>10:00 〜 18:00</td>
          </tr>
          <tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>Venue　:　</th>
            <td style="text-align: left;">Tokyo Design Center  Gotanda<br><a href="https://goo.gl/maps/qim1UBAaJaU2" style="color: white;">Check in app</a></td>
          </tr>
          <tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>Getting There  :　</th>
            <td style="text-align: left;">2minutes walk from JR Yamanote Line / Gotanda Station
<br>
Located in front of the Exit A7 of Asakusa Line<br>
3minutes walk from Tokyu Ikegami Line / Gotanda Station<br>
3minutes from Meguro exit ramp of Expressway Route 2</td>
          </tr>
          <tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>WEB　:　</th>
            <td style="text-align: left;"><a href="http://kmd-media.com/forum-en/" style="color: #C7B299;">http://kmd-media.com/forum/</a></td>
          </tr>
              <tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>つなぎ女子　:　</th>
            <td style="text-align: left;"><a href="http://kmd-media.com/static/tsunagi/" style="color: #C7B299;">http://kmd-media.com/static/tsunagi/</a></td>
          </tr>
              <tr style="vertical-align:baseline; text-align: right; height: 100px; display: table-row;">
            <th>Journal　:　</th>
            <td style="text-align: left;"><a href="http://kmd-media.com/" style="color: #C7B299;">http://kmd-media.com/</a></td>
          </tr>
        </tbody></table>
    </div>
    </div>
<?php
  } else {
    wp_safe_redirect( home_url('/forum-en'), 303 );
    exit;
  }
  // ワンタイムチケットの生成とセッションへの保存
  $session_key = md5(sha1(uniqid(mt_rand(), true)));
  $_SESSION['key'] = $session_key;
  }
  else
  {
    return $content;
  }
}
add_filter('the_content', 'thanks_form_en');



function checkEmailAjax(){
    global $wpdb;
    $mail = htmlspecialchars($_POST['mail'], ENT_QUOTES);
    $myrows = $wpdb->get_results( "SELECT id FROM wp_maillist WHERE email = '$mail'" );
    $count = count($myrows);
    echo $count;
    die();
}

add_action( "wp_ajax_checkEmailAjax" , "checkEmailAjax" );
add_action( "wp_ajax_nopriv_checkEmailAjax" , "checkEmailAjax" );

/*ここぉ！*/
function checksyrialAjax(){
    global $wpdb;
    $number = htmlspecialchars($_POST['number'], ENT_QUOTES);
    $myrows = $wpdb->get_row( "SELECT * FROM wp_maillist WHERE id = '$number'" );
    $nakayamu = json_encode($myrows);
    echo $nakayamu;
    die();
}

add_action( "wp_ajax_checksyrialAjax" , "checksyrialAjax" );
add_action( "wp_ajax_nopriv_checksyrialAjax" , "checksyrialAjax" );

?>

