/**
 * Help the iFrame blend in more
 */
jQuery(document).ready(function ($) {
	// Remove notices/messages from other plugins
	$('.notice').hide();

	// Show/Hide the iFrame
	$('#pvtlTrainingIframe').on('load', function() {
		$('#pvtlTrainingSpinner').hide();
		$(this).fadeIn();
	});
});
