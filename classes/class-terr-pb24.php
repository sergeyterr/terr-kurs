<?php
	/**
	 * Created by PhpStorm.
	 * User: Sergey
	 * Date: 05.09.2017
	 * Time: 11:42
	 */

	if ( ! defined( 'ABSPATH' ) )
	{
		exit; // Exit if accessed directly
	}

	if ( ! class_exists( 'TerrPB24' ) )
	{
		/**
		 * Class TerrPB24
		 */
		class TerrPB24 {

			public static $url_api = 'https://api.privatbank.ua/p24api/';
			public static $date = '01.12.2014';

			/**
			 * @param $key
			 *
			 * @return bool|mixed
			 */
			public static function exchange_opt( $key )
			{
				$opt = array(
					'exchange' => 'pubinfo?json&exchange&coursid=5',
					'cards'    => 'pubinfo?json&exchange&coursid=11',
					'date'     => 'exchange_rates?json&date=',
				);

				return isset( $opt[$key] ) ? $opt[$key] : FALSE;
			}

			/**
			 * Получаем список валют и курсов
			 *
			 * TerrPB24::get_course_pb24( $params_api, $date = '01.12.2014' )
			 * 'exchange'
			 * 'cards'
			 * 'date'
			 *
			 * @param        $params
			 * @param string $date
			 *
			 * @return array|bool|mixed|null|object|string
			 */
			public static function get_course_pb24( $params, $date = FALSE )
			{
				$date = ! $date ? self::$date : $date;

				if ( ! $params_api = self::exchange_opt( $params ) )
					return FALSE;

				if ( $params == 'date' )
				{
					$url_api    = self::$url_api . $params_api . $date;
				} else
				{
					$url_api    = self::$url_api . $params_api;
				}


				$course = self::P24sendRequest( $url_api );

				return $course;
			}

			/**
			 * Делаем запрос в Приват Банк
			 *
			 * TerrPB24::P24sendRequest( $url, $params )
			 *
			 * @param string $url
			 *
			 * @return array|bool|mixed|null|object
			 */
			public static function P24sendRequest( $url = '' )
			{
				if ( self::urlExists( $url ) )
				{
					$response = file( $url );
				} else
				{
					return FALSE;
				}

				$response = json_decode( $response[0], TRUE );

				return $response;
			}

			private static function urlExists( $path )
			{
				return ( @fopen( $path, "r" ) == TRUE );
			}
		}
	}