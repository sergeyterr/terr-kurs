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
	<h3>Курс <?= $text ?> на дату: <?= $dates ?></h3>
	<div style="width: 300px">
		<table>
			<thead>
				<tr>
					<th>Валюта</th>
					<th>Покупка</th>
					<th>Продажа</th>
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
