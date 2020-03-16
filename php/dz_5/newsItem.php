<?php
require_once('models/news.class.php');

$newsClass = new News();

$id = $_GET['id'];

$news = $newsClass->get_one(['id'=>$id]);

if(!$news){
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
	<style>
		.news-title{
			font-size:43px;
			margin:0;
			padding-bottom:15px;
		}
		.news-text{
			font-size:20px;
			text-align:left;
			margin:0;
			display: block;
   			padding: 25px;
   			background: grey;
   			color: #fff;
   			margin-bottom: 25px;
   			font-weight: 300;
		}
		.date-title,.author-title{
			display:block;
			font-size:16px;
		}
		.back-btn{
			font-size:20px;
			color: #fff;
			text-decoration:none;
			display:block;
			background-color:green;
			text-align: center;
			width:250px;
			height: 50px;
			line-height:50px;
		}
		
	</style>
	<h5 class="news-title"><? echo $news['news_title']?></h5>
	<p class="news-text">
		<? echo $news['news_text']?>
	</p>
	<span class="date-title">Дата публикации: <? echo $news['public_date']?></span>
	<span class="author-title">Автор <? echo $news['author']?></span>
	<br><br>
	<a href="listNews.php" class="back-btn">Вернуться к списку</a></p>


</body>
</html>