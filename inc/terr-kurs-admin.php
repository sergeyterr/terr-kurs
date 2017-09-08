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

		$type_exchange = array(
			'cash'          => __( 'Cash rate of PrivatBank (in branches)', $terr_course_text_domain ),
			'noncash'       => __( 'Non-cash exchange rate of PrivatBank (conversion by cards, Privat24, replenishment of deposits)', $terr_course_text_domain ),
			'selected_date' => __( 'Exchange rates for the selected date', $terr_course_text_domain ),
		);

		$terr_picker_options = array(
			'mode'    => 'single',
			'maxDate' => date( 'Y-m-d', ( time() - ( 6 * 24 * 60 * 60 ) ) ),
		);

		$args = array(
			'file'				=> 'admin-shortcode',
		);

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
					 Field::make( 'text', 'terr_course_check_time', __( 'Check Time (hours)', $terr_course_text_domain ) )//->set_width( 33 )
						  ->set_attribute( 'type', 'number' )
						  ->set_attribute( 'min', '1' )
						  ->set_attribute( 'step', '1' )
						  ->set_classes( 'terr_course_check_time' )
						  ->set_default_value( '4' )
						  ->set_attribute( 'placeholder', __( 'Input Check Time', $terr_course_text_domain ) )
						  ->set_help_text( __( 'Input time for check updates currency course.', $terr_course_text_domain ) ),
					 Field::make( 'html', 'terr_course_main_now' )
						  ->set_html( view_render( $args ) ),
				 ) )
				 ->add_tab( __( 'Additional Settings', $terr_course_text_domain ), array(
					 Field::make( 'select', 'terr_course_type_exchange', __( 'Type Exchange', $terr_course_text_domain ) )
						  ->set_width( 33 )
						  ->set_default_value( 'cash' )
						  ->set_classes( 'terr_course_type_exchange' )
						  ->set_help_text( __( 'Select your type course exchange', $terr_course_text_domain ) )
						  ->set_options( $type_exchange ),
					 Field::make( 'date', 'terr_course_date_exchange', __( 'Course Date', $terr_course_text_domain ) )
						  ->set_width( 34 )
						  ->set_classes( 'terr_course_date_exchange' )
						  ->set_picker_options( $terr_picker_options )
						  ->set_help_text( __( 'Select course date', $terr_course_text_domain ) )
						  ->set_conditional_logic( array(
							  'relation' => 'AND',
							  array(
								  'field'   => 'terr_course_type_exchange',
								  'value'   => 'selected_date',
								  'compare' => '=',
							  ),
						  ) ),
				 ) );
	}