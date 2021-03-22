<?php
/**
 * The template used to display Tag Archive pages
 */

get_header(); ?>


<section class="bg-gradient section-padding white">
    <div class="grid-container grid-x">
        <div class="cell">
            <?php $tagHeader = single_tag_title("",false); ?>

            <?php if ($tagHeader == "Developers") { $tagHeader = 'Developer Blog'; } ?>
			<h1 class="heading2 large-heading1" style="text-transform: capitalize;"><?= $tagHeader; ?></h1>
        </div>
    </div>
</section>


<section class="pt3 pb3">
    <ul id="content-container" class="grid-container grid-x grid-padding-x collapse">
	<?php while ( have_posts() ) : the_post();

		if (get_field('page_language') != LANGUAGE_CODE_ENGLISH) { 
			continue;
		}
		
		get_template_part( 'content', get_post_format() );
		
    endwhile; ?>
    </ul>

    <nav class="pagination">
		<?php next_posts_link(''); ?>
	</nav>
</section>


<?php get_footer(); ?>
