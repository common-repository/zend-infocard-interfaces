=== Zend InfoCard Interfaces ===
Contributors: 99bots
Tags: zend, infocard, windows, cardspace, card, microsoft, php5
Tested up to: 2.9.2
Requires at least: 2.0
Stable tag: 1.10.6
Donate link: http://99bots.com/donate

The Zend InfoCard Interfaces contain everything you need to provide support for Windows Cardspaceª and other infomation card technologies in your plugins for your PHP 5 Wordpress installation.

== Description ==

This plugin embeds and loads the Zend InfoCard PHP 5 client interfaces for Windows Cardspace so that the client interfaces can be shared by different Wordpress plugins.    

This plugin fulfills the Zend InfoCard Framework dependency for other Wordpress plugins.  A significant benefit of using this plugin as your Zend InfoCard dependency instead of including the Zend InfoCard Framework directly in your individual plugins is to minimize redundancy, and to guarantee the latest version of the Zend InfoCard Framework.

The Zend InfoCard Framework is an open source, object-oriented web application framework implemented in PHP 5 and licensed under the New BSD License.

The current version uses Zend InfoCard 1.10.6

== Installation ==

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

See "Other Notes" for usage.

== Usage ==

Zend InfoCard Interfaces is automatically made available in the PHP include path.

You may check Zend InfoCard Interfaces availability using the WP_ZEND_INFOCARD_INTERFACES constant.  Here is an example of how to do that in your plugin code:

`function check_for_zend_infocard_interfaces() {
  // if the Zend InfoCard Interfaces plugin is successfully
  // loaded this constant is set to true
  if (defined('WP_ZEND_INFOCARD_INTERFACES') && 
     constant('WP_ZEND_INFOCARD_INTERFACES')) {
    return true;
  }
  // you can also check if the Zend InfoCard Interfaces are 
  // available on the system
  $paths = explode(PATH_SEPARATOR, get_include_path());
  foreach ($paths as $path) {
    if (file_exists("$path/Zend/Loader.php")) {
      define('WP_ZEND_INFOCARD_INTERFACES', true);
      return true;
    }
  }
  // nothing found, you may advice the user to install 
  // the Zend InfoCard Interfaces plugin
  define('WP_ZEND_INFOCARD_INTERFACES', false);
}

add_action('init', 'check_for_zend_infocard_interfaces');`
