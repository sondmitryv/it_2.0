<?php
	ini_set("display_errors", 1);
	error_reporting(E_ALL);
	

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{


		if($_POST['action'] == 'add')
		{

			require_once('models/city.class.php');

			$cityClass = new City();

			// $result = $cityClass->insert(['name'=>trim($_POST['city'])]);
			$count=$cityClass->get_count(['name'=>trim($_POST['city'])]);

			$status = 'error';
			$message="";
			if($count>1){

				$message="Этот город есть уже в базе";
			}
			else {
				$result = $cityClass->insert(['name'=>trim($_POST['city'])]);
				$status = 'ok';
			}

			echo json_encode(['status' =>$status,'message'=>$message]);
		}

		if($_POST['action'] == 'edit')
		{

			require_once('models/city.class.php');

			$cityClass = new City();

	
			$isDublicate=$cityClass->idDublicate($_POST['id'],trim($_POST['city']));

			$status = 'error';
			$message="";

			if(!$isDublicate)
			{
				$result = $cityClass->update(['id'=>trim($_POST['id']),'name'=>trim($_POST['city'])]);
				$status="ok";
			}
			else {
				$message="есть уже дубликат";
			}

			echo json_encode(['status' =>$status,'message'=>$message]);
		}
	}

?>