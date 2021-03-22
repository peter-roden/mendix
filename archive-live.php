<?php
/**
* Archive: MX Live
*/

get_header(); ?>

<main role="main">

	<article id="post-<?php the_ID(); ?> <?php post_class(); ?>">

		<div class="grid-x grid-container-fluid align-center bg-twitch">
			<div class="small-12 medium-10">
				<div id="twitch-embed"></div>
			</div>
		</div>

		<!-- Create a Twitch.Embed object that will render within the "twitch-embed" root element. -->
		<script type="text/javascript">
			new Twitch.Embed("twitch-embed", {
				width: '100%',
				height: 800,
				channel: "mendixcommunity",
			});
		</script>

		<?php include( locate_template ('pages/mx-live/social-links.php') ); ?>

	</article>

</main>

<?php get_footer(); ?>
