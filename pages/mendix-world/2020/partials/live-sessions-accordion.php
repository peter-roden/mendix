<section class="live-sessions section-padding">
	<div class="grid-container live-sessions-accordion accordion" data-accordion data-allow-all-closed="true">
		<div class="accordion-item live-sessions-accordion-item" data-accordion-item>
			<a href="#" class="row accordion-title grid-x large-align-justify align-middle">
				<div class="column">
                  <div class="row grid-x grid-padding-x align-middle">
                    <div class="column" style="padding-top: 16px;"><img class="image" src="../../wp-content/themes/mendix/pages/mendix-world/2020/images/mx-live.svg" alt="MX Live Sessions"></div>
                    <div class="column"><h3 class="live-sessions-heading">Live Sessions</h3></div>
                  </div>
				</div>

				<div class="column" style="padding-top: 10px;">
					<span class="accordion-status accordion-status-closed text-right">
						See the lineup
					</span>
					<span class="accordion-status accordion-status-open text-right">
						Close lineup
					</span>
					<div class="caret">
						<svg width="46" height="25" viewBox="0 0 46 25" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>Stroke 1</title><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Live-V1-Open" transform="translate(-1684.000000, -2611.000000)" stroke="#fff" stroke-width="2"><g id="Group-20" transform="translate(1685.000000, 2613.000000)"><path id="Stroke-1" d="M0 22 22.0008894.0 44 22"/></g></g></g></svg>
					</div>
				</div>
			</a>
			<div class="row accordion-content live-sessions-calendar" data-tab-content>
                <p class="white copy mb2">Registering for Mendix World gets you access to a dozen live sessions throughout the week of August 31. Take a look at the details below, mark your favorite sessions on your calendar, and access them in the Mendix World event site that week.</p>
				<?php $live_speakers = get_field('live_speakers'); ?>

				<?php if( $live_speakers ): // live_speakers field group ?>
					<?php while( have_rows('live_speakers') ): the_row();
						$live_speaker_day_1 = get_sub_field('live_speaker_day_1');
						$live_speaker_day_2 = get_sub_field('live_speaker_day_2');
						$live_speaker_day_3 = get_sub_field('live_speaker_day_3');
						$live_speaker_day_4 = get_sub_field('live_speaker_day_4');
					endwhile;
				endif; ?>

				<div class="grid-x w100 align-justify">
					<div class="columns large-3 medium-6">
						<div class="column-title">Sept 1</div>
						<?php if( $live_speaker_day_1 ) : ?>
							<?php foreach( $live_speaker_day_1 as $post ) : setup_postdata( $post );

								$event_subcategory = get_field('event_subcategory');
								$event_title = get_the_title();
								$event_speakers = get_field('speakers');
								$start_time = get_field('start_time');
								$event_description = get_field('event_description'); ?>

								<div class="event-card mb2">


									<?php if ( $event_subcategory ) : ?>
										<div class="event-sub-title"><?php echo $event_subcategory; ?></div>
									<?php endif; ?>

									<?php if ( $event_title ) : ?>
										<div class="event-title"><?php echo $event_title; ?></div>
									<?php endif; ?>

									<div class="date-and-expand grid-x align-justify">
										<div class="columns small-12">
											<?php if ( $start_time ) : $cest_time = $start_time; ?>
												<span class="event-time-cest"><?php echo date("H:i", strtotime("{$start_time} +6 hours"));?> CEST</span>
												<span class="event-time-est">| <?php echo $start_time; ?> EDT</span>
											<?php endif; ?>
										</div>

										<div class="description mt50 columns small-12 accordion" data-accordion data-allow-all-closed="true">
											<?php if ( $event_description ) : ?>
												<div class="accordion-item description-accordion" data-accordion-item>
													<a href="" class="show-description columns text-right accordion-title no-scroll">+ DETAILS</a>
													<a href="" class="hide-description columns text-right accordion-title no-scroll">- Hide</a>
													<div class="accordion-content" data-tab-content>
														<div class="event-description"><?php echo $event_description; ?></div>
														<?php if ( $event_speakers ) : ?>
															<div class="event-speakers mt50">
																<?php while( have_rows('speakers') ): the_row();
																	$author_name = get_sub_field('speaker_name');
																	$author_title = get_sub_field('speaker_title'); ?>

																	<div class="speaker-details">
																		<span class="speaker-name"><?php echo $author_name; ?></span><span class="speaker-title"><?php echo ', ' . $author_title; ?></span>
																	</div>
																<?php endwhile; ?>
															</div>
														<?php endif; ?>

													</div>
												</div>
											<?php endif; ?>
										</div>
									</div>

								</div>

							<?php endforeach;
							wp_reset_postdata();
						endif; ?>
					</div>
					<div class="columns large-3 medium-6">
						<div class="column-title">Sept 2</div>
						<?php if( $live_speaker_day_2 ) : ?>
							<?php foreach( $live_speaker_day_2 as $post ) : setup_postdata( $post );

								$event_subcategory = get_field('event_subcategory');
								$event_title = get_the_title();
								$event_speakers = get_field('speakers');
								$start_time = get_field('start_time');
								$event_description = get_field('event_description'); ?>

								<div class="event-card mb2">


									<?php if ( $event_subcategory ) : ?>
										<div class="event-sub-title"><?php echo $event_subcategory; ?></div>
									<?php endif; ?>

									<?php if ( $event_title ) : ?>
										<div class="event-title"><?php echo $event_title; ?></div>
									<?php endif; ?>

									<div class="date-and-expand grid-x align-justify">
										<div class="columns small-12">
											<?php if ( $start_time ) : $cest_time = $start_time; ?>
												<span class="event-time-cest"><?php echo date("H:i", strtotime("{$start_time} +6 hours"));?> CEST</span>
												<span class="event-time-est">| <?php echo $start_time; ?> EDT</span>
											<?php endif; ?>
										</div>

										<div class="description mt50 columns small-12 accordion" data-accordion data-allow-all-closed="true">
											<?php if ( $event_description ) : ?>
												<div class="accordion-item description-accordion" data-accordion-item>
													<a href="" class="show-description columns text-right accordion-title no-scroll">+ DETAILS</a>
													<a href="" class="hide-description columns text-right accordion-title no-scroll">- Hide</a>
													<div class="accordion-content" data-tab-content>
														
														<div class="event-description"><?php echo $event_description; ?></div>
														
														<?php if ( $event_speakers ) : ?>
															<div class="event-speakers mt50">
																<?php while( have_rows('speakers') ): the_row();
																	$author_name = get_sub_field('speaker_name');
																	$author_title = get_sub_field('speaker_title'); ?>

																	<div class="speaker-details">
																		<span class="speaker-name"><?php echo $author_name; ?></span><span class="speaker-title"><?php echo ', ' . $author_title; ?></span>
																	</div>
																<?php endwhile; ?>
															</div>
														<?php endif; ?>

													</div>
												</div>
											<?php endif; ?>
										</div>
									</div>

								</div>

							<?php endforeach;
							wp_reset_postdata();
						endif; ?>
					</div>
					<div class="columns large-3 medium-6">
						<div class="column-title">Sept 3</div>
						<?php if( $live_speaker_day_3 ) : ?>
							<?php foreach( $live_speaker_day_3 as $post ) : setup_postdata( $post );

								$event_subcategory = get_field('event_subcategory');
								$event_title = get_the_title();
								$event_speakers = get_field('speakers');
								$start_time = get_field('start_time');
								$event_description = get_field('event_description'); ?>

								<div class="event-card mb2">


									<?php if ( $event_subcategory ) : ?>
										<div class="event-sub-title"><?php echo $event_subcategory; ?></div>
									<?php endif; ?>

									<?php if ( $event_title ) : ?>
										<div class="event-title"><?php echo $event_title; ?></div>
									<?php endif; ?>

									<div class="date-and-expand grid-x align-justify">
										<div class="columns small-12">
											<?php if ( $start_time ) : $cest_time = $start_time; ?>
												<span class="event-time-cest"><?php echo date("H:i", strtotime("{$start_time} +6 hours"));?> CEST</span>
												<span class="event-time-est">| <?php echo $start_time; ?> EDT</span>
											<?php endif; ?>
										</div>

										<div class="description mt50 columns small-12 accordion" data-accordion data-allow-all-closed="true">
											<?php if ( $event_description ) : ?>
												<div class="accordion-item description-accordion" data-accordion-item>
													<a href="" class="show-description columns text-right accordion-title no-scroll">+ DETAILS</a>
													<a href="" class="hide-description columns text-right accordion-title no-scroll">- Hide</a>
													<div class="accordion-content" data-tab-content>
														
														<div class="event-description"><?php echo $event_description; ?></div>
														
														<?php if ( $event_speakers ) : ?>
															<div class="event-speakers mt50">
																<?php while( have_rows('speakers') ): the_row();
																	$author_name = get_sub_field('speaker_name');
																	$author_title = get_sub_field('speaker_title'); ?>

																	<div class="speaker-details">
																		<span class="speaker-name"><?php echo $author_name; ?></span><span class="speaker-title"><?php echo ', ' . $author_title; ?></span>
																	</div>
																<?php endwhile; ?>
															</div>
														<?php endif; ?>

													</div>
												</div>
											<?php endif; ?>
										</div>
									</div>

								</div>

							<?php endforeach;
							wp_reset_postdata();
						endif; ?>
					</div>
					<div class="columns large-3 medium-6">
						<div class="column-title">Sept 4</div>
						<?php if( $live_speaker_day_4 ) : ?>
							<?php foreach( $live_speaker_day_4 as $post ) : setup_postdata( $post );

								$event_subcategory = get_field('event_subcategory');
								$event_title = get_the_title();
								$event_speakers = get_field('speakers');
								$start_time = get_field('start_time');
								$event_description = get_field('event_description'); ?>

								<div class="event-card mb2">


									<?php if ( $event_subcategory ) : ?>
										<div class="event-sub-title"><?php echo $event_subcategory; ?></div>
									<?php endif; ?>

									<?php if ( $event_title ) : ?>
										<div class="event-title"><?php echo $event_title; ?></div>
									<?php endif; ?>

									<div class="date-and-expand grid-x align-justify">
										<div class="columns small-12">
											<?php if ( $start_time ) : $cest_time = $start_time; ?>
												<span class="event-time-cest"><?php echo date("H:i", strtotime("{$start_time} +6 hours"));?> CEST</span>
												<span class="event-time-est">| <?php echo $start_time; ?> EDT</span>
											<?php endif; ?>
										</div>

										<div class="description mt50 columns small-12 accordion" data-accordion data-allow-all-closed="true">
											<?php if ( $event_description ) : ?>
												<div class="accordion-item description-accordion" data-accordion-item>
													<a href="" class="show-description columns text-right accordion-title no-scroll">+ DETAILS</a>
													<a href="" class="hide-description columns text-right accordion-title no-scroll">- Hide</a>
													<div class="accordion-content" data-tab-content>
														
														<div class="event-description"><?php echo $event_description; ?></div>
														
														<?php if ( $event_speakers ) : ?>
															<div class="event-speakers mt50">
																<?php while( have_rows('speakers') ): the_row();
																	$author_name = get_sub_field('speaker_name');
																	$author_title = get_sub_field('speaker_title'); ?>

																	<div class="speaker-details">
																		<span class="speaker-name"><?php echo $author_name; ?></span><span class="speaker-title"><?php echo ', ' . $author_title; ?></span>
																	</div>
																<?php endwhile; ?>
															</div>
														<?php endif; ?>

													</div>
												</div>
											<?php endif; ?>
										</div>
									</div>

								</div>

							<?php endforeach;
							wp_reset_postdata();
						endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
