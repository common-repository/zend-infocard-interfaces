<?php
/*
Plugin Name: Zend InfoCard Interfaces
Plugin URI: http://99bots.com/products/plugins/zend-infocard-interfaces/
Description: Make Zend InfoCard libraries available on a PHP5 Wordpress installation.
Version: 1.10.6
Author: Aaron Trank (99bots)
Author URI: http://99bots.com/
*/

function zend_infocard_interfaces_init() {
	//Check that the PHP version is at least 5
	if(! preg_match('/5\./', phpversion())) {
		add_action('admin_notices', 'zend_infocard_version_error');
	} else {
		$path = dirname(__FILE__);
	    set_include_path(get_include_path() . PATH_SEPARATOR . $path);
		define('WP_ZEND_INFOCARD_INTERFACES', true);
	    require_once 'Zend/Loader.php';
	}
}

function zend_infocard_version_error() {    
    $version = phpversion();
    echo <<<END_OF_HTML
    <div class='error'>
    <p><strong>
    Zend InfoCard Interfaces: Your PHP installation is currently running PHP $version. The Zend InfoCard Interfaces plugin requires PHP 5.1.4 or higher.
    </strong></p>
    </div>
END_OF_HTML;
}

add_action('plugins_loaded', 'zend_infocard_interfaces_init', 0);
