<?php

namespace Chowdhury\Gold;
/**
 * Assets handlers class
 */
class Assets {

    /**
     * Class constructor
     */
    function __construct() {
        add_action( 'wp_enqueue_scripts', [ $this, 'register_assets' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'register_assets' ] );

       
    }
    
    /**
     * All available scripts
     *
     * @return array
     */
    public function get_scripts() {
        return [
            'gold-script' => [
                'src'     => SF_CHOWDHURYGOLD_ASSETS . '/js/custom.js',
                'version' => filemtime( SF_CHOWDHURYGOLD_PATH . '/assets/js/custom.js' ),
                'deps'    => [ 'jquery' ]
            ]
        ];
    }

    /**
     * All available styles
     *
     * @return array
     */
    public function get_styles() {
        return [
            'gold-style' => [
                'src'     => SF_CHOWDHURYGOLD_ASSETS . '/css/style.css',
                'version' => filemtime( SF_CHOWDHURYGOLD_PATH . '/assets/css/style.css' )
            ],
            'gold-admin-style' => [
                'src'     => SF_CHOWDHURYGOLD_ASSETS . '/css/admin.css',
                'version' => filemtime( SF_CHOWDHURYGOLD_PATH . '/assets/css/admin.css' )
            ]
        ];
    }

    /**
     * Register scripts and styles
     *
     * @return void
     */
    public function register_assets() {
        $scripts = $this->get_scripts();
        $styles  = $this->get_styles();

        foreach ( $scripts as $handle => $script ) {
            $deps = isset( $script['deps'] ) ? $script['deps'] : false;

            wp_register_script( $handle, $script['src'], $deps, $script['version'], true );
        }

        foreach ( $styles as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : false;

            wp_register_style( $handle, $style['src'], $deps, $style['version'] );
        }
        
        wp_localize_script( 'gold-script-price', 'chowdhurygoldPrice', [
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'error'   => __( 'Something went wrong.', 'chowdhury-gold' ),
            'baseurl' => home_url ( 'goldprice-dashboard' ),
            
            
        ] );



    }
}