<?php

namespace Cart\notify\Frontend;


/**
 * Notification handler class
 */

 class Notify {


    /**
     * Initialize the class
     */
    function __construct() {
        // Higher priority
        add_action('wp_enqueue_scripts', [$this, 'cns_scripts_add']);
        
    }

    public function cns_scripts_add() {
        wp_enqueue_script('cartnotify-libs-script');
        wp_enqueue_script('cartnotify-script', array('cartnotify-libs-script'));
        wp_enqueue_style('cartnotify-libs-style');
        wp_enqueue_style('cartnotify-style');
    }
    
}

