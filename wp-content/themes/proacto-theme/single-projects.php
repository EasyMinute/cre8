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
?>

	<main class="single-project">
		<?php
		the_content();
//		$post_id = get_the_ID(); // Get the current post ID or set it manually
//		set_query_var('post_id', $post_id); // Set the post_id as a query variable
//		get_template_part('template-parts/static/post-highlight'); // Load the template part
//		get_template_part('template-parts/static/post_content');
//		get_template_part('template-parts/blocks/pr-recent_posts');
//		get_template_part('template-parts/blocks/pr-contact_form');
		?>
	</main>


<?php
get_footer();
