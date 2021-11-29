<?php
/**
 * Plugin Name:     Wordpress Training by Pivotal Agency
 * Plugin URI:      https://github.com/pvtl/video-training-wp-plugin.git
 * Description:     Adds access to tailor made Wordpress video training for this website.
 * Author:          Pivotal Agency
 * Author URI:      http://pivotal.agency
 * Text Domain:     pvtl-training
 * Domain Path:     /languages
 * Version:         1.0.0
 *
 * @package         Training
 */

namespace App\Plugins\Pvtl;

class PvtlTraining
{
    // The name of the plugin (for cosmetic purposes)
    protected $pluginName = 'Training';

    public function __construct()
    {
        // Call the actions/hooks
        register_activation_hook(__FILE__, array($this, 'onActivate'));
        add_action( 'admin_menu', array($this, 'addAdminMenuItem') );
        add_action( 'admin_init', array($this, 'registerSettings') );
    }

    /**
     * On Plugin Activate, copy over front-end assets
     *
     * @return void
     */
    public function onActivate()
    {
        // Nothing yet
    }

    public function registerSettings()
    {
        register_setting( 'pvtl-training', 'training_portal_slug' );
    }

    /**
     * Adds a menu item to the admin menu
     *
     * @return void
     */
    public function addAdminMenuItem()
    {
        add_menu_page(
            'Wordpress Training', // Page Title
            'Training', // Menu Title
            'edit_posts', // Capability
            'pvtl-training', // Menu Slug
            array($this, 'renderAdminPage'), // Render function
            'dashicons-video-alt3', // Icon
            99 // Position
        );
    }

    /**
     * Renders the admin page
     *
     * @return void
     */
    public function renderAdminPage()
    {
		wp_enqueue_script( 'pvtl-training', plugin_dir_url( __FILE__ ) . 'resources/assets/js/pvtl-training.js', array('jquery'), '1.0.0', true );

		$training_portal_slug = get_option('training_portal_slug');

		if ( isset( $training_portal_slug ) && !empty( $training_portal_slug ) ) {
			require_once plugin_dir_path( __FILE__ ) . 'resources/views/admin-iframe.php';
		} else {
			require_once plugin_dir_path( __FILE__ ) . 'resources/views/admin-form.php';
		}
    }
}

if (!defined('ABSPATH')) {
    exit;  // Exit if accessed directly
}

$pvtlTraining = new PvtlTraining();
