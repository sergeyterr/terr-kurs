<?php

	if ( ! defined( 'ABSPATH' ) )
	{
		exit; // Exit if accessed directly
	}

	if ( $type == 'cards' )
	{
		$text = 'по карточкам';
	} elseif ( $type == 'exchange' )
	{
		$text = 'в обменках';
	} else
	{
		$text = '';
	}
?>
	<h3><?= __( 'Course', $terr_course_text_domain ) . ' ' . $text . ' ' . __( 'on the date:', $terr_course_text_domain ) . ' ' . $dates?></h3>
	<div style="width: 300px">
		<table>
			<thead>
				<tr>
					<th><?php _e( 'Currency', $terr_course_text_domain ) ?></th>
					<th><?php _e( 'Buy', $terr_course_text_domain ) ?></th>
					<th><?php _e( 'Sale', $terr_course_text_domain ) ?></th>
				</tr>
			</thead>

			<tbody>
<?php
				foreach ( $courses as $course )
				{
?>
					<tr>
						<td><?= $course['ccy'] ?></td>
						<td><?= $course['buy'] ?></td>
						<td><?= $course['sale'] ?></td>
					</tr>
<?php
				}
?>
			</tbody>
		</table>
	</div>
