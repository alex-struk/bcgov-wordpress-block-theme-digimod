<?php

namespace Bcgov\Digimod\Theme\Block;

/**
 * Initialization and setup of theme utilising an auto-loader.
 *
 * @since 1.0.0
 *
 * @package Bcgov/Digimod/Theme/Block
 */
class Setup {
    /**
     * Constructor.
     */
    public function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'digimod_block_theme_enqueue_scripts' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'bcgov_block_theme_enqueue_admin_scripts' ] );
	}

	/**
	 * Enqueue scripts and styles for public website.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function digimod_block_theme_enqueue_scripts(): void {
		$public_assets  = require_once get_stylesheet_directory() . '/dist/public.asset.php';
		$public_version = $public_assets['version'] ?? wp_get_theme()->get( 'Version' );

		wp_enqueue_script(
			'bcgov-digimod-block-theme-public',
			get_stylesheet_directory_uri() . '/dist/public.js',
			$public_assets['dependencies'] ?? [],
			$public_version,
			true
		);

		wp_enqueue_style(
			'bcgov-digimod-block-theme-public',
			get_stylesheet_directory_uri() . '/dist/public.css',
			[],
			$public_version
		);
	}

	/**
	 * Enqueue scripts and styles for admin.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function bcgov_block_theme_enqueue_admin_scripts(): void {
		$admin_assets_path = get_stylesheet_directory() . '/dist/admin.asset.php';
		$admin_assets      = require_once $admin_assets_path;
		$admin_version     = $admin_assets['version'] ?? wp_get_theme()->get( 'Version' );

		wp_enqueue_script(
			'bcgov-digimod-block-theme-admin',
			get_stylesheet_directory_uri() . '/dist/admin.js',
			$admin_assets['dependencies'] ?? [],
			$admin_version,
			true
		);

		wp_enqueue_style(
			'bcgov-digimod-block-theme-admin',
			get_stylesheet_directory_uri() . '/dist/admin.css',
			[],
			$admin_version
		);
		
	}
}