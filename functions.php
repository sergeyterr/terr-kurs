<?php
	/**
	 * Created by PhpStorm.
	 * User: Sergey
	 * Date: 05.09.2017
	 * Time: 9:53
	 */

	if ( ! defined( 'ABSPATH' ) )
	{
		exit; // Exit if accessed directly
	}

	//decor_market_var_dump( get_option( 'terr_course_exch', 'none' ) );

	/**
	 * Функция объявления текстовой переменной
	 */
	function terr_kurs_text_setup()
	{
		global $terr_course_text_domain;

		load_plugin_textdomain(
			$terr_course_text_domain,
			FALSE,
			dirname( plugin_basename( __FILE__ ) ) . '/lang/'
		);
	}

	/**
	 * Подключаем Carbon Fields
	 */
	if ( ! function_exists( 'terr_kurs_load_carbone' ) )
	{
		function terr_kurs_load_carbone()
		{
			if ( ! class_exists( 'Carbon_Fields\\Field\\Field' ) )
			{
				require_once( TERR_KURS_DIR . 'inc/carbon-fields/vendor/autoload.php' );
				\Carbon_Fields\Carbon_Fields::boot();
			}
		}
	}

	if ( ! function_exists( 'terr_kurs_check' ) )
	{
		/**
		 * Проверяем наличие опции с курсами и при отсутствии либо по истечении срока проверки - обновляем курсы
		 */
		function terr_kurs_check()
		{
			/**
			 * terr_course_date - штампдата, когда был записан курс
			 * terr_course_check_time - сколько по времени в часах интервал для проверки курса
			 * terr_course_exch - сохраненные курсы валют
			 */
			$now = time();
			$terr_course_check_time = carbon_get_theme_option( 'terr_course_check_time' );

			$terr_course_check_time = ( isset( $terr_course_check_time ) && $terr_course_check_time && ! empty( $terr_course_check_time ) && $terr_course_check_time != '' ) ? $terr_course_check_time : 4;

			$terr_course_check_time = $terr_course_check_time * 60 * 60;

			$terr_course_date = get_option( 'terr_course_date', FALSE );

			$check = FALSE;

			if ( ! $terr_course_date )
			{
				$check = TRUE;

			} else
			{
				$check_date = $terr_course_date + $terr_course_check_time;

				if ( $now > $check_date )
				{
					$check = TRUE;
				} else
				{
					$terr_course_exch = get_option( 'terr_course_exch', FALSE );

					if ( ! $terr_course_exch )
					{
						$check = TRUE;
					}
				}
			}

			if( $check )
			{
				if ( $terr_course = TerrPB24::get_course_pb24() )
				{
					update_option( 'terr_course_exch', $terr_course );
					update_option( 'terr_course_date', $now );
				}
			}
		}
	}

	/**
	 * Отображаем курсы валют
	 */
	if ( ! function_exists( 'terr_kurs_show' ) )
	{
		function terr_kurs_show( $echo = TRUE )
		{
			global $terr_course_text_domain;

			$courses = get_option( 'terr_course_exch', FALSE );
			$date = get_option( 'terr_course_date', FALSE );
			$date = date ( 'd m Y', $date );
			$terr_course_list = carbon_get_theme_option( 'terr_course_list' );

			$result = '<span class="course_body"><span class="course_title">' . __( 'Course: ', $terr_course_text_domain ) . '</span>';

			foreach ( $courses as $course )
			{
				if ( in_array( $course['ccy'], $terr_course_list ) )
				{
					$result .= '<span class="' . $course['ccy'] . '">' . $course['ccy'] . ' ' . $course['buy'] . '/' . $course['sale'] . '</span> ';
				}
			}

			$result .= '<span class="course_date">' . __( 'On: ', $terr_course_text_domain ) . $date . '</span></span>';

			if ( $echo )
				echo $result;
			else
				return $result;
		}
	}

	/**
	 * Отображаем курсы  шорткодом
	 */
	if ( ! function_exists( 'terr_kurs_show_short' ) )
	{
		function terr_kurs_show_short()
		{
			return terr_kurs_show( FALSE );
		}
	}