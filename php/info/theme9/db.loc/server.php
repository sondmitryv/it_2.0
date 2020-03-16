<?php
	ini_set("display_errors", 1);
	error_reporting(E_ALL);
	

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{


		if($_POST['action'] == 'add')
		{

			require_once($_SERVER['DOCUMENT_ROOT'].'/models/city.class.php');

			$cityClass = new City();

			$result = $cityClass->insert(['name'=>trim($_POST['city'])]);

			$status = 'error';
			if($result)
			{
				$status = 'ok';
			}

			echo json_encode(['status' =>$status ]);
		}


	}

?>