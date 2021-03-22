<?php
$is_single_podcast = false;
if (!empty($item)) {
	$episode = get_episode_data_from_rss_item($item);
} elseif ($transistor_ep_id = (string) get_field('transistor_ep_id')) {
	$is_single_podcast = true;
	$item = find_podcast_in_rss($transistor_ep_id);
	$episode = get_episode_data_from_rss_item($item);
}
?>
<div class="grid-container">

	<article class="makeshift white grid-x align-center <?= $is_single_podcast ? 'makeshift--single' : null; ?>">

		<div class="cell medium-10 large-8">

			<?php
			echo '<p class="makeshift__id">'.$episode['episode_type'].'</p>';

			if ($title = $episode['title']) {
				if ($is_single_podcast) {
					echo '<h1 class="makeshift__title">'.$title.'</h1>';
				} else {
					echo '<a href="'.$episode['permalink'].'"class="mt0 makeshift__link">';
					echo '<h2 class="makeshift__title">'.$title.'</h2>';
					echo '</a>';
				}
			}

			if ($transistor_episode_id = $episode['transistor_episode_id']) {
				echo '<iframe class="mt2" width="100%" height="180" frameborder="no" scrolling="no" seamless src="https://share.transistor.fm/e/',
					str_replace(' ', '', $transistor_episode_id),
					'/dark"></iframe>';
			}

			// episode synopsis
			$episode_summary = $episode['episode_summary'];

			if ($is_single_podcast) { ?>

				<?php if (($synposis_title = get_field('synopsis_title')) && ($synopsis_body_text = get_field('synopsis_body_text'))) { ?>
					<div class="mt4 cell medium-10 large-6">
						<h2 class='makeshift__id'><?= $synposis_title;?></h2>
					</div>
					<div class="cell medium-10 large-6 makeshift__body_text">
						<?= $synopsis_body_text;?>
					</div>
				<?php } else { ?>
					<div class="cell medium-10 large-6 makeshift__description">
						<?= $episode_summary;?>
					</div>
				<?php } ?>

				<?php if ($transcript = get_field('transcript')) { ?>
					<div class="mt4 cell medium-10 large-6">
						<h2 class='makeshift__id'>Transcript</h2>
					</div>

					<div class="cell medium-10 large-6 makeshift__body_text">
						<?= $transcript; ?>
					</div>
				<?php } ?>

			<?php } else { ?>
				<div class="cell medium-10 large-6 makeshift__description">
						<?= $episode_summary;?>
				</div>
			<?php } ?>


			<?php
			// existing code below needs to be reviewed to see if it should display in podcast details page or only in summary page.  Note on 06/12/2020
			if ($is_single_podcast) {
				if ($show_notes = get_field('show_notes')) { ?>
					<div class="mt4 cell medium-10 large-6">
						<h2 class='makeshift__id'><?= $show_notes;?></h2>
					</div>
				<?php }
			} ?>

		</div>

	</article>

</div>