<?php
/**
 * @wordpress-plugin
 * Plugin Name: Showcase Portfolio Addon
 * Plugin URI: https://yukdigitalz.com/showcase
 * Description: Pop-up showcase widget for Elementor with responsive view options.
 * Version: 1.0
 * Author: Shihela
 * Author URI: https://github.com/shihela
 * Text Domain: showcase-portfolio-addon
 * Domain Path: /languages
 */

namespace Showcase;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


// Enqueue styles and scripts
function enqueue_assets() {
    if ( did_action( 'elementor/loaded' ) ) {
        wp_enqueue_style(
            'showcase-style',
            plugin_dir_url( __FILE__ ) . 'assets/css/style.css',
            [],
            filemtime( plugin_dir_path( __FILE__ ) . 'assets/css/style.css' )
        );
        wp_enqueue_script(
            'showcase-script',
            plugin_dir_url( __FILE__ ) . 'assets/js/script.js',
            [ 'jquery' ],
            filemtime( plugin_dir_path( __FILE__ ) . 'assets/js/script.js' ),
            true
        );
    }
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );

// Register the Elementor widget
function register_widget( $widgets_manager ) {
    require_once __DIR__ . '/widgets/widget-showcase.php';
    $widgets_manager->register( new \Showcase\Widget_Showcase() );
}
add_action( 'elementor/widgets/register', __NAMESPACE__ . '\register_widget' );

// Add a custom category to Elementor
function add_widget_category( $elements_manager ) {
    $elements_manager->add_category(
        'showcase-category',
        [
            'title' => __( 'Showcase Addons', 'showcase-portfolio-addon' ),
            'icon'  => 'eicon-gallery-grid',
        ]
    );
}
add_action( 'elementor/elements/categories_registered', __NAMESPACE__ . '\add_widget_category' );
