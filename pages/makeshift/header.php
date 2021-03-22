<?php enqueue_cache_busted_style('page-podcasts', '/ui/css/pages/podcasts.min.css'); ?>
<?php enqueue_cache_busted_script('page-podcasts', '/ui/css/pages/podcasts.min.js'); ?>


<?php
/**
 *
 */
function find_podcast_post_by_episode_id(string $id)  {
	$podcast_posts_query = [
		'category__and' => [ get_category_id_by_slug('podcast') ],
		'post_status' =>  ['private', 'publish'],
		'post_type' => 'post',
		'posts_per_page' => 1,
		'meta_key' => 'transistor_ep_id',
		'meta_value' => $id
	];

	$posts = new WP_Query($podcast_posts_query);
	if ($post = $posts->post) {
		$permalink = get_the_permalink($post->ID);
		$episode_summary = get_field('episode_summary', $post->ID);
		$show_notes = get_field('show_notes', $post->ID);
		wp_reset_postdata();
	}
	
	wp_reset_query(); 

	if ($permalink) {
		return [
			'permalink' => $permalink,
			'episode_summary' => $episode_summary,
			'show_notes' => $show_notes,
		];
	} else {
		debug('No WP podcast post with ACF field matching transistor episode ID '.$id);
	}
}

/**
 *
 */
function get_episode_id_from_url($url) {
	if ($episode_id = str_replace('https://share.transistor.fm/s/', '', $url)) {
		return $episode_id;
	} else {
		debug('Did not find an episode ID within the url '.$url);
	}
}

/**
 * 
 */
function find_podcast_in_rss(string $id)  {
	if ($rss_contents = curl_get_file_contents('https://feeds.transistor.fm/make-shift')) {
		$rss = simplexml_load_string($rss_contents);
		foreach ($rss->channel->item as $item) {
			$item_id = get_episode_id_from_url($item->link);
			if ($item_id == $id) {
				return $item;
			}
		}
	} else {
		debug('Could not retrieve RSS feed.');
	}
}

/**
 * 
 */
function get_episode_data_from_rss_item($item) {
	if ($transistor_episode_id = get_episode_id_from_url($item->link)) {	
		$data = find_podcast_post_by_episode_id($transistor_episode_id); 
		$namespace = $item->getNameSpaces(true);

		$itunes = $item->children($namespace['itunes']);
		switch ($itunes->episodeType) {
			case 'trailer': 
				$episode_type = 'Trailer'; 
				break;
			case 'bonus': 
				$episode_type = 'Bonus'; 
				break;
			default:// 'full' 
				$episode_type = 'Episode '.$itunes->episode; 
				break;
		}

		return [
			'episode_summary' => $data['episode_summary'] ?? $item->description,
			'episode_type' => $episode_type,
			'permalink' => $data['permalink'],
			'show_notes' => $data['show_notes'],
			'title' => $item->title,
			'transistor_episode_id' => $transistor_episode_id,
		];
	}
}

/**
 * 
 */
function pll___repeater(int $post_id) : array {
	$translations = [];
	if (have_rows('translations_repeater', $post_id)) {
		while (have_rows('translations_repeater', $post_id)) { the_row();
			$translations[ get_sub_field('slug') ] = get_sub_field('text'); 	
		}
	}
	return $translations;
}

$podcast_page_id = (int) get_translated_post_id('makeshift'); 
$translations = pll___repeater($podcast_page_id); 

echo '<style> @font-face {
	font-family: "Alma Mono";
	font-style: normal;
	font-weight: 400;
	src: local("Alma Mono Regular"), local("almamono-regular-webfont"),
		url("'.get_template_directory_uri().'/ui/fonts/almamono-regular-webfont.woff2") format("woff2"),
		url("'.get_template_directory_uri().'/ui/fonts/almamono-regular-webfont.woff") format("woff");
	/* Latin glyphs */
	unicode-range: none;
} </style>';
?>


<?php $background =get_component_background($podcast_page_id); ?>
<div class="podcasts bg-fixed bg-black <?= $background['class']; ?>" style="<?= $background['style']; ?>">
<div class="relative">

	<div class="grid-container white">
		<header class="makeshift__header grid-x grid-padding-x align-center align-middle">
			
			<div class="sr-only">
				<h1>
					<?=get_the_title($podcast_page_id);?>
				</h1>	
			</div>

			<!-- <a href="<?php the_permalink($podcast_page_id); ?>" class="cell hide-for-large text-center">
				<?php the_acf_image('podcast_logo', ['post_id'=>$podcast_page_id]);?>
			</a> -->

			<a href="/<?=get_post($podcast_page_id)->post_name;?>" class="cell makeshift__logo">
				Make/<span class="glitch" data-text="Shift">Shift</span>
			</a>

			<div class="cell makeshift__subheading">

				<div class='heading4'>
					<?= get_field('podcast_description', $podcast_page_id);?>
				</div>
				
				<?php
				//show a link to the trailer episode page, unless this IS the trailer page
				$podcast_trailer_page = get_field('trailer_episode_link', $podcast_page_id);
				if (get_the_title() != $podcast_trailer_page['title']) : ?>
				<a href="<?= $podcast_trailer_page['url']; ?>" class='makeshift__playtrailer'>
						<svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
							<defs>
								<rect id="a" height="22.5" rx="1.5" width="22.5"/>
								<mask id="b" fill="#fff">
									<use fill="#fff" fill-rule="evenodd" xlink:href="#a"/>
								</mask>
							</defs>
							<g fill="none" fill-rule="evenodd" transform="translate(.75 .75)">
								<use class="change" xlink:href="#a"/>
								<path d="m9.488 14.91c-.26534028.1323174-.58025767.1178997-.8323976-.0381094-.25213994-.156009-.4056024-.4313887-.4056024-.7278906v-5.788c0-.29650188.15346246-.5718816.4056024-.72789064.25213993-.15600904.56705732-.17042679.8323976-.03810936l5.789 2.895c.2899516.1447247.4731623.4409365.4731623.765s-.1832107.6202753-.4731623.765z" fill="#081122" mask="url(#b)"/>
							</g>
						</svg>
					
					<?php 
					//use translation or the title of the trailer as a fallback
					echo $translations['play_trailer'] ?? get_field('trailer_episode_link')['title']; 
					?>
				</a>
				<?php endif; ?>

			</div>
			
			<?php if (have_rows('syndication_sources', $podcast_page_id)) : ?>
			<div class="cell makeshift__syndications">
				<nav class="grid-x align-center align-middle">

					<h3 class='sr-only'><?= $translations['syndication_sources']; ?></h3>
					
					<?php while (have_rows('syndication_sources', $podcast_page_id)) : the_row();
					if ($url = get_sub_field('url')) {
						echo "<a class='cell shrink makeshift__syndications__item' href='$url'>";
						the_acf_image('badge');
						echo '</a>';
					}
					endwhile; ?>
				</nav>
				
			</div>
			<?php endif; ?>

		</header>
	</div>