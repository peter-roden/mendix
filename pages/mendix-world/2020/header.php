<?php enqueue_cache_busted_style("page-mendix-world-2020", "/ui/css/pages/mendix-world-2020.min.css"); ?>
<?php enqueue_cache_busted_script("page-mendix-world-2020", "/ui/js/pages/mendix-world-2020.min.js"); ?>

<?php function sideways_text(string $text) {
	echo "<div class='sideways'>
		<div class='sideways__line'></div>
		<p class='sideways__text'>$text</p>
	</div>";
} ?>



<?php function the_hero_video() {
	echo "<video class='background-video' autoplay loop muted playsinline>",
		"<source src='/wp-content/themes/mendix/pages/mendix-world/2020/hero-loop/812.mp4' type='video/mp4' media='all and (max-width: 812px)'>",
		"<source src='/wp-content/themes/mendix/pages/mendix-world/2020/hero-loop/1024.mp4' type='video/mp4' media='all and (max-width: 1024px)'>",
		"<source src='/wp-content/themes/mendix/pages/mendix-world/2020/hero-loop/1080.mp4' type='video/mp4' media='all and (max-width: 1080px)'>",
	"</video>";
} ?>


<header class="header grid-x grid-padding-x align-middle">
	<h2 class='sr-only'>Mendix World 2020 Header</h2>

	<div id="mendix-world-logo" class="cell shrink">
		<a href="<?php the_permalink( get_english_post_id('mxw-home') ); ?>">
			<?php the_acf_image('mxw_logo', ['post_id' => get_english_post_id('mxw-home')]); ?>
		</a>
	</div>
	
	<nav class="header__nav cell auto">
		<h3 class='sr-only'>Event Navigation</h3>
		<?php if (!strpos(get_the_permalink(), 'agenda')) {
			echo "<a href='/mendix-world/agenda/' class='header__nav__link'>Agenda</a>";
		} ?>
		<a href="/mendix-world/registration/" class='header__nav__button'>Register now</a>
	</nav>
</header>