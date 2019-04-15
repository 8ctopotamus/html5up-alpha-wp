<?php

/*
 * Register meta boxes.
 */
function h5ua_register_meta_boxes() {
	_h5ua_subtitle_meta_box();
	_h5ua_landing_meta_box();
}
add_action( 'add_meta_boxes', 'h5ua_register_meta_boxes' );

function _h5ua_subtitle_meta_box() {
	add_meta_box(
		'h5ua-meta',
		__( 'Subtitle', 'h5ua' ),
		'h5ua_meta_display_callback',
		null, // show on all post-types and pages
		'normal',
		'high'
	);
}

function _h5ua_landing_meta_box() {
	global $post;
	if ( !empty($post) ) {
		$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
		if ( $pageTemplate == 'page-landing.php' ) {
			add_meta_box(
				'h5ua-landing-meta',
				__( 'Landing Page Fields', 'h5ua' ),
				'h5ua_landing_meta_display_callback',
				'page',
				'normal',
				'high'
			);
		}
	}
}

function h5ua_meta_display_callback( $post ) {
	include 'meta-forms.php';
}

function h5ua_landing_meta_display_callback( $post ) {
	include 'meta-forms-landing.php';
}

function h5ua_save_meta_box( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( $parent_id = wp_is_post_revision( $post_id ) ) {
		$post_id = $parent_id;
	}
	$fields = [
		'h5ua_subtitle',
		'h5ua_cta_1_text',
		'h5ua_cta_1_link',
		'h5ua_cta_2_text',
		'h5ua_cta_2_link',
		'h5ua_main_box_title',
		'h5ua_main_box_content',
		'h5ua_main_box_image_url',
	];
	foreach ( $fields as $field ) {
		if ( array_key_exists( $field, $_POST ) ) {
			$data = htmlspecialchars( $_POST[$field] );
			$data = sanitize_text_field( $_POST[$field] );
			update_post_meta( $post_id, $field, $data);
		}
	}
}
add_action( 'save_post', 'h5ua_save_meta_box' );

?>