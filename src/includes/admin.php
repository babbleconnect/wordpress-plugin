<?php

// Output the options page
function bblr_options_page(){
  // Get options
  $options = get_option('Bblr_settings');

  // Check to see if Bblr is enabled
  $bblr_activated = false;
  if ( esc_attr( $options['bblr_enabled'] ) == "on" ) {
		$bblr_activated = true;
		wp_cache_flush();
  }

  // Check to see if Bblr identify is checked
  $bblr_identify = false;
		if ( !empty($options['bblr_identify']) && esc_attr( $options['bblr_identify'] ) == "on" ) {
		$bblr_identify = true;
		wp_cache_flush();
	}

?>
	<div class="wrap">
		<form name="Bblr-form" action="options.php" method="post" enctype="multipart/form-data">
		  <?php settings_fields( 'Bblr_settings_group' ); ?>

			<h1 style="border-bottom: 1px solid gray;">BabbleConnect Settings</h1>
			<?php if ( ! $bblr_activated ) { ?>
				<div style="margin:10px auto; border:3px #f00 solid; background-color:#fdd; color:#000; padding:10px; text-align:center;">
				BabbleConnect is currently <strong>DISABLED</strong>.
				</div>
			<?php } ?>
			<?php do_settings_sections( 'Bblr_settings_group' ); ?>

			<table class="form-table" cellspacing="2" cellpadding="5" width="100%">
				<tr>
					<th width="30%" valign="middle">
						<label for="bblr_enabled">BabbleConnect (Live Chat) is:</label>
					</th>
					<td>
					  <?php
						  echo "<select name=\"Bblr_settings[bblr_enabled]\"  id=\"bblr_enabled\">\n";

						  echo "<option value=\"on\"";
						  if ( $bblr_activated ) { echo " selected='selected'"; }
						  echo ">Enabled</option>\n";

						  echo "<option value=\"off\"";
						  if ( ! $bblr_activated ) { echo" selected='selected'"; }
						  echo ">Disabled</option>\n";
						  echo "</select>\n";
						?>
					</td>
				</tr>
			</table>
<!--
			<label for="bblr_identify">Bblr Identify: &nbsp;</label>
			<input type="checkbox" name="Bblr_settings[bblr_identify]" <?php if($bblr_identify) { echo " checked='checked'"; } ?> />
-->
			<table class="form-table" cellspacing="2" cellpadding="5" width="100%">
				<tr>
					<th valign="top">
						<label for="Bblr_widget_code">BabbleConnect Widget:</label>
					</th>
					<td>
					  <textarea rows="3" style="width:100%;" cols="100" placeholder="<!-- Insert the BabbleConnect Widget here -->" name="Bblr_settings[bblr_widget_code]"><?php echo esc_attr( $options['bblr_widget_code'] ); ?></textarea>
						<p style="margin: 5px;">Enter your BabbleConnect Widget Here.  You can find (or create anew) your widget in the <a href="https://my.babbleconnect.com/home" target="_blank" title="Open BabbleConnect Settings">BabbleConnect Administration Tool</a>. A free BabbleConnect account is required to use this plugin.</p>

					</td>
				</tr>
			</table>
			<?php echo submit_button('Save Changes'); ?>
		</form>
	</div>

<?php
}
?>

