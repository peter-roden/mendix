<?php
/**
 * The template for displaying Author Archive pages.
 */

get_header(); ?>


<header class="hero--bleed pb0">

    <div class="grid-container grid-x">
		<h1 class="heading2"><?php echo pll__('Posts by'), ' ', get_the_author(); ?></h1>
    </div>

	<?php if ( get_the_author_meta( 'description' ) ) : ?>
		
        <div class="mt1 grid-container grid-x grid-padding-x align-middle grid-padding-y">
			
			<h2 class="sr-only"><?php echo pll__('About'), ' ', get_the_author(); ?></h2>
			<figure id="avatar" class="cell medium-3 large-2">
				<?= get_avatar( get_the_author_meta( 'ID' ) ); ?>
			</figure>
			
			<div class="cell copy auto">
				<p><?php the_author_meta( 'description' ); ?></p>
			</div>
			
		</div>

   <?php endif; ?>

</header>

<section>

	<h2 class="sr-only">
		<?php echo pll__('Posts by'), ' ', get_the_author(); ?>
	</h2>

	<?php
	$posts_by_author = new WP_Query([
		'category__and' => [ get_category_id_by_slug('blog') ],
		'order' => 'DESC',
		'author_name' => get_the_author_meta('user_nicename'),
		'post_type' => 'post',
		'posts_per_page' => -1,
	]);

	if ($posts_by_author->have_posts()): ?>
		<ul class="grid-container grid-x grid-padding-x collapse mt3" id="content-container">
		
			<?php while ($posts_by_author->have_posts()): $posts_by_author->the_post();			
				get_template_part( 'content', get_post_format() );
			endwhile; ?>

		</ul>
	<?php endif; ?> 
	<?php wp_reset_postdata(); ?>
	
</section> 


<?php get_footer(); ?>
