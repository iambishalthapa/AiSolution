<?php
namespace CozyBlock\Helpers;

class WooHelpers {
	public static function get_woo_product_reviews() {
		$args = array(
			'status'      => 'approve',
			'post_status' => 'publish',
			'post_type'   => 'product',
		);

		$comments = get_comments( $args );

		foreach ( $comments as $comment ) {
			$avatar    = get_avatar_url( $comment->user_id );
			$user_data = get_userdata( $comment->user_id );

			$product_image_url = get_the_post_thumbnail_url( $comment->comment_post_ID );
			$product           = wc_get_product( $comment->comment_post_ID );

			$comment->user_avatar       = $avatar;
			$comment->product_image_url = $product_image_url;
			$comment->product_name      = esc_html( $product->get_title() );
			$comment->product_rating    = esc_html( $product->get_average_rating() );
			$comment->product_url       = $product->get_permalink();
			$comment->comment_rating    = get_comment_meta( $comment->comment_ID, 'rating', true );
			// $comment->product_rating_count = esc_html( $product->get_rating_count() );
			$comment->reviewer_name = isset( $user_data->display_name ) ? $user_data->display_name : '';
		}

		return $comments;
	}

	public static function get_woo_total_product_reviews() {
		global $wpdb;
		$total_reviews_count = $wpdb->get_var(
			"
				SELECT COUNT(*)
				FROM {$wpdb->comments}
				WHERE comment_type = 'review'
				AND comment_approved = 1
			"
		);
		return $total_reviews_count;
	}

	public static function get_woo_avg_product_reviews() {
		global $wpdb;
		$average_rating = $wpdb->get_var(
			"
				SELECT AVG(meta_value) as average_rating
				FROM {$wpdb->commentmeta} AS cm
				WHERE comment_id IN (
					SELECT comment_ID
					FROM {$wpdb->comments}
					WHERE comment_type = 'review' AND comment_approved = 1
				) AND meta_key = 'rating'
			"
		);

		if ( $average_rating ) {
			return round( $average_rating, 2 );
		}
	}
}
