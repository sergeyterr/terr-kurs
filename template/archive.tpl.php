<?php

	if ( ! defined( 'ABSPATH' ) )
	{
		exit; // Exit if accessed directly
	}
?>
	<h3><?php _e( 'Course archive as of the date:', $terr_course_text_domain ) ?> <?= $dates ?></h3>

	<div style="width: 600px">
		<table>
			<thead>
			<tr>
				<th><?php _e( 'Currency', $terr_course_text_domain ) ?></th>
				<th><?php _e( 'Buy NB', $terr_course_text_domain ) ?></th>
				<th> <?php _e( 'Sale NB', $terr_course_text_domain ) ?></th>
				<th><?php _e( 'Buy', $terr_course_text_domain ) ?></th>
				<th><?php _e( 'Sale', $terr_course_text_domain ) ?></th>
			</tr>
			</thead>

			<tbody>
<?php
				foreach ( $courses['exchangeRate'] as $course )
				{
?>
					<tr>
						<td><?= $course['currency'] ?></td>
						<td><?= $course['purchaseRateNB'] ?></td>
						<td><?= $course['saleRateNB'] ?></td>
						<td><?php echo ( isset( $course['purchaseRate'] ) ? $course['purchaseRate'] : '' ) ?></td>
						<td><?php echo ( isset( $course['saleRate'] ) ? $course['saleRate'] : '' ) ?></td>
					</tr>
<?php
				}
?>
			</tbody>
		</table>
	</div>
<form action="" method="post">
	<?php wp_nonce_field('terr_cource_date_archive_action','terr_cource_date_archive_field'); ?>

	<input type="text" name="course_by_date" placeholder="01.01.2014" id="course_by_date" class="datepicker-here" data-dateFormat="d.m.Y">

	<input type="submit" name="submit_course_by_date" value="Выбрать дату">
</form>

<script>
	var currentDate = new Date( "<?= date( 'm d Y', time() - ( 5 * 24 * 60 * 60 ) ) ?>" );

	jQuery('#course_by_date').datepicker({
		maxDate: currentDate
	})
</script>