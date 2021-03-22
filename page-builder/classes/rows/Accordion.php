<?php
namespace Mendix\PageBuilder;

/**
 *
 */
class Accordion extends Row
{
    public function open()
    {
		echo '<div class="grid-container collapse relative">';
		echo '<ul class="accordion-two-column accordion" data-accordion>';
		$this->open_elements[] = 'div';
		$this->open_elements[] = 'ul';
    }

    public function add()
    {
		while (have_rows('expandable_section')) : the_row(); ?>
			<li class='accordion-item grid-x grid-padding-x mt2 <?= get_row_index() == 1 ? 'is-active' : null; ?>' data-accordion-item>
				<a href='#' class='cell accordion-title'>
					<div class='grid-x align-top large-pr3'>
						<div class='cell shrink medium-2 large-1 medium-text-center border-top'>
							<?php the_acf_image('icon'); ?>
						</div>
						<div class='cell auto large-5 pl1 medium-pl0 border-top'>
							<h3 class='heading5 medium-heading4 accordion__heading'><?= get_sub_field('heading'); ?><span class='chevron-right'></span></h3>
						</div>
					</div>
				</a>

				<div class='cell medium-10 medium-offset-2 large-5 large-offset-1 accordion-two-column__content'-- data-tab-content>

					<?php
					if (!empty(get_sub_field('description'))):
						echo "<p class='large-only-ph1 mt50'>".get_sub_field('description')."</p>";
					elseif (!empty(get_sub_field('body'))):
						echo "<p class='large-only-ph1 mt50'>".get_sub_field('body')."</p>";
					endif;
					?>

					<div class='hide-for-large mt2'>
						<?php
						if (get_sub_field('screenshot')):
							the_acf_image('screenshot');
						elseif (get_sub_field('image')):
							the_acf_image('image');
						endif;
						?>
					</div>
				</div>

				<div class='show-for-large accordion-two-column__image' style='max-width: 50%;'>
					<?php
					if (get_sub_field('screenshot')):
						the_acf_image('screenshot');
					elseif (get_sub_field('image')):
						the_acf_image('image');
					endif;
					?>
				</div>
			</li>
		<?php endwhile; ?>
    <?php }
}
