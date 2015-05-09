<?php 
/************************************************************
* MAIN Functions file
*************************************************************/

/************************************************************
* Define Constant Variables
*************************************************************/
$get_theme = wp_get_theme();
$theme_name = $get_theme->get('TextDomain');
DEFINE('CSS_DIR',get_template_directory_uri().'/css/');
DEFINE('JS_DIR',get_template_directory_uri().'/js/');
DEFINE('STYLE_URI',get_stylesheet_uri());
DEFINE('THEMEPREFIX',$theme_name);

/************************************************************
* Theme Requirements (if any..)
*************************************************************/
require_once('libs/class.settings-api.php');

/************************************************************
* Theme Setup
* - remove_header_info
* - _kt_custom_background_cb
* - register menu
*************************************************************/
function businessmind_theme_setup(){
    
        // Set $content_width
        if ( ! isset( $content_width ) )
         global $content_width;
         $content_width = 575;
         
        
        add_editor_style( 'style.css' );
        // Load Background
        $businessmind_background_args = array(
        'default-color' => 'ffffff',
        'default-image' => get_template_directory_uri() . '/img/bg.png',
        'wp-head-callback' => 'businessmind_custom_background_cb',
        );
        add_theme_support( 'custom-background', $businessmind_background_args );
        
        //Load Header
        $businessmind_header_defaults = array(
        'default-image'          => '',
        'random-default'         => false,
        'width'                  => '1170',
        'height'                 => '370',
        'flex-height'            => false,
        'flex-width'             => false,
        'default-text-color'     => '',
        'header-text'            => false,
        'uploads'                => true,
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
        );
        add_theme_support( 'custom-header', $businessmind_header_defaults );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'post-thumbnails' );
        register_nav_menu( 'primary', __('Main Menu','businessmind') );
        load_theme_textdomain('businessmind', get_template_directory() . '/languages');
    }
add_action('after_setup_theme', 'businessmind_theme_setup');
    
function businessmind_custom_background_cb() {
  $background = set_url_scheme( get_background_image() );
  $color = get_theme_mod( 'background_color', get_theme_support( 'custom-background', 'default-color' ) );

  if ( ! $background && ! $color )
    return;

  $style = $color ? "background-color: #$color;" : '';

  if ( $background ) {
    $image = " background-image: url('$background');";

    $repeat = get_theme_mod( 'background_repeat', get_theme_support( 'custom-background', 'default-repeat' ) );
    if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
      $repeat = 'repeat';
    $repeat = " background-repeat: $repeat;";

    $position = get_theme_mod( 'background_position_x', get_theme_support( 'custom-background', 'default-position-x' ) );
    if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
      $position = 'left';
    $position = " background-position: top $position;";

    $attachment = get_theme_mod( 'background_attachment', get_theme_support( 'custom-background', 'default-attachment' ) );
    if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
      $attachment = 'scroll';
    $attachment = " background-attachment: $attachment;";

    $style .= $image . $repeat . $position . $attachment;
  }
?>
<style type="text/css" id="custom-background-css">
body.custom-background { <?php echo trim( $style ); ?> }
</style>
<?php
}

/************************************************************
*Load Stylesheets and Scripts..
*************************************************************/

    /***JS***/
    function businessmind_load_scripts() {
   
        wp_enqueue_script('bootstrap', JS_DIR.'bootstrap.min.js',array('jquery'),'',true);
        wp_enqueue_script('slicknav',JS_DIR.'jquery.slicknav.min.js',array('jquery'),'',true);
        wp_enqueue_script('init',JS_DIR.'init.js',array('jquery'),'',true);
        wp_localize_script('init', 'init_vars', array(
            'label' => __('Menu', 'businessmind')
        ));

    if ( is_singular() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );
    }
    add_action('wp_enqueue_scripts', 'businessmind_load_scripts');
     /***CSS***/
    function businessmind_load_styles()
    { 
        wp_enqueue_style( 'bootstrap', CSS_DIR. 'bootstrap.min.css','','','all' );
        wp_enqueue_style( 'bootstrap-theme', CSS_DIR. 'bootstrap-theme.min.css','','','all' );
        wp_enqueue_style( 'slicknav',CSS_DIR.'slicknav.css','','','all');
        wp_enqueue_style( 'style', STYLE_URI,'','','all' );
    }    
    add_action('wp_enqueue_scripts', 'businessmind_load_styles');
    
    
   
    function businessmind_add_ie_html5_shim () {
        echo '<!--[if lt IE 9]>';
        echo '<script src="'.get_template_directory_uri().'/js/html5shiv.js"></script>';
        echo '<![endif]-->';
    }
    add_action('wp_head', 'businessmind_add_ie_html5_shim');

/************************************************************
*Sidebar Initialization
*************************************************************/
function businessmind_widgets_init() {
    
    register_sidebar(array(
        'name' => __('Sidebar', 'businessmind' ),
        'id'   => 'sidebar',
        'description' => __('This is the widgetized sidebar.', 'businessmind' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));
	 register_sidebar(array(
        'name' => __('Home Widget Left', 'businessmind' ),
        'id'   => 'homewidgetleft',
        'description' => __('This is a widget.', 'businessmind' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));
	 register_sidebar(array(
        'name' => __('Home Widget Center', 'businessmind' ),
        'id'   => 'homewidgetcenter',
        'description' => __('This is a widget.', 'businessmind' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));
	 register_sidebar(array(
        'name' => __('Home Widget Right', 'businessmind' ),
        'id'   => 'homewidgetright',
        'description' => __('This is a widget.', 'businessmind' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));
    }
add_action( 'widgets_init', 'businessmind_widgets_init' );
/************************************************************
*Theme Functions (general) ,filters and hooks
* - excerpt_length
* - wp_title
* - next/prev button TinyMCE
* - menu fallback
*************************************************************/  

function businessmind_wp_title($title,$sep){
    global $page, $paged;
    $title .= get_bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";
    if ( $paged >= 2 || $page >= 2 )
        
        $title = "$title $sep " . sprintf( __( 'Page %s', 'businessmind' ), max( $paged, $page ) );
        return $title;
}
add_filter( 'wp_title', 'businessmind_wp_title', 10, 2 );
add_filter('mce_buttons','businessmind_wysiwyg_editor');

function businessmind_wysiwyg_editor($mce_buttons) {

	$pos = array_search('wp_more',$mce_buttons,true);

	if ($pos !== false) {

	$tmp_buttons = array_slice($mce_buttons, 0, $pos+1);
		  $tmp_buttons[] = 'wp_page';
		  $mce_buttons = array_merge($tmp_buttons, array_slice($mce_buttons, $pos+1));
	  }
	return $mce_buttons;
	}
	function businessmind_excerpt_length( $length ) {
	return 24;
	}
	add_filter( 'excerpt_length', 'businessmind_excerpt_length', 999 );
function businessmind_fallback( $args ) {
        if ( current_user_can( 'manage_options' ) ) {

            extract( $args );

            $fb_output = null;

            if ( $container ) {
                $fb_output = '<' . $container;

                if ( $container_id )
                    $fb_output .= ' id="' . $container_id . '"';

                if ( $container_class )
                    $fb_output .= ' class="' . $container_class . '"';

                $fb_output .= '>';
            }

            $fb_output .= '<ul';

            if ( $menu_id )
                $fb_output .= ' id="' . $menu_id . '"';

            if ( $menu_class )
                $fb_output .= ' class="' . $menu_class . '"';

            $fb_output .= '>';
            $fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
            $fb_output .= '</ul>';

            if ( $container )
                $fb_output .= '</' . $container . '>';

            echo $fb_output;
        }
    }
/***********************************************************
* Theme options panel
************************************************************/
if ( !class_exists('businessmind_Settings' ) ):
class businessmind_Settings {

    private $settings_api;

    function __construct() {
        $this->settings_api = new Businessmind_Settings_API;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
       function businessmind_load_admin_styles(){
       wp_enqueue_style( 'admin_styles',CSS_DIR.'admin_opts.css','', '','all');
    }
       $opt_page = add_theme_page('Theme Settings', 'Theme Settings', 'delete_posts', THEMEPREFIX.'_'.'theme_settings', array($this, 'plugin_page'));
         add_action( 'admin_print_styles-' .$opt_page, 'businessmind_load_admin_styles' );
    }
    function get_settings_sections() {
        $sections = array(
            array(
                'id' => THEMEPREFIX.'_general',
                'title' => __( 'General Settings', 'businessmind' ),
                'desc'=>__('Here you can find the settings for this theme.
                <div class="premium_opts">
                <p>Do you want <b>premium features?</b></p>
                <ul>
                    <li>Widgetized Home Page</li>
                    <li>Responsive Design</li>
                    <li>Favicon Upload</li>
                    <li>Logo Upload</li>
                    <li>Customizable Background</li>
                    <li>Full Width Slider</li>
                    <li>Customizable Header</li>
                    <li>Sidebar</li>
                    <li>Four Widget Areas In The Footer Area</li>
                    <li>Social Icons</li>
                    <li>Buy Now Button Integration With Our Online Ordering System</li>
                    <li>Online Ordering Script (allows your clients to order online from your restaurant</li>
                </ul>
                <p>Visit this link here to know more.<p><a target="_blank" class="premium_link" href="'.esc_url('http://ketchupthemes.com/business-theme','businessmind').'">Business Mind Theme- Premium Edition</a></p>
                </div>')
               
            )
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            THEMEPREFIX.'_general' => array(
             array(
                    'name' => 'favicon',
                    'label' => __( 'Upload Favicon', 'businessmind' ),
                    'desc' => __( '<p>Upload your favicon.Make sure it is 16x16pixels.</p>', 'businessmind' ),
                    'type' => 'file',
                    'default' => '',
                    'sanitize_callback'=>'esc_url_raw'
                )
            )
        );

        return $settings_fields;
    }

    function plugin_page() {
        echo '<div class="wrap">';

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
endif;

$settings = new businessmind_Settings();
/***GET THE VALUE FROM OPTIONS***/
function businessmind_get_options( $option, $section, $default = '' ) {
 
    $options = get_option( $section );
 
    if ( isset( $options[$option] ) ) {
        return $options[$option];
    }
 
    return $default;
}