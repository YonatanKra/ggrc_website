<?php
/**
 * OceanWP Child Theme Functions
 *
 * When running a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions will be used.
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

function initiative_actiontype_meta_boxes() {
	add_action('admin_init', 'ggrc_add_initiative_actiontype_meta_boxes', 2);

	function ggrc_add_initiative_actiontype_meta_boxes() {
		add_meta_box( 'ggrc_initiative_actiontype', 'Action Type Link', 'Repeating_meta_box_display', 'initiative', 'normal', 'default');
	}

	function actiontype_row_template($actiontypes, $field = null) {
		?>
			<tr>
				<td>
					<select required type="text" placeholder="Action Type" title="Action Type" name="ActionType[]">
					<option value="" disabled selected>Select a Action Type</option>
						<?php
							foreach ( $actiontypes as $actiontype ) {
								?>
									<option value="<?php echo $actiontype->name; ?>" <?php if (!empty($field['ActionType']) && $actiontype->name == $field['ActionType']) echo 'selected="selected"';?>> <?php echo $actiontype->name; ?></option>
								<?php
							}
						?>
					</select></td>
				<td>
					<input required type="text" placeholder="Action Link" name="ActionLink[]" <?php if (!empty($field['ActionLink'])) { echo 'value="' . $field['ActionLink'] . '"';} ?>/>
					</td>
				<td>
					<a class="button cmb-remove-row-button remove-row <?php if ($field === null) echo 'button-disabled'; ?>" href="#">Remove</a>
				</td>
			</tr>
		<?php
	}

	function Repeating_meta_box_display() {

		global $post;

		$ggrc_initiative_actiontype = get_terms( array(
			'taxonomy' => 'actiontype',
			'hide_empty' => false,
		) );
		$ggrc_actiontype = get_post_meta($post->ID, 'initiative', true);

		 wp_nonce_field( 'ggrc_repeating_meta_box_nonce', 'ggrc_repeating_meta_box_nonce' );
		?>
		<script type="text/javascript">
		jQuery(document).ready(function( $ ){
			const tbody = document.querySelector("#repeatable-fieldset-three tbody");

			$( '#add-rows' ).on('click', function() {
				const rowWrapper = document.createElement('tbody');
				rowWrapper.innerHTML = `<?php actiontype_row_template($ggrc_initiative_actiontype); ?>`;
				const row = rowWrapper.children[0];
				const lastChild = tbody.children[tbody.children.length - 1];
				tbody.insertBefore( row, lastChild );
				return false;
			});

			$( '.remove-row' ).on('click', function() {
				$(this).parents('tr').remove();
				return false;
			});
		});
		</script>
		<table id="repeatable-fieldset-three" width="100%">
		<tbody>
			<?php
			if ( $ggrc_actiontype ) :
				foreach ( $ggrc_actiontype as $field ) {
					actiontype_row_template($ggrc_initiative_actiontype, $field);
				}
			else :
				// show a blank one
				actiontype_row_template($ggrc_initiative_actiontype);
			endif; ?>
		</tbody>
		</table>
		<p><a id="add-rows" class="button" href="#">Add another</a></p>
		<?php
	}
}

function news_meta_boxes() {
	add_action('admin_init', 'ggrc_add_news_meta_boxes', 2);

	function ggrc_add_news_meta_boxes() {
		add_meta_box( 'ggrc_news_agencies', 'News Agencies', 'Repeatable_meta_box_display', 'news', 'normal', 'default');
	}

	function agency_row_template($agencies, $field = null) {
		?>
			<tr>
				<td>
					<select required type="text" placeholder="Agency" title="Agency" name="Agency[]">
					<option value="" disabled selected>Select a news agency</option>
						<?php
							foreach ( $agencies as $agency ) {
								?>
									<option value="<?php echo $agency->term_id; ?>" <?php if ($field && $agency->term_id == $field['Agency']) echo 'selected="selected"'?>> <?php echo $agency->name; ?></option>
								<?php
							}
						?>
					</select></td>
				<td>
					<input required type="text" placeholder="Link" name="Link[]" <?php if ($field) echo 'value="' . $field['Link'] . '"' ?>/>
					</td>
				<td>
					<a class="button cmb-remove-row-button <?php if ($field === null) echo 'button-disabled'; ?>" href="#">Remove</a>
				</td>
			</tr>
		<?php
	}

	function Repeatable_meta_box_display() {

		global $post;

		$ggrc_news_agencies = get_terms( array(
			'taxonomy' => 'news_agencies',
			'hide_empty' => false,
		) );
		$ggrc_news = get_post_meta($post->ID, 'news', true);

		 wp_nonce_field( 'ggrc_repeatable_meta_box_nonce', 'ggrc_repeatable_meta_box_nonce' );
		?>
		<script type="text/javascript">
		jQuery(document).ready(function( $ ){
			const tbody = document.querySelector("#repeatable-fieldset-one tbody");

			$( '#add-row' ).on('click', function() {
				const rowWrapper = document.createElement('tbody');
				rowWrapper.innerHTML = `<?php agency_row_template($ggrc_news_agencies); ?>`;
				const row = rowWrapper.children[0];
				const lastChild = tbody.children[tbody.children.length - 1];
				tbody.insertBefore( row, lastChild );
				return false;
			});

			$( '.remove-row' ).on('click', function() {
				$(this).parents('tr').remove();
				return false;
			});
		});
		</script>
		<table id="repeatable-fieldset-one" width="100%">
		<tbody>
			<?php
			if ( $ggrc_news ) :
				foreach ( $ggrc_news as $field ) {
					agency_row_template($ggrc_news_agencies, $field);
				}
			else :
				// show a blank one
				agency_row_template($ggrc_news_agencies);
			endif; ?>
		</tbody>
		</table>
		<p><a id="add-row" class="button" href="#">Add another</a></p>
		<?php
	}
	add_action('save_post', 'custom_repeatable_meta_box_save');
	function custom_repeatable_meta_box_save($post_id) {
		if ( ! isset( $_POST['ggrc_repeatable_meta_box_nonce'] ) ||
		! wp_verify_nonce( $_POST['ggrc_repeatable_meta_box_nonce'], 'ggrc_repeatable_meta_box_nonce' ) )
			return;

		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
			return;

		if (!current_user_can('edit_post', $post_id))
			return;

		$old = get_post_meta($post_id, 'news', true);
		$new = array();
		$agencies = $_POST['Agency'];
		$links = $_POST['Link'];
		 $count = count( $agencies );
		 for ( $i = 0; $i < $count; $i++ ) {
			if ( $agencies[$i] != '' ) :
				$new[$i]['Agency'] = stripslashes( strip_tags( $agencies[$i] ) );
				 $new[$i]['Link'] = stripslashes( $links[$i] ); // and however you want to sanitize
			endif;
		}
		if ( !empty( $new ) && $new != $old )
			update_post_meta( $post_id, 'news', $new );
		elseif ( empty($new) && $old )
			delete_post_meta( $post_id, 'news', $old );


	}
}

function initiative_meta_boxes() {
	add_action('admin_init', 'ggrc_add_initiative_meta_boxes', 2);

	function ggrc_add_initiative_meta_boxes() {
		add_meta_box( 'ggrc_initiative_updates', 'Initiative Updates', 'Repeat_meta_box_display', 'initiative', 'normal', 'default');
	}

	function updates_row_template($updates, $field = null) {
		?>
			<tr>
                <td>
                <input required type="text" placeholder="Update Title" name="UpdateTitle[]" <?php if (!empty($field['UpdateTitle'])) echo 'value="' . $field['UpdateTitle'] . '"' ?>/>

				</td>
                <td>
                <input required type="date" placeholder="Date" name="UpdateDate[]" <?php if (!empty($field['UpdateDate'])) echo 'value="' . $field['UpdateDate'] . '"' ?>/>

				</td>
				<td>
                    <textarea rows="3" placeholder="Initiative Updates" name="Update[]"><?php if (!empty($field['Update'])) echo $field['Update'] ;?></textarea>
				</td>
				<td>
					<a class="button cmb-remove-row-button remove-row <?php if ($field === null) echo 'button-disabled'; ?>" href="#">Remove</a>
				</td>
			</tr>
		<?php
	}

	function Repeat_meta_box_display() {

		global $post;

		$ggrc_initiative_updates = get_terms( array(
			//'taxonomy' => 'initiative_updates',
			'hide_empty' => false,
		) );
		$ggrc_initiative = get_post_meta($post->ID, 'initiative', true);

		 wp_nonce_field( 'ggrc_repeat_meta_box_nonce', 'ggrc_repeat_meta_box_nonce' );
		?>
		<script type="text/javascript">
		jQuery(document).ready(function( $ ){
			const tbody = document.querySelector("#repeatable-fieldset-two tbody");

			$( '#add-row' ).on('click', function() {
				const rowWrapper = document.createElement('tbody');
				rowWrapper.innerHTML = `<?php updates_row_template($ggrc_initiative_updates); ?>`;
				const row = rowWrapper.children[0];
				const lastChild = tbody.children[tbody.children.length - 1];
				tbody.insertBefore( row, lastChild );
				return false;
			});

			$( '.remove-row' ).on('click', function() {
				$(this).parents('tr').remove();
				return false;
			});
		});
		</script>
		<table id="repeatable-fieldset-two" width="100%">
		<tbody>
			<?php
			if ( $ggrc_initiative ) :
				foreach ( $ggrc_initiative as $field ) {
					updates_row_template($ggrc_initiative_updates, $field);
				}
			else :
				// show a blank one
				updates_row_template($ggrc_initiative_updates);
			endif; ?>
		</tbody>
		</table>
		<p><a id="add-row" class="button" href="#">Add another</a></p>
		<?php
	}
	add_action('save_post', 'custom_repeat_meta_box_save');
	function custom_repeat_meta_box_save($post_id) {
		if ( ! isset( $_POST['ggrc_repeat_meta_box_nonce'] ) ||
		! wp_verify_nonce( $_POST['ggrc_repeat_meta_box_nonce'], 'ggrc_repeat_meta_box_nonce' ) )
			return;

		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
			return;

		if (!current_user_can('edit_post', $post_id))
			return;

		$old = get_post_meta($post_id, 'initiative', true);
		$new = array();
		$title = $_POST['UpdateTitle'];
        $date = $_POST['UpdateDate'];
		$updates = $_POST['Update'];
		$actiontype = $_POST['ActionType'];
		$links = $_POST['ActionLink'];

		$countaction = count( $actiontype );
		for ( $i = 0; $i < $countaction; $i++ ) {
			if ( $actiontype[$i] != '' ) :
				$new[$i]['ActionType'] = stripslashes( strip_tags( $actiontype[$i] ) );
				$new[$i]['ActionLink'] = stripslashes( $links[$i] ); // and however you want to sanitize
			endif;
		}

		$count = count( $updates );
		for ( $i = 0; $i < $count; $i++ ) {
			if ( $updates[$i] != '' ) :
				$new[$i]['UpdateTitle'] = stripslashes( strip_tags( $title[$i] ));
                $new[$i]['UpdateDate'] = $date[$i];
				$new[$i]['Update'] = stripslashes( strip_tags( $updates[$i] )); // and however you want to sanitize
			endif;
		}

		if ( !empty( $new ) && $new != $old )
			update_post_meta( $post_id, 'initiative', $new );
		elseif ( empty($new) && $old )
			delete_post_meta( $post_id, 'initiative', $old );

	}
}

if (is_admin()) {
	news_meta_boxes();
	initiative_meta_boxes();
	initiative_actiontype_meta_boxes();
}

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
function oceanwp_child_enqueue_parent_style() {

	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update the theme).
	$theme   = wp_get_theme( 'OceanWP' );
	$version = $theme->get( 'Version' );

	// Load the stylesheet.
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), $version );

}

add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );

add_action( 'wp_enqueue_scripts', 'theme_assets' );
function theme_assets() {
    wp_register_style( 'bootstrap', get_stylesheet_directory_uri() . '/assets/bootstrap-4.4.1-dist/css/bootstrap-grid.css' );
	wp_register_style( 'font-awesome', get_stylesheet_directory_uri() . '/assets/fontawesome-free-6.0.0-web/css/all.css' );
	wp_register_style( 'template-styling', get_stylesheet_directory_uri() . '/assets/css/template-styles.css' );
	wp_register_style( 'bbpress', get_stylesheet_directory_uri() . '/assets/css/third/bbpress.min.css' );

    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_style( 'font-awesome' );
	wp_enqueue_style( 'template-styling');
	wp_enqueue_style( 'bbpress' );
}

add_action( 'get_action_initiatives_by_region', 'add_action_initiatives_by_region' );
function add_action_initiatives_by_region() {

    // check if we're in the initiative post type
    if( is_singular( 'initiative' ) ) {

        $postid= get_the_ID();
        // fetch taxonomy terms for current initiative
        $initiative_region = get_post_custom_values('region', $postid );

        if( $initiative_region ) {

            // set up the query arguments
            $args = array (
                'post_type' => 'initiative',
				'meta_value' => $initiative_region[0],
                'post__not_in' => array($postid),
                'posts_per_page' => 4,
                'nopaging' => true,
				'tax_query' => array(
						array(
						'taxonomy' => 'initiative_type',
						'field' => 'slug',
						'terms' => array( 'take-action' ),
						)),
            );

            // run the query
            $query = new WP_Query( $args );

            ?>

			<?php if($query->have_posts()){
				?>
				<h4 class="mt-60">Take action on <?php echo $initiative_region[0]; ?> related initiatives</h4>
            	<div class="row">
				<?php
				 while($query->have_posts()) {
					 $query->the_post(); ?>
					<div class="col-lg-3 col-md-6 col-sm-12">
						<div class="initiative-list">
							<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="initiative-cover"/>
								
							<div class="initiative-list-detail">
							<?php 
								
								$the_post_id = get_the_ID();
								$action = wp_get_post_terms($the_post_id, 'initiative_type', ['']);
								
								if(empty($action) || ! is_array($action)){
									echo "";
								}else{
									
									foreach($action as $key => $take_action){
										
										?>
										<p class="action-type"> 
										<i class="ggrc-icon exclamation-mark"></i> <?php echo esc_html($take_action->name); ?></p>
									<?php 
										
									}
								}?>
									<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
									<?php the_excerpt(); ?>
									<hr/>
									<p class="no-margin"><i class="ggrc-icon map margin-right"></i> <?php the_field('venue') ?></p>
									<p class="no-margin"><i class="ggrc-icon users margin-right"></i> <?php the_field('region') ?></p>
									
							</div>
						</div>
					</div>
			<?php } ?>
            <?php wp_reset_postdata(); ?>
			<?php } ?>

			</div>
        <?php

        }
    }
}

function get_followers_by_post_id($postid){

	global $wpdb;

	$posts = $wpdb->get_results("SELECT DISTINCT userID FROM ggrc_follow_posts WHERE `postID` = '$postid' and `isFollowing` = 1");

	return $posts;
}

add_action( 'get_related_news', 'add_related_news_to_initiative_pages' );
function add_related_news_to_initiative_pages() {

    // check if we're in the initiative post type
    if( is_singular( 'initiative' ) ) {

        $postid= get_the_ID();
        // fetch taxonomy terms for current initiative
        $initiativeterms = get_the_terms( get_the_ID(), 'initiative_tags'  );

        if( $initiativeterms ) {

            foreach( $initiativeterms as $initiativeterm ) {

                $initiativetermnames[] = $initiativeterm->slug;

            }

            // set up the query arguments
            $args = array (
                'post_type' => 'news',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'post_tag',
                        'field'    => 'slug',
                        'terms'    => $initiativetermnames,
                        'operator' => 'IN',

                    ),
                ),
                'post__not_in' => array($postid),
                'posts_per_page' => 3,
                'nopaging' => true,
            );

            // run the query
            $query = new WP_Query( $args );

            ?>
            <h4>Related News:</h4>
            <div class="row">

			<?php if($query->have_posts()){
				 while($query->have_posts()) {
					 $query->the_post(); ?>
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="news-box">
						<h3><?php the_title(); ?></h3>
						<?php
						$the_post_id = get_the_ID();
						$news_agencies = get_post_meta($the_post_id, 'news');
						$tags = wp_get_post_terms($the_post_id, 'post_tag', ['']);
						?>
							<div class="mb-20">
							<?php
							if(empty($news_agencies) || ! is_array($news_agencies)){
								echo "No news agency";
							}else{
								foreach($news_agencies[0] as $newsagency){
									?>
									<a href="<?php echo $newsagency['Link'] ?>" target="_blank"><img src="<?php echo z_taxonomy_image_url($newsagency['Agency']); ?>" width="10%" /></a>

								<?php
								}
							}
							?>
							</div>
							<div>
							<?php
							if(empty($tags) || ! is_array($tags)){
								echo "No Tags";
							}else{

								foreach($tags as $key => $posttags){

									?>
									<a href="<?php echo get_term_link($posttags->term_id, 'post_tag'); ?>" target="_blank" class="tags"><?php echo esc_html($posttags->name); ?></a>

								<?php

								}
							}
							?>
							</div>
					</div>
				</div>
			<?php } ?>
            <?php wp_reset_postdata(); ?>
			<?php } ?>

			</div>
        <?php

        }
    }
}

function check_if_user_logged_in() {
	if ( !is_user_logged_in() ) {

		wp_redirect('http://localhost/ggrc_website/');

		exit;
	}
}

add_action( 'wp_ajax_follow_post', 'follow_initiative' );
function follow_initiative() {
	global $wpdb;

	check_if_user_logged_in();

	$current_user_id = get_current_user_id();
	$postid = $_POST['postid'];

	$table_name = $wpdb->prefix . 'follow_posts';
	$wpdb->insert($table_name, array('userID' => $current_user_id, 'postID' => $postid));
	
}

add_action( 'wp_ajax_unfollow_post', 'unfollow_initiative' );
function unfollow_initiative() {
	global $wpdb;

	check_if_user_logged_in();
	
	$current_user_id = get_current_user_id();
	$postid = $_POST['postid'];
	$table_name = $wpdb->prefix . 'follow_posts';

	$wpdb->query($wpdb->prepare("UPDATE $table_name SET isFollowing = '0' WHERE userID = '$current_user_id' and postID = '$postid'"));
	

}

function is_current_user_following() {
	global $wpdb;

	$current_user_id = get_current_user_id();
	$postid= get_the_ID();
	$isfollowing = $wpdb->get_results("SELECT DISTINCT userID, postID FROM ggrc_follow_posts WHERE `userID` = '$current_user_id' and `postID` = '$postid' and `isFollowing` = 1");

	return $isfollowing;
}

/* Blog Functions */
function add_blog_category($classes) {
	$blogcat = wp_get_post_terms(get_the_ID(), 'blog-category', ['']);
	if (empty($blogcat)) {
        return $classes;
    }
	$classes[] = strtolower($blogcat[0]->name);

	return $classes;
}
add_filter('body_class', 'add_blog_category');

add_post_type_support('topic', array('thumbnail'));
?>
