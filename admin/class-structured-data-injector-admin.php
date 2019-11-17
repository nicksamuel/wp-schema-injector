<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       willsamuel.co.uk
 * @since      1.0.0
 *
 * @package    Structured_Data_Injector
 * @subpackage Structured_Data_Injector/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Structured_Data_Injector
 * @subpackage Structured_Data_Injector/admin
 * @author     William Samuel <mail@willsamuel.co.uk>
 */
class Structured_Data_Injector_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Structured_Data_Injector_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Structured_Data_Injector_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/structured-data-injector-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
            
            

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Structured_Data_Injector_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Structured_Data_Injector_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/structured-data-injector-admin.js', array( 'jquery' ), $this->version, false );

	} 
        
         public static function add()
    {
        $screens = ['post', 'wporg_cpt'];
        foreach ($screens as $screen) {
            add_meta_box(
                'wporg_box_id',          // Unique ID
                'Custom Meta Box Title', // Box title
                [self::class, 'html'],   // Content callback, must be of type callable
                $screen                  // Post type
            );
        }
    }
 
    public static function save($post_id)
    {
        if (array_key_exists('wporg_field', $_POST)) {
            update_post_meta(
                $post_id,
                '_wporg_meta_key',
                $_POST['wporg_field']
            );
        }
    }
 
    public static function html($post)
    {
        $value = get_post_meta($post->ID, '_wporg_meta_key', true);
        ?>
        
        <textarea name="wporg_field" style="height:200px;width:100%;"><?php echo $value; ?></textarea>
        <?php
    }
    
}