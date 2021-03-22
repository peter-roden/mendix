<?php
/**
* Template Name: Mendix World 2020 Agenda
*/
get_header(); ?>

<section class="mxw_hero--agenda">

	<?php the_hero_video(); ?>

	<div class="">
		<h2 class="heading">Agenda</h2>
	</div>
</section>


<?php if (!function_exists('the_keynote_card')) {
	function the_keynote_card(
		string $title = '',
		string $presenter ='',
		string $job ='',
		string $company = ''
		) {
		$presenter_class = sanitize_title($presenter);
		echo "<li class='keynote grid-x align-stretch $presenter_class'>";

		echo "<div class='cell medium-auto keynote__info'>
		<p class='keynote__type'>Keynote Presentation</p>
		<h3 class='keynote__title'>$title</h3>
		<p class='keynote__presenter'>$presenter</p>
		<p class='keynote__job'>$job</p>
		<p class='keynote__company'>$company</p>";

		echo '</div>';

		$generated_background_class = get_acf_background_image_style( 'keynote_image' );
		echo "<div class='cell keynote__image $generated_background_class'></div>";

		echo "<nav class='keynote__social'>
		<h4 class='sr-only'>Presenter Social Links</h4>";

		while (have_rows('keynote_social_media')):  the_row();
			$url = get_sub_field('url');
			echo "<a href='$url' class='keynote__social__link' target='_blank'>";
			if (strpos($url, 'linkedin') > -1) {
				echo "<svg height='33' viewBox='0 0 35 33' width='35' xmlns='http://www.w3.org/2000/svg'>
				<path fill='none' stroke='#919396' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.878914' transform='translate(-47.701461 1.079332)'
				d='m56.5587432 4.07626722c0 1.94129437-1.5726513 3.51281837-3.5128184 3.51281837-1.940167 0-3.5128183-1.571524-3.5128183-3.51281837 0-1.94016701 1.5726513-3.51281837 3.5128183-3.51281837 1.9401671 0 3.5128184 1.57265136 3.5128184 3.51281837zm14.0817119 13.14826718c-1.6639666 0-3.0111482 1.348309-3.0111482 3.0122756v10.1867224h-7.1755741v-19.5718998h7.1755741v2.2355323s2.409144-2.2501879 6.0076409-2.2501879c4.4586639 0 7.5430898 3.3053863 7.5430898 9.567808v10.0187474h-7.5273069v-10.1867224c0-1.6639666-1.3494363-3.0122756-3.0122756-3.0122756zm-21.0070146 13.198998h6.8249687v-19.5718998h-6.8249687z'/>
				</svg>";
			} else	if (strpos($url, 'twitter') > -1) {
				echo "<svg height='28' viewBox='0 0 34 28' width='34' xmlns='http://www.w3.org/2000/svg'>
				<path fill='none' stroke='#919396' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.878914' transform='translate(1.298539 -3.920668)'
				d='m31.5506555 10.7049645-2.9119415-1.24797494 1.5253027-3.32793319-3.5488935 1.17807933c-1.1296034-1.05294363-2.6131942-1.64705637-4.1599165-1.66283925-3.4429228.00789144-6.230856 2.79582464-6.2387474 6.23874735v1.3866389c-4.908476 1.0123591-9.19240084-1.6639666-13.17081421-6.23874742-.69331941 3.69770352 0 6.46985382 2.07995825 8.31870562l-4.56237996-.6933194c.36300627 3.0303132 2.84542798 5.3673069 5.89265136 5.545428l-3.81269311 1.3866388c1.38663883 2.7721503 3.90964509 3.2027975 7.27816284 3.4665971-2.75298539 1.8781628-6.02455115 2.8476827-9.35812109 2.7721503 17.69148222 7.8610021 28.07549062-3.6875574 28.07549062-13.8641336v-1.151023z'/>
				</svg>";
			} else {
				console_log('No SVG prepper for url '.$url);
			}
			echo "</a>";
		endwhile;

		echo '</nav>';
		echo '</li>';
	}
} ?>

<?php if (!function_exists('the_accordion_section')) {
	 function the_accordion_section($title, $group, $fun_text ='Something fun here') {
		static $accound_section_count = 0;

		++$accound_section_count;

		echo "<p class='session--$accound_section_count accordion-item__funtext'>$fun_text</p>";
		echo "<li class='accordion-item session--$accound_section_count' data-accordion-item>";

		echo "<a href='#' class='accordion-title'>
		<h3 class='accordion-title__text'>$title</h3>
		<span class='chevron'></span>
		</a>

		<div class='accordion-content' data-tab-content>
		<ul>";

		$keynote_posts = new WP_Query( [
			'post_type' => 'mx_world',
			'posts_per_page' => -1,
			'meta_key' => 'session_group',
			'meta_value' => $group
		]);

		while ($keynote_posts->have_posts()): $keynote_posts->the_post();
			the_session_card();
			wp_reset_postdata();
		endwhile;

		wp_reset_query();

		echo "</ul>
		</div>
		</li>";
	}
} ?>

<?php if (!function_exists('the_session_card')) {
	function the_session_card() {
		$title = get_the_title();

		echo '<li class="session">';
		echo "<div class='session__header'>
		<h4 class='session__title'>$title</h4>";

		echo '<ul class="session__presenters">';
		while (have_rows('session_presenters')): the_row();
			echo '<li class="session__presenter">',
			get_sub_field('name'), !empty(get_sub_field('job_title')) ? ', '.get_sub_field('job_title') :'';
			'</li>';
		endwhile;
		echo '</ul>';

		echo '</div>';

		if ($details = get_field('session_details')) {
			$details = explode(' ', $details);

			echo '<div class="session__info--truncated active copy">',
			implode(' ', array_slice($details, 0, 40) ),
			'<button class="session__info__toggle">… <em>Read more</em></button>',
			'</div>';

			echo '<div class="session__info--full copy">',
			get_field('session_details'),
			'</div>';
		}

		echo '</li>';
	}
} ?>

<section id="keynote_cards" class="section">

	<h2 class="sr-only">Keynotes</h2>

	<div class="grid-container relative">

		<?php sideways_text('More low-code fun this way'); ?>

		<ul>
			<?php $keynote_posts = new WP_Query( [
				'post_type' => 'mx_world',
				'posts_per_page' => -1,
				'taxonomy' => 'mxw_category',
				'term' => 'keynote',
			]);

			while ($keynote_posts->have_posts()): $keynote_posts->the_post();
				the_keynote_card(
					(string) get_the_title(),
					(string) get_field('keynote_presenter'),
					(string) get_field('keynote_job_title'),
					(string) get_field('keynote_company')
				);
				wp_reset_postdata();
			endwhile;

			wp_reset_query();
			?>
		</ul>
	</div>
</section>


<section id="sponsors" class='relative'>

	<h2 class="sr-only">sponsors</h2>

	<div class="relative grid-container">

		<div class="grid-x align-center">
			<div class="cell">
				<p class="sponsors__heading">Join some of the biggest names in the low-code game</p>
			</div>
		</div>

		<?php include_post('logo-ticker-mx-world-2020'); ?>

	</div>
</section>


<section id="sessions" class="section">

	<h2 class="sr-only">Breakout sessions</h2>

	<div class="grid-container relative">

		<?php sideways_text('Bask in the glory of low-code'); ?>
		
		<h3 class="accordion-title__text" style="color: #000;">On-Demand Sessions</h3>
		<p class="mb2">Waiting for the next episode is so 2006. You’ll have access to 65 on-demand video sessions – <span class="large-block"></span>perfect for binge-watching during the event week and available to you for as long as you need.</p>

		<ul class="accordion" data-accordion data-allow-all-closed="true">
			

			<?php
			the_accordion_section('Lead the Way', 'group1', 'Let’s get digital, digital!');
			the_accordion_section('Discover What’s Possible', 'group3', 'Makers getting it done');
			the_accordion_section('Build the Future', 'group2', 'Welcome to our sandbox');
			?>
		</ul>
	</div>
</section>


<div id="liveSessions">
  <?php include_once locate_template('pages/mendix-world/2020/partials/live-sessions-accordion.php');?>
</div>


<aside id="registerCTA">
	<div class="grid-container relative">
		<h2 class="sr-only">Event registration CTA</h2>

		<div class="grid-x align-center align-middle">
			<div class="cell text-center large-4 large-text-left">
				<h3 class='sponsors__heading'>Join 🤝 with the biggest names in low-code</h3>
			</div>
			<div class="cell shrink mt2 large-mt0 large-offset-1">
				<a href="<?php the_permalink( get_english_post_id('mxw-home') );?>#register" class='button'>Register now</a>
			</div>
		</div>
	</div>
</aside>


<?php get_footer(); ?>
