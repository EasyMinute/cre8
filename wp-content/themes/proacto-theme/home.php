<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package proacto
 */

get_header();
$posts_page_id = get_option('page_for_posts');
if ( $posts_page_id ) {
	// Get the post object for the static posts page
	$posts_page   = get_post( $posts_page_id );
	$blog_options = get_field( 'blog_options',  $posts_page_id);
	if (!empty($blog_options['highlighted_post'])) {
		$highlight_post_id = $blog_options['highlighted_post']->ID;
	} else {
		$latest_post = get_posts( array(
			'numberposts' => 1,
			'post_status' => 'publish',
		) );

		// Check if a post was found
		if ( !empty( $latest_post ) ) {
			$highlight_post_id = $latest_post[0]->ID;
		}
	}
}

?>

	<main class="page-template">
		<?php
		set_query_var('post_id', $highlight_post_id); // Set the post_id as a query variable
		get_template_part('template-parts/static/post-highlight');
        get_template_part('template-parts/static/news-loop');
		setup_postdata($posts_page);
		the_content();
        ?>
	</main>


<?php
get_footer();
