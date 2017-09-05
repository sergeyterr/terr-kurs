<?php
	/**
	 * Created by PhpStorm.
	 * User: Sergey
	 * Date: 05.09.2017
	 * Time: 10:37
	 */

	if( !defined( 'ABSPATH' ) )
	{
		exit; // Exit if accessed directly
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'terr_kurs_admin_theme_options' );

	function terr_kurs_admin_theme_options()
	{
		global $terr_course_text_domain;

		Container::make( 'theme_options', __( 'Privat Bank Course', $terr_course_text_domain ) )
				 ->set_page_file( 'terr_course_admin_page' )
				 ->set_icon( 'dashicons-chart-bar' )
				 ->add_tab( __( 'Base Settings', $terr_course_text_domain ), array(
					 Field::make( 'set', 'terr_course_list', __( 'Currency', $terr_course_text_domain ) )
						  ->add_options( array(
							  'EUR' => __( 'Euro', $terr_course_text_domain ),
							  'RUR' => __( 'Russian Ruble', $terr_course_text_domain ),
							  'USD' => __( 'US Dollar', $terr_course_text_domain ),
							  'BTC' => __( 'Bitcoint', $terr_course_text_domain ),
						  ) )
						  ->set_default_value( array( 'USD', 'EUR' ) )
						  ->set_help_text( __( 'Select the currency to display.', $terr_course_text_domain ) ),
					 Field::make( 'text', 'terr_course_check_time', __( 'Check Time (hours)', $terr_course_text_domain ) )
						  ->set_width( 50 )
						  ->set_classes( 'terr_course_check_time' )
						  ->set_default_value( '4' )
						  ->set_attribute( 'placeholder', __( 'Input Check Time', $terr_course_text_domain ) )
						  ->set_help_text( __( 'Input time for check updates currency course.', $terr_course_text_domain ) ),
				 ) );
	}