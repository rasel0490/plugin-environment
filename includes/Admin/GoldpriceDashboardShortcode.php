<?php
namespace Chowdhury\Gold\Admin;

/**
 * Shortcode handler class
 */
class GoldpriceDashboardShortcode {

    /**
     * Initializes the class
     */
    function __construct() {
        add_shortcode( 'chowdhury-gold', [ $this, 'render_shortcode' ] );
        
    }

    /**
     * Shortcode handler class
     *
     * @param  array $atts
     * @param  string $content
     *
     * @return string
     */
    public function render_shortcode( $atts, $content = '' ) {
        wp_enqueue_script( 'gold-script' );
        //wp_enqueue_style( 'gold-style' );
        wp_enqueue_style( 'gold-admin-style' );

        return '<div class="academy-shortcode">Hello from Shortcode</div>';
    }


}