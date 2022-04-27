
<?php
/**
 * The Header for our theme.
 *
 * @package OceanWP WordPress theme
 */

?>
<!DOCTYPE html>
<html class="<?php echo esc_attr( oceanwp_html_classes() ); ?>" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<style>
		div.wp_ulike_general_class.wp_ulike_is_not_liked, li.ess-total-share.ess-social-networks, .ess-social-network-lists li:first-child {
			display:none !important;
		}
		li.ess-all-networks.ess-social-networks{
			background: transparent !important;
		}
		span.ess-all-networks-button{
			color: transparent !important;
		}
		#ess-main-wrapper #ess-wrap-inline-networks.ess-inline-networks-container{
			margin-top:-70px;
		}		
	</style>
</head>

<body <?php body_class(); ?> <?php oceanwp_schema_markup( 'html' ); ?>>

	<?php wp_body_open(); ?>

	<?php do_action( 'ocean_before_outer_wrap' ); ?>

	<div id="outer-wrap" class="site clr">

		<a class="skip-link screen-reader-text" href="#main"><?php oceanwp_theme_strings( 'owp-string-header-skip-link', 'oceanwp' ); ?></a>

		<?php do_action( 'ocean_before_wrap' ); ?>

		<div id="wrap" class="clr">

			<?php do_action( 'ocean_top_bar' ); ?>

			<?php do_action( 'ocean_header' ); ?>

			<?php do_action( 'ocean_before_main' ); ?>

			<main id="main" class="site-main clr"<?php oceanwp_schema_markup( 'main' ); ?> role="main">			

				<?php do_action( 'ocean_before_content_wrap' ); ?>
				<?php while ( have_posts() ) :
							the_post(); 

								?>
					
								<div class="action-subheader">
								<?php $initiative_url = get_site_url(null, '/initiative', null); ?>
								<a href="<?php echo $initiative_url; ?>">back to explore initiatives</a>
								<hr width="40%"/>
									<div class="row mt-30">
										
										<div class="col-md-2 col-lg-2 col-sm-4">
										<i class="ggrc-icon users margin-right"></i>  <?php the_field('venue') ?>
										</div>
										<div class="col-md-2 col-lg-2 col-sm-4">
										<i class="ggrc-icon map-pin margin-right"></i> <?php the_field('region') ?>
										</div>

										<div class="col-md-2 col-lg-2 col-sm-4">
											<i class="ggrc-icon clock margin-right"></i> last updated <?php the_modified_time('F jS, Y') ?>
										</div>
										
													
										<div class="col-md-1 col-lg-1 col-sm-1">
										</div>
										<div class="col-md-5 col-lg-5 col-sm-6 align-center mb-30">
											<a href="<?php the_field('website') ?>" target="_blank" class="initiative-website">View site</a>
											
											<li class="ess-all-networks ess-social-networks ess-list">
												<div class="ess-social-network-link">
													
													<span class="ess-all-networks-button initiative-share" style="color:#0B4F6D !important"><i class="ggrc-icon share-2"></i> share initiative</span>
												</div>
											</li>
											
											<?php 
												$user_following =is_current_user_following();											
												if (!empty($user_following)){
													?>
													<button id="unfollow" class="template-btn"> following initiative </button>
													<?php } else{ ?>
													<button id="follow" class="template-btn"> follow initiative</button>
													<?php }  
											?>
										</div>
										
									</div>
									<div class="row">
										<div class="col-md-5 col-lg-5 col-sm-12">
									
										<h2><?php the_title(); ?></h2>
										<span class="initiative-content"><?php the_content(); ?></span>
										<?php 
										$the_post_id = get_the_ID();
										$tags = wp_get_post_terms($the_post_id, 'initiative_tags', ['']);
										
										if(empty($tags) || ! is_array($tags)){
											echo " ";
										}else{

											foreach($tags as $key => $posttags){
												?>
												<a href="<?php echo get_term_link($posttags->term_id, 'initiative_tags'); ?>" target="_blank" class="tags mt-30"><?php echo esc_html($posttags->name); ?></a>
												
											<?php 
												
											}
										} ?>

									<div class="row mt-30">
									<div class="col-md-12 col-lg-12 col-sm-12">	
										<div class="row">									
											<?php 
												$attachmentID = get_post_custom_values('additional-resources-1');
												
												if(!empty($attachmentID[0])){ ?>												
												<div class="col-md-12 col-lg-12 col-sm-12">
													<p><b>Additional Resource</b></p>
												</div>
												<div class="col-md-12 col-lg-5 col-sm-12 add-resources">
													
												<i class="ggrc-icon attachment"></i>
													<?php 

													$attachedFile=get_attached_file($attachmentID[0]);

													?><a href="../../../<?php echo trim($attachedFile, "C:\'xampp\htdocs\'"); ?>" target="_blank"><?php the_field('additional-resources-name-1'); ?></a>

												</div>
											<?php } 

												$attachmentID1 = get_post_custom_values('additional-resources-2');
												if(!empty($attachmentID1[0])){ 
											?>
												<div class="col-md-12 col-lg-5 col-sm-12 add-resources">
												<i class="ggrc-icon attachment"></i> 
														<?php 

														$attachedFile1=get_attached_file($attachmentID1[0]);

														?><a href="../../../<?php echo trim($attachedFile1, "C:\'xampp\htdocs\'"); ?>" target="_blank"><?php the_field('additional-resources-name-2'); ?></a>

													</div>
												<?php } ?>
											
										</div>
									</div>
								</div>
										
										<hr class="mt-30"/>
										<p class="ggrc-initiative-priorities"><b>GGRC priorities: </b> <?php the_field('ggrc-priorities'); ?></p>
										<hr class="mb-60"/>
										
										</div>
										<div class="col-md-7 col-lg-7 col-sm-12">
											<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="mt-30"/>
										</div>
									</div>

								</div>	
					
					<?php endwhile; ?>
		<div id="content-wrap" class="container clr" style="padding-top:100px">

		<?php do_action( 'ocean_before_primary' ); ?>

		
		<div id="primary" class="content-area clr no-border">

			<?php do_action( 'ocean_before_content' ); ?>

			<div id="content" class="site-content clr">

				<?php do_action( 'ocean_before_content_inner' ); ?>

				<?php
				// Elementor `single` location.
				if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {

					// Start loop.
					while ( have_posts() ) :
						the_post(); 

							$the_post_id = get_the_ID();
					
							$type = wp_get_post_terms($the_post_id, 'initiative_type', ['']);
							
							if(!empty($type) && is_array($type)){
								
								if($type[0]->name == "Take Action"){								

								?>
						<div class="initiative-take-action-bar">
							<div class="row">
								<div class="col-md-6 col-lg-6 col-sm-12">
									<div class="row">
										<div class="col-md-12 col-lg-12 col-sm-12 align-center">
											<h2 class="no-margin-bottom">How to Take Action:</h2>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-lg-6 col-sm-12 center-element">
									<div class="row">
										<div class="col-md-12 col-lg-12 col-sm-12 align-center">
										<a href="<?php the_field('intiative-action-link') ?>" target="_blank" class="action-btn">
										<?php the_field('initiative-action-type') ; ?></a>
									</div>
						
									</div>
								</div>
							</div>
						</div>

						<?php } 
							} ?>

						<div class="row mt-60">	
						<div class="col-md-12 col-lg-12 col-sm-12" id="initiative-contact">
							<h3>People for Initiative</h3>
						</div>
								<?php 
									$post_id = get_the_ID();
									for ( $i = 1; $i <= 3; $i++ ){
									
										$id= get_post_custom_values('initiative-contact-'. $i, $post_id);
										if (!empty($id[0])){ ?>
									<div class="col-md-4 col-lg-4 col-sm-12" id="initiative-contact">
										<?php	
												$user_id = intval($id[0]);
												$contact_name = get_the_author_meta( 'display_name', $user_id );
													
												echo get_avatar($user_id, 60);										
										?>
									
										<div class="initiative-contact-details">
											<h4 class="no-margin-bottom"><?php echo $contact_name ?></h4>
											<p class="no-margin-bottom">title</p>
											<p class="no-margin-bottom">organisation</p>
										</div>
										<div class="initiative-contact-profile">									
											<a href="#" target="_blank" class="profile">view profile</a>
											<a href="#" target="_blank" class="template-btn"> send message</a>
										</div>
									</div>
								<?php }
								} ?>
							
							
						</div>
											
						<?php
						
						comments_template();
						?>
						<h3>Updates</h3>
						<br>
						<?php
						$initiative_updates = get_post_meta($the_post_id, 'initiative');
						if(empty($initiative_updates) || ! is_array($initiative_updates)){
							echo "No Updates";
						}else{
							?> 
							<div class="row">
								<div class="col-md-12 col-lg-12 col-sm-12">
								<?php
								foreach($initiative_updates[0] as $initiative_update){
									if(!empty($initiative_update['UpdateTitle'])){
									?>
									<p class="no-margin-bottom links"><?php echo date('F j, Y', strtotime($initiative_update['UpdateDate'])); ?></p>
									<h3 class="no-margin-bottom"><?php echo $initiative_update['UpdateTitle']; ?></h3>								
									<p><?php echo $initiative_update['Update']; ?></p>
									
									<?php 
									}
								}
								?>
								</div>
							</div>	
							<br>
							<?php
						} 

						do_action('get_related_news');	
						do_action('get_action_initiatives_by_region');					

					endwhile;

				}
				?>

				<?php do_action( 'ocean_after_content_inner' ); ?>

			</div><!-- #content -->

			<?php do_action( 'ocean_after_content' ); ?>

		</div><!-- #primary -->

		<?php do_action( 'ocean_after_primary' ); ?>

	</div><!-- #content-wrap -->

	<?php do_action( 'ocean_after_content_wrap' ); ?>

<?php get_footer(); ?>


<script>
	jQuery(document).ready(function($) {
		
		$('#follow').click(function(){
			
			ajaxurl = '<?php echo admin_url( 'admin-ajax.php' ) ?>'; // get ajaxurl

			var data = {
				'action': 'follow_post', // your action name 
				'postid': '<?php echo get_the_ID(); ?>' // some additional data to send
			};

			jQuery.ajax({
				url: ajaxurl, // this will point to admin-ajax.php
				type: 'POST',
				data: data,
				success: function (response) {
					console.log(response); 
					$("#follow").html("following initiative");
					$('#follow').attr('id','unfollow'); 					               
				}
			});
		});

		$('#unfollow').click(function(){
			ajaxurl = '<?php echo admin_url( 'admin-ajax.php' ) ?>'; // get ajaxurl

			var data = {
				'action': 'unfollow_post', // your action name 
				'postid': '<?php echo get_the_ID(); ?>' // some additional data to send
			};

			jQuery.ajax({
				url: ajaxurl, // this will point to admin-ajax.php
				type: 'POST',
				data: data,
				success: function (response) {
					console.log(response); 
					$("#unfollow").html("follow initiative");
					$('#unfollow').attr('id','follow');                
				}
			});
		});


		$("#wpd-field-submit-0_0").val("comment");	
		$("#reply-title").html("Comments");		
		$('.ql-editor').attr('placeholder', 'Write your comment...');
		
	});
</script>
