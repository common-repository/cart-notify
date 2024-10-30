<?php
// don't load directly
defined( 'ABSPATH' ) || exit;

$badge_up = '<div class="cns-csf-badge"><span class="cns-upcoming">' . __( "Upcoming", "cartnotify" ) . '</span></div>';
$badge_pro = '<div class="cns-csf-badge"><span class="cns-pro">' . __( "Pro Feature", "cartnotify" ) . '</span></div>';
$badge_up_pro = '<div class="cns-csf-badge"><span class="cns-upcoming">' . __( "Upcoming", "cartnotify" ) . '</span><span class="cns-pro">' . __( "Pro Feature", "cartnotify" ) . '</span></div>';

// General Settings
CSF::createSection( $prefix, array(
	'parent' => 'general',
	'title' => __( 'Main Setting', 'cartnotify' ),
	'fields' => [ 
		[ 
			'id' => 'cns-notify-opt',
			'type' => 'select',
			'title' => __( 'Select Notification Option', 'cartnotify' ),
			'subtitle' => __( 'Choose Notification Option', 'cartnotify' ),
			'placeholder' => __( 'Notification Option', 'cartnotify' ),
			'options' => array(
				__( 'Free', 'notify' ) => array(
					'notify' => __( 'Notification', 'cartnotify' ),
				),
				__( 'Only (Pro)', 'cartnotify' ) => array(
					'PopUp' => __( 'Pop Up', 'cartnotify' ),
				),
			),
			'default' => 'notify'
		],

		[ 
			'id' => 'cns-prestyle',
			'type' => 'image_select',
			'title' => __( 'Notificaion Design', 'cartnotify' ),
			'subtitle' => __( 'Select Notificaion design', 'cartnotify' ),
			'options' => array(
				'cns-prestyle-1' => CART_NOTIFY_ASSETS . '/img/cartnotify_layout_1.png',
			),
			'default' => 'tog-1',
			//'dependency'  => array('cns-layout', '!=', '1', '', 'visible'),
		],

		[ 
			'id' => 'cns-notify-position',
			'type' => 'select',
			'title' => __( 'Select Notification Position', 'cartnotify' ),
			'subtitle' => __( 'Choose Notification Position', 'cartnotify' ),
			'placeholder' => __( 'Notification Position', 'cartnotify' ),
			'options' => array(
				__( 'Free', 'notify' ) => array(
					'right-top' => __( 'Right Top', 'cartnotify' ),
					'right-bottom' => __( 'Right Bttom', 'cartnotify' ),
				),

			),
			'default' => 'right-bottom'
		],

		[ 
			'id' => 'cns-order-notify-all',
			'type' => 'switcher',
			'title' => __( 'Enable order notify', 'cartnotify' ),
			'subtitle' => __( 'It will enable notifications for all users when an order or product is successfully purchased.', 'cartnotify' ),

		],
	],
) );