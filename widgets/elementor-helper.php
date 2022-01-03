<?php

namespace Elementor;

// Create Card Design into elementor.
function init_card_elements_category() {
	Plugin::instance()->elements_manager->add_category(
		'card-elements', [
			'title' => esc_html__('Card Design', ELEMENTOR_CARD_DESIGN_DOMAIN),
			'icon' => 'font'
		], 1
	);
}
add_action('elementor/init', 'Elementor\init_card_elements_category');
?>