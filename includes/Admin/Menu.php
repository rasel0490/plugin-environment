<?php

namespace Chowdhury\Gold\Admin;

/**
 * The Menu handler class
 */
class Menu {

    /**
     * Initialize the class
     */
    function __construct() {
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
    }

    /**
     * Register admin menu
     *
     * @return void
     */
    public function admin_menu() {
        add_menu_page( __( 'Chowdhury Gold', 'chowdhury-gold' ), __( 'Gold Price', 'chowdhury-gold' ), 'manage_options', 'chowdhury-gold', [ $this, 'plugin_page' ], 'dashicons-money-alt' );
    }

    /**
     * Render the plugin page
     *
     * @return void
     */
    public function plugin_page() {

        wp_enqueue_style( 'gold-admin-style' );
        echo '<div class="wrap">';
        require_once SF_CHOWDHURYGOLD_PLUGIN_DIR . 'includes/Admin/views/goldprice_dashboard.php';
        echo '</div>';
        }
}