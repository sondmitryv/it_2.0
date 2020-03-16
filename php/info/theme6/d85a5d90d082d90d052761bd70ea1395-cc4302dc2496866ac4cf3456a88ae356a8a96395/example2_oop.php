<?php
class Animals
{
	protected $type = '';
	protected $name = '';

	public function setType($type)
	{
		$this->type = trim($type);
	}

	public function setName($name)
	{
		$this->name = trim($name);
	}

	public function getName()
	{
		return $this->name;
	}
}

class Dog extends Animals
{
	function __construct($name, $type = 'Собака')
	{
		$this->setName($name);
		$this->setType($type);
	}
}

$dogClass = new Dog('Собака', 'Шарик');

echo $dogClass->getName();