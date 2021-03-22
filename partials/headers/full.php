<?php enqueue_cache_busted_script('header-navigation', '/ui/js/header-navigation.min.js'); ?>

<header id='siteHeader' class='<?= is_dark_header();?>'>
	<section id='siteHeader__bar'>
		<div class="grid-container grid-x collapse align-middle">
			<h2 class="visually-hidden"><?= pll__('Site header'); ?></h2>

			<div class="cell small-3 ph1 relative">
				<a class="siteHeader__logo inline-block" href="<?= get_permalink(get_translated_post_id('homepage') ); ?>">
					<?php readfile(get_template_directory().'/ui/svg/mendix-go-make-it.svg'); ?>
				</a>
			</div>

			<div class="hide-for-full-navigation cell auto text-right ph1">
				<button class="siteHeader__toggle relative"
					type="button"
					aria-haspopup="true"
					aria-expanded="false"
					aria-controls="menu-navigation"
					aria-label="Toggle Navigation"
					>
					<span class="visually-hidden"><?= pll__('Toggle Navigation'); ?></span>
					<i class="siteHeader__toggle__line"></i>
					<i class="siteHeader__toggle__line"></i>
					<i class="siteHeader__toggle__line"></i>
					<i class="siteHeader__toggle__close"></i>
				</button>
			</div>

			<?php if (have_rows('header_navigation', 'options') ) {  ?>
			<nav id="siteHeader__navigation"
				class="cell auto"
				aria-label="Main"
				aria-hidden="true"
				>
				<h3 class="visually-hidden"><?= pll__('Site navigation'); ?></h3>

				<ul id="menu-navigation" class="header-navigation">

				<?php while (have_rows('header_navigation', 'options') ) : the_row();

					$menu = get_sub_field('menu');
					if ($title = get_site_navigation_translation($menu['title'])): ?>
					<li class="navigation-top-level">
						<button class="navigation-top-level__button">
							<?= $title['label']; ?>
						</button>

						<?php if ($menu['links']): ?>

						<ul class="navigation-sub-menu">

						<?php foreach ($menu['links'] as $link) : ?>
							<?php if ($data = get_site_navigation_translation($link['data'])): ?>

							<li class="navigation-sub-menu__item">
								<?php $url = $data['link_type'] == 'page' ? $data['page'] : $data['url']; ?>
								<a href="<?= $url; ?>" class="heading normal navigation-sub-menu__item__link" tabindex="-1">

									<?php the_acf_image($link['icon'], ['inline'=>true]); ?>

									<span class="navigation-top-level__text">
										<?= $data['title']; ?>
									</span>
								</a>
							</li>

							<?php endif; ?>
						<?php endforeach;?>

						</ul>

						<?php endif; ?>

					</li>

					<?php endif; ?>

				<?php endwhile; ?>

				<li class="navigation-top-level mt3 hide-for-full-navigation">
                    <a href="<?= get_signup_url(); ?>" class="btn-primary"><?= pll__('Start for free');?></a>
                </li>

				</ul>

			</nav>

			<?php } ?>

			<div class="pr1 cell small-3 align-right show-for-full-navigation">
				<div class="grid-x align-middle">

					<div id="siteHeader__search" class="cell shrink">
						<h3 class="visually-hidden"><?= pll__('Search');?></h3>
						<a class="link-search" title="Search">
							<?php readfile(get_template_directory().'/ui/icons/navigation/search.svg'); ?>
						</a>
					</div>

					<div id="siteHeader__blog" class="cell shrink">
						<h3 class="visually-hidden"><?= pll__('Login');?></h3>
						<a class="link-svg" title="Read the Mendix blog" href="/blog/">
							<?php readfile(get_template_directory().'/ui/icons/navigation/blog.svg'); ?>
						</a>
					</div>

					<div id="siteHeader__login" class="mr1 cell shrink">
						<h3 class="visually-hidden"><?= pll__('Login');?></h3>
						<a class="link-svg" href="https://home.mendix.com/">
							<?php readfile(get_template_directory().'/ui/icons/navigation/login.svg'); ?>
						</a>
					</div>

					<div id="siteHeader__cta" class="cell auto">
						<h3 class="visually-hidden"><?= pll__('Get Started');?></h3>
						<a href="<?= get_signup_url(); ?>" class="btn-header"><?= pll__('Start for free');?></a>
                    </div>

                </div>
            </div>
          </div>
	</section>

</header>

<div id="search-form">
	<div class="search-form-wrapper">
			<div class="grid-container grid-x collapse align-middle">
	
			<div class="cell small-3 ph1 relative">
				<a class="siteHeader__logo inline-block" href="<?= get_permalink(get_translated_post_id('homepage') ); ?>">
					<?php readfile(get_template_directory().'/ui/svg/mendix-go-make-it.svg'); ?>
				</a>
			</div>
		
			<div class="cell large-7 relative">
				<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
					<input type="search" class="search-field"
						placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
						value="<?php echo get_search_query() ?>" name="s"
						title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
						<a class="search-close" href="#"><image src="<?php echo get_template_directory_uri() .'/ui/images/search-close.png'; ?>" alt=img style="width:32px; height:32px;"></a>					
				</form>
			</div>
			
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$( "a.link-search" ).click(function() {
			$("header").hide();
			$("#search-form").show();
		});
		$( "a.search-close" ).click(function() {
			$("header").show();
			$("#search-form").hide();
		});
	});
</script>

<div class="siteHeader-sticky-observer" data-out="sticky"></div>
<div class="siteHeader-height-observer" data-out="out-of-view"></div>
