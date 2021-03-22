<?php 
/*
* Template Name: Infographic
*/ 
get_header();
?>

<div class="grid-container grid-x align-center pt5 pb5">
		<div style="cell">
		<?php while ( have_posts() ) : the_post(); ?>
	
			<?php get_template_part( 'content', 'page' ); ?>
	
		<?php endwhile; ?>
        </div>
</div>

<?php get_footer(); ?>