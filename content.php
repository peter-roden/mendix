<?php
/**
 * The default template for displaying content
 */
?>

<li id="post-<?php the_ID() ?>" <?php post_class( 'cell medium-6 large-4' ) ?>>

	<?php
	$permalink = get_the_permalink();
	$post_thumbnail = get_the_post_thumbnail();
	echo "<a class='post__preview-image cover' href='$permalink' tabindex='-1'>$post_thumbnail</a>";
	?>

	<div class='post__text'>
		<h3 class='entry-title heading5 mt1 mb50'>
			<a href="<?php the_permalink() ?>" rel="bookmark">
				<?php echo get_field('shortened_title') ?: wp_trim_words(get_the_title(), 16) ?>
			</a>
		</h3>
		
		<div class="entry-summary">
			<?php the_excerpt() ?>
		</div>
	</div>

</li>