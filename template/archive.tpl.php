<?php

	if ( ! defined( 'ABSPATH' ) )
	{
		exit; // Exit if accessed directly
	}
?>
	<h3>Архив курса на дату: <?= $dates ?></h3>

	<div style="width: 600px">
		<table>
			<thead>
			<tr>
				<th>Валюта</th>
				<th>Покупка НБ</th>
				<th>Продажа НБ</th>
				<th>Покупка</th>
				<th>Продажа</th>
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