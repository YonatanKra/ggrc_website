<?php

/* Template Name: Home Page Template */ 

get_header(); ?>

<?php do_action( 'ocean_before_content_wrap' ); ?>

	<div id="content-wrap" class="container-fluid clr">

		<?php do_action( 'ocean_before_primary' ); ?>

		<div id="primary" class="content-area clr">

			<div class="row mb-5 home-banner">
				<div class="col-12 col-lg-10">
					<h1 class="banner-title">Reimagine.</h1>
					<h1 class="banner-title">Recover.</h1>
					<h1 class="banner-title">Inspire Together.</h1>
					<h3 class="mt-5">What is Green Recovery?</h3>
					<p>Green recovery is a process that transforms how people live and interact with each other and our environment to repair our climate and ecosystems, recover from past environmental damage, and become healthy, resilient, and equitable.</p>
					<a href="<?php the_permalink(923); ?>" class="btn btn-outline-primary btn-lg mt-5">Join our Collaborative</a>
				</div>
			</div>

			<?php do_action( 'ocean_before_content' ); ?>

			<div id="content" class="container overflow-hidden site-content clr">

				<?php do_action( 'ocean_before_content_inner' ); ?>

				<div class="row mb-5">
					<div class="col-12">
						<h2 class="text-center mb-5">How it Works</h2>
					</div>
					<div class="col-12 col-lg-4 mb-5 mb-md-0">
						<div class="how-it-works">
							<?php echo wp_get_attachment_image( 1756 , 'medium', "", array( "class" => "img-responsive" ) );  ?>
							<div class="home-learn">
								<h1 class="banner-title inline-display">1.</h1>
								<h2 class="home-learn-title">Learn</h2>
								<p>Access initiatives, people, and curated events for knowledge, ideas, and model projects.</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-4 mb-5 mb-md-0">
						<div class="how-it-works">
							<?php echo wp_get_attachment_image( 1754 , 'medium', "", array( "class" => "img-responsive" ) );  ?>
							<div class="home-learn">
								<h1 class="banner-title inline-display">2.</h1>
								<h2 class="home-learn-title">Act</h2>
								<p>Connect with initiatives, advise fellow GGRC members, join discussions, and write blogs</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-4">
						<div class="how-it-works">
							<?php echo wp_get_attachment_image( 1757 , 'medium', "", array( "class" => "img-responsive" ) );  ?>
							<div class="home-learn">
								<h1 class="banner-title inline-display">3.</h1>
								<h2 class="home-learn-title">Collaborate</h2>
								<p>Team-up with GGRC members, co-develop solutions, grow your network, share resources, and form coalitions.</p>
							</div>
						</div>
					</div>
				</div>

				<div class="row mb-5">
					<div class="col-12">
						<h2 class="text-center mb-4">What is the Global Green Recovery Collaborative?</h2>
						<p class="text-center">The Global Green Recovery Collaborative gets people talking and acting together! We aim to promote action and collaboration to achieve a green recovery from Covid-19 and other past and future environmental challenges. Learn from our partner initiatives and become a member to connect with the GGRC community.</p>
					</div>
				</div>

				<?php
				// Elementor `single` location.
				if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {

					// Start loop.
					while ( have_posts() ) :
						the_post();

						get_template_part( 'partials/page/layout' );

					endwhile;

				}
				?>

				<?php do_action( 'ocean_after_content_inner' ); ?>

			</div><!-- #content -->

			<div class="container-fluid mt-5 mb-5">
				<div class="row mb-5 why-join-banner">
					<div class="col-12 col-md-6 offset-md-1">
						<h2>Why should I join?</h2>
						<p class="mb-5">We need diverse voices to speak up for green recovery at every level. When you join our collaborative, you join local and global communities who are learning, collaborating, and taking action together for change.</p>
						<a href="<?php the_permalink(923); ?>" class="btn btn-primary btn-lg">Join Us!</a>
					</div>
				</div>
			</div>

			<div class="container mb-5">
				<div class="row">
					<div class="col-12">
						<h2 class="text-center mb-4">Meet our newest initiatives!</h2>
							<?php

							$args = array (
								'post_type'=> 'initiative',
								'showposts' => 3
							);

							$the_query = new WP_Query($args);

							?>

							<div class="row">
								<?php if($the_query->have_posts()){ while($the_query->have_posts()) { $the_query->the_post(); ?>
									<div class="col-12 col-md-4">
										<div class="card initiative-list">
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail('medium', ['class' => 'initiative-cover', ]); ?>
											</a>
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
												<a href="<?php the_permalink(); ?>">
													<?php the_title( '<h4>', '</h4>' ); ?>
												</a>
												<?php the_excerpt(); ?>
												<hr/>
												<p class="m-0"><i class="ggrc-icon map margin-right"></i> <?php the_field('region') ?></p>
												<p class="m-0"><i class="ggrc-icon users margin-right"></i> <?php the_field('venue') ?></p>
											</div>
										</div>
									</div>
								<?php }} ?>
								<a href="initiative" class="mt-2 text-center">explore more initiatives</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>	

			<div class="container-fluid mb-5">
				<div class="row suggest-initiative-home p-5">
					<div class="col-12 col-md-4 offset-md-7 text-center">
						<h4>Suggest an initiative</h4>
						<p class="mb-5">Do you want to share your program, project, or campaign with the GGRC community? Suggest your initiative to our team!</p>
						<a href="<?php the_permalink(1110); ?>" class="btn btn-primary">Suggest</a>
					</div>
				</div>									
			</div>

			<div class="container">
				<div class="row mb-5">
					<div class="col-12 col-md-4 mb-5 mb-md-0">
						<h4 class="text-center m-0">Events</h4>
						<hr class="mt-0 mb-20" />
						<?php

						$single = new MEC_skin_single();

						$args = array (
							'post_type'=> 'mec-events',
							'showposts' => 2
						);

						$the_query = new WP_Query($args);

						?>
						
						<?php if($the_query->have_posts()){ while($the_query->have_posts()) { $the_query->the_post(); 
							$single_event_main = $single->get_event_mec(get_the_ID());
							$single_event_obj = $single_event_main[0];

							$startdate= strtotime(get_post_meta( get_the_ID(), 'mec_start_date', true));
							$enddate= strtotime(get_post_meta( get_the_ID(), 'mec_end_date', true));
						?>									

							<div class="row mb-3">										
								<div class="col-lg-5 col-md-5 col-sm-12 mb-3 mb-md-0">
									<?php the_post_thumbnail('medium', ['class' => 'initiative-cover', ]); ?>
								</div>
								<div class="col-lg-7 col-md-7 col-sm-12">
									<a href="<?php the_permalink(); ?>"><?php the_title('<h4 class="mb-3">' , '</h4>'); ?></a>
									<p class="mb-3"><?php echo date('M j', $startdate); ?> <?php if(!empty($enddate)) {echo " - " . date('M j, Y', $enddate);} ?></p>
									
									<?php $single->display_location_widget($single_event_obj); ?>

								</div>
							</div>	
								
						<?php } } ?>

						<div class="row mt-3 text-center">
							<div class="col-12">
								<a href="<?php the_permalink(794);?>">go to events</a>
							</div>
						</div>

					</div>

					<div class="col-12 col-md-4 mb-5 mb-md-0">
						<h4 class="text-center m-0">Latest News</h4>
						<hr class=" mt-0 mb-20" />
						<?php

						$args1 = array (
							'post_type'=> 'news',
							'showposts' => 1
						);

						$the_query1 = new WP_Query($args1);

						?>
						
						<?php if($the_query1->have_posts()){
							while($the_query1->have_posts()) {
								$the_query1->the_post(); ?>
								<div class="row">										
									<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="news-box">
									<?php the_post_thumbnail('medium', ['class' => 'initiative-cover', ]); ?>
								<p class="m-0"><b><?php the_title(); ?></b></p> 
								<?php the_content(); ?>
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
											<div class="col-lg-12 col-md-12 col-sm-12 agency-list">
												<i class="ggrc-icon ggrc-external-link"></i> <a href="<?php echo $newsagency['Link'] ?>" target="_blank"><img src="<?php echo z_taxonomy_image_url($newsagency['Agency']); ?>" /></a>
											</div>
											
										<?php 
										}
									}
									?>
									</div>									
								</div>
							</div>
								</div>	
								
						<?php } ?>
						<?php } ?>

						<div class="row mt-3 text-center">
							<div class="col-12">
								<a href="<?php the_permalink(794);?>">go to news</a>
							</div>
						</div>
					</div>					

					<div class="col-12 col-md-4">
						<h4 class="text-center m-0">Latest Blog Post</h4>
						<hr class="mt-0 mb-20" />
						<?php

							$args2 = array (
								'post_type'=> 'blog_post',
								'showposts' => 1,
								'tax_query' => array(
									array(
									'taxonomy' => 'blog-category',
									'field' => 'slug',
									'terms' => array( 'blog' ),
									))
							);

							$the_query2 = new WP_Query($args2);

						?>

						<div class="row">
							
							<?php if($the_query2->have_posts()){ while($the_query2->have_posts()) { $the_query2->the_post(); ?>
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="card blog">
											<?php the_post_thumbnail('medium', ['class' => 'blog-cover', ]); ?>
												
											<div class="initiative-list-detail">
											<?php 
												
												$the_post_id = get_the_ID();
												$blog = wp_get_post_terms($the_post_id, 'blog-category', ['blog']);
												
												if(empty($blog) || ! is_array($blog)){
													echo "";
												}else{
													
													foreach($blog as $key => $blog_cat){
														
														?>
														<p class="blog-category links"><?php echo esc_html($blog_cat->name); ?></p>
													<?php 
														
													}
												}?>
													<a href="<?php the_permalink(); ?>">
														<span class="blog-title-profile"><?php the_title(); ?></span>
													</a>
											</div>
										</div>
									</div>
							<?php } ?>
							<?php } ?>

						</div>
						<div class="row mt-3 text-center">
							<div class="col-12">
								<a href="<?php the_permalink(714);?>">go to blog</a>
							</div>
						</div>
					</div>
				</div>
				
			</div>

			<?php do_action( 'ocean_after_content' ); ?>

		</div><!-- #primary -->

		<?php do_action( 'ocean_after_primary' ); ?>

	</div><!-- #content-wrap -->

	<?php do_action( 'ocean_after_content_wrap' ); ?>

<style type="text/css">

	#site-navigation-wrap .dropdown-menu>li>a{
		padding: 0px 8px !important;		
	}

	dl, dd, .mec-single-event-time, .mec-single-event-organizer, .mec-single-event-location, .mec-sl-location-pin{
		margin:0px;
		padding: 0px;
		background-color: #fff
	}

	.mec-time, .mec-single-event-organizer img, .mec-events-single-section-title, .mec-organizer-email, .mec-sl-home, .mec-img-location{
		display: none
	}

	.mec-events-abbr{
		display: inline;
	}

	.mec-organizer h6{
		margin-top: 10px;
		font-size: 16px;
		font-weight: normal;
		font-family: 'Lato';
	}

	.mec-sl-clock{
		float: left;
    	margin-right: 5px;
	}

	.mec-organiser, .mec-single-event-location dl, .mec-sl-location-pin{
		float: left !important;
	}

	.mec-sl-location-pin{
		
    	margin-right: 5px
	}


</style>

<?php get_footer(); ?>
