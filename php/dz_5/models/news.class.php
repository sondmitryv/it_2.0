<?php

require_once('models/db.class.php');

Class News extends db
{
	public $errors = [];
	public $table_name = 'news_items';

	public function idDublicate($id, $name){
		$sql = "SELECT count(*) FROM {$this->table_name} WHERE id!=:id and name=:name";
	
		$smtp = $this->pdo->prepare($sql);
		$smtp->execute(['id'=>$id, 'news_title'=>$name]);
		$result = $smtp->fetch( PDO::FETCH_NUM );
		$count = (int)$result[0];
		if($count > 0 ) return true; else return false;
	}

 	public function clear($str)
    {
        return strip_tags( trim($str) );
	}
	
	public function getField($inputName)
    {
        $value = $_POST[$inputName] ?? '';

        return $this->clear($value);
    }


	public function required($inputName)
    {
        $value = $this->getField($inputName);
        if(empty($value))
        {
			$this->errors[$inputName][] = 'поле обязательно к заполнению';
        }
	}

	public function getErrors()
    {
        return $this->errors;
    }

	
}
