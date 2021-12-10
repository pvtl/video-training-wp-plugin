<?php
/**
 * Admin form to collect the API key
 *
 * @package pvtl/training
 */

?>
<div class="wrap">
	<?php if ( isset( $_REQUEST['settings-updated'] ) ) : ?>
		<div class="updated" style="margin: 15px 0 15px 0;">
			<p>Thanks, your API Key has been saved</p>
		</div>
	<?php endif; ?>

	<style>
		#pvtlTrainingIframe {
			min-height: 1500px;
			overflow: hidden;
			height: 100%;
			width:100%;
			display: none;
		}

		@media screen and (max-width: 1220px) {
			#pvtlTrainingIframe {
				min-height: 1800px;
			}
		}

		@media screen and (max-width: 860px) {
			#pvtlTrainingIframe {
				min-height: 2600px;
			}
		}
	</style>

	<div id="pvtlTrainingSpinner" style="width: 100%; display: block; float: left; padding: 200px 0; text-align: center;">
		<div class="spinner" style="visibility: visible; float: none; margin-top: 0"></div> Loading...
	</div>

	<iframe
		width="100%"
		height="100%"
		frameborder="0"
		id="pvtlTrainingIframe"
		allowtransparency="true"
		allowfullscreen="true"
		src="https://training.pvtl.io/training/<?php echo esc_attr( get_option( 'training_portal_slug' ) ); ?>"
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
</div>
