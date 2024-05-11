<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://the-gujarati.free.nf
 * @since      1.0.0
 *
 * @package    Rendering_List_Gtc
 * @subpackage Rendering_List_Gtc/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Rendering_List_Gtc
 * @subpackage Rendering_List_Gtc/public
 * @author     Parth Dodiya <parthdodiya.dodiya@gmail.com>
 */
class Rendering_List_Gtc_Public {

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
		 * defined in Rendering_List_Gtc_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Rendering_List_Gtc_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/rendering-list-gtc-public.css', array(), $this->version, 'all' );

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
		 * defined in Rendering_List_Gtc_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Rendering_List_Gtc_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/rendering-list-gtc-public.js', array( 'jquery' ), $this->version, false );

	}

	public function meal_design() {

		$api_url = 'https://www.themealdb.com/api/json/v1/1/search.php?f=a';

		$response = wp_remote_post( $api_url, array(
			'headers' => array(
				'Content-Type'  => 'application/json'
			),
			'body'    => json_encode( '', JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES )
		) );

		$meals = json_decode($response['body']);
		$list_meals = $meals->meals;

		if (property_exists($meals, 'meals')) {

			foreach ($list_meals as $meal) {
				$meal_name = $meal->strMeal;

				echo '<h1 class="page-title">'. $meal_name .'</h1><!-- .post-header -->';
				
			}
		
		}

	}

}
