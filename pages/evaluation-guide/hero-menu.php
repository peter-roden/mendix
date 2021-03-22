<div class="eval-guide-menu-container">
	<div class="grid-container title-bar" data-responsive-toggle="responsive-menu" data-hide-for="medium">
		<button class="menu-icon" type="button" data-toggle="responsive-menu"></button>
		<div class="title-bar-title">Explore Evaluation Guide</div>
	</div>
	<div class="top-bar" id="responsive-menu" >
		<div class="top-bar-left grid-container">
			<?php
			wp_nav_menu(array(
				'container' => false,
				'menu' => __( 'Top Bar Menu', 'textdomain' ),
				'menu_class' => 'top-menu dropdown menu medium-align-center',
				'theme_location' => 'evaluation-guide',
				'items_wrap'     => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
		    	//Recommend setting this to false, but if you need a fallback...
				'fallback_cb' => false,
				'walker' => new F6_TOPBAR_MENU_WALKER(),
			));
			?>
		</div>
	</div>
</div>
