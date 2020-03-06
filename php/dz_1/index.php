<?php
	/* task 1 */
	function abrDo($text) {
		$textItem = $text;
		$outString = "";
		echo $outString ;
		for($i=1;  $i <= strlen($textItem); $i++){
			if($textItem[$i] == ' ') {
				$temp = $textItem[$i+1];
				$outString .=  "$temp";
			}
		}
		echo  mb_strtoupper( $textItem[0] . $outString);
	};
	abrDo('Donbass Machine Academy');
?>
<br>
<?php
	/* task 2 */
	function truncate_string($str, $maxsymbol){
		if(iconv_strlen($str) > $maxsymbol){
			$temp = substr($str, 0, $maxsymbol);
		}
		echo $temp . '...';
	}
	truncate_string('lslsls', 5);
	echo "<br>";
?>

<?php
	/* task 3 */
	function getCountSymbol($str, $sumbol){
		$counter = 0;
		for($i=0;  $i <= strlen($str); $i++){
			if(mb_substr($str,$i,1) == $sumbol){
				$counter++;
			}
		}
		echo $counter;
	}
	getCountSymbol('Привет', 'и');
	echo "<br>";
?>
<form action="/" method="POST">

	<p>Имя: <input name="name" type="text" ></p>

	<p>Фамилия: <input name="surname" type="text"></p>

	<p>E-mail: <input name="email" type="text"></p>

	<p>Сообщение: <br /><textarea name="message" cols="30" rows="5"></textarea></p>

	<p><input type='submit' value='Отправить'></p>

</form>
<?php

	/* task 4 */
	if($_SERVER["REQUEST_METHOD"] == 'POST'){
		$str = serialize($_POST) ;
    	$str=trim($str);
    	$str=strip_tags($str);
    	$str=htmlspecialchars($str);
    	echo $str;
	}
	echo "<br>";
?>

<?php
	/* task 5 */
	function getShortFio($fullFio){
   		$fio=explode(" ",mb_strtolower($fullFio));
   		$surname=mb_strtoupper( mb_substr($fio[0], 0, 1)). mb_strtolower( mb_substr($fio[0], 1,mb_strlen($fio[0])-1));
   		$name=mb_strtoupper( mb_substr($fio[1], 0, 1)).".";
   		$patronymic=mb_strtoupper( mb_substr($fio[2], 0, 1)).".";

   		echo "${surname} ${name} ${patronymic}";
	}
	getShortFio("Сон Дмитрий Владимирович");
	echo "<br>";
?>

<?php
	/* task 6 */
	function getFileExtension($fileName){
		$sumbol = '.';
		for($i=0;  $i <= strlen($fileName); $i++){
			if($fileName[$i] == $sumbol){
				echo  mb_substr($fileName,($i+1),strlen($fileName));
			}
		}
	}
	getFileExtension("myfile.docx");
	echo "<br>";
?>