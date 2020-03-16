<?php
	ini_set("display_errors", 1);
	error_reporting(E_ALL);
	

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		require_once('models/news.class.php');
		$newsClass = new News();

		if($_POST['action'] == 'add' )
		{
			$newsClass->required('title-news');
			$newsClass->required('text-news');
			$errors = $newsClass->getErrors();	
			$count=$newsClass->get_count(['news_title'=>trim($_POST['title-news'])]);
			// $result = $newsClass->insert(['name'=>trim($_POST['city'])]);
			if(count($errors) >= 1){
				echo json_encode(['fields' =>$errors]);
			}elseif($count>=1){
				$status = 'error duble';
				$message = 'Новость с таким заголовком уже существует';
				echo json_encode(['status' =>$status,'message'=>$message]);
			} else{
				$result = $newsClass->insert([
					'news_title'=>trim($_POST['title-news']),
					'news_text'=>trim($_POST['text-news']), 
					'author'=>trim($_POST['author-news']),
					'category'=>trim($_POST['category-news']),
					'publish'=>trim($_POST['publish']),
					'public_date'=>trim($_POST['date'])
				]);
				$status = 'ok';
				echo json_encode(['status' =>$status]);
			}
			//$count=$newsClass->get_count(['news_title'=>trim($_POST['title-news'])]);
				
		}
/*
		if($_POST['action'] == 'edit')
		{

			require_once('models/news.class.php');

			$newsClass = new News();

	
			$isDublicate=$newsClass->idDublicate($_POST['id'],trim($_POST['title-news']));

			$status = 'error';
			$message="";

			if(!$isDublicate)
			{
				$result = $newsClass->update(['id'=>trim($_POST['id']),'name'=>trim($_POST['title-news'])]);
				$status="ok";
			}
			else {
				$message="есть уже дубликат";
			}

			echo json_encode(['status' =>$status,'message'=>$message]);
		}
		*/
	}

?>
