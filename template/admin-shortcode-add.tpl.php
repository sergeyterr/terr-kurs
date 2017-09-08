<?php

	if ( ! defined( 'ABSPATH' ) )
	{
		exit; // Exit if accessed directly
	}
?>
<h2 style="padding-left: 0;font-size: 18px;font-weight: bold;"><?php _e( 'Display', $terr_course_text_domain ) ?></h2>

<p><?php _e( 'To display the Courses on the site page as:', $terr_course_text_domain ) ?></p>

<br><br>

<?php terr_kurs_show_adding( 'cards' ); ?>

<br><br>

<p><?php _e( 'It is necessary in the right place of the template to insert the PHP function', $terr_course_text_domain ) ?> <span style="font-weight: bold; color: red;">terr_kurs_show_adding( 'cards' );</span></p>

<p><?php _e( 'Or shortcode', $terr_course_text_domain ) ?> <span style="font-weight: bold; color: red;">[privat_bank_course_add type_course = "cards" ]</span></p>


