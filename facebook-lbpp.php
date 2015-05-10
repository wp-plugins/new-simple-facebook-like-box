<?php
/**
 * @package FLBPP\Main
 */

/**
 * Plugin Name: Facebook Like Box Page Plugin
 * Version: 1.0.0
 * Plugin URI: http://developers.doseo.co.il
 * Description: Plugin for the new Facebook Like Box
 * Author: Team Do Seo
 * Author URI: http://do-seo.co.il/
 * Text Domain: facebook-doseo
 * Domain Path: /languages/
 * License: GPLv2 or later
 */

/**
 * Facebook Like Box Page Plugin
 * Copyright (C) 2008-2015, Do Seo - we@do-seo.co.il
 *
 */

if ( ! function_exists( 'add_filter' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

if ( ! defined( 'FLBPP_FILE' ) ) {
	define( 'FLBPP_FILE', __FILE__ );
}

//Load the Facebook LBPP Plugin
require_once( dirname( __FILE__ ) . '/facebook-lbpp-main.php' );