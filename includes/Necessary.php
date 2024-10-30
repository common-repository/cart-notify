<?php


namespace Cart\notify;

/**
 * Necessary Plugin handler class
 */
class Necessary {

	/**
	 * Initialize the class
	 */
	function __construct() {
		$this->WooComCheck();
	}

	public function WooComCheck() {
		/**
		 * Check if WooCommerce is active, and if it isn't, disable the plugin.
		 *
		 * @since 1.0
		 */
		if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
			add_action( 'admin_notices', [ $this, 'cartnotify_Is_Woo' ] );

			/**
			 * Ajax install & activate WooCommerce
			 *
			 * @since 1.0
			 * @link https://developer.wordpress.org/reference/functions/wp_ajax_install_plugin/
			 */
			add_action( "wp_ajax_cartnotify_ajax_install_plugin", "wp_ajax_install_plugin" );

			return;
		}
	}

	/**
	 * Called when WooCommerce is inactive to display an inactive notice.
	 *
	 * @since 1.0
	 */
	public function cartnotify_Is_Woo() {
		if ( current_user_can( 'activate_plugins' ) ) {
			if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) && ! file_exists( WP_PLUGIN_DIR . '/woocommerce/woocommerce.php' ) ) {
				?>
				<div id="message" class="error">
					<p>
						<?php printf( __( 'Cart Notify requires %1$s WooCommerce %2$s to be activated in order to function properly.', 'cartnotify' ), '<strong><a href="https://wordpress.org/plugins/woocommerce/" target="_blank">', '</a></strong>' ); ?>
					</p>
					<p>
						<a class="cartnotify-install-woocommerce button" data-plugin-slug="woocommerce">
							<?php esc_attr_e( 'Install Now', 'cartnotify' ); ?>
						</a>
					</p>
				</div>

				<?php
			} elseif ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) && file_exists( WP_PLUGIN_DIR . '/woocommerce/woocommerce.php' ) ) {
				?>

				<div id="message" class="error">
					<p>
						<?php printf( __( 'Cart Notify requires %1$s WooCommerce %2$s to be activated.', 'cartnotify' ), '<strong><a href="https://wordpress.org/plugins/woocommerce/" target="_blank">', '</a></strong>' ); ?>
					</p>
					<p><a href="<?php echo get_admin_url(); ?>plugins.php?_wpnonce=<?php echo wp_create_nonce( 'activate-plugin_woocommerce/woocommerce.php' ); ?>&action=activate&plugin=woocommerce/woocommerce.php"
							class="button activate-now button-primary">
							<?php esc_attr_e( 'Activate', 'cartnotify' ); ?>
						</a></p>
				</div>

				<?php
			} elseif ( version_compare( get_option( 'woocommerce_db_version' ), '5.0', '<' ) ) {
				?>

				<div id="message" class="error">
					<p>
						<?php printf( __( '%sCart Notify is inactive.%s This plugin requires WooCommerce 5.0 or newer. Please %supdate WooCommerce to version 5.0 or newer%s', 'cartnotify' ), '<strong>', '</strong>', '<a href="' . admin_url( 'plugins.php' ) . '">', '&nbsp;&raquo;</a>' ); ?>
					</p>
				</div>

				<?php
			}
		}
	}


}
