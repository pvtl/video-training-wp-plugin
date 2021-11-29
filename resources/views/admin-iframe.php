<?php
/**
 * Admin form to collect the API key
 *
 * @package pvtl/training
 */

?>
<?php if ( isset( $_REQUEST['settings-updated'] ) ) : ?>
	<div class="updated" style="margin: 0 0 15px 0;">
		<p>Thanks, your API Key has been saved</p>
	</div>
<?php endif; ?>

<iframe
	width="100%"
	height="100%"
	frameborder="0"
	id="pvtlTrainingIframe"
	allowtransparency="true"
	style="overflow: hidden; min-height: calc(100vh - 32px - 65px); height: 100%; width:100%"
	src="http://video-training.pub.localhost/training/<?php echo esc_attr( get_option( 'training_portal_slug' ) ); ?>"
></iframe>

<form action="options.php" method="post">
	<?php
		settings_fields( 'pvtl-training' );
		do_settings_sections( 'pvtl-training' );
	?>

	<input type="hidden" name="training_portal_slug" value="" />

	<div style="float: right; margin-right: 20px;">
		<?php submit_button( 'Reset API Key', 'small' ); ?>
	</div>
</form>
