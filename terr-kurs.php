<?php
	/**
	 * Plugin Name: Privat Bank Course Exchange
	 * Plugin URI: https://ater.com.ua
	 * Description: Плагин получения курсов валют
	 * Version: 1.0.1
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

	define( 'TERR_KURS_DS', DIRECTORY_SEPARATOR );
	// terr-kurs/terr-kurs.php
	define( 'TERR_KURS_PLUGIN_FILE', dirname( plugin_basename( __FILE__ ) ) . '/terr-kurs.php' );
	// terr-kurs/
	define( 'TERR_KURS_PLUGIN_FOLDER', dirname( plugin_basename( __FILE__ ) ) . '/' );
	// E:\server\domains\testt\www/wp-content/plugins/terr-kurs/
	define( 'TERR_KURS_DIR', WP_PLUGIN_DIR . '/' . TERR_KURS_PLUGIN_FOLDER );
	// http://testt/wp-content/plugins/terr-kurs/
	define( 'TERR_KURS_URL', WP_PLUGIN_URL . '/' . TERR_KURS_PLUGIN_FOLDER );

	//decor_market_var_dump( TERR_KURS_URL );

	// Подключаем класс работы с ПБ
	require_once( TERR_KURS_DIR . 'classes/class-terr-pb24.php' );
	// Подключаем functions.php
	require_once( TERR_KURS_DIR . 'functions.php' );
	// Подключаем файл создания админки
	require_once( TERR_KURS_DIR . 'inc/terr-kurs-admin.php' );

	// Подключаем текстовый домен
	add_action( 'plugins_loaded', 'terr_kurs_text_setup' );
	// Подключаем Carbon Fields
	add_action( 'after_setup_theme', 'terr_kurs_load_carbone', 5 );
	// Запускаем проверку курсов
	add_action( 'init', 'terr_kurs_check' );

	// добавляем шорткод вывода курсов
	add_shortcode( 'privat_bank_course', 'terr_kurs_show_short' );