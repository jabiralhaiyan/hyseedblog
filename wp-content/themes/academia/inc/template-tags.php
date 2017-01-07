<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package academia
 */

if ( ! function_exists( 'tx_academia_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function tx_academia_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		'<i class="fa fa-calendar"></i>'.
		esc_html_x( ' %s', 'post date', 'academia' ),
		$time_string
	);

	$byline = sprintf(
		'<i class="fa fa-user"></i>'.
		esc_html_x( ' %s', 'post author', 'academia' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on" data-toggle="tooltip" data-placement="top" title="'. esc_html__( 'Posted On', 'academia' ).'">' . $posted_on . '</span><span class="byline" data-toggle="tooltip" data-placement="top" title="'. esc_html__( 'Written By', 'academia' ).'"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'tx_academia_blog_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function tx_academia_blog_meta() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		tx_academia_posted_on();
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'academia' ) );
		if ( $categories_list && tx_academia_categorized_blog() ) {
			printf( '<i class="fa fa-folder-open"></i> <span class="cat-links" data-toggle="tooltip" data-placement="top" title="'. esc_attr__( 'Category', 'academia' ).'">' . esc_html__( ' %1$s', 'academia' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'academia' ) );
		if ( $tags_list ) {
			printf( '<i class="fa fa-tags"></i><span class="tags-links" data-toggle="tooltip" data-placement="top" title="'. esc_attr__( 'Tagged', 'academia' ).'">' . esc_html__( ' %1$s', 'academia' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<i class="fa fa-comments"></i><span class="comments-link" data-toggle="tooltip" data-placement="top" title="'. esc_attr__( 'Leave a comment', 'academia' ).'">';
		comments_popup_link( esc_html__( ' Leave a comment', 'academia' ), esc_html__( ' 1 Comment', 'academia' ), esc_html__( ' % Comments', 'academia' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( ' Edit %s', 'academia' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<i class="fa fa-pencil-square-o"></i><span class="blog-edit-link edit-link" data-toggle="tooltip" data-placement="top" title="'. esc_attr__( 'Edit this post', 'academia' ).'">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function tx_academia_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'tx_academia_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'tx_academia_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so tx_academia_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so tx_academia_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in tx_academia_categorized_blog.
 */
function tx_academia_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'tx_academia_categories' );
}
add_action( 'edit_category', 'tx_academia_category_transient_flusher' );
add_action( 'save_post',     'tx_academia_category_transient_flusher' );
