<?php

// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {


	// Set a unique slug-like ID
	$prefix = 'CartCNS';

	// CNS Create options
	CSF::createOptions( $prefix, array(
		'framework_title' => __( 'Cart Notify Settings <small>by <a style="color: #bfbfbf;text-decoration:none;" href="https://mhemelhasan.com" target="_blank">M Hemel Hasan</a></small>', 'cartnotify' ),
		'menu_title' => __( 'Cart Notify', 'cartnotify' ),
		'menu_slug' => 'cart_notify_opt',
		'menu_icon' => 'dashicons-cart',
		'menu_position' => 10,
		'footer_credit' => __( '<em>Enjoyed <strong>Cart Notify</strong>? Please leave us a <a style="color:#e9570a;" href="https://wordpress.org/support/plugin/cart-notify/reviews/?filter=5/#new-post" target="_blank">★★★★★</a> rating. We really appreciate your support!</em>', 'cartnotify' ),
		'show_bar_menu' => true,
	) );

	/*
	 * Design Parent
	 */
	CSF::createSection( $prefix, array(
		'id' => 'general', // Set a unique slug-like ID
		'title' => __( 'General', 'cartnotify' ),
		'icon' => 'fas fa-cogs',
	) );

	/*
	 * Design Parent
	 */
	CSF::createSection( $prefix, array(
		'id' => 'design', // Set a unique slug-like ID
		'title' => __( 'Design', 'cartnotify' ),
		'icon' => 'fas fa-palette',
	) );

	/*
	 * Backup
	 */
	CSF::createSection( $prefix, array(
		'title' => __( 'Import/Export', 'cartnotify' ),
		'icon' => 'fas fa-hdd',
		'fields' => array(
			array(
				'type' => 'backup',
			),
		)
	) );


	/*
	 * Including General Options
	 */
	if ( file_exists( dirname( __FILE__ ) . '/options/general.php' ) ) {
		require_once dirname( __FILE__ ) . '/options/general.php';
	}

	/*
	 * Including design Options
	 */
	if ( file_exists( dirname( __FILE__ ) . '/options/design.php' ) ) {
		require_once dirname( __FILE__ ) . '/options/design.php';
	}


	/*
	 * Including Others Options
	 */
	if ( file_exists( dirname( __FILE__ ) . '/options/others.php' ) ) {
		require_once dirname( __FILE__ ) . '/options/others.php';
	}

	/*
	 * Including Optimization Options
	 */
	if ( file_exists( dirname( __FILE__ ) . '/options/optimization.php' ) ) {
		// require_once dirname( __FILE__ ) . '/options/optimization.php';
	}

}