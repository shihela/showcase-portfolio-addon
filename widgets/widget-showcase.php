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
    protected function _register_controls() {
        // Button Settings Section
        $this->start_controls_section(
            'button_section',
            [
                'label' => __('Button Settings', 'plugin-name'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
    
        $this->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'plugin-name'),
                'type' => Controls_Manager::TEXT,
                'default' => __('View Showcase', 'plugin-name'),
            ]
        );
    
        $this->add_control(
            'button_url',
            [
                'label' => __('Showcase URL', 'plugin-name'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-showcase-url.com', 'plugin-name'),
                'default' => [
                    'url' => '#',
                ],
            ]
        );
    
        $this->end_controls_section(); // End Content Section
    
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

        // Ensure the URL is properly escaped
        $iframe_url = ! empty( $settings['button_url']['url'] ) ? esc_url( $settings['button_url']['url'] ) : '';
        ?>

        <!-- Showcase Button Container -->
        <div class="showcase-button-container">
            <button class="showcase-button" id="openPopup">
                <?php if ( ! empty( $settings['button_icon']['value'] ) ) : ?>
                    <?php Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                <?php endif; ?>
                <?php echo esc_html( $settings['button_text'] ); ?>
            </button>
        </div>
        
        
        <!-- Pop-Up HTML -->
        <div id="showcase" class="popup" style="display: none;">
            <div class="popup-content">
                <span class="close" id="closePopup">&times;</span>
                <!-- ✅ Tambahkan Tombol "Live Preview" di sini -->
                    <a href="<?php echo esc_url( $iframe_url ); ?>" target="_blank" class="showcase-open-original" title="Live Preview">
                        Live Preview
                    </a>
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
                <div class="iframe-container desktop">
                    <iframe id="demoIframe" src="<?php echo $iframe_url; ?>" frameborder="0" sandbox="allow-same-origin allow-scripts allow-popups"></iframe>
                </div>
            </div>
        </div>

        <?php
    }
}
