<?php

// Add the Bblr Javascript
add_action('wp_head', 'add_bblr');

// If we can indentify the current user output
function get_bblr_identify()
{
  $current_user = wp_get_current_user();
  //print_r($current_user->roles[0]);
  //print_r(sanitize_text_field($current_user->roles[0]));

  if ($current_user->user_email) {
    $sanitized_email = sanitize_email($current_user->user_email);
    echo "<!-- Start Identify call for Bblr -->\n";
    echo "<script>\n";
    echo "bblr.identify(\"".md5($sanitized_email)."\", { email: \"".$sanitized_email."\", name: \"".sanitize_text_field($current_user->user_login)."\", userRole: \"".sanitize_text_field($current_user->roles[0])."\" });\n";
    echo "</script>\n";
    echo "<!-- End Identify call for Bblr -->\n";
  } else {
    // See if current user is a commenter
    $commenter = wp_get_current_commenter();
    if ($commenter['comment_author_email']) {
      echo "<!-- Start Identify call for Bblr -->\n";
      echo "<script>\n";
      echo "bblr.identify(\"".md5(sanitize_email($commenter['comment_author_email']))."\", { email: \"".sanitize_email($commenter['comment_author_email'])."\", name: \"".sanitize_text_field($commenter['comment_author'])."\" });\n";
      echo "</script>\n";
      echo "<!-- End Identify call for Bblr -->\n";
    }
  }
}

// The guts of the Bblr script
function add_bblr()
{
  // Ignore admin, feed, robots or trackbacks
  if ( is_feed() || is_robots() || is_trackback() )
  {
    return;
  }

  $options = get_option('Bblr_settings');

  // If options is empty then exit
  if( empty( $options ) )
  {
    return;
  }

  // Check to see if Bblr is enabled
  if ( esc_attr( $options['bblr_enabled'] ) == "on" )
  {
    $bblr_tag = $options['bblr_widget_code'];

    // Insert tracker code
    if ( '' != $bblr_tag )
    {
      echo "<!-- Start Bblr By WP-Plugin: BabbleConnect-->\n";
      echo $bblr_tag;
      echo"<!-- end: Bblr Code. -->\n";

      // Optional
      if ( ! empty ( $options['bblr_identify'] ) && esc_attr( $options['bblr_identify'] ) == "on" ){
        get_bblr_identify();
      }
    }
  }
}
?>