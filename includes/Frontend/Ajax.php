<?php

namespace Chowdhury\Gold\Frontend;

/**
 * Ajax handler class
 */
class Ajax {


    protected $error_message=[];
    protected $userdata=[];
    /**
     * Class constructor
     */
    function __construct() {
        add_action( 'wp_ajax_gold_price_insert', [ $this, 'submit_goldprice'] );
        add_action( 'wp_ajax_nopriv_gold_price_insert', [ $this, 'submit_registation'] );

        /*Request a price
        add_action( 'wp_ajax_softx_sortiment_requestprice', [ $this, 'submit_goldprice'] );
        add_action( 'wp_ajax_nopriv_softx_sortiment_reqestprice', [ $this, 'submit_reqestprice'] );
        */

       

    }
    // submit gold a price
    public function submit_goldprice() {
        global $wpdb;
        if ( ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'new-goldprice' ) ) {
            wp_send_json_error( [
                'message' => 'Nonce verification failed!'
            ] );
        }
        
    }
    
}