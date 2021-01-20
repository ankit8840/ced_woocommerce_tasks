<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://cedcoss.com/
 * @since      1.0.0
 *
 * @package    Ced_woo_updation
 * @subpackage Ced_woo_updation/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ced_woo_updation
 * @subpackage Ced_woo_updation/public
 * @author     cedcoss <woocommerce@cedcoss.com>
 */
class Ced_woo_updation_Public {

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
		 * defined in Ced_woo_updation_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ced_woo_updation_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ced_woo_updation-public.css', array(), $this->version, 'all' );

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
		 * defined in Ced_woo_updation_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ced_woo_updation_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ced_woo_updation-public.js', array( 'jquery' ), $this->version, false );

	}
	
	/**
	 * This is a function for show sold badges when product out of stock or product quantity will 0.
	 * @since    1.0.0
	 * @return void
	 */
	public function ced_sold_out_badge(){
		global $product;
		$stock=$product->get_stock_quantity();
		$status=$product->get_stock_status();
		if ($stock<1 || $status=="outofstock") {
			echo '<span class="onsale">Sold</span>';
		}
	 }

	
	/**
	 * This is a function for show sold badges on single product page when product out of stock or product quantity will 0.
	 * @since    1.0.0
	 * @return void
	 */
	public function ced_sold_out_onsingle_page(){
		if(is_single()){
		global $product;
		$stock=$product->get_stock_quantity();
		$status=$product->get_stock_status();
		if ($stock<1 || $status=="outofstock") {
			echo '<span class="onsale">Sold</span>';
		}
		}
	}

	/**
	 * This is a function for update labels of checkout form this will change the lable of email and phone
	 *
	 * @param  mixed $fields->This will contain the complete array of checkout from fileds
	 * @return void
	 */
	function ced_update_address( $fields ) {
		$fields['billing']['billing_email']['label'] = 'Email';
		$fields['billing']['billing_phone']['label'] = 'Mobile';
		return $fields;
	}
	
	/**
	 * ced_custom_template
	 * This is a function for override the title of  the single product page
	 * @param  mixed $template
	 * @return void
	 */
	function ced_custom_template($template){
		if ( 'title.php' === basename( $template ) ){
		$template=PLUGIN_DIR_PATH.'woocommerce/single-product/title.php';
		}
		return $template;
	}
}
