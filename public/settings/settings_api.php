<?php
require_once dirname( __FILE__ ) . '/class.mz_newsticker.php';
/**
 * Theme Admin panel for Tareq's Planet
 *
 * @author Tareq Hasan
 */
class WProng_testimonial {

    private $settings_api;

    function __construct() {
        $this->settings_api = new Wprong_Settings_API();

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
         add_options_page( __( 'Muizz Newsticker', 'mz-newsticker' ), __( 'Muizz Newsticker', 'mz-newsticker' ), 'manage_options', 'Newsticker_id', array( $this, 'plugin_page' ) );
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id' => 'mznst_newsticker_general_settings',
                'title' => __( 'General Settings', 'mz-newsticker' ),
            	 
            ),
            array(
                'id' => 'mznst_newsticker_style_settings',
                'title' => __( 'Style Settings', 'mz-newsticker' )
            ),
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'mznst_newsticker_general_settings' => array(  
                 array(
                    'name' => 'mznst_newsticker_direction',
                    'label' => __('Newsticker direction', 'mz-newsticker'),
                    'desc' => __('Newsticker direction. Default is left', 'mz-newsticker'),
                    'type' => 'select',
                    'default' => 'left',
                    'options' => array(
                        'left' => 'Left',
                        'right' => 'Right',
                        'top' => 'Top',
                        'bottom' => 'bottom',
                    )
                ),                              
               
                 array(
                    'name' => 'mznst_newsticker_slideshowSpeed',
                    'label' => __( 'Slide show speed', 'mz-newsticker' ),
                    'desc' => __( 'Set sliding speed in milliseconds. Default value 3 .', 'mz-newsticker' ),
                    'type' => 'number',
                    'default' => '120'
                ), 

               array(
                    'name' => 'mznst_newsticker_post_limit',
                    'label' => __( 'Newsticker number to show', 'mz-newsticker' ),
                    'desc' => __( 'Set how many newsticker want to show. Default value 5 .', 'mz-newsticker' ),
                    'type' => 'number',
                    'default' => '5'
                ),              
              array(
                    'name' => 'mznst_newsticker_post_category',
                    'label' => __( 'Newsticker post category', 'mz-newsticker' ),
                    'desc' => __( 'Set post category name for newsticker want to show ( use category slug) .', 'mz-newsticker' ),
                    'type' => 'text',                     
                ),  
              
              
            		
            ),
        		
            'mznst_newsticker_style_settings' => array(

                     array(
                        'name' => 'mznst_newsticker_container_height',
                        'label' => __( 'Newsticker container height', 'mz-newsticker' ),
                        'desc' => __( 'Set Newsticker container height. Default value 46 .', 'mz-newsticker' ),
                        'type' => 'number',
                        'default' => '46'
                    ), 
                      

                     array(
                        'name' => 'mznst_newsticker_title_font_size',
                        'label' => __( 'Newsticker title font size', 'mz-newsticker' ),
                        'desc' => __( 'Set Newsticker title font size. Default value 16 .', 'mz-newsticker' ),
                        'type' => 'number',
                        'default' => '16'
                    ), 
                      array(
                        'name'    => 'mznst_newsticker_title_color',
                        'label'   => __( 'Newsticker title color ', 'mz-newsticker' ),
                        'desc'    => __( 'Select a color for Newsticker title. Default #fff', 'mz-newsticker' ),
                        'type'    => 'color',
                        'default' => '#fff'
                    ),
                      array(
                        'name'    => 'mznst_newsticker_title_background',
                        'label'   => __( 'Newsticker title background', 'mz-newsticker' ),
                        'desc'    => __( 'Select a color for Newsticker title background. Default #000', 'mz-newsticker' ),
                        'type'    => 'color',
                        'default' => '#000'
                    ),

                    array(
                        'name' => 'mznst_newsticker_title_padding',
                        'label' => __( 'Newsticker title padding', 'mz-newsticker' ),
                        'desc' => __( 'Set Newsticker title padding. Default value 13px 10px .', 'mz-newsticker' ),
                        'type' => 'text',
                        'default' => '13px 10px'
                    ), 
                     

                     array(
                        'name' => 'mznst_newsticker_font_size',
                        'label' => __( 'Newsticker font size', 'mz-newsticker' ),
                        'desc' => __( 'Set Newsticker font size. Default value 16 .', 'mz-newsticker' ),
                        'type' => 'number',
                        'default' => '16'
                    ), 

                       array(
                        'name' => 'mznst_newsticker_icon_size',
                        'label' => __( 'Newsticker icon size', 'mz-newsticker' ),
                        'desc' => __( 'Set Newsticker icon size. Default value 16 .', 'mz-newsticker' ),
                        'type' => 'number',
                        'default' => '16'
                    ),
                   array(
                    'name'    => 'mznst_newsticker_bg_color',
                    'label'   => __( 'Newsticker background color ', 'mz-newsticker' ),
                    'desc'    => __( 'Select a color for Newsticker background color. Default #606060', 'mz-newsticker' ),
                    'type'    => 'color',
                    'default' => '#606060'
                ),

                array(
                    'name'    => 'mznst_newsticker_font_color',
                    'label'   => __( 'Newsticker items font color', 'mz-newsticker' ),
                    'desc'    => __( 'Select a color for Newsticker items font color. Default #FFFFFF', 'mz-newsticker' ),
                    'type'    => 'color',
                    'default' => '#FFFFFF'
                ),
                 array(
                    'name'    => 'mznst_newsticker_icon_color',
                    'label'   => __( 'Newsticker icon color', 'mz-newsticker' ),
                    'desc'    => __( 'Select a color for Newsticker icon color. Default #FFFFFF', 'mz-newsticker' ),
                    'type'    => 'color',
                    'default' => '#FFFFFF'
                ),
                  array(
                    'name'    => 'mznst_newsticker_fontawesome',
                    'label'   => __( 'Newsticker fontawesome icon', 'mz-newsticker' ),
                    'desc'    => __( 'Add the Newsticker fontawesome icon code (e.g. fa-star) . Default fa-star-half-full', 'mz-newsticker' ),
                    'type'    => 'text',
                    'default' => 'fa-star-half-full',
                    'size'    => 'medium'
                ),
                    


              
                
              
              
            )
        );

        return $settings_fields;
    }

    function plugin_page() {
        echo '<div class="wrap">';
        settings_errors();

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
    }

}

$settings = new WProng_testimonial();
