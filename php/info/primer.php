<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</head>
<body>
<br>
<div class="container">
    <div class="row">
        <form style="width: 100%" method="post" onsubmit="sendData();return false;" id="formNews" >
            <div class="form-group row">
                <label for="title" class="col-md-2 col-form-label">Заголовок</label>
                <div class="col-md-10">
                    <input
                            type="text"
                            class="form-control"
                            id="title"
                            name="title"
                            value=""
                    >
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="form-group row">
                <label for="annotation" class="col-md-2 col-form-label">Аннтация</label>
                <div class="col-md-10">
                    <textarea
                            name="annotation"
                            id="annotation"
                            class="form-control"
                            cols="30"
                            rows="10"></textarea>
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="form-group row">
                <label for="content" class="col-md-2 col-form-label">Текст новости</label>
                <div class="col-md-10">
                    <textarea
                            name="content"
                            id="content"
                            class="form-control"
                            cols="30"
                            rows="10"></textarea>
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label">Email  автора для связи</label>
                <div class="col-md-10">
                    <input
                            type="text"
                            class="form-control"
                            id="email"
                            name="email"
                            value=""
                    >
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="form-group row">
                <label for="views" class="col-md-2 col-form-label">Кол-во просмотров</label>
                <div class="col-md-10">
                    <input
                            type="text"
                            class="form-control"
                            id="views"
                            name="views"
                            value=""
                    >
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-md-2 col-form-label">Дата публикации</label>
                <div class="col-md-10">
                    <input
                            type="date"
                            class="form-control"
                            id="date"
                            name="date"
                            value=""
                    >
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="form-group row">
                <label for="is_publish" class="col-md-2 col-form-label">Публичная новость</label>
                <div class="col-md-10">
                    <input
                            type="checkbox"
                            class="form-control"
                            id="is_publish"
                            name="is_publish"
                    >
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Публиковать на главной</label>
                <div class="col-md-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="publish_in_index" id="publish_in_index_yes" value="yes" checked>
                        <label class="form-check-label" for="publish_in_index_yes">
                            Да
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="publish_in_index" id="publish_in_index_no" value="no">
                        <label class="form-check-label" for="publish_in_index_no">
                            Нет
                        </label>
                    </div>
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="form-group row">
                <label for="category" class="col-md-2 col-form-label">Публичная новость</label>
                <div class="col-md-10">
                    <select id="category" class="form-control" name="category">
                        <option disabled selected>Выберете категорию из списка..</option>
                        <option value="1">Спорт</option>
                        <option value="2">Культура</option>
                        <option value="3">Политика</option>
                    </select>
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-9">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
                <div class="col-md-3">
                    <div class="alert alert-success">Форма валидна</div>
                </div>
            </div>
        </form>
<style>
    .error{border-color:red;}
</style>
<script type="text/javascript">
    
    function sendData()
    {
        let form = '#formNews';
        let dataForm = $(form).serialize();
        console.log(dataForm);
        $('*', form).removeClass('error');
        $('.invalid-feedback').empty(); //очищает тексты ошибок
        $.ajax({
            url: 'server.php', //адрес куда отправятся данные
            type: 'POST',
            dataType: 'json', //в каком формате ожитается ответ от сервера
            data: dataForm, //данные с формы
            success: function(responce){//метод, который выполняется при успешном ответе от сервера
                for( key in responce ){
                    $('[name="'+key+'"]', form).addClass('error');
                    $('[name="'+key+'"]').siblings('.invalid-feedback').html( responce[key].join('<br>')  ).show();
                }
            }
        })
    }
</script>
    </div>
</div>
</body>
</html>
<?php 
    $testCar = 2;
    echo gettype($testCar);
	$data = time();
    $date2 = mktime();
    $birthDay = strtotime('1990-08-20');
    $tempDate = Date('w', $birthDay );
    $weekArr = ['вс', 'пн','вт','ср', 'чт', 'пт', 'сб'];
	echo $weekArr[$tempDate];
	
    $tempDate2 = Date('w', $data );
    echo $weekArr[$tempDate2 + 1];
    $date1 = date_create("10-01-2015");
    $date2 = date_create("10-02-2015");
    $result = date_diff($date1,$date2);
	echo "Количество дней : ". $result->days;
	echo "<br>";
?>

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

<?php 
	/* dz 2 task 1 */
	$users = [
		[
			'id' => 1,
			'name' => 'abs1',
		],
		[
			'id' => 1,
			'name' => 'abs2',
		]
	];
	function pluck( $array, $key){
		$newArray = [];
		foreach ($array as $key => $value) {
		    array_push($newArray, $value);
		}
		print_r($newArray) ;
	}
	pluck($users, $name);

	/* dz 2 task 2 */
	echo "<br>";

	$numArray = [26, 17, 136, 12, 79, 15];
	foreach ($numArray as $value){
		$sum += $value * $value;
	}
	echo "Сумму квадратов элементов массива = $sum";
	echo "<br>";
	/* dz 2 task 3 */

	function get_order($string){
	    $words = explode(' ', $string);
	    sort($words);
	    return implode(' ', $words);
	}
	echo "<br>".get_order("ноты акустика гитара")."<br>";

	/* dz 2 task 4 */

	$threeArray = [];
	for($i; $i<=112; $i++){
		$counter = 1;
		$counter+= 3;
		array_push($threeArray, $counter);
	}
	print_r($threeArray);
	echo "<br>";
	/* dz 2 task 5*/
	$users=["nikolay","ivan","anton","dima","anton","viktor"];
	function checkElementRepetition($array){
		for ($i = 0; $i < count($array); $i++) {
		  for ($k = $i+1; $k < count($array); $k++ ){
		    if($array[$i] == $array[$k]){
				$available = true;
			} 
		  }
		}
		if($available){
			echo "Есть повторяющиеся элементы";
		} else{
			echo "Повторяющихся элементов нет";
		}
	}
	checkElementRepetition($users);
	echo "<br><br>";

	/* dz 2 task 6 */
	$numbers=[];
	$newValues=[];
	for ($i=5; $i <=1000; $i++) { 
	    array_push($numbers,$i);
	}
	foreach ($numbers as $key => $value) {
	    array_push($newValues,$value*2);
	}
	$numbers=array_combine(array_keys($numbers),array_values($newValues));
	$rand_keys = array_rand($numbers, 5);
	for ($i=0; $i < count($rand_keys); $i++) { 
	    echo "<br>".$numbers[$rand_keys[$i]] . "\n";
}
?>
	
<?php

class DateFunctionsClass{
    function __construct($date1,$date2)
    {
        $this->setDate1($date1);
        $this->setDate2($date2);
    }
	
	private $date1 = '';
	private $date2 = '';
	
	/**
     * установка первой даты
     */
	public function setDate1($date1)
	{
         $this->date1=trim($date1);
	}

    /**
     * установка второй даты
     */
	public function setDate2($date2)
	{
         $this->date2=trim($date2);
	}

    /**
     * дата в формате '2020-02-02' преобразовуется в timestamp
     * @param $date
     * @return int
     */
    public function getDateInTimestamp($date = ''):int
    {
        $date=(empty($date1))?$this->date1:trim($date);
        $date=strtotime($date);
        return $date;
    }

    /**
     * получение разницы двух дат
     * @param $date1
     * @param $date2
     * @return int
     */
	public function getDifferentDate($date1 = '', $date2 = ''):int
	{
            $date1=(empty($date1))?$this->date1: trim($date1);
            $date2=(empty($date2))? $this->date2: trim($date2);
            $date1=strtotime($date1);
            $date2=strtotime($date2);
            $diference=abs($date1-$date2);
            return $diference/86400;
	}
    /**
     * определение является ли дата рабочим днем
     * @param $date
     * @return bool
     */
	public function isWorkDate($date = ''):bool
    {   
        $date=(empty($date))?$this->date1:trim($date);
        $timeStampDate=strtotime($date);
        $index_day=Date('w',$timeStampDate);
        if($index_day>0&&$index_day<6)
        {
            return true;
        }

        return false;
    }

    /**
     * функция возвращает словами день недели
     * @param string $date
     * @return string
     */
    public function getNameDayOfWeek($date = ''): string
    {
        $date=(empty($date))?$this->date1:trim($date);
        $days=["Воскресенье","Пондельник","Вторник","Среда","Четверг","Пятница","Суббота"];
        $timeStampDate=strtotime($date);
        $index_day=Date('w',$timeStampDate);
        return $days[$index_day];
    }

}
$dateFunctionObj=new DateFunctionsClass('2019-02-03','2019-02-04');
echo ($dateFunctionObj->getDateInTimestamp()."<br>");
echo($dateFunctionObj->getDifferentDate('2020-02-10','2020-02-11')."дня(дней)"."<br>");
echo($dateFunctionObj->getNameDayOfWeek('2020-03-05')."<br>");
echo ($dateFunctionObj->isWorkDate('2020-03-05'))?"Не выходной":"Выходной"."<br>";
?>