<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://thatpeoples.com/
 * @since             1.0.0
 * @package           Elementor_Card_Design
 *
 * @wordpress-plugin
 * Plugin Name:       Elementor Card Design
 * Plugin URI:        https://thatpeoples.com/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Rahul Harkhani
 * Author URI:        https://thatpeoples.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       elementor-card-design
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Define Plugin URL and Directory Path
 */
define( 'ELEMENTOR_CARD_DESIGN_VERSION', '1.0.0' );
define( 'ELEMENTOR_CARD_DESIGN_URL', plugins_url('/', __FILE__) );  // Define Plugin URL
define( 'ELEMENTOR_CARD_DESIGN_PATH', plugin_dir_path(__FILE__) );  // Define Plugin Directory Path
define( 'ELEMENTOR_CARD_DESIGN_DOMAIN', 'elementor-card-design' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-elementor-card-design-activator.php
 */
function activate_elementor_card_design() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-elementor-card-design-activator.php';
    Elementor_Card_Design_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-elementor-card-design-deactivator.php
 */
function deactivate_elementor_card_design() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-elementor-card-design-deactivator.php';
	Elementor_Card_Design_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_elementor_card_design' );
register_deactivation_hook( __FILE__, 'deactivate_elementor_card_design' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-elementor-card-design.php';


/*
 * Register the widgtes file in elementor widgtes.
 */
if (!function_exists('elementor_card_design_widget_register')) {

    function elementor_card_design_widget_register() {
        require_once ELEMENTOR_CARD_DESIGN_PATH . 'widgets/user-card-widget.php';
    }

}

/**
 * Check current version of Elementor
 */
if (!function_exists('elementor_card_design_plugin_load')) {

    function elementor_card_design_plugin_load() {
        // Load plugin textdomain
        load_plugin_textdomain('ELEMENTOR_CARD_DESIGN_DOMAIN');

        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', 'elementor_card_design_widget_fail_load');
            return;
        }
        $elementor_version_required = '1.1.2';
        if (!version_compare(ELEMENTOR_VERSION, $elementor_version_required, '>=')) {
            add_action('admin_notices', 'elementor_card_design_update_notice');
            return;
        }
    }

}
//add_action('plugins_loaded', 'elementor_card_design_plugin_load');


/**
 * This notice will appear if Elementor is not installed or activated or both
 */
if (!function_exists('elementor_card_design_widget_fail_load')) {

    function elementor_card_design_widget_fail_load() {
        $screen = get_current_screen();
        if (isset($screen->parent_file) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id) {
            return;
        }

        $plugin = 'elementor/elementor.php';

        if (elementor_card_design_installed()) {
            if (!current_user_can('activate_plugins')) {
                return;
            }
            $activation_url = wp_nonce_url('plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin);

            $message = '<p>' . __('<strong>Elementor Card Design</strong> widgets not working because you need to activate the Elementor plugin.', ELEMENTOR_CARD_DESIGN_DOMAIN) . '</p>';
            $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $activation_url, __('Activate Elementor Now', ELEMENTOR_CARD_DESIGN_DOMAIN)) . '</p>';
        } else {
            if (!current_user_can('install_plugins')) {
                return;
            }

            $install_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=elementor'), 'install-plugin_elementor');

            $message = '<p>' . __('<strong>Elementor Card Design</strong> widgets not working because you need to install the Elemenor plugin', ELEMENTOR_CARD_DESIGN_DOMAIN) . '</p>';
            $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $install_url, __('Install Elementor Now', ELEMENTOR_CARD_DESIGN_DOMAIN)) . '</p>';
        }

        echo '<div class="error"><p>' . $message . '</p></div>';
    }

}


/**
 * Display admin notice for Elementor update if Elementor version is old
 */
if (!function_exists('elementor_card_design_update_notice')) {

    function elementor_card_design_update_notice() {
        if (!current_user_can('update_plugins')) {
            return;
        }

        $file_path = 'elementor/elementor.php';

        $upgrade_link = wp_nonce_url(self_admin_url('update.php?action=upgrade-plugin&plugin=') . $file_path, 'upgrade-plugin_' . $file_path);
        $message = '<p>' . __('<strong>Card Elements</strong> widgets not working because you are using an old version of Elementor.', CTW_DOMAIN) . '</p>';
        $message .= '<p>' . sprintf('<a href="%s" class="button-primary">%s</a>', $upgrade_link, __('Update Elementor Now', CTW_DOMAIN)) . '</p>';
        echo '<div class="error">' . $message . '</div>';
    }

}

/**
 * Action when plugin installed
 */
if (!function_exists('elementor_card_design_installed')) {

    function elementor_card_design_installed() {

        $file_path = 'elementor/elementor.php';
        $installed_plugins = get_plugins();

        return isset($installed_plugins[$file_path]);
    }

}

/**
 * Fontawesome 5 support
 */
function card_design_fontawesome_cdn() {
    ?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous"> -->
    <?php
}
add_action('wp_head', 'card_design_fontawesome_cdn');


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_elementor_card_design() {

	$plugin = new Elementor_Card_Design();
	$plugin->run();

}
run_elementor_card_design();
