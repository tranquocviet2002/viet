<?php

/**
 * Soccer Academy Customizer Sortable Control.
 * 
 * @package Soccer Academy
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Exit if WP_Customize_Control does not exsist.
if ( ! class_exists( 'WP_Customize_Control' ) ) {
    return null;
}

/**
 * Sortable control (uses checkboxes).
 */
class Soccer_Academy_Control_Sortable extends WP_Customize_Control {

    /**
     * The control type.
     *
     * @access public
     * @var string
     */
    public $type = 'soccer-academy-sortable';

    public function enqueue() {
      wp_enqueue_script('soccer-academy-control-sortable',trailingslashit( esc_url( get_template_directory_uri() ) ) . 'inc/sortable/sortable_control.js',array( 'jquery', 'jquery-ui-core' ),'1.1', true );
        wp_enqueue_style( 'soccer-academy-control-sortable', trailingslashit( get_template_directory_uri() ) . 'inc/sortable/sortable_control.css', '', time() );
    }

    /**
     * Refresh the parameters passed to the JavaScript via JSON.
     *
     * @see WP_Customize_Control::to_json()
     */
    public function to_json() {

        parent::to_json();

        $this->json['default'] = $this->setting->default;
        if ( isset( $this->default ) ) {
            $this->json['default'] = $this->default;
        }

        $this->json['id']         = $this->id;
        $this->json['link']       = $this->get_link();
        $this->json['value']      = maybe_unserialize( $this->value() );
        $this->json['choices']    = $this->choices;
        $this->json['inputAttrs'] = '';

        foreach ( $this->input_attrs as $attr => $value ) {
            $this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
        }
        $this->json['inputAttrs'] = maybe_serialize( $this->input_attrs() );

    }

    /**
     * An Underscore (JS) template for this control's content (but not its container).
     *
     * Class variables for this control class are available in the `data` JS object;
     * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
     *
     * @see WP_Customize_Control::print_template()
     *
     * @access protected
     */
    protected function content_template() {
    ?>
    <label class="customize-control-soccer-academy-sortable">
        <span class="customize-control-title">
            {{{ data.label }}}
        </span>
        <# if ( data.description ) { #>
            <span class="customize-control-description">{{{ data.description }}}</span>
        <# } #>

        <ul class="sortable">
            <# _.each( data.value, function( choiceID ) { #>
                <li {{{ data.inputAttrs }}} class="soccer-academy-sortable-item" data-value="{{ choiceID }}">
                    <i class="dashicons dashicons-visibility visibility"></i>
                    <span>{{{ data.choices[ choiceID ] }}}</span>
                </li>
            <# }); #>
            <# _.each( data.choices, function( choiceLabel, choiceID ) { #>
                <# if ( -1 === data.value.indexOf( choiceID ) ) { #>
                    <li {{{ data.inputAttrs }}} class="soccer-academy-sortable-item invisible" data-value="{{ choiceID }}">
                        <i class="dashicons dashicons-visibility visibility"></i>
                        <span>{{{ data.choices[ choiceID ] }}}</span>
                    </li>
                <# } #>
            <# }); #>
        </ul>
    </label>
    <?php
}

    /**
     * Render the control's content.
     *
     * @see WP_Customize_Control::render_content()
     */
    protected function render_content() {}
}