<?php
namespace Boiler;

final class Core {

	const VERSION     = '0.0.0';
	const PLUGIN_NAME = 'wp-plugin-boiler';
	private static $instance;

	private function __construct() {
		define( 'BOILER_PATH', trailingslashit( plugin_dir_path( dirname( __FILE__ ) ) ) );
		define( 'BOILER_URL', plugin_dir_url( BOILER_PATH . self::PLUGIN_NAME ) );
		define( 'BOILER_VERSION', self::VERSION );
	}

	private function __clone() {
	}

	public static function instance(): self {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function init( $file ) {
		add_action( 'enqueue_block_editor_assets', [ $this, 'register_block_editor_assets' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'register_admin_scripts' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'register_public_scripts' ] );
		add_action( 'init', [ $this, 'register_blocks' ] );
	}

	/**
	 * Any code you want to run when deactivating the plugin.
	 *
	 * @return void
	 */
	public static function activate() {
		return;
	}

	/**
	 * Any code that you want to run when deactivating the plugin.
	 *
	 * @return void
	 */
	public static function deactivate() {
		return;
	}

	/**
	 * Registers the block editor assets
	 *
	 * @return void
	 */
	public function register_block_editor_assets() {
		$deps = [
			'wp-blocks',
			'wp-editor',
			'wp-i18n',
			'wp-element',
			'wp-components',
			'wp-data',
		];
		wp_enqueue_script( self::PLUGIN_NAME . '-scripts', BOILER_URL . 'dist/editor.js', $deps, true );
	}

	/**
	 * Registers the admin scripts
	 *
	 * @return void
	 */
	public function register_admin_scripts() {
		wp_enqueue_script( self::PLUGIN_NAME . '-admin', BOILER_URL . 'dist/editor.css', BOILER_VERSION, true );
		wp_enqueue_style( self::PLUGIN_NAME . '-admin', BOILER_URL . 'dist/editor.js', [], BOILER_VERSION );
	}

	/**
	 * Registers the public scripts
	 *
	 * @return void
	 */
	public function register_public_scripts() {
		wp_enqueue_script( self::PLUGIN_NAME . '-public', BOILER_URL . 'dist/index.css', BOILER_VERSION, true );
		wp_enqueue_style( self::PLUGIN_NAME . '-public', BOILER_URL . 'dist/index.js', [], BOILER_VERSION );
	}

	/**
	 * Register the
	 *
	 * @return void
	 */
	public function register_blocks() {
		register_block_type(
			self::PLUGIN_NAME . '/block',
			[
				'style'          => self::PLUGIN_NAME . '-public',
				'editor_style'   => self::PLUGIN_NAME . '-editor',
				'editor_scripts' => self::PLUGIN_NAME . '-scripts',
			]
		);
	}
}
