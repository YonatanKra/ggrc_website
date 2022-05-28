<?php
/**
 * Widget: Events List
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/widgets/widget-events-list.php
 *
 * See more documentation about our views templating system.
 *
 * @link    http://evnt.is/1aiy
 *
 * @since 5.3.0
 * @since 5.4.0   Remove passed vars - rely on widget object in view more template.
 *
 * @version 5.12.0
 *
 * @var array<\WP_Post>      $events                     The array containing the events.
 * @var string               $rest_url                   The REST URL.
 * @var string               $rest_nonce                 The REST nonce.
 * @var int                  $should_manage_url          int containing if it should manage the URL.
 * @var array<string>        $compatibility_classes      Classes used for the compatibility container.
 * @var array<string>        $container_classes          Classes used for the container of the view.
 * @var array<string,mixed>  $container_data             An additional set of container `data` attributes.
 * @var string               $breakpoint_pointer         String we use as pointer to the current view we are setting up with breakpoints.
 * @var array<string,string> $messages                   An array of user-facing messages, managed by the View.
 * @var boolean              $hide_if_no_upcoming_events Hide widget if no events.
 * @var string               $json_ld_data               The JSON-LD for widget events, if enabled.
 * @var string               $widget_title               The title of the widget.
 */

// Hide widget if no events and widget only displays with events is checked.
if ( empty( $events ) && $hide_if_no_upcoming_events ) {
	return;
}
?>
<?php
	global $post;

	$get_posts = tribe_get_events(
		array(
			'posts_per_page'    =>  5
		) 
	);
?>
<div class="event-list">
<?php foreach($get_posts as $post) { 
	setup_postdata($post); ?>
		<a href="<?php the_permalink(); ?>" class="event-item" title="<?php the_title(); ?>">
			<div class="event-photo">
				<?php the_post_thumbnail('thumbnail'); ?>
				<div class="event-day">
					<span><?php echo tribe_get_start_date( $post->ID, false, 'j' ); ?></span>
				</div>
			</div>
			<div class="event-info">
				<h4 class="event-title">
					<?php the_title(); ?>
				</h4>
				<div class="event-time">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z"/></svg>
					<?php echo tribe_get_start_date( $post->ID, false, 'g:i a' ); ?>
				</div>
			</div>	
		</a>
	
<?php } //endforeach ?>
<?php wp_reset_query(); ?>
</div>
