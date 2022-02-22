<?php

global $post;

$post_id = ( is_front_page() && ! is_page() ) ? '-1' : get_the_ID();

if ( 'yes' === get_post_meta( $post->ID, 'disable_ess', true ) ) {
	return;
}

$counter = 'yes' === get_option( 'easy_social_sharing_inline_enable_share_counts' ) ? 'ess-display-counts' : 'ess-no-display-counts';

$visbility_class = array();

//$visbility_class[] = $class;

if ( 'rounded' === get_option( 'easy_social_sharing_inline_icon_shape' ) ) {
	$visbility_class[] = 'ess-rounded-icon';
} elseif ( 'diagonal' === get_option( 'easy_social_sharing_inline_icon_shape' ) ) {
	$visbility_class[] = 'ess-diagonal-icon';
} elseif ( 'rectangular_rounded' === get_option( 'easy_social_sharing_inline_icon_shape' ) ) {
	$visbility_class[] = 'ess-rectangular-rounded-icon';
}

$inline_layout = get_option( 'easy_social_sharing_inline_layouts' );
if ( $inline_layout ) {
	$visbility_class[] = 'ess-inline-layout-' . $inline_layout;
}

if ( 'no' === get_option( 'easy_social_sharing_inline_enable_share_counts' ) ) {
	$visbility_class[] = 'ess-no-share-counts';
}

if ( 'no' === get_option( 'easy_social_sharing_inline_enable_networks_label' ) ) {
	$visbility_class[] = 'ess-no-network-label';
}

$social_networks = ess_get_core_supported_social_networks();
