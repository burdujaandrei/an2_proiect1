<?php

class Person
{
	private $name;

	public function SetName($name)
	{
		$this->name = $name;
	}

	public function GetName($name)
	{
		return $this->name;
	}
}


$person = new Person();
$person->SetName('Ana');
$person->GetName();