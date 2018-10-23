<?php

class User {

	protected $db;

	function __construct(Database $db) {
		$this->db = $db;
	}

	public function register($user_name, $user_pass) {
		$hashed_password = password_hash($user_pass, PASSWORD_DEFAULT);
		$data = [
		    'user_name' => $user_name,
		    'user_pass' => $hashed_password
		];
		$sql = "INSERT INTO users (user_name, user_pass) VALUES (:user_name, :user_pass)";
		$result = $this->db->insertQuery($sql, $data);

		return $result;
	} // register


	public function login($user_name, $user_pass) {
		$data = [
		    'user_name' => $user_name
		];
		$sql = "SELECT * FROM users WHERE user_name=:user_name";
		$result = $this->db->selectQuerySingleFetch($sql, $data);

		if (is_array($result) || $result instanceof Countable) {
			if (count($result) > 0) {
				$passwordVerification = password_verify($user_pass, $result['user_pass']);
				if( $passwordVerification ) {
			        $_SESSION['user_session'] = $result['user_id'];
			        $_SESSION['user_name'] = $result['user_name'];
			        return true;
			    } else {
			        return false;
			    }
			}
		} else {
	        return false;
	    }
		
		
		
	} // login


	public function is_loggedin() {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
    } // is_loggedin


    public function redirect($url) {
       header("Location: $url");
    } // redirect
 

    public function logout() {
    	session_unset();
        session_destroy();
        return true;
    } // logout

}