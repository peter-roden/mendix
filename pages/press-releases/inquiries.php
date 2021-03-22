<?php
$press_release_page_id = [
	LANGUAGE_CODE_ENGLISH => 30062,
	LANGUAGE_CODE_GERMAN => 50605,
][get_current_language()];
?>

<?php while (have_rows('press_inquiries_group', $press_release_page_id)) : the_row(); ?>

	<section class='pressCard mb1'>
		<?php if ($heading = get_sub_field('heading')) : ?>
		<h2 class="heading6 uppercase"><?=$heading;?></h2>
		<?php endif; ?>


		<?php if ($name = get_sub_field('name')) : ?>
		<p class="heading4 mt50"><?=$name;?></p>
		<?php endif; ?>


		<?php if ($title = get_sub_field('title')) : ?>
		<p class="normal5 mt50"><?=$title;?></p>
		<?php endif; ?>


		<ul class='mt50'>

			<?php if ($telephone = get_sub_field('telephone')) : ?>
			<li class='mb50 normal6'>
				<a href="tel:<?=str_replace(' ', '', $telephone);?>"><?=$telephone;?></a>
			</li>
			<?php endif; ?>

			<?php if ($email = get_sub_field('email')) : ?>
			<li class='mb50 normal6'>
				<a href="mailto:<?$email;?>"><?=$email;?></a>
			</li>
			<?php endif; ?>

		</ul>

		<?php if ($additional = get_sub_field('additional')) : ?>
		<p class="normal6"><?=$additional;?></p>
		<?php endif; ?>

	</section>

<?php endwhile; ?>
