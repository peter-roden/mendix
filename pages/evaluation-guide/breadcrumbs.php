<div class="breadcrumbs pt2 grid-container grid-x">
		<div class="cell breadcrumb-text">
			<?php
				global $post;
				// Uses function declared in post type
				if ( $post ) eval_guide_breadcrumbs( $post );
			?>
		</div>
</div>
