<?php
	/**
	 * Created by PhpStorm.
	 * User: Sergey
	 * Date: 05.09.2017
	 * Time: 9:53
	 */

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