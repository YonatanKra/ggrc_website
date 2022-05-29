<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		'1.0.0'
	);
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );

/* General - Hide Admin Bar for Non-Admins */

if (!current_user_can('manage_options')) {
	add_filter('show_admin_bar', '__return_false');
}

/* General - Registering New Post Thumbnails */
	
add_image_size( 'card-medium', 400, 300, true );
add_image_size( 'card-initiative', 500, 128, true);

/* General - Remove Page Titles */

function ele_disable_page_title( $return ) {
	return false;
}

add_filter( 'hello_elementor_page_title', 'ele_disable_page_title');

/* General - Redirect After Logout */

add_action('wp_logout','ps_redirect_after_logout');

function ps_redirect_after_logout(){
		$home = get_site_url();
        wp_redirect( $home );
        exit();
}

/* General - Remove Confirmation Log Out */

add_action('check_admin_referer', 'logout_without_confirm', 10, 2);

function logout_without_confirm($action, $result) {
    if ($action == "log-out" && !isset($_GET['_wpnonce'])) {
        $redirect_to = isset($_REQUEST['redirect_to']) ? $_REQUEST['redirect_to'] : 'url-you-want-to-redirect';
        $location = str_replace('&amp;', '&', wp_logout_url($redirect_to));
        header("Location: $location");
        die;
    }
}

/* Layout - Remove Sidebar */

function my_post_layout_class( $class ) {

	// Alter your layout
	if ( is_singular( 'post' ) ) {
		$class = 'full-width';
	}

	// Return correct class
	return $class;

}
add_filter( 'ocean_post_layout_class', 'my_post_layout_class', 20 );

/* BB Press - Remove Breadcrumbs */

add_filter( 'bbp_no_breadcrumb', '__return_true' );

/* Elementor - Escape Remove */

add_filter( 'elementor_pro/dynamic_tags/shortcode/should_escape', '__return_false' ); 

/* Elementor - Query Team Members */

function team_leadership_order( $query ) {
	$query->set( 'post__in', [ 2485, 2488, 2490, 2492, 2494, 2496, 2498, 2500, 2502 ] );
	$query->set( 'order', 'ASC' );
}

add_action( 'elementor/query/team_leadership', 'team_leadership_order' );

function team_advisor_order( $query ) {
	$query->set( 'post__in', [ 2505 ] );
	$query->set( 'order', 'ASC' );
}

add_action( 'elementor/query/team_advisor', 'team_advisor_order' );

function team_intern_order( $query ) {
	$query->set( 'post__in', [ 2507, 2508 ] );
	$query->set( 'order', 'ASC' );
}

add_action( 'elementor/query/team_intern', 'team_intern_order' );

function team_web_order( $query ) {
	$query->set( 'post__in', [ 2509, 2511, 2513, 2514, 2515 ] );
	$query->set( 'order', 'ASC' );
}

add_action( 'elementor/query/team_web', 'team_web_order' );

/* Shortcode - Display Initative Additional Resources */

add_shortcode('initiative_resources', 'initiative_resources_shortcode');

function initiative_resources_shortcode( $atts = [], $content = null) {

	$repeater  = get_post_meta( get_the_ID() , 'additional_resources', true);

	ob_start();
	
	if(!empty($repeater) ) {
			
		echo '<div class="section resources">';
		echo '<h4>Additional Resources</h4>';
		echo '<div class="box">';
		while( the_repeater_field('additional_resources', get_the_ID()) ) { 
			echo '<div class="box-content resource-item">';
			echo '<div class="elementor-icon-wrapper"><div class="elementor-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M364.2 83.8C339.8 59.39 300.2 59.39 275.8 83.8L91.8 267.8C49.71 309.9 49.71 378.1 91.8 420.2C133.9 462.3 202.1 462.3 244.2 420.2L396.2 268.2C407.1 257.3 424.9 257.3 435.8 268.2C446.7 279.1 446.7 296.9 435.8 307.8L283.8 459.8C219.8 523.8 116.2 523.8 52.2 459.8C-11.75 395.8-11.75 292.2 52.2 228.2L236.2 44.2C282.5-2.08 357.5-2.08 403.8 44.2C450.1 90.48 450.1 165.5 403.8 211.8L227.8 387.8C199.2 416.4 152.8 416.4 124.2 387.8C95.59 359.2 95.59 312.8 124.2 284.2L268.2 140.2C279.1 129.3 296.9 129.3 307.8 140.2C318.7 151.1 318.7 168.9 307.8 179.8L163.8 323.8C157.1 330.5 157.1 341.5 163.8 348.2C170.5 354.9 181.5 354.9 188.2 348.2L364.2 172.2C388.6 147.8 388.6 108.2 364.2 83.8V83.8z"/></svg></div></div>';
			echo '<a target="_blank" href="' . get_sub_field('additional_resources_material')  . '">'. get_sub_field('additional_resources_name') . '</a>';
			echo '</div>';
		}
		echo '</div>';
		echo '</div>';
	}

	return ob_get_clean();
}

/* Shortcode - Display Initative Contacts */

add_shortcode('initiative_contacts', 'initiative_contacts_shortcode');

function initiative_contacts_shortcode( $atts = [], $content = null) {

	$repeater  = get_post_meta( get_the_ID() , 'initiative_contact', true);

	ob_start();
	
	if(!empty($repeater) ) {
			
		echo '<div class="section contact">';
		echo '<h2>People For Initiative</h2>';
		echo '<div class="box">';
		while( the_repeater_field('initiative_contact', get_the_ID()) ) { 
			echo '<div class="box-content">';
			echo '<h4 class="contact-name">' . get_sub_field('initiative_contact_name') . '</h4>';
			echo '<span class="contact-title">' . get_sub_field('initiative_contact_title') . '</span>';
			echo '<span class="contact-organisation">' . get_sub_field('initiative_contact_organisation') . '</span>';
			echo '<span class="contact-email"><a href="' . get_sub_field('initiative_contact_email') . '">' . get_sub_field('initiative_contact_email') . '</a></span>';
			echo '</div>';
		}
		echo '</div>';
		echo '</div>';
	}

	return ob_get_clean();
}

/* Shortcode - Display News Articles */

add_shortcode('news_articles', 'news_articles_shortcode');

function news_articles_shortcode( $atts = [], $content = null) {

	$repeater  = get_post_meta( get_the_ID() , 'news_agencies', true);

	ob_start();
	
	if(!empty($repeater) ) {
			
		echo '<div class="section news">';
		echo '<div class="box">';
		while( the_repeater_field('news_agencies', get_the_ID()) ) {
			$agency_id = get_sub_field('news_agency');
			echo '<div class="box-content news-article">';
			echo '<div class="elementor-icon-wrapper icon-external"><div class="elementor-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 64C256 46.33 270.3 32 288 32H415.1C415.1 32 415.1 32 415.1 32C420.3 32 424.5 32.86 428.2 34.43C431.1 35.98 435.5 38.27 438.6 41.3C438.6 41.35 438.6 41.4 438.7 41.44C444.9 47.66 447.1 55.78 448 63.9C448 63.94 448 63.97 448 64V192C448 209.7 433.7 224 416 224C398.3 224 384 209.7 384 192V141.3L214.6 310.6C202.1 323.1 181.9 323.1 169.4 310.6C156.9 298.1 156.9 277.9 169.4 265.4L338.7 96H288C270.3 96 256 81.67 256 64V64zM0 128C0 92.65 28.65 64 64 64H160C177.7 64 192 78.33 192 96C192 113.7 177.7 128 160 128H64V416H352V320C352 302.3 366.3 288 384 288C401.7 288 416 302.3 416 320V416C416 451.3 387.3 480 352 480H64C28.65 480 0 451.3 0 416V128z"/></svg></div></div>';
			echo '<a target="_blank" href="' . get_sub_field('news_article_link') . '">';
			echo '<div class="news-logo"><img alt="Agency Logo" src="' . get_field('news_agency_logo', 'term_'.$agency_id) . '"/></div>';
			echo '</a>';
			echo '</div>';
		}
		echo '</div>';
		echo '</div>';
	}

	return ob_get_clean();
}

function news_meta_boxes() {
	add_action('admin_init', 'ggrc_add_news_meta_boxes', 2);

	function ggrc_add_news_meta_boxes() {
		add_meta_box( 'ggrc_news_agencies', 'News Agencies', 'Repeatable_meta_box_display', 'news', 'normal', 'default');
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
						<a href="<?php the_permalink(); ?>">
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
									<p class="m-0"><i class="ggrc-icon map margin-right"></i> <?php the_field('region') ?></p>
									<p class="m-0"><i class="ggrc-icon users margin-right"></i> <?php the_field('venue') ?></p>
									
							</div>
						</div>
						</a>
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


			<?php if($query->have_posts()){ ?>
				<h4>Related News:</h4>
            		<div class="row">
            	<?php
				 while($query->have_posts()) {
					 $query->the_post(); ?>
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="news-box">
									<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="initiative-cover"/>
								<p class="mb-0"><b><?php the_title(); ?></b></p> 
								<?php the_content(); ?>
								<?php 
								$the_post_id = get_the_ID();
								$news_agencies = get_post_meta($the_post_id, 'news');
								$tags = wp_get_post_terms($the_post_id, 'post_tag', ['']);
								?>
									<div class="mb-20">
									<?php
									if(empty($news_agencies) || ! is_array($news_agencies)){
										echo " ";
									}else{
										foreach($news_agencies[0] as $newsagency){
											?>
											<div class="col-lg-12 col-md-12 col-sm-12 agency-list">
												<i class="ggrc-icon ggrc-external-link"></i> <a href="<?php echo $newsagency['Link'] ?>" target="_blank"><img src="<?php echo z_taxonomy_image_url($newsagency['Agency']); ?>" /></a>
											</div>
											
										<?php 
										}
									}
									?>
									</div>
									<hr class="mb-20" />
									<div>
									<?php
									if(empty($tags) || ! is_array($tags)){
										echo " ";
									}else{
										
										foreach($tags as $key => $posttags){							
											
											?>
											<p style="display: inline;"><a href="#" target="_blank" class="tags"><?php echo esc_html($posttags->name); ?></a></p>
											
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

add_action( 'wp_ajax_save_event', 'save_event' );
function save_event() {
	global $wpdb;

	check_if_user_logged_in();

	$current_user_id = get_current_user_id();
	$postid = $_POST['postid'];

	$table_name = $wpdb->prefix . 'save_events';
	$wpdb->insert($table_name, array('userID' => $current_user_id, 'postID' => $postid));
	
}

function has_current_user_saved_event() {
	global $wpdb;

	$current_user_id = get_current_user_id();
	$postid= get_the_ID();
	$isSaved = $wpdb->get_results("SELECT DISTINCT userID, postID FROM ggrc_save_events WHERE `userID` = '$current_user_id' and `postID` = '$postid' and `isSaved` = 1");

	return $isSaved;
}

function my_excerpt_length($length) {
	return 12;
}
	
add_filter('excerpt_length', 'my_excerpt_length');


function check_users_advisor_request() {
	global $wpdb;

	$current_user_id = get_current_user_id();

	$user_email = $wpdb->get_var("SELECT user_email FROM ggrc_users WHERE `ID` = '$current_user_id'");

	if ($user_email) {
		$form_id = 1341;
		$entries = Forminator_API::get_entries( $form_id );

		for ($i=0; $i < count($entries) ; $i++) { 
			if ($user_email == $entries[$i]->meta_data['hidden-2']['value']) {
				$entry_id = $entries[$i]->entry_id;
			}else{
				$entry_id =0;
			}
		}

		if ($entry_id != 0) {
			$advisor_info = $wpdb->get_results("SELECT meta_key, meta_value FROM ggrc_frmt_form_entry_meta WHERE `entry_id` = '$entry_id'");

			foreach ($advisor_info as $key => $advisor_meta) {
				$meta_key= $advisor_meta->meta_key;
				$meta_value= $advisor_meta->meta_value;

				$advisor_meta_data[$meta_key] = $meta_value;

			}

			return $advisor_meta_data;
		}		
				
	}

	return false;
	
}

/* Add featured image to topics */
add_post_type_support('topic', array('thumbnail'));


/* Messaging */
add_filter( 'fep_menu_buttons', 'fep_cus_fep_menu_buttons', 99 );

function fep_cus_fep_menu_buttons( $menu )
{
    unset( $menu['settings'] );
    unset( $menu['directory'] );
    unset( $menu['announcement'] );
    return $menu;
}

add_filter( 'fep_filter_hide_message_initially_if_read', '__return_false' );

/* Update Profile */

add_action( 'personal_options_update', 'save_my_custom_user_profile_field' );
add_action( 'edit_user_profile_update', 'save_my_custom_user_profile_field' );
function save_my_custom_user_profile_field( ) {
    if ( !current_user_can( 'edit_user', get_current_user_id() ) )
        return false;
    update_user_meta( absint( get_current_user_id() ), 'job_title', wp_kses_post( $_POST['job_title'] ) );
    update_user_meta( absint( get_current_user_id() ), 'organization', wp_kses_post( $_POST['organization'] ) );
    update_user_meta( absint( get_current_user_id() ), 'country', wp_kses_post( $_POST['country'] ) );
    update_user_meta( absint( get_current_user_id() ), 'region', wp_kses_post( $_POST['region'] ) );
}

add_filter( 'wp_nav_menu_objects', 'username_in_menu_items' );
function username_in_menu_items( $menu_items ) {
    foreach ( $menu_items as $menu_item ) {
        if ( strpos($menu_item->title, '#profile_name#') !== false) {
             if ( is_user_logged_in() ) {
				 $current_user = wp_get_current_user();
				 $user_public_name = $current_user->display_name;
				 $user_username = '/members/' . $current_user->user_login;
				 $greet = '<a class="elementor-item" href="'. site_url($user_username) .'">Hey, '. $user_public_name .'!</a>';
				 $menu_item->title =  str_replace("#profile_name#", $greet, $menu_item->title );
             }
        }
    }
 
    return $menu_items;
} 
