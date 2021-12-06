<?php
/**
 * Plugin Name:     Wordpress Training by Pivotal Agency
 * Plugin URI:      https://github.com/pvtl/video-training-wp-plugin.git
 * Description:     Adds access to tailor made Wordpress video training for this website.
 * Author:          Pivotal Agency
 * Author URI:      http://pivotal.agency
 * Text Domain:     pvtl-training
 * Domain Path:     /languages
 * Version:         1.0.1
 *
 * @package         Training
 */

namespace App\Plugins\Pvtl;

/**
 * CLass for Training
 */
class PvtlTraining {
	/**
	 * Constructor
	 */
	public function __construct() {
		// Call the actions/hooks.
		register_activation_hook( __FILE__, array( $this, 'on_activate' ) );
		add_action( 'admin_menu', array( $this, 'add_admin_menu_item' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
	}

	/**
	 * On Plugin Activate, copy over front-end assets
	 *
	 * @return void
	 */
	public function on_activate() {
		// Nothing yet.
	}

	/**
	 * Registers the settings available to this plugin.
	 */
	public function register_settings() {
		// A single field - the API key (aka the slug of the post).
		register_setting( 'pvtl-training', 'training_portal_slug' );
	}

	/**
	 * Adds a menu item to the admin menu
	 *
	 * @return void
	 */
	public function add_admin_menu_item() {
		add_menu_page(
			'Wordpress Training', // Page Title.
			'Training', // Menu Title.
			'edit_posts', // Capability.
			'pvtl-training', // Menu Slug.
			array( $this, 'render_admin_page' ), // Render function.
			'dashicons-video-alt3', // Icon.
			99 // Position.
		);
	}

	/**
	 * Renders the admin page
	 *
	 * @return void
	 */
	public function render_admin_page() {
		wp_enqueue_script(
			'pvtl-training',
			plugin_dir_url( __FILE__ ) . 'resources/assets/js/pvtl-training.js',
			array( 'jquery' ),
			'1.0.0',
			true
		);

		$training_portal_slug = get_option( 'training_portal_slug' );

		if ( isset( $training_portal_slug ) && ! empty( $training_portal_slug ) ) {
			require_once plugin_dir_path( __FILE__ ) . 'resources/views/admin-iframe.php';
		} else {
			require_once plugin_dir_path( __FILE__ ) . 'resources/views/admin-form.php';
		}
	}
}

if ( ! defined( 'ABSPATH' ) ) {
	exit;  // Exit if accessed directly.
}

$pvtl_training = new PvtlTraining();
