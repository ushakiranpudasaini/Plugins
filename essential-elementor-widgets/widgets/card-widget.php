<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Essential Elementor Card Widget.
 *
 * Elementor widget that inserts card with title and description.
 *
 * @since 1.0.0
 */
class Essential_Elementor_Card_Widget extends \Elementor\Widget_Base {
//Our widget code goes here

/**
	 * Get widget name.
	 *
	 * Retrieve Card widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
public function get_name() {
    return 'card';
}

/**
	 * Get widget title.
	 *
	 * Retrieve Card  widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Essential Card', 'essential-elementor-widget' );
	}

    /**
	 * Get widget icon.
	 *
	 * Retrieve Card widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-header';
	}

    /**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

    /**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the card widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'basic' ];
	}

    /**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the card widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'card', 'service', 'highlight', 'essential'];
	}

    	/**
	 * Register Card widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
    protected function register_controls() {
	
		$this->start_controls_section(
			'section_image',
			[
				'label' => __( 'Image', 'essential-elementor-widget' ),
			]
		);
	//image
	$this->add_control(
		'image',
		[
			'label' => __( 'Select Image', 'essential-elementor-widget' ),
			'type' => \Elementor\Controls_Manager::MEDIA,
			'default' => [
				'url' => \Elementor\Utils::get_placeholder_image_src(),
			],
		]
	);
	
	$this->end_controls_section();

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'essential-elementor-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		  
		
		$this->add_control(
			'card_title',
			[
				'label' => esc_html__( 'Card title', 'essential-elementor-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Your card title here', 'essential-elementor-widget' ),
			]
		);

		$this->add_control(
			'card_description',
			[
				'label' => esc_html__( 'Card Description', 'essential-elementor-widget' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Your card description here', 'essential-elementor-widget' ),
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( ' Style', 'essential-elementor-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_options',
			[
				'label' => esc_html__( ' Title Options', 'essential-elementor-widget' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'essential-elementor-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' =>'#f00',
				'selectors' => [
					'{{WRAPPER}} h3' => 'color: {{VALUE}};',				
				],
			]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'selector' => '{{WRAPPER}} h3', 
				]
			);
//Description
			$this->add_control(
				'description_options',
				[
					'label' => esc_html__( ' Description Options', 'essential-elementor-widget' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
	
			$this->add_control(
				'description_color',
				[
					'label' => esc_html__( 'Color', 'essential-elementor-widget' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' =>'#f00',
					'selectors' => [
						'{{WRAPPER}} .card_description' => 'color: {{VALUE}};',				
					],
				]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'description_typography',
						'selector' => '{{WRAPPER}} .card_description', 
					]
				);
		$this->end_controls_section();

    }

	/**
	 * Render card widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
//output code goes here
//get our input from the widget settings.
$settings = $this->get_settings_for_display();
//get  the individual values of the  input
$image_url = $settings['image']['url'];
$card_title= $settings['card_title'];
$card_description= $settings['card_description'];
?>

<div class="card">
<?php echo '<img src="' . esc_url($image_url) . '" alt="Custom Image">';?>
	<h3 class="card_title mb-4"><?php echo $card_title; ?></h3>
	<p class="card_description"><?php echo $card_description; ?></p>
</div>

<?php

	}

}