<?php

namespace Chowdhury\Gold;

/**
 * Frontend handler class
 */
class Frontend {

       /**
     * Initialize the class
     */
    function __construct() {
        new Frontend\GoldpriceTableShortcode();
    }
}