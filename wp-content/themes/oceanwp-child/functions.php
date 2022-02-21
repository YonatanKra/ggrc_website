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

if (is_admin()) {
	news_meta_boxes();
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

    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_style( 'font-awesome' );
}