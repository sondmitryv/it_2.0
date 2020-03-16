<?php 
require_once('models/news.class.php');

$newsClass = new News();
$newsItems = $newsClass->get_all();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h5 class="list-title">Список новостей</h5>
	<ul class="list-news">
		<?php
		$i = 1;
		foreach($newsItems as $news):
		?>
			<li>
				<a href="newsItem.php?id=<?php echo $news['id']?>"><? echo $news['news_title']?></a>
			</li>
		<?php endforeach;?>
	</ul>
	<a href="addNews.php" class="add-news-btn">Добавить еще статью</a>
	<style>
		.list-title{
        	font-size:25px;
			margin:0px;
			padding-bottom:25px;
    	}
		.list-news li{
			margin-bottom:15px
		}
		.list-news a{
			display:block;
			font-size:20px;
			color:#000;
		}
		.add-news-btn{
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
</body>
</html>





