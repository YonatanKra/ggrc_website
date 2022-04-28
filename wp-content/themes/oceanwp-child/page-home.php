<?php

/* Template Name: HomePageTemplate */ 

defined('MECEXEC') or die();

?>

<!DOCTYPE html>
<html class="<?php echo esc_attr( oceanwp_html_classes() ); ?>" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

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


				<?php //do_action( 'ocean_page_header' ); ?>


	<div class="home-banner pt-150 pb-60">

		<div class="row">
			<div class="col-lg-8 col-md-12 col-sm-12">
				<h1 class="banner-h1">Reimagine.</h1>
				<h1 class="banner-h1">Recover.</h1>
				<h1 class="banner-h1">Inspire Together.</h1>
				<h3 class="mt-30">What is Green Recovery?</h3>
				<p class="mb-60">Green recovery is a process that transforms how people live and interact with each other and our environment to repair our climate and ecosystems, recover from past environmental damage, and become healthy, resilient, and equitable.</p>
				<a href="" class="ggrc-btn-white-lg mt-60">Join our Collaborative</a>
			</div>
		</div>
	</div>
				

	<?php do_action( 'ocean_before_content_wrap' ); ?>

	<div id="content-wrap" class="container clr">

		<?php do_action( 'ocean_before_primary' ); ?>

		<div id="primary" class="content-area clr no-border">

			<?php do_action( 'ocean_before_content' ); ?>
		
			<div id="content" class="site-content clr">
				<h2 class="align-center mt-20">How it Works</h2>
				<div class="row mb-60">
					<div class="col-lg-4 col-md-12 col-sm-12 mb-20">
						<div class="how-it-works">
							<img src="wp-content/uploads/2022/01/learn.jpg" width="100%">
							<div class="home-learn">
								<h1 class="banner-h1 inline-display">1.</h1>
								<h2 class="home-learn-title">Learn</h2>
								<p>Access initiatives, people, and curated events for knowledge, ideas, and model projects.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12 mb-20">
						<div class="how-it-works">
							<img src="wp-content/uploads/2022/01/learn.jpg" width="100%">
							<div class="home-learn">
								<h1 class="banner-h1 inline-display">2.</h1>
								<h2 class="home-learn-title">Act</h2>
								<p>Connect with initiatives, advise fellow GGRC members, join discussions, and write blogs</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12 mb-20">
						<div class="how-it-works">
							<img src="wp-content/uploads/2022/01/learn.jpg" width="100%">
							<div class="home-learn">
								<h1 class="banner-h1 inline-display">3.</h1>
								<h2 class="home-learn-title">Collaborate</h2>
								<p>Team-up with GGRC members, co-develop solutions, grow your network, share resources, and form coalitions.</p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<h2 class="center-element">What is the Global Green Recovery Collaborative?</h2>
						<p class="align-center p-150-lr mt-20">The Global Green Recovery Collaborative gets people talking and acting together! We aim to promote action and collaboration to achieve a green recovery from Covid-19 and other past and future environmental challenges. Learn from our partner initiatives and become a member to connect with the GGRC community.</p>
					</div>
				</div>
				

				<?php do_action( 'ocean_before_content_inner' ); ?>

				<?php
				// Elementor `single` location.
				if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {

					// Start loop.
					while ( have_posts() ) :
						the_post();

						the_content();

					endwhile;

				}
				?>

				<?php do_action( 'ocean_after_content_inner' ); ?>

				

			</div><!-- #content -->

			<?php do_action( 'ocean_after_content' ); ?>

		</div><!-- #primary -->

		<?php do_action( 'ocean_after_primary' ); ?>

	</div><!-- #content-wrap -->

			<section>
				<div class="why-join-banner pt-80 pb-120 mb-60 p-150-lr">
					<div class="row mt-60 mb-60">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<h2>Why should I join?</h2>
							<p class="mb-60">We need diverse voices to speak up for green recovery at every level. When you join our collaborative, you join local and global communities who are learning, collaborating, and taking action together for change.</p>
							<a href="" class="ggrc-btn-blue-md">Join Us!</a>
						</div>
					</div>
				</div>
			</section>

			<section class="container">
				<div class="row mt-60">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<h2 class="align-center">Explore green recovery initiatives from around the world</h2>
						<p class="mb-60 text-danger"><b>* Our map is under construction. Please check back in later.</b></p>
					</div>
				</div>
				
			</section>

			<section class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<h2 class="align-center">Meet our newest initiatives!</h2>
						<?php

						$args = array (
							'post_type'=> 'initiative',
							'showposts' => 3
						);

						$the_query = new WP_Query($args);

						?>

						<div class="row">
							<?php if($the_query->have_posts()){
								while($the_query->have_posts()) {
									$the_query->the_post(); ?>
									<div class="col-lg-4 col-md-6 col-sm-12">
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
												<p class="no-margin"><i class="ggrc-icon map margin-right"></i> <?php the_field('region') ?></p>
												<p class="no-margin"><i class="ggrc-icon users margin-right"></i> <?php the_field('venue') ?></p>
												
										</div>
										</div>
										</a>
									</div>
							<?php } ?>
							<?php } ?>

						</div>

						<p class="links align-center"><a href="initiative">explore more initiatives</a></p>

					</div>
				</div>
				
			</section>

			<section>
				<div class="suggest-initiative-home mb-60 p-150-lr">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 align-center">
							<h4>Suggest an initiative</h4>
							<p class="mb-30">Do you want to share your program, project, or campaign with the GGRC community? Suggest your initiative to our team!</p>
							<a href="suggest-an-initiative" class="ggrc-btn-blue-md">Suggest</a>
						</div>
					</div>
				</div>
			</section>

			<section class="container">
				<div class="row mb-60">
					<div class="col-lg-4 col-md-6 col-sm-12">
						<h4 class="align-center no-margin-bottom">Events</h4>
						<hr class="no-margin-top mb-20" />
						<?php

						$single = new MEC_skin_single();

						$args = array (
							'post_type'=> 'mec-events',
							'showposts' => 2
						);

						$the_query = new WP_Query($args);

						?>
						
						<?php if($the_query->have_posts()){
							while($the_query->have_posts()) {
								$the_query->the_post(); 

								$single_event_main = $single->get_event_mec(get_the_ID());
								$single_event_obj = $single_event_main[0];

					            $startdate= strtotime(get_post_meta( get_the_ID(), 'mec_start_date', true));
					            $enddate= strtotime(get_post_meta( get_the_ID(), 'mec_end_date', true));
            

								?>								

								<div class="row mb-30">										
									<div class="col-lg-5 col-md-5 col-sm-12">
										<img src="<?php echo get_the_post_thumbnail_url(); ?>"/>
									</div>
									<div class="col-lg-7 col-md-7 col-sm-12 no-padding-left">
										<a href="<?php the_permalink(); ?>"><h4 class="mb-10"><?php the_title(); ?></h4></a>
										<p class="mb-10"><?php echo date('M j', $startdate); ?> <?php if(!empty($enddate)) {echo " - " . date('M j, Y', $enddate);} ?></p>
			            				
			            				<?php $single->display_location_widget($single_event_obj); ?>

									</div>
								</div>	
								
						<?php } ?>
						<?php } ?>

						<p class="links align-center"><a href="news-and-events">go to events</a></p>

					</div>

					<div class="col-lg-4 col-md-6 col-sm-12">
						<h4 class="align-center no-margin-bottom">Latest News</h4>
						<hr class=" no-margin-top mb-20" />
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
									<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="initiative-cover"/>
								<p class="no-margin-bottom"><b><?php the_title(); ?></b></p> 
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

						<p class="links align-center"><a href="news-and-events">go to news</a></p>
					</div>					

					<div class="col-lg-4 col-md-6 col-sm-12">
						<h4 class="align-center no-margin-bottom">Latest Blog Post</h4>
						<hr class=" no-margin-top mb-20" />
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
							
							<?php if($the_query2->have_posts()){
								while($the_query2->have_posts()) {
									$the_query2->the_post(); ?>
									<div class="col-lg-12 col-md-12 col-sm-12">
										
										<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="blog-cover"/>
											
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
												<a href="<?php the_permalink(); ?>"><p class="blog-title-profile"><?php the_title(); ?></p></a>
						
												
										</div>
									</div>
							<?php } ?>
							<?php } ?>

						</div>
						<p class="links align-center"><a href="blog">go to blog</a></p>

					</div>
				</div>
				
			</section>

	<?php do_action( 'ocean_after_content_wrap' ); ?>

	

<?php get_footer(); ?>
