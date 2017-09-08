<?php

	if ( ! defined( 'ABSPATH' ) )
	{
		exit; // Exit if accessed directly
	}
?>
<h2 style="padding-left: 0;font-size: 18px;font-weight: bold;"><?php _e( 'Display', $terr_course_text_domain ) ?></h2>
<p><?php _e( 'To display the Courses on the site page as:', $terr_course_text_domain ) ?></p>
<p style="font-weight:600"><?php _e( 'Course: EUR  30.99938 / 30.85962 USD  25.98221 / 25.95426 At: 07 09 2017', $terr_course_text_domain ) ?></p>
<p><?php _e( 'It is necessary in the right place of the template to insert the PHP function', $terr_course_text_domain ) ?> <span style="font-weight: bold; color: red;">terr_kurs_show_inline();</span></p>
<p><?php _e( 'Or shortcode', $terr_course_text_domain ) ?> <span style="font-weight: bold; color: red;">[privat_bank_course]</span></p>
<h2 style="padding-left: 0;font-size: 16px;font-weight: bold;"><?php _e( 'Attention', $terr_course_text_domain ) ?></h2>
<p><?php _e( 'The exchange rate of Privat Bank is shown, in cash, in branches. To display other courses, you must use the settings on the corresponding tab.', $terr_course_text_domain ) ?></p>
