<?php

namespace Cart\notify;

/**
 * Assets handlers class
 */
class Assets {

	/**
	 * Class constructor
	 */
	function __construct() {

		add_action( 'admin_enqueue_scripts', [ $this, 'register_assets' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'register_assets' ] );

		// Js localization
		add_action( 'admin_enqueue_scripts', [ $this, 'cart_notify_localize_script' ] );

		// Js Variable
		add_action( 'wp_enqueue_scripts', [ $this, 'cartnotify_script_custom_js' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'cns_custom_enqueue_scripts' ] );
	}

	/**
	 * All available scripts
	 *
	 * @return array
	 */
	public function get_scripts() {
		return [ 
			'cartnotify-script' => [ 
				'src' => CART_NOTIFY_ASSETS . '/js/frontend.js',
				'version' => filemtime( CART_NOTIFY_PATH . '/assets/js/frontend.js' ),
				'deps' => [ 'jquery' ]
			],

			'cartnotify-libs-script' => [ 
				'src' => CART_NOTIFY_ASSETS . '/libs/notiny.js',
				'version' => filemtime( CART_NOTIFY_PATH . '/assets/libs/notiny.js' ),
				'deps' => [ 'jquery' ]
			],

			'cartnotify-admin-script' => [ 
				'src' => CART_NOTIFY_ASSETS . '/js/CartNAdmin.js',
				'version' => filemtime( CART_NOTIFY_PATH . '/assets/js/CartNAdmin.js' ),
				'deps' => [ 'jquery' ]
			]
		];
	}

	/**
	 * All available styles
	 *
	 * @return array
	 */
	public function get_styles() {
		return [ 
			'cartnotify-libs-style' => [ 
				'src' => CART_NOTIFY_ASSETS . '/libs/notiny.css',
				'version' => filemtime( CART_NOTIFY_PATH . '/assets/libs/notiny.css' )
			],

			'cartnotify-style' => [ 
				'src' => CART_NOTIFY_ASSETS . '/css/frontend.css',
				'version' => filemtime( CART_NOTIFY_PATH . '/assets/css/frontend.css' )
			],

			'cartnotifyadmin-style' => [ 
				'src' => CART_NOTIFY_ASSETS . '/css/cartnotifyadmin.css',
				'version' => filemtime( CART_NOTIFY_PATH . '/assets/css/cartnotifyadmin.css' )
			]

		];
	}

	/**
	 * Register scripts and styles
	 *
	 * @return void
	 */
	public function register_assets() {
		$scripts = $this->get_scripts();
		$styles = $this->get_styles();

		foreach ( $scripts as $handle => $script ) {
			$deps = isset ( $script['deps'] ) ? $script['deps'] : false;

			wp_register_script( $handle, $script['src'], $deps, $script['version'], true );
		}

		foreach ( $styles as $handle => $style ) {
			$deps = isset ( $style['deps'] ) ? $style['deps'] : false;

			wp_register_style( $handle, $style['src'], $deps, $style['version'] );
		}

	}


	/**
	 * Js script localization
	 *
	 * @return array
	 */
	public function cart_notify_localize_script() {

		wp_enqueue_script( 'cartnotify-admin-script' );

		wp_localize_script( 'cartnotify-admin-script', 'CNS_admin', [ 
			'cns_admin_ajax' => admin_url( 'admin-ajax.php' ),
			'cns_ajax_nonce' => wp_create_nonce( 'updates' ),
		] );
	}

	/**
	 * Extra script var
	 *
	 * @return array
	 */
	public function cns_custom_enqueue_scripts() {
		// Enqueue the script
		$cns_notify_position = ! empty ( notify_opts( 'cns-notify-position' ) ) ? notify_opts( 'cns-notify-position' ) : '';

		wp_localize_script( 'cartnotify-script', 'CNS_params',
			[ 
				'cns_ajax_nonce' => wp_create_nonce( 'ins_ajax_nonce' ),
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'cns_raw_ajax_url' => WC()->ajax_url(),
				'wc_ajax_url' => \WC_AJAX::get_endpoint( '%%endpoint%%' ),
				'notifyposition' => $cns_notify_position,
			]
		);
	}

	/**
	 * Register scripts Extra
	 *
	 * @return void
	 */
	public function cartnotify_script_custom_js() {
		// icons All
		include_once ( CART_NOTIFY_ASSETS_PATH . '/icons/closing.php' );

		// Backend options as variables 
		$cns_notify_opt = ! empty ( notify_opts( 'cns-notify-opt' ) ) ? notify_opts( 'cns-notify-opt' ) : '';
		$cns_notify_position = ! empty ( notify_opts( 'cns-notify-position' ) ) ? notify_opts( 'cns-notify-position' ) : '';

		// add all options
		$output = '';

		$output .= " var clsoing_icon = '$notify_close'; ";
		$output .= " var notifyopt = '$cns_notify_opt'; ";
		$output .= " var notifyposition = '$cns_notify_position'; ";


		wp_add_inline_script( 'cartnotify-script', $output );
	}

}
