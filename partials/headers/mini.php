<style>
#header {
    position: absolute;
    top: 0;
	left: 0;
	padding-top: 1rem;
    z-index: 9999;
    width: 100%;
}

#header.dark {
	background-color: #181821;/*$black;*/
}

#header::before {
  background-color: transparent;
  border-bottom-color: transparent;
}
</style>

<header id="siteHeader">

	<section id="siteHeader__mini">

		<div class="grid-container grid-x collapse align-middle">

			<h2 class="visually-hidden"><?= pll__('Site header'); ?></h2>

			<div class="cell small-3 pa1 relative">
				<a class="siteHeader__logo inline-block" href="<?= get_permalink( get_translated_post_id('homepage') ); ?>">
					<?= file_get_contents(get_template_directory() . "/ui/svg/mendix-go-make-it.svg");?>
				</a>
			</div>

		</div>

	</section>
	
</header>