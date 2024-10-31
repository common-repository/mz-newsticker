<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       muizzit.com/porosh-bio
 * @since      1.0.0
 *
 * @package    Mz_Newsticker
 * @subpackage Mz_Newsticker/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Mz_Newsticker
 * @subpackage Mz_Newsticker/public
 * @author     Porosh Ahammed <porosh.ahammed@gmail.com>
 */
class Mz_Newsticker_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mz_Newsticker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mz_Newsticker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mz-newsticker-public.css', array(), $this->version, 'all' );			  
		wp_enqueue_style( $this->plugin_name . '-marquee', plugin_dir_url( __FILE__ ) . 'css/liMarquee.css', array(), $this->version, 'all' );			  
				 

				
			add_action('wp_enqueue_scripts', 'check_font_awesome', 99999);

			function check_font_awesome() {
			  global $wp_styles;
			  $srcs = array_map('basename', (array) wp_list_pluck($wp_styles->registered, 'src') );
			  if ( in_array('font-awesome.css', $srcs) || in_array('font-awesome.min.css', $srcs)  ) {
			    /* echo 'font-awesome.css registered'; */
			  } else {
			    wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
			  }
			}

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mz_Newsticker_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mz_Newsticker_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		 
		wp_enqueue_script( $this->plugin_name . '-marquee', plugin_dir_url( __FILE__ ) . 'js/jquery.liMarquee.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mz-newsticker-public.js', array( 'jquery' ), $this->version, true );






	}

}

/**
 * The core plugin shortcode that is used to define html output,
 */
  require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/inc/mz-newsticker-shortcode.php'; 

  require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/settings/mz_newsticker_setting_style.php';
				 
