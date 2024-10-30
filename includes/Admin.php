<?php

namespace Cart\notify;

/**
 * The admin class
 */
class Admin {

	/**
	 * Initialize the class
	 */
	function __construct() {
		new Admin\CartnotiSetpage();

		// Define Plugin Action Links.
		add_filter( 'plugin_action_links_' . CART_NOTIFY_BASE_LOCATION, [ $this, 'cart_notify_plugin_action_links' ] );
	}

	/**
	 * Add plugin action links.
	 *
	 */
	public function cart_notify_plugin_action_links( $links ) {

		$settings_link = array(
			'<a href="admin.php?page=cart_notify_opt#tab=general">' . esc_html__( 'Settings', 'cartnotify' ) . '</a>',
		);
		return array_merge( $settings_link, $links );
	}

}