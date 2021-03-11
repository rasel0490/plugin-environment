<?php
/**
 * Plugin Name: Chowdhury Gold
 * Description: A custom gold price plugin.
 * Plugin URI: softxltd.com/chowdhury-gold
 * Author: Softx LTD
 * Author URI: softxltd.com
 * Version: 1.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */
final class Chowdhury_Gold {

    /**
     * Plugin version
     *
     * @var string
     */
    const version = '1.0';

    /**
     * Class construcotr
     */
    private function __construct() {
        $this->define_constants();

        register_activation_hook( __FILE__, [ $this, 'activate' ] );
        //register_deactivation_hook( __FILE__, [ $this, 'deactivate' ] );
        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
        
    }



    /**
     * Initializes a singleton instance
     *
     * @return \Chowdhury_Gold
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_constants() {
        define( 'SF_CHOWDHURYGOLD_VERSION', self::version );
        define( 'SF_CHOWDHURYGOLD_FILE', __FILE__ );
        define( 'SF_CHOWDHURYGOLD_PATH', __DIR__ );
        define( 'SF_CHOWDHURYGOLD_PLUGIN_DIR', plugin_dir_path(__FILE__));
        define( 'SF_CHOWDHURYGOLD_URL', plugins_url( '', SF_CHOWDHURYGOLD_FILE ) );
        define( 'SF_CHOWDHURYGOLD_ASSETS', SF_CHOWDHURYGOLD_URL . '/assets' );
        define( 'SF_CHOWDHURYGOLD_INCLUDES', SF_CHOWDHURYGOLD_URL . '/includes' );
        
    }
    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function init_plugin() { 

        new Chowdhury\Gold\Assets();
        
        if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
            new Chowdhury\Gold\Ajax();
            
        }

        
        if ( is_admin() ) {
            new Chowdhury\Gold\Admin();
        } else {
             new Chowdhury\Gold\Frontend();
            
            
        }

    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function activate() {
        $installer = new Chowdhury\Gold\Installer();
        $installer->run();
    }
    /**
     * Do stuff upon plugin deactivation
     *
     * @return void
     */
    
    public function deactivate() {
        //$deactivator_plugin = new Softx\Sortiment\Plugin_Deactivator();
        //$deactivator_plugin->uninstall();
        
    }

   
     

}

    /**
     * Initializes the main plugin
     *
     * @return \Chowdhury_Gold
     */
    function chowdhury_gold() {
        return Chowdhury_Gold::init();
    }

    // kick-off the plugin
    chowdhury_gold();