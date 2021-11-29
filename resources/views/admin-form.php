<?php
/**
 * Admin form to collect the API key
 *
 * @package pvtl/training
 */

?>
<h1>Wordpress Training</h1>
<p>Please enter the API Key supplied by Pivotal Agency, in order to access your tailor-made Wordpress training.</p>

<form action="options.php" method="post">
	<?php
		settings_fields( 'pvtl-training' );
		do_settings_sections( 'pvtl-training' );
	?>

	<label for="training_portal_slug">API Key:</label>
	<input
		type="text"
		name="training_portal_slug"
		id="training_portal_slug"
		value="<?php echo esc_attr( get_option( 'training_portal_slug' ) ); ?>"
	/>

	<?php submit_button(); ?>
</form>
