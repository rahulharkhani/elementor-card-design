<?php

namespace Elementor;

if (!defined('ABSPATH'))
	exit;      // Exit if accessed directly

class User_Card_Elementor_Widget extends Widget_Base {

	//Function for get the slug of the element name.
	public function get_name() {
		return 'user-card-elementor-widget';
	}

	//Function for get the name of the element.
	public function get_title() {
		return __('User Card', ELEMENTOR_CARD_DESIGN_DOMAIN);
	}

	//Function for get the icon of the element.
	public function get_icon() {
		return 'eicon-flip-box';
	}

	//Function for include element into the category.
	public function get_categories() {
		return ['card-elements'];
	}

	/*
	 * Adding the controls fields for the Card Elements
	 */

	protected function _register_controls() {

		/*
		 * Start profile card controls fields
		 */
		$this->start_controls_section(
			'section_items_data', array(
				'label' => esc_html__('User Card Items', ELEMENTOR_CARD_DESIGN_DOMAIN),
			)
		);

		$this->add_control(
			'user_card_style', [
				'label' => __('User Card Style', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'user-card-style-1' => esc_html__('Card Style 1', ELEMENTOR_CARD_DESIGN_DOMAIN),
					'user-card-style-2' => esc_html__('Card Style 2', ELEMENTOR_CARD_DESIGN_DOMAIN),
				],
				'default' => 'user-card-style-1',
			]
		);

		$this->add_control(
			'name', [
				'label' => __('Name', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'type' => Controls_Manager::TEXT,
				'default' => __('Rahul Harkhani', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'placeholder' => __('Enter User Name', ELEMENTOR_CARD_DESIGN_DOMAIN),
			]
		);

		$this->add_control(
			'email', [
				'label' => __('Email', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'type' => Controls_Manager::TEXT,
				'default' => __('info@gmail.com', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'placeholder' => __('info@gmail.com', ELEMENTOR_CARD_DESIGN_DOMAIN),
			]
		);

		$this->add_control(
			'phone', [
				'label' => __('Phone', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'type' => Controls_Manager::TEXT,
				'default' => __('+91 9876543210', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'placeholder' => __('Phone', ELEMENTOR_CARD_DESIGN_DOMAIN),
			]
		);

		$this->add_control(
			'address', [
				'label' => __('Address', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'type' => Controls_Manager::TEXT,
				'default' => __('Madrid, Spain', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'placeholder' => __('Address', ELEMENTOR_CARD_DESIGN_DOMAIN),
			]
		);

		/*$this->add_control(
			'position', [
				'label' => __('Position', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'type' => Controls_Manager::TEXT,
				'default' => __('Developer', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'placeholder' => __('Developer', ELEMENTOR_CARD_DESIGN_DOMAIN),
			]
		);*/

		$this->add_control(
			'display_description', [
				'label' => __('Display Description', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __('Show', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'label_off' => __('Hide', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'condition' => [
					'user_card_style' => [
						'user-card-style-1',
						'user-card-style-2'
					],
				],
			]
		);

		$this->add_control(
			'description', array(
				'label' => esc_html__('Description', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'type' => Controls_Manager::TEXTAREA,
				'condition' => [
					'display_description' => 'yes',
					'user_card_style' => [
						'user-card-style-1',
						'user-card-style-2'
					],
				],
				'default' => __('Lorem ipsum dolor sit amet, consectetur adipisci ng elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', ELEMENTOR_CARD_DESIGN_DOMAIN),
			)
		);

		$this->add_control(
			'user_image', [
				'label' => __('User Image', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'user_background_image', [
				'label' => __('User Background Image', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'user_card_style' => [
						'user-card-style-1',
						'user-card-style-2'
					]
				],
				'default' => [
				'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'shape', [
				'label' => __('Shape', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'type' => Controls_Manager::SELECT,
				'default' => 'rounded',
				'options' => [
					'rounded' => __('Rounded', ELEMENTOR_CARD_DESIGN_DOMAIN),
					'square' => __('Square', ELEMENTOR_CARD_DESIGN_DOMAIN),
				],
			]
		);

		$this->end_controls_section();
		/*
		 * End User card controls fields
		*/


		/*
		 * Start Social Media control for profile card
		*/
		$this->start_controls_section(
			'section_social_media', array(
				'label' => esc_html__('Social Media', ELEMENTOR_CARD_DESIGN_DOMAIN),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'social', [
				'label' => __('Icons', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => 'fab fa-gitlab',
				'include' => [
					'fab fa-android',
					'fab fa-apple',
					'fab fa-behance',
					'fab fa-bitbucket',
					'fab fa-codepen',
					'fab fa-delicious',
					'fab fa-deviantart',
					'fab fa-digg',
					'fab fa-dribbble',
					'fab fa-envelope',
					'fab fa-facebook',
					'fab fa-flickr',
					'fab fa-foursquare',
					'fab fa-free-code-camp',
					'fab fa-github',
					'fab fa-gitlab',
					'fab fa-globe',
					'fab fa-google-plus',
					'fab fa-houzz',
					'fab fa-instagram',
					'fab fa-jsfiddle',
					'fab fa-link',
					'fab fa-linkedin',
					'fab fa-medium',
					'fab fa-meetup',
					'fab fa-mixcloud',
					'fab fa-odnoklassniki',
					'fab fa-pinterest',
					'fab fa-product-hunt',
					'fab fa-reddit',
					'fab fa-rss',
					'fab fa-shopping-cart',
					'fab fa-skype',
					'fab fa-slideshare',
					'fab fa-snapchat',
					'fab fa-soundcloud',
					'fab fa-spotify',
					'fab fa-stack-overflow',
					'fab fa-steam',
					'fab fa-stumbleupon',
					'fab fa-telegram',
					'fab fa-thumb-tack',
					'fab fa-tripadvisor',
					'fab fa-tumblr',
					'fab fa-twitch',
					'fab fa-twitter',
					'fab fa-vimeo',
					'fab fa-vk',
					'fab fa-weibo',
					'fab fa-weixin',
					'fab fa-whatsapp',
					'fab fa-wordpress',
					'fab fa-xing',
					'fab fa-yelp',
					'fab fa-youtube',
					'fab fa-500px',
				],
			]
		);

		$repeater->add_control(
			'link', [
				'label' => __('Link', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'type' => Controls_Manager::URL,
				'label_block' => true,
				'default' => [
					'is_external' => 'true',
				],
				'placeholder' => __('https://your-link.com', ELEMENTOR_CARD_DESIGN_DOMAIN),
			]
		);

		$this->add_control(
			'social_icon_lists', [
				'label' => __('Social Icons', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[ 'social' => 'fab fa-codepen' ],
					[ 'social' => 'fab fa-github' ],
					[ 'social' => 'fas fa-globe' ],
					[ 'social' => 'fab fa-instagram' ],
				],
				'title_field' => '<i class="{{ social }}"></i> {{{ social.replace( \'fab fa-\', \'\' ).replace( \'-\', \' \' ).replace( /\b\w/g, function( letter ){ return letter.toUpperCase() } ) }}}',
			]
		);

		$this->end_controls_section();
		/*
		 * End Social Media control for profile card
		 */

		/*
		 * Start position control style
		 */
		$this->start_controls_section(
			'section_profile_position', [
				'label' => __('Designation', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'position_text_align', [
				'label' => __('Alignment', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __('Left', ELEMENTOR_CARD_DESIGN_DOMAIN),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __('Center', ELEMENTOR_CARD_DESIGN_DOMAIN),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __('Right', ELEMENTOR_CARD_DESIGN_DOMAIN),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __('Justified', ELEMENTOR_CARD_DESIGN_DOMAIN),
						'icon' => 'fa fa-align-justify',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-profile-position-wrapper,
					{{WRAPPER}} .user-card-style-11 .position' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'position_color', [
				'label' => __('Text Color', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_2,
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-profile-position-wrapper,
					{{WRAPPER}} .user-card-style-11 .position' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'typography_position',
				'scheme' => Scheme_Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .elementor-profile-position-wrapper,
				{{WRAPPER}} .user-card-style-11 .position',
			]
		);

		$this->end_controls_section();

		/*
		 * Start desription control style
		 */
		$this->start_controls_section(
			'section_profile_description', [
				'label' => __('Description', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'user_card_style' => [
						'user-card-style-1',
						'user-card-style-2',
						'user-card-style-3',
						'user-card-style-4',
						'user-card-style-5'
					]
				]
			]
		);

		$this->end_controls_section();


		/*
		 * Start content background control style
		 */
		$this->start_controls_section(
				'section_content_background_style', [
			'label' => __('Content Box Style', ELEMENTOR_CARD_DESIGN_DOMAIN),
			'tab' => Controls_Manager::TAB_STYLE,
			'condition' => [
				'user_card_style' => [
					'user-card-style-1',
					'user-card-style-2'
				]
			]
				]
		);

		$this->add_control(
				'content_background_color', [
			'label' => __('Background Color', ELEMENTOR_CARD_DESIGN_DOMAIN),
			'type' => Controls_Manager::COLOR,
			'scheme' => [
				'type' => Scheme_Color::get_type(),
				'value' => Scheme_Color::COLOR_4,
			],
			'selectors' => [
				'{{WRAPPER}} .elementor-content-background-color-wrapper' => 'background-color: {{VALUE}};',
			],
				]
		);

		$this->end_controls_section();
		/*
		 * End content background control style
		 */

		/*
		 * Start social media control style
		 */
		$this->start_controls_section(
				'section_social_style', [
			'label' => __('Social Icon', ELEMENTOR_CARD_DESIGN_DOMAIN),
			'tab' => Controls_Manager::TAB_STYLE,
				]
		);

		$this->add_control(
				'content_social_background_color', [
			'label' => __('Social Area Background Color', ELEMENTOR_CARD_DESIGN_DOMAIN),
			'type' => Controls_Manager::COLOR,
			'scheme' => [
				'type' => Scheme_Color::get_type(),
				'value' => Scheme_Color::COLOR_4,
			],
			'condition' => [
				'user_card_style' => ['user-card-style-1', 'user-card-style-2', 'user-card-style-11'],
			],
			'selectors' => [
				'{{WRAPPER}} .team-member__socialmedia' => 'background-color: {{VALUE}};',
			],
				]
		);

		$this->add_control(
				'icon_color', [
			'label' => __('Social Color', ELEMENTOR_CARD_DESIGN_DOMAIN),
			'type' => Controls_Manager::SELECT,
			'default' => 'default',
			'options' => [
				'default' => __('Official Color', ELEMENTOR_CARD_DESIGN_DOMAIN),
				'custom' => __('Custom', ELEMENTOR_CARD_DESIGN_DOMAIN),
			],
				]
		);

		$this->add_control(
				'icon_primary_color', [
			'label' => __('Primary Color', ELEMENTOR_CARD_DESIGN_DOMAIN),
			'type' => Controls_Manager::COLOR,
			'condition' => [
				'icon_color' => 'custom',
			],
			'selectors' => [
				'{{WRAPPER}} .elementor-social-icon:not(:hover)' => 'background-color: {{VALUE}};',
			],
				]
		);

		$this->add_control(
				'icon_secondary_color', [
			'label' => __('Secondary Color', ELEMENTOR_CARD_DESIGN_DOMAIN),
			'type' => Controls_Manager::COLOR,
			'condition' => [
				'icon_color' => 'custom',
			],
			'selectors' => [
				'{{WRAPPER}} .elementor-social-icon:not(:hover) i' => 'color: {{VALUE}};',
			],
				]
		);

		$this->add_responsive_control(
				'icon_size', [
			'label' => __('Size', ELEMENTOR_CARD_DESIGN_DOMAIN),
			'type' => Controls_Manager::SLIDER,
			'range' => [
				'px' => [
					'min' => 6,
					'max' => 300,
				],
			],
			'selectors' => [
				'{{WRAPPER}} .elementor-social-icon' => 'font-size: {{SIZE}}{{UNIT}};',
			],
				]
		);

		$this->add_responsive_control(
				'icon_padding', [
			'label' => __('Padding', ELEMENTOR_CARD_DESIGN_DOMAIN),
			'type' => Controls_Manager::SLIDER,
			'selectors' => [
				'{{WRAPPER}} .elementor-social-icon' => 'padding: {{SIZE}}{{UNIT}};',
			],
			'default' => [
				'unit' => 'em',
			],
			'tablet_default' => [
				'unit' => 'em',
			],
			'mobile_default' => [
				'unit' => 'em',
			],
			'range' => [
				'em' => [
					'min' => 0,
					'max' => 5,
				],
			],
				]
		);

		$icon_spacing = is_rtl() ? 'margin-left: {{SIZE}}{{UNIT}};' : 'margin-right: {{SIZE}}{{UNIT}};';

		$this->add_responsive_control(
				'icon_spacing', [
			'label' => __('Spacing', ELEMENTOR_CARD_DESIGN_DOMAIN),
			'type' => Controls_Manager::SLIDER,
			'range' => [
				'px' => [
					'min' => 0,
					'max' => 100,
				],
			],
			'condition' => [
				'user_card_style' => [
					'user-card-style-3',
					'user-card-style-4',
					'user-card-style-5'
				],
			],
			'selectors' => [
				'{{WRAPPER}} .elementor-social-icon:not(:last-child)' => $icon_spacing,
			],
				]
		);

		$this->add_group_control(
				Group_Control_Border::get_type(), [
			'name' => 'image_border', // We know this mistake - TODO: 'icon_border' (for hover control condition also)
			'selector' => '{{WRAPPER}} .elementor-social-icon',
			'separator' => 'before',
				]
		);

		$this->add_control(
				'border_radius', [
			'label' => __('Border Radius', ELEMENTOR_CARD_DESIGN_DOMAIN),
			'type' => Controls_Manager::DIMENSIONS,
			'size_units' => ['px', '%'],
			'selectors' => [
				'{{WRAPPER}} .elementor-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
				]
		);

		$this->end_controls_section();
		/*
		 * End social media control style
		 */

		/*
		 * Start socail media hover control style
		 */
		$this->start_controls_section(
				'section_social_hover', [
			'label' => __('Social Icon Hover', ELEMENTOR_CARD_DESIGN_DOMAIN),
			'tab' => Controls_Manager::TAB_STYLE,
				]
		);

		$this->add_control(
				'hover_primary_color', [
			'label' => __('Primary Color', ELEMENTOR_CARD_DESIGN_DOMAIN),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'condition' => [
				'icon_color' => 'custom',
			],
			'selectors' => [
				'{{WRAPPER}} .elementor-social-icon:hover' => 'background-color: {{VALUE}};',
			],
				]
		);

		$this->add_control(
				'hover_secondary_color', [
			'label' => __('Secondary Color', ELEMENTOR_CARD_DESIGN_DOMAIN),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'condition' => [
				'icon_color' => 'custom',
			],
			'selectors' => [
				'{{WRAPPER}} .elementor-social-icon:hover i' => 'color: {{VALUE}};',
			],
				]
		);

		$this->add_control(
				'hover_border_color', [
			'label' => __('Border Color', ELEMENTOR_CARD_DESIGN_DOMAIN),
			'type' => Controls_Manager::COLOR,
			'default' => '',
			'condition' => [
				'image_border_border!' => '',
			],
			'selectors' => [
				'{{WRAPPER}} .elementor-social-icon:hover' => 'border-color: {{VALUE}};',
			],
				]
		);

		$this->add_control(
				'hover_animation', [
			'label' => __('Hover Animation', ELEMENTOR_CARD_DESIGN_DOMAIN),
			'type' => Controls_Manager::HOVER_ANIMATION,
				]
		);

		$this->end_controls_section();

		/* start section */
		$this->start_controls_section(
				'section_background_style', [
			'label' => __('Content Background Color', ELEMENTOR_CARD_DESIGN_DOMAIN),
			'tab' => Controls_Manager::TAB_STYLE,
			'condition' => [
				'user_card_style' => [
					'user-card-style-11'
				]
			]
				]
		);

		$this->add_control(
				'name_background_color', [
			'label' => __('Name', ELEMENTOR_CARD_DESIGN_DOMAIN),
			'type' => Controls_Manager::COLOR,
			'scheme' => [
				'type' => Scheme_Color::get_type(),
				'value' => Scheme_Color::COLOR_4,
			],
			'selectors' => [
				'{{WRAPPER}} .user-card-style-11 .name' => 'background-color: {{VALUE}};',
			],
				]
		);

		$this->add_control(
				'position_background_color', [
			'label' => __('Position', ELEMENTOR_CARD_DESIGN_DOMAIN),
			'type' => Controls_Manager::COLOR,
			'scheme' => [
				'type' => Scheme_Color::get_type(),
				'value' => Scheme_Color::COLOR_4,
			],
			'selectors' => [
				'{{WRAPPER}} .user-card-style-11 .position' => 'background-color: {{VALUE}};',
			],
				]
		);

		$this->end_controls_section();


		$this->start_controls_section(
				'triangle_background_style', [
			'label' => __('Triangle Color', ELEMENTOR_CARD_DESIGN_DOMAIN),
			'tab' => Controls_Manager::TAB_STYLE,
			'condition' => [
				'user_card_style' => [
					'user-card-style-11'
				]
			]
				]
		);

		$this->add_control(
				'triangle_background_color', [
			'label' => __('Color', ELEMENTOR_CARD_DESIGN_DOMAIN),
			'type' => Controls_Manager::COLOR,
			'scheme' => [
				'type' => Scheme_Color::get_type(),
				'value' => Scheme_Color::COLOR_4,
			],
			'selectors' => [
				'{{WRAPPER}} .user-card-style-11 .triangle-div' => 'border-top: solid 30px {{VALUE}}; border-left: solid 30px {{VALUE}};',
			],
				]
		);

		$this->end_controls_section();
		/*
		 * End control style tab for profile card
		 */
	}

	/**
	 * Render Card Elements widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		$class_animation = '';

		if (!empty($settings['hover_animation'])) {
			$class_animation = ' elementor-animation-' . $settings['hover_animation'];
		}

		switch ($settings['user_card_style']) {
			case 'user-card-style-1':
				include ELEMENTOR_CARD_DESIGN_PATH . 'includes/user-card/elementor-user-card-1.php';  // Card Style 1
				break;
			case 'user-card-style-2':
				include ELEMENTOR_CARD_DESIGN_PATH . 'includes/user-card/elementor-user-card-2.php';  // Card Style 2
				break;
			default:
				include ELEMENTOR_CARD_DESIGN_PATH . 'includes/user-card/elementor-user-card-1.php';  // Default Card Style 1
				break;
		}
	}

}

Plugin::instance()->widgets_manager->register_widget_type(new User_Card_Elementor_Widget());
