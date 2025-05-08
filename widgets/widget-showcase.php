<?php
namespace Showcase;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Icons_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Showcase extends Widget_Base {

    // 1. Widget Name
    public function get_name() {
        return 'showcase';
    }

    // 2. Widget Title
    public function get_title() {
        return __('Showcase', 'plugin-name');
    }

    // 3. Widget Icon
    public function get_icon() {
        return 'eicon-button'; // Use an Elementor built-in icon
    }

    // 4. Widget Category
    public function get_categories() {
        return [ 'showcase-category' ];
    }
    

    // 5. Widget Controls
    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Showcase Settings', 'showcase-portfolio-addon' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
    
        $this->add_control(
            'button_text',
            [
                'label' => esc_html__( 'Button Text', 'showcase-portfolio-addon' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Showcase', 'showcase-portfolio-addon' ),
                'placeholder' => esc_html__( 'Enter button text', 'showcase-portfolio-addon' ),
                'label_block' => true,
                'dynamic' => [ 'active' => true ], // ✅ Dynamic tag support
            ]
        );
    
        $this->add_control(
            'button_icon',
            [
                'label' => esc_html__( 'Button Icon', 'showcase-portfolio-addon' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'label_block' => true,
            ]
        );
    
        $this->add_control(
            'button_url',
            [
                'label' => esc_html__( 'Showcase URL', 'showcase-portfolio-addon' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-showcase-url.com', 'showcase-portfolio-addon' ),
                'label_block' => true,
                'dynamic' => [ 'active' => true ], // ✅ Dynamic tag support
            ]
        );
    
        $this->end_controls_section();
    
    
        // Style Tab: Button Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Button', 'plugin-name'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
    
        // Button Position
                $this->add_responsive_control('button_alignment', [
                'label' => __('Position', 'plugin-name'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'plugin-name'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'plugin-name'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'plugin-name'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => __('Justify', 'plugin-name'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .showcase-button-container' => 'text-align: {{VALUE}};',
                ],
            ]
        );
    
        // Button Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __('Typography', 'plugin-name'),
                'selector' => '{{WRAPPER}} .showcase-button',
            ]
        );
    
        // Text Shadow
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'button_text_shadow',
                'label' => __('Text Shadow', 'plugin-name'),
                'selector' => '{{WRAPPER}} .showcase-button',
            ]
        );
    
        // Normal and Hover Tabs
        $this->start_controls_tabs('tabs_button_style');
    
        // Normal State
        $this->start_controls_tab(
            'tab_button_normal',
            [
                'label' => __('Normal', 'plugin-name'),
            ]
        );
    
        $this->add_control(
            'button_text_color',
            [
                'label' => __('Text Color', 'plugin-name'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .showcase-button' => 'color: {{VALUE}}',
                ],
            ]
        );
    
        $this->add_control(
            'button_background_color',
            [
                'label' => __('Background Color', 'plugin-name'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .showcase-button' => 'background-color: {{VALUE}}',
                ],
            ]
        );
    
        $this->end_controls_tab(); // End Normal State
    
        // Hover State
        $this->start_controls_tab(
            'tab_button_hover',
            [
                'label' => __('Hover', 'plugin-name'),
            ]
        );
    
        $this->add_control(
            'button_hover_text_color',
            [
                'label' => __('Text Color', 'plugin-name'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .showcase-button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
    
        $this->add_control(
            'button_hover_background_color',
            [
                'label' => __('Background Color', 'plugin-name'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .showcase-button:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
    
        $this->end_controls_tab(); // End Hover State
    
        $this->end_controls_tabs(); // End Tabs
    
        // Border
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'label' => __('Border', 'plugin-name'),
                'selector' => '{{WRAPPER}} .showcase-button',
            ]
        );
    
        // Border Radius
        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'plugin-name'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .showcase-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
    
        // Padding
        $this->add_control(
            'button_padding',
            [
                'label' => __('Padding', 'plugin-name'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .showcase-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
    
        // Box Shadow
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'label' => __('Box Shadow', 'plugin-name'),
                'selector' => '{{WRAPPER}} .showcase-button',
            ]
        );
    
        $this->end_controls_section(); // End Style Section
    }
    
    // In the render() method, modify the structure:
        protected function render() {
            $settings = $this->get_settings_for_display();
        
            $iframe_url = ! empty( $settings['button_url']['url'] ) ? esc_url( $settings['button_url']['url'] ) : '';
            $button_text = ! empty( $settings['button_text'] ) ? $settings['button_text'] : 'Showcase';
        
            ?>
            <!-- Tombol di luar -->
            <div class="showcase-button-container">
                <button class="showcase-button" id="openPopup">
                    <?php if ( ! empty( $settings['button_icon']['value'] ) ) : ?>
                        <?php \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    <?php endif; ?>
                    <?php echo esc_html( $button_text ); ?>
                </button>
            </div>
        
            <!-- Pop-up Showcase -->
            <div id="showcase" class="popup" style="display: none;">
                <div class="popup-content">
                    <!-- Tombol Live Preview -->
                    <?php if ( ! empty( $iframe_url ) ) : ?>
                        <a href="<?php echo $iframe_url; ?>" target="_blank" class="showcase-open-original" title="Live Preview">
                            Live Preview
                        </a>
                    <?php endif; ?>
        
                    <!-- Tombol Close -->
                    <span class="close" id="closePopup">&times;</span>
        
                    <!-- Tombol Mode Tampilan -->
                    <div class="frame-options">
                        <button class="frame-option" data-view="desktop" title="Desktop">
                            <img src="https://img.icons8.com/ios-filled/24/FFFFFF/monitor.png" alt="Desktop">
                        </button>
                        <button class="frame-option" data-view="tablet" title="Tablet">
                            <img src="https://img.icons8.com/ios-filled/24/FFFFFF/ipad.png" alt="Tablet">
                        </button>
                        <button class="frame-option" data-view="phone" title="Phone">
                            <img src="https://img.icons8.com/ios-filled/24/FFFFFF/iphone.png" alt="Phone">
                        </button>
                    </div>
        
                    <!-- Iframe -->
                    <div class="iframe-container desktop">
                        <iframe id="demoIframe" src="<?php echo $iframe_url; ?>" frameborder="0" sandbox="allow-same-origin allow-scripts allow-popups"></iframe>
                    </div>
                </div>
            </div>
            <?php
        }
        
    }