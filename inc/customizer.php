<?php
/**
 * libchurch Theme Customizer
 *
 * @package libchurch
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function libchurch_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'libchurch_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'libchurch_customize_partial_blogdescription',
			)
		);
	}

	$wp_customize->add_section( 'libchurch_theme_options', array(
		'title'    => __( 'Theme options', 'libchurch' ),
		'priority' => 10,
	) );


	for ($i=1; $i<5;$i++){

		$setting = 'options_'.$i.'_select';

		$wp_customize->add_setting( $setting, [
			'default'   => 'linkedin',     // этот шрифт будет задействован по умолчанию
			'type'      => 'theme_mod', // использовать get_theme_mod() для получения настроек, если указать 'option', то нужно будет использовать функцию get_option()
		] );

		$wp_customize->add_control( $setting, [
			'section'  => 'libchurch_theme_options', // секция
			'label'    => 'Соцсеть '.$i,
			'type'     => 'select', // выпадающий список select
			'choices'  => [ // список значений и лейблов выпадающего списка в виде ассоциативного массива
				'fa-facebook'     => 'Facebook',
				'fa-instagram'   => 'Instagram',
				'fa-linkedin'   => 'Linkedin',
				'fa-twitter'   => 'Twitter',
				'fa-youtube'   => 'Youtube',
				'fa-vk' => 'VK',
				'fa-odnoklassniki' => 'Odnoklassniki',
				'fa-telegram' => 'Telegram',
			]
		] );
		$setting = 'options_'.$i;
		$wp_customize->add_setting( $setting, [
			'type'      => 'theme_mod', // использовать get_theme_mod() для получения настроек, если указать 'option', то нужно будет использовать функцию get_option()
		] );

		$wp_customize->add_control( $setting, array(
			'section' => 'libchurch_theme_options',
		) );
	}


	// facebook

	$wp_customize->add_setting( 'libchurch_facebook' );
	$wp_customize->add_control( 'libchurch_facebook', array(
		'label'   => __( 'Facebook link', 'libchurch' ),
		'section' => 'libchurch_theme_options',
	) );

	// instagram
	$wp_customize->add_setting( 'libchurch_instagram' );
	$wp_customize->add_control( 'libchurch_instagram', array(
		'label'   => __( 'Instagram link', 'libchurch' ),
		'section' => 'libchurch_theme_options',
	) );

	// twitter
	$wp_customize->add_setting( 'libchurch_twitter' );
	$wp_customize->add_control( 'libchurch_twitter', array(
		'label'   => __( 'Twitter link', 'libchurch' ),
		'section' => 'libchurch_theme_options',
	) );

	// youtube
	$wp_customize->add_setting( 'libchurch_youtube' );
	$wp_customize->add_control( 'libchurch_youtube', array(
		'label'   => __( 'Youtube link', 'libchurch' ),
		'section' => 'libchurch_theme_options',
	) );

	// LinkedIn
	$wp_customize->add_setting( 'libchurch_linkedin' );
	$wp_customize->add_control( 'libchurch_linkedin', array(
		'label'   => __( 'Linkedin link', 'libchurch' ),
		'section' => 'libchurch_theme_options',
	) );

}
add_action( 'customize_register', 'libchurch_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function libchurch_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function libchurch_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function libchurch_customize_preview_js() {
	wp_enqueue_script( 'libchurch-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'libchurch_customize_preview_js' );

function libchurch_socnet_link_options(){
	$options_arr = [];
	for ($i=1; $i<5;$i++){
		if(! empty(get_theme_mod('options_'.$i)) ){
			$options_arr[] = array(
				'option_select' => get_theme_mod('options_'.$i.'_select'),
				'option_link' => get_theme_mod('options_'.$i));
		}
	}
	return $options_arr;
}
function libchurch_theme_options() {
	return array(
		'phone' => get_theme_mod('libchurch_phone'),
		'facebook' => get_theme_mod('libchurch_facebook'),
		'instagram' => get_theme_mod('libchurch_instagram'),
		'twitter' => get_theme_mod('libchurch_twitter'),
		'youtube' => get_theme_mod('libchurch_youtube'),
		'linkedin' => get_theme_mod('libchurch_linkedin'),
	);
}
