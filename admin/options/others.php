<?php
// don't load directly
defined( 'ABSPATH' ) || exit;

$badge_up = '<div class="ins-csf-badge"><span class="ins-upcoming">' . __( "Upcoming", "cartnotify" ) . '</span></div>';
$badge_pro = '<div class="ins-csf-badge"><span class="ins-pro">' . __( "Pro Feature", "cartnotify" ) . '</span></div>';
$badge_up_pro = '<div class="ins-csf-badge"><span class="ins-upcoming">' . __( "Upcoming", "cartnotify" ) . '</span><span class="ins-pro">' . __( "Pro Feature", "cartnotify" ) . '</span></div>';

CSF::createSection( $prefix, array(
	'parent' => 'design', // The slug id of the parent section
	'title' => __( 'Others', 'cartnotify' ),
	'fields' => array(

		array(
			'type' => 'subheading',
			'content' => __( 'Others', 'cartnotify' ),
		),

		array(
			'id' => 'wi-custom-css',
			'type' => 'code_editor',
			'title' => 'Custom CSS',
			'subtitle' => __( 'If you want to make extra CSS then you can do it from here', 'cartnotify' ),
			'settings' => array(
				'theme' => 'monokai',
				'mode' => 'css',
			),
		),

	)
) );
