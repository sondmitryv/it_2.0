<?php

require_once('request.class.php');

$requestClass = new Request();

if( $requestClass->isPost() ){

	$requestClass->required('title');
	$requestClass->required('annotation');
	$requestClass->required('email');
	$requestClass->required('content');
	$requestClass->min('title', 5);
	$requestClass->max('annotation', 10);
	$requestClass->isEmail('email');
	$requestClass->maxValue('views', '10');
	$requestClass->minValue('views', '5');

	$errors = $requestClass->getErrors();

	echo json_encode($errors);
}

?>