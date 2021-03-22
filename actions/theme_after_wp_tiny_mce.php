<?php
/**
 * 
 */ 
function theme_after_wp_tiny_mce()
{
    ?>
		<script>
			jQuery( document ).on( 'tinymce-editor-init', function( event, editor ) {
				tinymce.activeEditor.formatter.register( 'p-kicker', {
					block : 'p',
					classes : 'kicker'
				} );
			} );
		</script>
	<?php
}

add_action('after_wp_tiny_mce', 'theme_after_wp_tiny_mce');