<?php

/**
 * Add plugin action links.
 *
 * Add a link to the settings page on the plugins.php page.
 *
 * @since 1.0.0
 *
 * @param  array  $links List of existing plugin action links.
 * @return array         List of modified plugin action links.
 */
function babbleconnect_append_plugin_action_links( $links ) {

	$links = array_merge( array(
		'<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=menus.php' . '">' . __( 'Settings' ) . '</a>'
	), $links );

	return $links;

}

add_filter( 'plugin_action_links_' . BBLR_5daa266658535_FILENAME, 'babbleconnect_append_plugin_action_links' );

