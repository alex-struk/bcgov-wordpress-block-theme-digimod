<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bcgov/Digimod/Theme/Block
 * @since 1.0.0
 *
 * @return void
 */

namespace Bcgov\Digimod\Theme\Block;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct access denied.' );
}

// Include the Loader and Setup classes.
require_once get_template_directory() . '/src/Loader.php';
require_once get_template_directory() . '/src/Setup.php';

if ( class_exists( 'Bcgov\\Digimod\\Theme\\Block\\Loader' ) ) {
	$base_dirs = [
		get_template_directory() . '/src',
		get_template_directory() . '/inc/core',
	];
	$loader    = new Loader( $base_dirs );
	$loader->register();
}

if ( class_exists( 'Bcgov\\Digimod\\Theme\\Block\\Setup' ) ) {
    new Setup();
}