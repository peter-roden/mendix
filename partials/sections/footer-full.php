<?php
include_once locate_template('partials/sections/bottom-cta.php');

$footer_partials = get_field('prefooter_includes');

if (is_array($footer_partials) || is_object($footer_partials)) :
	foreach( $footer_partials as $post ) include_post( $post ); ?>
<?php endif; ?>

<footer class="fat-footer white">
	<section>
		<h2 class="visually-hidden"><?= pll__('Site footer'); ?></h2>

		<?php include_once locate_template('partials/sections/footer/navigation.php');?>

		<section class="grid-container grid-x align-middle mt1">
			<?php include_once locate_template('partials/sections/footer/social.php');?>
			<?php include_once locate_template('partials/sections/footer/legal.php');?>
		</section>

		<?php include_once locate_template('partials/sections/footer/trending.php');?>

	</section>
</footer>
