<?php


namespace Cart\notify\Admin;

// Setting Page Contnet handler class
class CartnotiSetpage {
	/**
	 * Initialize the class
	 */
	function __construct() {
		$this->PluginOption();

	}

	public function PluginOption() {
		// Option Framework
		if ( file_exists( CART_NOTIFY_ADMIN_PATH . '/framework/framework.php' ) ) {
			require_once ( CART_NOTIFY_ADMIN_PATH . '/framework/framework.php' );
		}

		// Options
		if ( file_exists( WP_PLUGIN_DIR . '/cart-notify-pro/admin/config.php' ) ) {
			require_once ( WP_PLUGIN_DIR . '/cart-notify-pro/admin/config.php' );
		} elseif ( file_exists( CART_NOTIFY_ADMIN_PATH . '/config.php' ) ) {
			require_once ( CART_NOTIFY_ADMIN_PATH . '/config.php' );
		}
	}

}

