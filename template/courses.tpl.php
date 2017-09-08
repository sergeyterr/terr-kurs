<?php
	/**
	 * Created by PhpStorm.
	 * User: Sergey
	 * Date: 08.09.2017
	 * Time: 9:52
	 */
?>
	<h3>Курс на дату: <?= $dates ?></h3>
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
