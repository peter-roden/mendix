<?php
/**
* Single: MX Live
*/

get_header(); ?>

<?php
if ( $description = get_field('description') ) : endif;
if ( $hosts = get_field('hosts') ) : endif;
?>

<main role="main">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php include( locate_template ('pages/mx-live/player.php') ); ?>
		<?php include( locate_template ('pages/mx-live/social-links.php') ); ?>

		<div class="grid-container broadcast-information mt3 white">
			<div class="grid-x">
				<?php if ( $description ) : ?>
					<div class="description small-12 medium-8">
						<h2 class="heading3">Description</h2>
						<?php echo $description; ?>
					</div>
				<?php endif; ?>

				<?php if ( $hosts ) : ?>

					<div class="hosts small-12 medium-3 medium-offset-1">
						<h2 class="heading3">Hosts</h2>
						<ul class="host-list">

							<?php foreach( $hosts as $host ) : ?>

								<li>
									<div class="user-meta mt1 align-middle">
										<img class="avatar float-left mr1" src="<?php echo esc_attr( get_avatar_url( $host->ID ) ); ?>" alt="author-avatar" />
										<div class="author-info">
											<div class="name"><?php echo $host->display_name; ?></div>
											<?php if ( get_field( 'company_title__role', 'user_' . $host->ID ) ) : ?>
												<div class="company-title"><?php the_field('company_title__role', 'user_' . $host->ID ); ?></div>
											<?php endif; ?>
										</div>
									</div>
								</li>

							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
		</div>

	</article>

</main>

<?php get_footer(); ?>
