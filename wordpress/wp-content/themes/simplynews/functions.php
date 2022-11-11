<?php
/**
 * Get Simplynews and parent stylesheet  
 */
function simplynews_enqueue_styles() {
  wp_enqueue_style( 'child-style',
    get_stylesheet_directory_uri() . '/style.css',
    wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'simplynews_enqueue_styles', 11 );


/**
 * Unregister widgets that are not active in this child theme  
 */
function simplynews_remove_old_widgets(){
  unregister_sidebar( 'topwidget-1' );
  unregister_sidebar( 'topwidget-2' );
  unregister_sidebar( 'topwidget-3' );
  unregister_sidebar( 'topwidget-4' );
}
add_action( 'widgets_init', 'simplynews_remove_old_widgets', 99 );


/**
 * Unregister help page which is not active in this child theme  
 */
function simplynews_remove_old_themepage() {
  remove_action('admin_menu', 'simpleasy_helpandinformation_sp');
}
add_action('wp_loaded', 'simplynews_remove_old_themepage', 11);


/**
 * Remove old customizer sections
 */
function simplynews_remove_custom($wp_customize) {
  $wp_customize->remove_section('header_image');
  $wp_customize->remove_section('get_more_features_upsell');
  $wp_customize->remove_section('help_and_information');
}
add_action( 'customize_register', 'simplynews_remove_custom', 11 );


/**
 * Change default background color
 */
add_theme_support( 'custom-background', apply_filters( 'simplynews_custom_background_args', array(
  'default-color' => 'ececec',
  ) ) );




function simplynews_customize_register( $wp_customize ) {
 $wp_customize->add_section(
        'help_and_information',
        array(
            'title' => __('Theme Help', 'simplynews'),
            'priority' => 1,
            'description' => __( ' 
                <p>
                    <img src="http://themeastronaut.com/wp-content/uploads/2018/01/support.png" alt="Help And Information">
                </p>
                <p>
                <p><strong>Help And Information</strong><br>
                Need Help setting up SimplyNews? We have an awesome customer support who stand ready to assist you with your questions related to the theme.
                </p>

                <a class="customizer-button" href="http://themeastronaut.com/contact-us/" target="_blank" rel="nofollow">Contact Us</a>

                ', 'simplynews' ),
            )
        );  
    $wp_customize->add_setting('help_and_information_customizer_box', array(
        'sanitize_callback' => 'custom_field',
        'type' => 'info_control',
        'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'customizer_box_one', array(
        'section' => 'help_and_information',
        'settings' => 'help_and_information_customizer_box',
        'type' => 'custom_field',
        'priority' => 1
        ) )
    );   

   $wp_customize->add_section(
        'get_more_features_upsell',
        array(
            'title' => __('Get More Features', 'simplynews'),
            'priority' => 1,
            'description' => __( ' 
                <p>
                    <img src="http://themeastronaut.com/wp-content/uploads/2018/01/features.png" alt="Get more features">
                </p>
                <p>
                <p><strong>Get More Features</strong><br>
                If you are getting serious about using SimplyNews, consider upgrading to the premium version for <b>$14</b> to unlock lots of great new features!
                </p>

                <a class="customizer-button" href="http://themeastronaut.com/simplynews/" target="_blank" rel="nofollow">Read More</a>

                ', 'simplynews' ),
            )
        );  
    $wp_customize->add_setting('get_more_features_upsell_box', array(
        'sanitize_callback' => 'custom_field',
        'type' => 'info_control',
        'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'customizer_upsell_box', array(
        'section' => 'get_more_features_upsell',
        'settings' => 'get_more_features_upsell_box',
        'type' => 'custom_field',
        'priority' => 1
        ) )
    );   

}
add_action( 'customize_register', 'simplynews_customize_register', 99 );



/**
 * Simplynews Related Theme Subpage
 */

add_action( 'admin_menu', 'simplynews_helpandinformation_sp' );
function simplynews_helpandinformation_sp() {
    add_theme_page( __('SimplyNews Support', 'simplynews'), __('SimplyNews Support', 'simplynews'), 'edit_theme_options', 'simplynews-helpandinformation.php', 'simplynews_helpandinformation_text');
}

function simplynews_helpandinformation_text(){ ?>

<div class="information-cards">
<h1><?php echo __('SimplyNews Information and Links', 'simplynews') ?></h1>
<div class="information-card">
    <div class="information-card-box information-card-left">
        <a href="http://themeastronaut.com/contact-us/" target="_blank">
         <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/support.png"> 
        </a>
        <h2><?php echo __('Help and Information', 'simplynews') ?></h2>
        <p><?php echo __('Need Help setting up SimplyNews? We have an awesome customer support who stand ready to assist you with your questions related to the theme.', 'simplynews') ?></p>
        <a class="information-button" href="http://themeastronaut.com/contact-us/" target="_blank"><?php echo __('Theme Support', 'simplynews') ?></a>
    </div>
</div>
<div class="information-card">
    <div class="information-card-box information-card-top">
        <a href="http://themeastronaut.com/simplynews/" target="_blank">
         <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/features.png"> 
        </a>
        <h2><?php echo __('Get more features', 'simplynews') ?></h2>
        <p><?php echo __('If you are getting serious about using SimplyNews, consider upgrading to the premium version for $35 to unlock lots of great new features!', 'simplynews') ?></p>
        <a class="information-button" href="http://themeastronaut.com/simplynews/" target="_blank"><?php echo __('Read More', 'simplynews') ?></a>
    </div>
</div>
<div class="information-card">
    <div class="information-card-box information-card-right">
        <a href="https://wordpress.org/support/theme/simplynews/reviews/?filter=5" target="_blank">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/review.png"> 
        </a>
        <h2><?php echo __('Review SimplyNews', 'simplynews') ?></h2>
        <p><?php echo __('Enjoy using simplynews? Leave thoughtful feedback for us, that makes everyone very happy, let us know what you think!', 'simplynews') ?></p>
        <a class="information-button" href="https://wordpress.org/support/theme/simplynews/reviews/?filter=5" target="_blank"><?php echo __('Review SimplyNews', 'simplynews') ?></a>
    </div>
</div>
</div>
<?php }

/**
 * Simplynews Related Theme Subpage CSS
 */

function simplynews_helpandinformation( $hook ) {
    if ( 'appearance_page_simplynews-helpandinformation' !== $hook ) {
        return;
    }
    wp_enqueue_style( 'simplynews-helpandinformation-css', get_template_directory_uri() . '/assets/styles/helpandinformation.css');
}
add_action( 'admin_enqueue_scripts', 'simplynews_helpandinformation' );


/**
 * Enqueue customizer the stylesheet.
 */
function simplynews_customizer_customization_css() {

    wp_register_style( 'simplynews-customizer-customization', get_template_directory_uri() . '/assets/styles/customizer.css' );
    wp_enqueue_style( 'simplynews-customizer-customization' );

}
add_action( 'customize_controls_print_styles', 'simplynews_customizer_customization_css' );

