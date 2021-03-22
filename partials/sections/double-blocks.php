<?php 

if (!isset($post_id)) {
	$post_id = null;
}

while (have_rows($section_rows, $post_id)): the_row(); ?>

	<section class="section-padding text-center <?= ($dark) ? 'bg-black white' : ''; ?>">
		
		<div class="grid-container">

			<?php switch(get_current_language()) {
				case LANGUAGE_CODE_GERMAN: 
					$header = get_sub_field('header_german');
					break;
				case LANGUAGE_CODE_CHINESE:
					$header = get_sub_field('header_chinese');
					break;
				default:
					$header = get_sub_field('header');
					break;
			}

			if ($header != '') : ?>
			<div class="grid-x align-center">
				<div class="cell large-6 mb2">
					<h1 class="heading2"><?=$header;?></h1>
				</div>
			</div>
			<?php endif; ?>

			<div class="grid-x grid-margin-x align-stretch">

				<?php while (have_rows($block_rows, $post_id)): the_row(); ?>
					
					<?php
					$background = get_sub_field('background2');
					$entry = get_sub_field('entry');
					$logo = get_sub_field('logo2');

					$title = '';
					$button = [];
					switch(get_current_language()) {
						case LANGUAGE_CODE_GERMAN:
							$title = get_sub_field('title_german');
							$button = get_sub_field('button_german');
							break;
						case LANGUAGE_CODE_CHINESE:
							$title = get_sub_field('title_chinese');
							$button = get_sub_field('button_chinese');
							break;
						default:
							$title = get_sub_field('title');
							$button = get_sub_field('button');
							break;
					}
					?>

					<style>
					.company-block {
						height: 28rem;
					}

					.company-block.overlay::before {
						background: rgba(0, 0, 0, 0.2);
					}
					
					.company-block__entry {
						position: absolute;
						width: 100%;
						top: 50%;
						left: 0;
						transform: translate(0,-50%);
					}
					</style>
					<div class="cell large-6 mb2">
						<div class="company-block cover overlay lazy" data-bg='<?=$background['url'];?>'>
							<div class="company-block__entry relative ph2 large-ph3 relative white">
								<?php if ($logo) : ?>
									<?php the_acf_image($logo, ['width' => '350', 'lazy'=>true]);?>
								<?php endif; ?>
								
								<?php if ($entry) : ?>
									<h4 class="heading4"><?= $title; ?></h4>
									<p class="copy"><?= $entry; ?></p>
								<?php else: ?>
									<p class="copy"><?=$title;?></p>
								<?php endif; ?>

								<?php the_acf_link($button, ['class'=>'btn-primary']); ?>
							</div>
						</div>
					</div>
				<?php endwhile; ?>

			</div>
		</div>

	</section>

<?php endwhile; ?>
