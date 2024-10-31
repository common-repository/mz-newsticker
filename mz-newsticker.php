<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              muizzit.com/porosh-bio
 * @since             1.0.0
 * @package           Mz_Newsticker
 *
 * @wordpress-plugin
 * Plugin Name:       Muizz News Ticker
 * Plugin URI:        muizzit.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Porosh Ahammed
 * Author URI:        muizzit.com/porosh-bio
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mz-newsticker
 * Domain Path:       /languages
 */

// If this file is called directly, abort it.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently pligin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'mz-newsticker_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mz-newsticker-activator.php
 */
function activate_mz_newsticker() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mz-newsticker-activator.php';
	Mz_Newsticker_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mz-newsticker-deactivator.php
 */
function deactivate_mz_newsticker() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mz-newsticker-deactivator.php';
	Mz_Newsticker_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mz_newsticker' );
register_deactivation_hook( __FILE__, 'deactivate_mz_newsticker' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mz-newsticker.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mz_newsticker() {

	$plugin = new Mz_Newsticker();
	$plugin->run();

}
run_mz_newsticker();
