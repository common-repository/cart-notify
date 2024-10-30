<?php

namespace Cart\notify;

/**
 * common function handler
 * 
 */

if ( ! function_exists( 'notify_opts' ) ) {
	function notify_opts( $option = '', $default = null ) {
	  $options = get_option( 'CartCNS' ); 
	  return ( isset( $options[$option] ) ) ? $options[$option] : $default;
	}
}