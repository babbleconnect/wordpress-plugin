<?php
/*
 * Plugin Name: BabbleConnect Chat
 * Version: 1.0.0
 * Description: Add live chat to your wordpress installation. Answer visitors real-time via SMS Text Messaging on your phone. Increase sales, better support your clients, and turn anonymous visitors into engaged leads. Once installed, go to the BabbleConnect Settings page and paste in your BabbleConnect Widget (free sign-up at babbleconnect.com) 
 * Author: BabbleConnect
 * Author URI: https://babbleconnect.com/?ref=wordpress
 * Plugin URI: https://babbleconnect.com/install/wordpress?ref=wordpress#via-plugin
 */

// Prevent Direct Access
defined('ABSPATH') or die("Restricted access!");

/*
* Define
*/
define('BBLR_5daa266658535_VERSION', '1.0.0');
define('BBLR_5daa266658535_DIR', plugin_dir_path(__FILE__));
define('BBLR_5daa266658535_URL', plugin_dir_url(__FILE__));
defined('BBLR_5daa266658535_PATH') or define('BBLR_5daa266658535_PATH', untrailingslashit(plugins_url('', __FILE__)));
// define('BBLR_5daa266658535_FILENAME', pathinfo(plugin_dir_path(__FILE__), PATHINFO_BASENAME) . '/' . basename(__FILE__) );

// basename and pathinfo seem a bit dodgy when symlinks are present
$parents = array_filter(explode('/', BBLR_5daa266658535_PATH));
define('BBLR_5daa266658535_FILENAME', array_pop($parents) . '/' . basename(__FILE__));

require_once(BBLR_5daa266658535_DIR . 'includes/core.php');
require_once(BBLR_5daa266658535_DIR . 'includes/menus.php');
require_once(BBLR_5daa266658535_DIR . 'includes/admin.php');
require_once(BBLR_5daa266658535_DIR . 'includes/embed.php');
require_once(BBLR_5daa266658535_DIR . 'includes/plugin-action-links.php');

?>
