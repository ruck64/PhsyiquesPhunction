<?php

	session_start();
	require_once Users.php;
	
	Class UserInfo {
		
		
		public function saveUserInfo ($firstname, $lastname, $age. $weight, $bodytye) {
			$conn = $this->getConnection();
			$query = $conn->prepare("INSERT INTO UserInfo (firstname, lastname, age, weight, bodytype) VALUES (:firstname, :lastname, :age , :weight, :bodytype)");
			$query->bindParam(':firstname', $firstname);
			$query->bindParam(':lastrname', $lastname);
			$query->bindParam(':age', $age);
			$query->bindParam(':weight', $weight);
			$query->bindParam(':bodytype',$bodytype);
			$query->execute();
		}
		
	
	}
  