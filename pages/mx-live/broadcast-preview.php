<a class="cell small-6 medium-3 post-link" href=" <?php the_permalink(); ?> ">

	<div class="broadcast-preview mt2">

		<div class="broadcast-featured-image">

			<div class="color-overlay"></div>

			<?php the_post_thumbnail('full'); ?>
		</div>

		<div class="broadcast-meta mt1">
			<?php $cats = get_the_terms( $post, 'mx-live-category' );
			foreach( $cats as $term ) {
				echo '<div class="bold">' . $term->name . ':' . '</div>';
			} ?>

			<div class="title"><?php the_title(); ?></div>

			<div class="air-time monospace">
				<?php the_field('air_date'); echo ' EST'; ?>
			</div>
		</div>
	</div>

</a>
