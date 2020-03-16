<?php
require_once('models/city.class.php');

$cityClass = new City();

$id = $_GET['id'];

$city = $cityClass->get_one(['id'=>$id]);

if(!$city){

	echo 'Такой записи не существует в базе данных'; die;

}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

</head>
<body>

	<form id="formCity" onsubmit="onSave(); return false;">
		<div>
			<p>
				<label>Название</label>
				<input type="text" required="" value="<? echo $city['name']?>" name="city">
			</p>

			<p>
				<input type="hidden" name="action" value='edit'>
				<input type="hidden" name="id" value='<? echo $city['id']; ?>'>
				<input type="submit" value="Сохранить">
			</p>

		</div>
	</form>

	<p><a href="list.php">Вернуться к списку</a></p>

<script>
	function onSave()
	{
		let formId = '#formCity';

		$.ajax({
			url: 'server.php',
			type: 'POST',
			dataType: 'json',
			data: $(formId).serialize(),
			success: function(responce){
				if(responce.status == 'ok')
				{
					document.location.href='list.php'
				}
				else {
					alert(responce.message);
				}

			}
		})

	}
</script>
</body>
</html>