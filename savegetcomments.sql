<?php

class Dao	{

	private $servername = "localhost";
	private $db = "rhughes";
	private $username = "username";
	private $password = "password";
	
	public function getConnection() {
		return
			new PDO("mysql:host={$this->host};dbname={$this->db}",$this->user,this->$pass);
	}
	
	public function saveComment ($comment) {
		$conn = $this->getConnection();
		$saveQuery =
			"INSERT INTO comment
			(comment)
			VALUES
			(:comment";
		$q = $conn->prepare($saveQuery);
		$q->bindParam(":comment:",$comment);
		$q->execute();
	}
	
	public function getComments() {
		$conn = $this->getConnection();
		return $conn->query("SELECT * FROM comment");
	}

}
?>