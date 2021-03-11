<?php

namespace Chowdhury\Gold;

/**
 * The admin class
 */
class Admin {

    /**
     * Initialize the class
     */
    function __construct() {
        new Admin\Menu();
        new Admin\GoldpriceDashboardShortcode();
        
    }



}