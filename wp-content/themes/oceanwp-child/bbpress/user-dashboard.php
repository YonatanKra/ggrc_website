<?php

/**
 * User Profile
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>
<style>
    #initiative-list > div:first-of-type{
		background: #FFF3D7;
		border-radius: 10px;
		margin-right: 0px;
		margin-left: 0px
	}

	.initiative-list-detail > p:first-of-type{
		margin-bottom:10px;
	}

    #connect-to-people img{
        border-radius: 50%;
    }
</style>

<div class="suggest-content row mb-10">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <h4 class="mb-10">Suggest content</h4>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <p>We are always happy to hear from our members about things that interest them! </p>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12">
        <a href="<?php echo site_url( '/suggest-an-initiative', null ) ?>"><button class="ggrc-btn-blue-sm mb-10">suggest initiative</button></a>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12">
        <a href="<?php echo site_url( '/suggest-an-event', null ) ?>"><button class="ggrc-btn-blue-sm mb-10">suggest event</button></a>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12">
        <a href="<?php echo site_url( '/suggest-a-discussion-board', null ) ?>"><button class="ggrc-btn-blue-sm mb-10">suggest discussion board</button></a>
    </div>
</div>
<div class="row">
    <div class="col-lg-9 col-md-12 col-sm-12" id="bbp-user-body">
        <p class="no-margin-bottom"><b>Initiative updates</b></p>
        <hr/>

        <?php

            $args = array (
                'post_type'=> 'initiative',
                'posts_per_page' => 5,
                'nopaging' => false
            );

            $the_query = new WP_Query($args);

        ?>

        <div id="initiative-list">
            <?php if($the_query->have_posts()){
                while($the_query->have_posts()) {
                    $the_query->the_post(); ?>
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12">
                                
                            <div class="initiative-list-detail">
                            
                                    <a href="<?php the_permalink(); ?>"><h4 class="mb-10"><?php the_title(); ?></h4></a>
                                    <?php the_excerpt(); ?>
                                    <p><?php the_time('j F, Y'); ?></p>
                                    
                            </div>
                            
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 center-element">
                            <a href="<?php the_permalink(); ?>"><button class="ggrc-btn-white-sm mb-10">see initiative</button></a>
                        </div>
                    </div>
            <?php } ?>
            <?php } ?>

        </div>
                                
    </div>

    <div class="col-lg-3 col-md-12 col-sm-12">
        
        <div class="row no-margin-left" id="connect-people">
             <div class="col-lg-12 col-md-12 col-sm-12">
                <p class="no-margin-bottom"><b>Connect to people</b></p>
                <hr />
                
                
            </div>
            
        <?php

        $args = array(
            'role__in'    => array('Member', 'Advisor', 'Adminstrator'),
            'orderby' => 'user_nicename',
            'order'   => 'ASC',
            'exclude' => array(get_current_user_id()),
            'number' => 10

        );

        $users = get_users( $args );

        foreach ( $users as $user ) { ?>
            <div class="col-md-12 col-lg-12 col-sm-12 mb-20 align-center" id="connect-to-people">
                <?php										
                        echo get_avatar($user->ID, 60);										
                ?>
            
                    <p class="no-margin-bottom"><b><?php echo $user->display_name ?></b></p>
                    <p class="no-margin-bottom"><?php echo $user->job_title ?></p>
                    <p class="no-margin-bottom"><?php echo $user->organization ?></p>
                
                
            </div>
            <?php
        }

        ?>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <p class="links align-center"><a href="../engagements">see all</a></p>
        </div>

        </div>
        
    </div>
</div>