<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/models/city.class.php');

$cityClass = new City();
$cities = $cityClass->get_all();

?>
<p><a href="/add.php">Добавить новый город</a></p>
<table>
	<tr>
		<th>№ п/п</th>
		<th>Название</th>
		<th>Операции</th>
	</tr>

	<?php
	$i = 1;
	foreach($cities as $city):
	?>

		<tr>
			<td><? echo $i++?></td>
			<td><? echo $city['name']?></td>
			<td>
				<a href="/edit.php?id=<?php echo $city['id']?>">edit</a>
			</td>
		</tr>

	<?php endforeach;?>
</table>

