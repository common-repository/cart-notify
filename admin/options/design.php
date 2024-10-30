<?php
// don't load directly
defined( 'ABSPATH' ) || exit;


CSF::createSection( $prefix, array(
	'parent' => 'design',
	'title' => __( 'Design', 'cartnotify' ),
	'icon' => 'fas fa-bolt',
	'fields' => [ 
		
		[
			'id' => 'js-min',
			'class' => 'ins-csf-disable ins-csf-pro',
			'type' => 'switcher',
			'title' => __( 'Minify JS', 'cartnotify' ),
			'subtitle' => __( 'Enable/disable Cart Notify JS minification', 'cartnotify' ),
			'text_on' => __( 'Enabled', 'cartnotify' ),
			'text_off' => __( 'Disabled', 'cartnotify' ),
			'text_width' => 100,
			'default' => false,
		],
	]
));