<?php
/*
Plugin Name: WordPress Plugin Boiler
Plugin URI: https://github.com/ChrisMKindred/wp-plugin-boiler
Description: A WordPress Plugin Boiler.
Version: 0.0.0
Author: Chris Kindred
Author URI: https://github.com/ChrisMKindred
Text Domain: boiler
Domain Path: /languages
*/

use Boiler\Core;

require_once( 'vendor/autoload.php' );

register_activation_hook( __FILE__, [ Core::class, 'activate' ] );
register_deactivation_hook( __FILE__, [ Core::class, 'deactivate' ] );

function run_boiler() {
	return Core::init();
}

run_boiler();
