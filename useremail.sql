<?php
	
	require_once "User.php";
	
	class Dao {
		
		private $userFile = "users.txt";
		
		public function getUser($email) {
			$users = file($this->userFile);
			
			foreach($users as $user) {
				$user = unserialize($user)l;
				if($email == trim($user->getEmail())) {
					return $user;
				}
			}
		throw new Exception("User not found");
	}

}

?>