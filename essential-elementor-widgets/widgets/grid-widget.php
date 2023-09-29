<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


		
/**
 * grid Elementor Card Widget.
 *
 * Elementor widget that inserts card with title and description.
 *
 * @since 1.0.0
 */
class Monalgrid_Elementor_Card_Widget extends \Elementor\Widget_Base {
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
		return esc_html__( 'Monalgrid Card', 'monalgrid-elementor-widget' );
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
		return [ 'layout' ];
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
		return [ 'card', 'service', 'highlight', 'grid'];
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
			'content_section',
			[
				'label' => esc_html__( 'Content', 'monalgrid-elementor-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'post_type',
			[
				'label' => __( 'Post Type', 'monalgrid-elementor-widget' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'post' => __( 'Posts', 'monalgrid-elementor-widget' ),
					'page' => __( 'Pages', 'monalgrid-elementor-widget' ),
					// Add more custom post types if needed.
				],
				'default' => 'post',
			]
		); 
		$this->add_control(
			'posts_per_page',
			[
				'label' => __( 'Posts Per Page', 'monalgrid-elementor-widget' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 3, // Default number of posts per page.
			]
		);

		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( ' Style', 'monalgrid-elementor-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_options',
			[
				'label' => esc_html__( ' Title Options', 'monalgrid-elementor-widget' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'monalgrid-elementor-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' =>'#000000',
				'selectors' => [
					'{{WRAPPER}} h2' => 'color: {{VALUE}};',				
				],
			]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'selector' => '{{WRAPPER}} h2', 
				]
			);
//Description
			$this->add_control(
				'description_options',
				[
					'label' => esc_html__( ' Description Options', 'monalgrid-elementor-widget' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
	
			$this->add_control(
				'description_color',
				[
					'label' => esc_html__( 'Color', 'monalgrid-elementor-widget' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' =>'#747474',
					'selectors' => [
						'{{WRAPPER}} .custom-card-excerpt' => 'color: {{VALUE}};',				
					],
				]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'description_typography',
						'selector' => '{{WRAPPER}} .custom-card-excerpt', 
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
	// protected function render() {
	// 	$settings = $this->get_settings_for_display();
	// 	echo '<div class=" grid grid-cols-3 gap-6 font-poppins">';
	// 	$query_args = [
	// 		'post_type' => $settings['post_type'],
	// 		'posts_per_page' => $settings['posts_per_page'],
	// 		// Add more query arguments as needed.
	// 	];
	
	// 	$query = new WP_Query( $query_args );
	
	// 	if ( $query->have_posts() ) {
	// 		while ( $query->have_posts() ) {
	// 			$query->the_post();
	
	// 			// Get post details.
	// 			$post_title = get_the_title();
	// 			$post_content = wpautop( get_the_content() );
	// 			$post_image = get_the_post_thumbnail( get_the_ID(), 'large' );
	
	// 			// Output the custom card HTML.
				
				
	// 			echo '<div class="custom-card " >';			
	// 			echo '<div class="custom-card-image ">' . $post_image . '</div>';
	// 			echo '<div class="custom-card-content">';
	// 			echo '<h2 class="custom-card-title text-xl mb-4 mt-4 font-bold ">' . esc_html( $post_title ) . '</h2>';
	// 			echo '<div class="custom-card-description">' . $post_content . '</div>';
	// 			echo '</div>';
	// 			echo '</div>';
	// 		}
	
	// 		// Add pagination HTML here if needed.
	
	// 		// Restore the global post object.
	// 		wp_reset_postdata();
	// 	} else {
	// 		echo '<p>No posts found.</p>';
	// 	}


	// 	echo '</div>';


	// }
	
	protected function render() {
		$settings = $this->get_settings_for_display();
	
		// Open a container for the grid (add this before your loop).
		echo '<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 font-poppins">';
	
		$query_args = [
			'post_type' => $settings['post_type'],
			'posts_per_page' => $settings['posts_per_page'],
			
			
			// Add more query arguments as needed.
		];
	
		$query = new WP_Query( $query_args );
	
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
	
				// Get post details.
				$post_title = get_the_title();
				         $post_image = get_the_post_thumbnail(get_the_ID(), array(150, 150), array(
                'class' => 'w-full  object-cover', // Customize width and custom height
            ));
				//  $post_image = get_the_post_thumbnail( get_the_ID(), 'large' , array( 'class' => 'w-full  ' ));
				$post_permalink = get_permalink(); // Get the post's permalink.
				$post_excerpt = get_the_excerpt();
				$post_excerpt = wp_trim_words( $post_excerpt, 16, '...' ); // Limit to 20 words and add ellipsis (...) at the end if truncated.
				
				// Output the custom card HTML.
				echo '<a href="' . esc_url( $post_permalink ) . '" class="custom-card-link">';
				echo '<div class="custom-card bg-white rounded-lg overflow-hidden shadow-md ">';
				echo '<div class="custom-card-image" >' . $post_image . '</div>';
				echo '<div class="custom-card-content p-4 ">';
				echo '<h2 class="custom-card-title text-lg mb-4 font-bold">' . esc_html( $post_title ) . '</h2>';
				echo '<div class="custom-card-excerpt text-base">' . $post_excerpt . '</div>'; // Use $post_excerpt for the truncated excerpt.
				echo '</div>';
				echo '</div>';
			}
	
			// Add pagination HTML here if needed.
	
			// Restore the global post object.
			wp_reset_postdata();
		} else {
			echo '<p>No posts found.</p>';
		}
	
		// Close the container for the grid (add this after your loop).
		echo '</div>';
	}
	
	
}