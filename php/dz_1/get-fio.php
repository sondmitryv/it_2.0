<?php

function getFIO($fio)
{
	$fio = mb_strtolower($fio);

	$result = mb_strtoupper( mb_substr($fio, 0, 1) );
	$pos = '';
	for($i = 1; $i < mb_strlen($fio); $i++){
		$symbol =  mb_substr($fio, $i, 1) ;
		if($pos == 'set_next'){
			$symbol = mb_strtoupper($symbol);
		}
		$result .= $symbol;

		if($symbol == ' '){
			$pos = 'set_next';
		}else{
			$pos = '';
		}

	}

	return $result;

} 

var_dump( getFIO("иванов ИВАН иванович") );