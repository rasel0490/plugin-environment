<?php
namespace Chowdhury\Gold\Frontend;

class GoldpriceTableShortcode {

    /**
     * Initializes the class
     */
    function __construct() {
        // Price table shortcode: [goldprice-table-shortcode]
        add_shortcode( 'goldprice-table-shortcode', [ $this, 'chowdhury_GoldpriceTableShortcode' ] );
        
    }

    /**
     * Shortcode handler class
     *
     * @param  array $atts
     * @param  string $content
     *
     * @return string
     */

    // The callback function that will replace 
    function chowdhury_GoldpriceTableShortcode( $atts, $content = '') {
        wp_enqueue_script( 'gold-script' );
        wp_enqueue_style( 'gold-style' );
       
        ob_start();
        include __DIR__ . '/views/goldprice_table.php';
        return ob_get_clean();
        } 

}


