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

			/**
			 * Получаем список валют и курсов
			 *
			 * TerrPB24::get_course_pb24()
			 *
			 * @return array|bool|mixed|null|object
			 */
			public static function get_course_pb24()
			{
				$url_api    = 'https://api.privatbank.ua/p24api/pubinfo?json&exchange';
				$params_api = array(
					'coursid' => '3',
				);

				$course = self::P24sendRequest( $url_api, $params_api );

				return $course;
			}

			/**
			 * Делаем запрос в Приват Банк
			 *
			 * TerrPB24::P24sendRequest( $url, $params )
			 *
			 * @param string $url
			 * @param array  $params
			 *
			 * @return array|bool|mixed|null|object
			 */
			public static function P24sendRequest( $url = '', $params = array() )
			{
				// чтобы кириллица правильно передалась
				$params = urlencode_deep( $params );

				// Добавим параметр в URL
				$url = add_query_arg( $params, $url );

				$response = file( $url );

				if ( isset( $response[0] ) )
				{
					$response = json_decode( $response[0], TRUE );

					if ( is_array( $response[0] ) && array_key_exists( 'ccy', $response[0] ) )
					{
						return $response;
					}
				}

				return FALSE;
			}
		}
	}