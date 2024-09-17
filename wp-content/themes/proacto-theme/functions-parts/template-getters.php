<?php
function get_project_card_template($post) {
	if ($post) {
		$template = locate_template('template-parts/loop-items/project-card.php');
		if ($template) {
			include($template);
		}
	}
}

