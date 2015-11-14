<?php
class User
{
	private $id;
	private $name;
	private $surname;
	private $mail;
	private 
	
	public function __construct($data)
	{
		$this->id = $data[0];
		$this->name = $data[1];
		$this->surname = $data[2];
		$this->mail = $mail[3];		
	}
}
?>