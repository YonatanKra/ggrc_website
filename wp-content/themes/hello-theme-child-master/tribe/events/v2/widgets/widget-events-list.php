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

foreach($get_posts as $post) { 
	setup_postdata($post); ?>
		<div class="thumbList">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('thumbnail', array('class' => 'scale-with-grid attachment-thumbnail')); ?>
			</a>
		</div>
		<div class="event-excerpt">
			<h6 class="event-title">
				<span class="front-start-time">
					<?php echo tribe_get_start_date( $post->ID, false, 'Y M j g:i a' ); ?>
				</span>
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h6>
			<?php the_excerpt(); ?>
		</div>	
<?php } //endforeach ?>
<?php wp_reset_query(); ?>
