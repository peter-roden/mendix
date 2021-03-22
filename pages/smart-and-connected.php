<?php
/**
 * Template Name: Smart and Connected
 */

get_header(); ?>


<?php function title_heading_sub_copy($section = []) { 
	if (!empty($section['title'])) :  
		echo "<p class='heading7 body uppercase'>{$section['title']}</p>";
	endif;

	echo "<h3 class='heading3 medium-heading2 mt0'>{$section['heading']}</h3>";

	if (!empty($section['subheading'])) :
		echo "<p class='heading5'>{$section['subheading']}</p>";
	endif; 

	if (!empty($section['copy'])) :
		echo "<p class='copy lead'>{$section['copy']}</p>";
	endif; 
} ?>

<?php if (have_rows('smart_apps')): ?>
<section id='smartApps' class='section-padding'>

    <?php while (have_rows('smart_apps')): the_row(); ?>

    <div class="grid-container">

		<div class="grid-x grid-padding-x align-center">
			<div class="cell text-center medium-7">
				<?php title_heading_sub_copy(get_field('smart_apps')); ?>
			</div>
		</div>


        <?php if (have_rows('features')) : ?>
        <div class="grid-x align-justify mt3">

            <?php while (have_rows('features')) : the_row(); 
	            $title      = get_sub_field('title');
    	        $desc       = get_sub_field('description');
        	    ?>

				<div class="cell medium-3 text-center small-only-mb3">
					<?php 
					the_acf_image('icon');
					
					if (!empty($title)) : 
						echo "<p class='heading5 mt1 mb50'>$title</p>";
					endif;

					if (!empty($desc)) : 
						echo "<p class='copy small-only-ph2'>$desc</p>";
					endif;
					?>
				</div>
            <?php endwhile; ?>

        </div>
        <?php endif; ?>

	
	</div>
    <?php endwhile; ?>

</section><!-- #smartApps -->
<?php endif; ?>


<?php if (have_rows('smart_build')): ?>
<section id="smartBuild" class="section-padding bg-light">

    <?php while (have_rows('smart_build')): the_row(); ?>
    <div class="grid-container">

		<div class="grid-x grid-padding-x align-center">
			<div class="cell text-center medium-7">
				<?php title_heading_sub_copy(get_field('smart_build')); ?>
			</div>
		</div>


        <?php if (have_rows('features')) : ?>
        <div class="grid-x align-spaced mt3">

            <?php while (have_rows('features')) : the_row(); 

            //vars
            $icon       = get_sub_field('icon');
            $title      = get_sub_field('title');
            $desc       = get_sub_field('description');

            ?>

            <div class="cell medium-6 large-5 text-center small-only-mb3">
                <?php if (!empty($icon)) : ?>
                <img src="<?php echo $icon; ?>" alt="">
                <?php endif; ?>

                <?php if (!empty($title)) : ?>
                <p class="heading5 mt1 mb50"><?php echo $title; ?></p>
                <?php endif; ?>

                <?php if (!empty($desc)) : ?>
                <p class="copy small-only-ph2"><?php echo $desc; ?></p>
                <?php endif; ?>
            </div>

            <?php endwhile; ?>

        </div>
        <?php endif; ?>

    </div>
	<?php endwhile; ?>
	
</section><!-- #smartBuild -->
<?php endif; ?>



<?php if (have_rows('smart_connector')): ?>
<section id="smartConnector" class="section-padding">

    <?php while (have_rows('smart_connector')): the_row(); ?>

		<div class="grid-container">
			<div class="grid-x grid-padding-x align-center">
				<div class="cell text-center medium-7">
					<?php title_heading_sub_copy(get_field('smart_connector')); ?>
				</div>
			</div>
		</div>

		
		<?php 
		$accordion_items_repeater_id = 'features'; 
		$accordion_min_height = 510;
		include locate_template('partials/components/accordion-two-columns.php');
		?>

	<?php endwhile; ?>

</section><!-- #smartConnector -->
<?php endif; ?>


<?php if (have_rows('smart_data')): ?>
<section id="smartData" class="section-padding bg-light">

	<?php while (have_rows('smart_data')): the_row(); 
		$data = get_field('smart_data');
		?>
		<div class="grid-container">
			<div class="grid-x align-justify">
				<div class="cell medium-6 small-only-mb3">
				<?php the_acf_image($data['screenshot']); ?>
				</div>
			
				<div class="cell medium-5">
					<?php title_heading_sub_copy($data); ?>
				</div>
			</div>
		</div>
    <?php endwhile; ?>

</section><!-- #smartData -->
<?php endif; ?>


<?php get_footer(); ?>
