<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

get_header();
the_core_header_image();
global $post;
$the_core_sidebar_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : 'right';
$the_core_post_options     = the_core_single_post_options( $post->ID );
$options                   = fw_get_db_post_option( $post->ID, fw()->extensions->get( 'events' )->get_event_option_id() );
$event_options             = fw_get_db_post_option($post->ID);
$general_events_options    = fw_get_db_settings_option('general_events_options');
?>
<section class="fw-main-row <?php the_core_get_content_class( 'main', $the_core_sidebar_position ); ?>" role="main" itemprop="mainEntity" itemscope="itemscope" itemtype="https://schema.org/Event">
	<div class="fw-container">
		<div class="fw-row">
			<div class="fw-content-area <?php the_core_get_content_class( 'content', $the_core_sidebar_position ); ?>">
				<div class="fw-col-inner">
					<?php if( function_exists('fw_ext_breadcrumbs') ) fw_ext_breadcrumbs(); ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( "post post-details event-details" ); ?>>
							<header class="fw-events-title" itemprop="name">
								<?php the_core_single_post_title( $post->ID, 'fw-event' ); ?>
								<meta itemprop="url" content="<?php echo esc_url( get_permalink() ); ?>" />
								<meta itemprop="eventStatus" content="EventScheduled" />
							</header>

							<?php if ( $the_core_post_options['image'] ) : ?>
								<div class="fw-post-image fw-block-image-parent <?php echo esc_attr($the_core_post_options['frame']); ?>">
									<a href="<?php echo esc_url($the_core_post_options['image']['original_image_url']); ?>" data-rel="prettyPhoto" class="post-thumbnail fw-block-image-child <?php echo esc_attr($the_core_post_options['ratio_class']); ?>">
										<?php echo ($the_core_post_options['image']['img']); ?>
									</a>
								</div>
							<?php endif; ?>

							<!-- additional information about event -->
							<?php if ( isset( $options['event_children'] ) ) : $the_core_count = 0; ?>
								<hr class="before-hr"/>
								<?php
									$date_format = get_option('date_format', 'F j, Y');
									$time_format = get_option('time_format', 'F j, Y');
									$final_date_format = $date_format.' '.$time_format;
								?>
								<?php foreach ( $options['event_children'] as $key => $row ) : ?>
									<?php if ( empty( $row['event_date_range']['from'] ) or empty( $row['event_date_range']['to'] ) ) : ?>
										<?php continue; ?>
									<?php endif; ?>

									<?php
										++$the_core_count;
										$dates_count = count($options['event_children']);
										if( $the_core_count == 1 ) {
											$start_date = date_i18n( $final_date_format, strtotime( $row['event_date_range']['from'] ) );
										}
									?>
									<?php if( $the_core_count == 2) {echo '<div class="fw-more-events-content">'; } ?>
									<div class="details-event-button">
										<button class="fw-btn fw-btn-1 fw-btn-sm" data-uri="<?php echo esc_url( add_query_arg( array( 'row_id'   => $key, 'calendar' => 'google' ), fw_current_url() ) ); ?>" type="button"><?php esc_html_e( 'Google Calendar', 'the-core' ) ?></button>
										<button class="fw-btn fw-btn-1 fw-btn-sm" data-uri="<?php echo esc_url( add_query_arg( array( 'row_id'   => $key, 'calendar' => 'ical' ), fw_current_url() ) ); ?>" type="button"><?php esc_html_e( 'Ical Export', 'the-core' ) ?></button>
									</div>
									<ul class="details-event">
										<li itemprop="startDate">
											<b><?php esc_html_e( 'Start', 'the-core' ) ?>:</b> <?php echo date_i18n( $final_date_format, strtotime( $row['event_date_range']['from'] ) ); ?><?php if( $dates_count >= 2 && $the_core_count == 1) { echo '<span class="fw-events-more-link">, '.'<a class="fw-show-more-events closed" hre="#">'.(count($options['event_children'])-1).' '; esc_html_e('More', 'the-core'); echo '</a></span>'; } ?>
										</li>
										<li itemprop="endDate"><b><?php esc_html_e( 'End', 'the-core' ) ?>:</b> <?php echo date_i18n( $final_date_format, strtotime( $row['event_date_range']['to'] ) ); ?></li>

										<?php if ( empty( $row['event-user'] ) === false ) : ?>
											<li>
												<b><?php esc_html_e( 'Speakers', 'the-core' ) ?>:</b>
												<?php foreach ( $row['event-user'] as $user_id ) : ?>
													<?php $user_info = get_userdata( $user_id ); ?>
													<?php echo esc_html( $user_info->display_name ); ?>
													<?php echo( $user_id !== end( $row['event-user'] ) ? ', ' : '' ); ?>
												<?php endforeach; ?>
											</li>
										<?php endif; ?>

									</ul>
									<hr class="after-hr"/>
								<?php endforeach; ?>
								<?php if($the_core_count >= 2) { echo '</div>'; } // /.fw-more-events-content ?>
							<?php endif; ?><!-- .additional information about event -->

							<div class="fw-row fw-location-info">
								<?php if( !empty($options['event_location']) ) : ?>
									<div class="fw-col-sm-7 fw-event-location" itemprop="location" itemscope itemtype="https://schema.org/Place">
										<?php if( !empty($options['event_location']['address']) ) : ?>
											<span itemprop="name"><?php echo esc_attr($options['event_location']['address']); ?></span>,
										<?php endif; ?>
										<span itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
											<?php if( !empty($options['event_location']['state']) ) : ?>
												<span itemprop="addressLocality"><?php if( $options['event_location']['city'] != $options['event_location']['state'] && !empty($options['event_location']['city']) ) echo esc_attr($options['event_location']['city']).', '; ?><?php echo esc_attr($options['event_location']['state']); ?></span><?php if( !empty($options['event_location']['country']) ) : ?>,<?php endif; ?>
											<?php endif; ?>
											<?php if( !empty($options['event_location']['country']) ) : ?>
												<span itemprop="addressRegion"><?php echo esc_attr($options['event_location']['country']); ?></span>
											<?php endif; ?>
										</span>
									</div>
								<?php endif; ?>

								<div class="fw-col-sm-5 fw-event-offers" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
									<?php if( !empty($event_options['ticket_price']) ) : ?>
										<?php if( isset($event_options['ticket_number']) ) : ?>
											<span class="fw-event-tickets-available"><?php esc_html_e('Tickets Available:', 'the-core'); ?> <?php echo ($event_options['ticket_number']); ?></span>
										<?php endif; ?>
										<span class="fw-event-price" itemprop="price" content="<?php echo (int)$event_options['ticket_price']; ?>"><?php esc_html_e('Price:', 'the-core'); ?> <?php the_core_events_price_and_currency($general_events_options, array( 'ticket_price' => $event_options['ticket_price']) ); ?></span>
										<?php if( isset($event_options['ticket_number']) ) : ?>
											<meta itemprop="inventoryLevel" content="<?php echo (int)$event_options['ticket_number']; ?>" />
										<?php endif; ?>
										<?php if( (int) $event_options['ticket_number'] > 0 ) : ?>
											<meta itemprop="availability" content="https://schema.org/InStock" />
										<?php else : ?>
											<meta itemprop="availability" content="https://schema.org/OutOfStock" />
										<?php endif; ?>
										<meta itemprop="availabilityStarts" content="<?php echo esc_attr($start_date); ?>" />
									<?php endif; ?>
									<?php if( !empty($event_options['ticket_link']) ) : ?>
										<span itemprop="priceCurrency" content="<?php echo esc_attr($general_events_options['events_currency_text']); ?>">
											<a class="fw-btn fw-btn-1 fw-btn-sm" itemprop="url" target="_blank" href="<?php echo esc_url($event_options['ticket_link']); ?>"><?php esc_html_e('BUY TICKETS', 'the-core'); ?></a>
										</span>
									<?php endif; ?>
								</div>
							</div>

							<!-- call map shortcode -->
							<?php echo fw_ext_events_render_map() ?>
							<!-- .call map shortcode -->

							<div class="event-content clearfix" itemprop="description">
								<?php the_content(); ?>
							</div>
							<?php do_action( 'fw_theme_ext_events_after_content' ); ?>

							<?php if ( comments_open() ) comments_template(); ?>
						</article>
						<?php break; ?>
					<?php endwhile; ?>
				</div><!-- /.inner -->
			</div><!-- /.content-area -->

			<?php get_sidebar(); ?>
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>
<?php get_footer(); ?>