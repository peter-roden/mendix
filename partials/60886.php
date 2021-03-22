<?php
/**
 * Partial CTA Digital Execution Manual
 */
?>
<aside class="pt3 bg-ebook-dem cover white">
	
	<div class="grid-container grid-padding-x grid-x align-middle align-right relative">

		<figure class="absolute bottom right large-mr5" style="max-width: 400px;">
			<?php the_acf_image(52319); //ebook stack ?>
		</figure>

		<div class="cell pb5 medium-pb3 large-10 relative">
			<?php 
			$body = null;
			$heading = null;
			if (get_current_language() == LANGUAGE_CODE_ENGLISH) {
				$heading = 'From buzzword to reality';
			} elseif (get_current_language() == LANGUAGE_CODE_GERMAN) {
				$heading = 'Machen Sie die IT zum Katalysator für Veränderung.';
				$body = 'Transformieren Sie Ihr gesamtes Unternehmen und machen Sie die IT zum Motor für Wachstum und Profitabilität. Entwickeln Sie skalierbare Anwendungen und nutzen Sie smarte Technologien. Und machen Sie es selbst.'; 
			}
			?>
		
			<h2 class="heading3 medium-heading2 mb1"><?php echo $heading; ?></h2>
		
			<?php if ($body) { echo '<p>',$body,'</p>'; } ?>
			
			<a class="btn-primary " href="/resources/digital-execution-manual/">
				<?= pll__('Download'); ?> 
				</a>
			
		</div>

		
	</div>

</aside>
