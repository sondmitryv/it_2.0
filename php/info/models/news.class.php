<?php

require_once('models/db.class.php');

Class News extends db
{
	public $table_name = 'news_items';

	public function idDublicate($id, $name){
		$sql = "SELECT count(*) FROM {$this->table_name} WHERE id!=:id and name=:name";
	
		$smtp = $this->pdo->prepare($sql);
		$smtp->execute(['id'=>$id, 'name'=>$name]);
		$result = $smtp->fetch( PDO::FETCH_NUM );
		$count = (int)$result[0];
		if($count > 0 ) return true; else return false;
	  }
	
}
