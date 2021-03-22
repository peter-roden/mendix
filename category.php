<?php
/**
 * The template for displaying Category Archive pages.
 */

get_header(); ?>

<section class="bg-gradient pv3 white">
    <div class="grid-container grid-x">
        <div class="cell">
            <?php 
            $theHeader = single_cat_title(null, false);
            if ($theHeader == "German") {
              $theHeader = "Mendix Blog";
            }
            echo '<h1 class="heading1">' . $theHeader . '</h1>';
          ?>
        </div>
    </div>
</section>

<section class="pt3 pb3">

    <ul id="content-container" class="grid-container grid-x grid-padding-x collapse">
		<?php while ( have_posts() ) : the_post(); 
			get_template_part( 'content', get_post_format() );
		endwhile; ?>
    </ul>

	<nav class="grid-container grid-x text-center pagination">
		<?php next_posts_link(''); ?>
	</nav>
	
</section>

<?php get_footer(); ?>
