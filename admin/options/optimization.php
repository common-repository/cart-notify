<?php
// don't load directly
defined( 'ABSPATH' ) || exit;

$badge_up = '<div class="cns-csf-badge"><span class="cns-upcoming">' . __( "Upcoming", "cartnotify" ) . '</span></div>';
$badge_pro = '<div class="cns-csf-badge"><span class="cns-pro">' . __( "Pro Feature", "cartnotify" ) . '</span></div>';
$badge_up_pro = '<div class="cns-csf-badge"><span class="cns-upcoming">' . __( "Upcoming", "cartnotify" ) . '</span><span class="cns-pro">' . __( "Pro Feature", "cartnotify" ) . '</span></div>';

CSF::createSection( $prefix, array(
	'id' => 'optimization',
	'title' => __( 'Optimization', 'cartnotify' ),
	'icon' => 'fas fa-bolt',
	'fields' => [ 
		[ 
			'id' => 'css-min',
			'class' => 'cns-csf-disable cns-csf-pro',
			'type' => 'switcher',
			'title' => __( 'Minify CSS', 'cartnotify' ),
			'subtitle' => __( 'Enable/disable Cart Notify CSS minification' . $badge_pro, 'cartnotify' ),
			'text_on' => __( 'Enabled', 'cartnotify' ),
			'text_off' => __( 'Disabled', 'cartnotify' ),
			'text_width' => 100,
			'default' => false,
		],

		[ 
			'id' => 'js-min',
			'class' => 'cns-csf-disable cns-csf-pro',
			'type' => 'switcher',
			'title' => __( 'Minify JS', 'cartnotify' ),
			'subtitle' => __( 'Enable/disable Cart Notify JS minification' . $badge_pro, 'cartnotify' ),
			'text_on' => __( 'Enabled', 'cartnotify' ),
			'text_off' => __( 'Disabled', 'cartnotify' ),
			'text_width' => 100,
			'default' => false,
		],
	]
) );

