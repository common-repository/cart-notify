<?php
/**
 * Plugin Name: Cart Notify
 * Description: Cart Notify will show notifications when products are added to cart.
 * Plugin URI: https://mhemelhasan.com/Cartnotify
 * Author: M Hemel Hasan
 * Author URI: https://mhemelhasan.com
 * Version: 1.1.2
 * Text Domain: cartnotify
 * License: GPL3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Tags: notifications, wooNotify, cartnotify, cartnotifys, wooNotifys, notification, notificationx, woocommerce, woocommerce-cart, woocommerce-cart notify, notify, add to cart notification, add to cart notifications, add to cart notify, prominent manager, floating cart, side cart, ajax cart, cart popup, ajax add to cart, fly cart, mini cart, quick buy, sidebar cart, sticky cart, woocommerce ajax
 * Tested up to: 6.4.3
 * Requires PHP: 7.2
 * WC tested up to: 8.6.1
 * 
 */

/** 
 * Basic Security
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Including Plugin file
 * 
 * @since 1.0
 */
include_once ( ABSPATH . 'wp-admin/includes/plugin.php' );


/** 
 * Auto Loader from PSR4
 */
require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */
final class Cart_notify {

	/**
	 * Plugin version
	 *
	 * @var string
	 */
	const version = '1.1.2';

	/**
	 * Class construcotr
	 */
	private function __construct() {
		$this->define_constants();

		register_activation_hook( __FILE__, [ $this, 'cart_notify_activate' ] );
		register_deactivation_hook( __FILE__, [ $this, 'cart_notify_deactivate' ] );
		add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );

		$this->appsero_init_tracker_cart_notify();
	}

	/**
	 * Initializes a singleton instance
	 *
	 * @return \Cart_notify
	 */
	public static function init() {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new self();
		}

		return $instance;
	}

	/**
	 * Define the required plugin constants
	 *
	 * @return void 
	 */
	public function define_constants() {
		define( 'CART_NOTIFY_VERSION', self::version );
		define( 'CART_NOTIFY_BASE_LOCATION', plugin_basename( __FILE__ ) );
		// URLs
		define( 'CART_NOTIFY_FILE', __FILE__ );
		define( 'CART_NOTIFY_URL', plugins_url( '', CART_NOTIFY_FILE ) );
		define( 'CART_NOTIFY_ASSETS', CART_NOTIFY_URL . '/assets' );
		// Paths
		define( 'CART_NOTIFY_PATH', __DIR__ );
		define( 'CART_NOTIFY_ADMIN_PATH', CART_NOTIFY_PATH . '/admin' );
		define( 'CART_NOTIFY_ASSETS_PATH', CART_NOTIFY_PATH . '/assets' );
		define( 'CART_NOTIFY_INCLUDES', CART_NOTIFY_PATH . '/includes' );
	}

	/**
	 * Initialize the plugin
	 *
	 * @return void
	 */
	public function init_plugin() {

		new Cart\notify\Necessary();

		new Cart\notify\Assets();

		require_once CART_NOTIFY_INCLUDES . '/functions.php';

		if ( is_admin() ) {
			new Cart\notify\Admin();
		} else {
			new Cart\notify\Frontend();
		}

	}

	/**
	 * Do stuff upon plugin activation
	 *
	 * @return void
	 */
	public function cart_notify_activate() {
		$installed = get_option( 'cart_notify_installed' );

		if ( ! $installed ) {
			update_option( 'cart_notify_installed', time() );
		}

		update_option( 'cart_notify_version', CART_NOTIFY_VERSION );
	}

	// Deactivation  Hooks
	public function cart_notify_deactivate() {
		$installed = get_option( 'cart_notify_installed' );
		if ( $installed ) {
			delete_option( 'cart_notify_installed' );
			delete_option( 'cart_notify_version' );
		}
	}


	/**
	 * Initialize the plugin tracker
	 *
	 * @return void
	 */
	public function appsero_init_tracker_cart_notify() {
		$client = new Appsero\Client( 'dfb06bac-cdf6-4eac-b2f4-be927ccd0aae', 'Cart Notify', __FILE__ );

		// Active insights
		$client->insights()->init();

	}
}

/**
 * Initializes the main plugin
 *
 * @return \Cart_notify
 */
function Cart_notify() {
	return Cart_notify::init();
}

// kick-off the plugin
Cart_notify();
