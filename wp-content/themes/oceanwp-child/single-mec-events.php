<?php
/** no direct access **/
defined('MECEXEC') or die();

/**
 * The Template for displaying all single events
 * 
 * @author Webnus <info@webnus.biz>
 * @package MEC/Templates
 * @version 1.0.0
 */

$single = new MEC_skin_single();
$single_event_main = $single->get_event_mec(get_the_ID());
$single_event_obj = $single_event_main[0];

?>

<!DOCTYPE html>
<html class="<?php echo esc_attr( oceanwp_html_classes() ); ?>" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
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

				<?php //do_action( 'ocean_page_header' ); ?>

<style type="text/css">
	.mec-single-event-organizer dl, .mec-events-single-section-title, .mec-img-location, .mec-sl-location-pin, .mec-sl-clock , .mec-time{
		display: none
	}

	.mec-single-event-organizer img{
		width: 50px !important;
	}

	.mec-event-cost, .mec-event-more-info, .mec-event-website, .mec-events-meta-date, .mec-single-event-additional-organizers, .mec-single-event-category, .mec-single-event-date, .mec-single-event-label, .mec-single-event-location, .mec-single-event-organizer, .mec-single-event-time {
	    background: #fff;
	    padding: 0px;
	}

	#event-details{
		border-left: 1px solid #BEC5CC;
	}

	dl, dd{
		margin:0px;
	}

	.address.mec-events-address{
		font-size: 16px !important;
	}

	.mec-export-details ul{
		margin-left: 0px;
		margin-top: 40px;
	}

	.mec-export-details li{
		margin-bottom: 30px;
		list-style-type: none;
	}

	.mec-export-details li a{
		background: linear-gradient(83.21deg, #0B4F6D 18.7%, #1087AD 94.49%);
	    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.06), 4px 4px 24px 3px rgba(0, 0, 0, 0.1);
	    border-radius: 30px;
	    padding: 8px 22px;
	    font-size: 16px;
	    color: #fff;
	    border: none;
	}
   
}
</style>



    <section id="<?php echo apply_filters('mec_single_page_html_id', 'main-content'); ?>" class="<?php echo apply_filters('mec_single_page_html_class', 'mec-container'); ?> pt-100">

        <?php do_action('mec_before_main_content'); ?>

        <?php while(have_posts()): the_post(); ?>

            <?php 

            $startdate= strtotime(get_post_meta( get_the_ID(), 'mec_start_date', true));
            $enddate= strtotime(get_post_meta( get_the_ID(), 'mec_end_date', true));
            
            ?>
            <p class="links"><a href="../../events-calendar">back to calendar</a></p>
            <p><b><?php echo date('F jS, Y', $startdate); ?> <?php if(!empty($enddate)) {echo " - " . date('F jS, Y', $enddate);} ?></b></p>

            <div class="row">
            	<div class="col-lg-9 col-md-12 col-sm-12">
            		<div class="row">
            			<div class="col-lg-9 col-md-9 col-sm-12">
            				<h2><?php the_title(); ?></h2>

            				<?php the_content(); ?>
            				<br><br>

            				<?php 
            				$tags = get_the_tags();
										
							if(empty($tags) || ! is_array($tags)){
								echo "";
							}else{

								foreach($tags as $key => $posttags){
									?>
									<p class="tags"><?php echo esc_html($posttags->name); ?></p>
									
								<?php 
									
								}
							} 

							?>
							<br>
							<button class="ggrc-btn-white-md mt-60"><a href="<?php echo get_post_meta( get_the_ID(), 'mec_more_info', true) ?>" target="_blank"><h3 class="no-margin-bottom">More Information</h3></a></button>

							<?php $single->display_export_widget($single_event_obj); ?>

            			</div>
            			<div class="col-lg-3 col-md-3 col-sm-12 mt-60" id="event-details">
            				<h4 class="mb-10">Organizers</h4>
            				<?php $single->display_organizer_widget($single_event_obj); ?>
            				<h4 class="no-margin-bottom">Who</h4>
            				<?php	
            						$who = get_post_custom_values('who-can-attend-the-event');
            						echo $who[0];
            				?>

            				<h4 class="no-margin-bottom mt-20">Where</h4>
            				<?php
            					$single->display_location_widget($single_event_obj); 
            				?>
            				<h4 class="no-margin-bottom mt-20">Time</h4>
            				<?php
            						$single->display_time_widget($single_event_obj);
            				?>
            				<h4 class="no-margin-bottom mt-20">Participation cost</h4>
            				<?php
            						$cost= get_post_meta( get_the_ID(), 'mec_cost', true );

            						if ($cost==0) {
            							echo "Free";
            						}
            						else{
            							echo "$". $cost;
            						}
            				?>
            			</div>
            		</div>
            	</div>

            	<div class="col-lg-3 col-md-12 col-sm-12">

            		<?php 
						$event_saved =has_current_user_saved_event();											
						if (!empty($event_saved)){
							?>
							<i class="ggrc-icon ggrc-save"></i>
            				<p id="save">saved!</p>
							<?php } else{ ?>
							<i class="ggrc-icon ggrc-save" id="save-event"></i>
            				<p id="save">save</p>
							<?php }  
					?>

            		<div class="suggest-event">
            			<h3>Suggest an event</h3>
            			<p>Do you know of an interesting event around you promoting green recovery? Are you involved with an intervention? We want to know! Do you have an event you’d like to promote? Please note we’ll only accept events that have a digital presence.</p>
            			<button class="no-border-all"><a href="../../suggest-an-event" class="ggrc-btn-blue-sm">suggest</a></button>
            			
            		</div>
            	</div>
            </div>

            <div class="row mt-30 mb-60">
            	<div class="col-lg-9 col-md-12 col-sm-12">
            		
            		<?php $embedurl = get_post_custom_values('upload-past-event-video'); 

            			if (!empty($embedurl[0])) {
            				?>
            				<p><b>Past Event Recording:</b></p>
							<iframe width="100%" height="400" src="<?php echo $embedurl[0]; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						<?php
            			}
            			?>
            		
            		
            		
            	</div>
            </div>
            

            <?php

            //$MEC = MEC::instance(); echo $MEC->single(); ?>

        <?php endwhile; // end of the loop. ?>
        <?php comments_template(); ?>
    </section>

    <?php do_action('mec_after_main_content'); ?>

<?php get_footer('mec'); ?>

<script type="text/javascript">

	jQuery(document).ready(function($) {
	
		$('#save-event').click(function(){
			
			ajaxurl = '<?php echo admin_url( 'admin-ajax.php' ) ?>'; // get ajaxurl

			var data = {
				'action': 'save_event', // your action name 
				'postid': '<?php echo get_the_ID(); ?>' // some additional data to send
			};

			jQuery.ajax({
				url: ajaxurl, // this will point to admin-ajax.php
				type: 'POST',
				data: data,
				success: function (response) {
					console.log(response); 
					$("#save").html("saved!");
										               
				}
			});
		});

	});

</script>

