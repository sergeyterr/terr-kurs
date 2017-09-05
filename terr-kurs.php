<?php
	/**
	 * Plugin Name: Privat Bank Course Exchange
	 * Plugin URI: https://ater.com.ua
	 * Description: Плагин получения курсов валют
	 * Version: 1.0.0
	 * Author: Sergey Terr
	 * Author URI: http://ater.com.ua
	 * Support URI: http://aterweb.ru
	 * Copyright: (c) 2017 AterWEB
	 * License: GNU General Public License v2.0
	 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
	 * Text Domain: terr-course-exch
	 * Domain Path: /lang
	 */

	/**
	 * Copyright 2015  sergeyterr  (email: ater123@mail.ru)
	 *
	 * This program is free software; you can redistribute it and/or modify
	 * it under the terms of the GNU General Public License as published by
	 * the Free Software Foundation; either version 2 of the License, or
	 * (at your option) any later version.
	 *
	 * This program is distributed in the hope that it will be useful,
	 * but WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 * GNU General Public License for more details.
	 *
	 * You should have received a copy of the GNU General Public License
	 * along with this program; if not, write to the Free Software
	 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	 */

	if ( ! defined( 'ABSPATH' ) )
	{
		exit; // Exit if accessed directly
	}

	$terr_course_text_domain = 'terr-course-exch';

	require_once( 'functions.php' );

	// Подключаем текстовый домен
	add_action( 'plugins_loaded', 'terr_kurs_text_setup' );