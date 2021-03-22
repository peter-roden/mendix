<?php queue_non_critical_css(get_template_directory_uri().'/ui/css/partials/carousel--split.min.css'); ?>
<?php wp_enqueue_script('carousel--split', get_template_directory_uri().'/ui/js/carousel--split.min.js', null, null, true); ?>

<section id="carousel--split" class="bottom-dots case-study cover relative white lazy">

    <ul id="carousel--split-backgrounds">
		<?php 
		//loop through all the backgrounds and place them in an absolute 
		//positioned layered behind all the separated text content
		for ($i = 0; $i < count($backgrounds); $i++): 
			$image = $backgrounds[$i];
			$row_index = $i;
			$active = $row_index === 0 ? 'active' : '';
			echo "<li class='carousel--split-bg carousel--split-bg-$row_index $active' data-bg='$image'></li>";
		endfor;
		?>
     </ul>

    <div class="carousel--split-overlay"></div>

	<h2 class="heading3 large-heading2 visually-hidden"><?= pll__('Featured Posts'); ?></h2>

	<div class="grid-container grid-x h100 align-right">

		<div class="cell medium-7 large-5 relative h100">
			<ul id="carousel--split-text" class="h100 grid-container grid-x align-middle">
				<?php for ($i = 0; $i < count($content); $i++): ?>
				<li class="cell pt5 center-vertically">
					<?= $content[$i]; ?>
				</li>
				<?php endfor; ?>
			</ul>
		</div>

	</div>

</section>
