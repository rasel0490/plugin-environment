<?php

namespace Chowdhury\Gold;

/**
 * Installer class
 */
class Installer {

    /**
     * Run the installer
     *
     * @return void
     */
    public function run() {
        $this->add_version();
        //$this->create_vendor_role();
        $this->create_tables();
        //$this->create_pages();

    }
/**
     * Add time and version on DB
     */
    public function add_version() {
        $installed = get_option( 'sf_chowdhury_installed' );

        if ( ! $installed ) {
            update_option( 'sf_chowdhury_installed', time() );
        }

        update_option( 'sf_chowdhury_version', SF_CHOWDHURYGOLD_VERSION );
    }

    /**
     * Create necessary database tables
     *
     * @return void
     */
    public function create_tables() {
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        $gold_price_table = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}gold_price` (
            `gold_price_id` int(11) NOT NULL AUTO_INCREMENT,
            `carat_name` varchar(255) NOT NULL,
            `per_gram` int(255) NOT NULL,
            PRIMARY KEY (`gold_price_id`)
           )  $charset_collate";

        if ( ! function_exists( 'dbDelta' ) ) {
            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        }

        dbDelta( $gold_price_table );

    }
}