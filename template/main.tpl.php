<?php
	/**
	 * Created by PhpStorm.
	 * User: Sergey
	 * Date: 07.09.2017
	 * Time: 15:31
	 */
?>
	<span class="course_body">
		<span class="course_title"><?php _e( 'Course: ', $terr_course_text_domain ); ?></span>
<?php
		foreach ( $courses as $course )
		{
			if ( in_array( $course['ccy'], $terr_course_list ) )
			{
?>
				<span class="<?= $course['ccy'] ?>">
					<span class="currency_title"><?= $course['ccy'] ?></span>&nbsp;
					<span class="currency_val"><?= $course['buy'] ?> / <?= $course['sale'] ?></span>
				</span>
<?php
			}
		}
?>
		<span class="course_date"><?= __( 'On: ', $terr_course_text_domain ) . $date ?></span>
	</span>
