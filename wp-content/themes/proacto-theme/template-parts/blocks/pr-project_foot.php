<?php
//main class name for block
$className = 'project_foot';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$project_foot = get_field('project_foot');

$bg = esc_url($project_foot['background']['url']);
$title = $project_foot['projects_title'];
$title = add_em_words($title, array(1));
$class_simple = 'simplified';
$number_posts = 3;

$args = array(
	'post_type'      => 'projects',
	'posts_per_page' => $number_posts,
	'orderby'        => 'date',
	'order'          => 'DESC',
	'post_status'    => 'publish',
);

$projects_query = new WP_Query($args);


$contact_form = get_field('contact_form');
$form_title = !empty($contact_form['title']) ? $contact_form['title'] : __('Title', 'proacto');
$form_title = add_em_words($form_title, array(3,4,5,6));
$text = !empty($contact_form['text']) ? $contact_form['text'] : __('Text', 'proacto');
$image_url = esc_url($contact_form['image']['url']);
$image_alt = esc_url($contact_form['image']['alt']);

?>

<section class="<?= $className ?> is-style-image" style="background-image: url(<?= $bg ?>);">
	<div class="container">
		<div class="project_foot__head">
			<h2 class="heading-h2 heading section-title">
				<?= $title ?>
			</h2>
			<a href="<?= $project_foot['button']['url'] ?>" class="button">
				<?= $project_foot['button']['title'] ?>
				<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M2.9999 12.5004C2.9999 12.6993 3.07892 12.8901 3.21957 13.0307C3.36022 13.1714 3.55099 13.2504 3.7499 13.2504H18.4396L12.9693 18.7198C12.8996 18.7895 12.8443 18.8722 12.8066 18.9632C12.7689 19.0543 12.7495 19.1519 12.7495 19.2504C12.7495 19.349 12.7689 19.4465 12.8066 19.5376C12.8443 19.6286 12.8996 19.7114 12.9693 19.781C13.039 19.8507 13.1217 19.906 13.2127 19.9437C13.3038 19.9814 13.4014 20.0008 13.4999 20.0008C13.5984 20.0008 13.696 19.9814 13.7871 19.9437C13.8781 19.906 13.9608 19.8507 14.0305 19.781L20.7805 13.031C20.8503 12.9614 20.9056 12.8787 20.9433 12.7876C20.9811 12.6966 21.0005 12.599 21.0005 12.5004C21.0005 12.4019 20.9811 12.3043 20.9433 12.2132C20.9056 12.1222 20.8503 12.0394 20.7805 11.9698L14.0305 5.21979C13.8898 5.07906 13.6989 5 13.4999 5C13.3009 5 13.11 5.07906 12.9693 5.21979C12.8285 5.36052 12.7495 5.55139 12.7495 5.75042C12.7495 5.94944 12.8285 6.14031 12.9693 6.28104L18.4396 11.7504H3.7499C3.55099 11.7504 3.36022 11.8294 3.21957 11.9701C3.07892 12.1107 2.9999 12.3015 2.9999 12.5004Z" fill="white"/>
				</svg>
			</a>
		</div>
		<div class="projects_grid <?= $class_simple ?>" id="projects-section-container">
			<?php
			while ($projects_query->have_posts()) : $projects_query->the_post();
				get_project_card_template(get_post());
			endwhile;
			?>
		</div>
	</div>

    <div class="contact_form">
        <div class="container">
            <div class="contact_form__wrap">
                <img src="<?= $image_url ?>" alt="<?= $image_alt ?>" class="contact_form__wrap-image">
                <div class="contact_form__wrap_texts">
                    <h2 class="heading-h2 heading title">
						<?= $form_title ?>
                    </h2>
                    <p class="body text">
						<?= $text ?>
                    </p>
					<?= do_shortcode($contact_form['form']) ?>
                </div>
            </div>
        </div>
    </div>
</section>