<?php

require_once('request.class.php');

$requestClass = new Request();

if( $requestClass->isPost() ){

	$requestClass->required('title');
	$requestClass->required('annotation');
	$requestClass->required('content');
	$requestClass->min('title', 5);

	$errors = $requestClass->getErrors();

	echo json_encode($errors);
}

?>