<?php
/*
Plugin Name:       WordPress Plugin Boiler
Plugin URI:        https://github.com/ChrisMKindred/wp-plugin-boiler
Description:       A WordPress Plugin Boiler.
Version:           0.0.0
Requires at least: 5.6
Requires PHP:      7.0
Author:            Chris Kindred
Author URI:        https://github.com/ChrisMKindred
License:           GPL v2 or later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:       boiler
Domain Path:       /languages
*/

use Boiler\Core;

require_once( 'vendor/autoload.php' );

register_activation_hook( __FILE__, [ Core::class, 'activate' ] );
register_deactivation_hook( __FILE__, [ Core::class, 'deactivate' ] );

add_action( 'plugins_loaded', static function () {
	boiler_core()->init( __file__ );
} );

function boiler_core() {
	return Core::instance();
}
