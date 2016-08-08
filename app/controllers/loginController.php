<?php

class loginController extends page{

	public function __construct($database){

		$this->database = $database;

		if( isset( $_POST['login'] ) ) {
			$this->processLogInRequest();
		}
	}

	private function processLogInRequest() { 

		// start errors at 0
		$totalErrors = 0;

		// has anything been entered in the username field
		if( strlen($_POST['username']) == 0 ) {
			$this->data['usernameMessage'] = '* please enter your username';
			$totalErrors++;
		}

		// has anything been entered in the password field
		if( strlen($_POST['password']) == 0 ) {
				$this->data['passwordMessage'] = '* please enter your password';
				$totalErrors++;
		}

		// if there are errors reload page, else carry on?
	

		//Function to check if user is in database
		if( $totalErrors === 0 ) {

			// check to see of username matches one from the database
			$filteredUsername =	$this->database->real_escape_string( $_POST['username'] );

			// Prepare SQL
				$sql = "SELECT id, password, privilege
						FROM users
						WHERE username = '$filteredUsername'  ";

			// Run the query
			$result = $this->database->query( $sql );

			// Is there a result?
			if( $result->num_rows == 1 ) {	

				// check to see of password matches the username 
				$userData = $result->fetch_assoc();
				$passwordResult = password_verify( $_POST['password'], $userData['password'] );

				// if no errors login and direct to feed page
				if( $passwordResult == true ) {

					// Log the user in
					$_SESSION['id'] = $userData['id'];
					$_SESSION['privilege'] = $userData['privilege'];
					header('Location: ?page=feed');

				// if errors display message 'username or password are incorrect'
				} else {

					// error message
					$data['loginMessage'] = '* your Username or Password was incorrect';
				}	
			}
		}				
	}
}

//Get post data
//var_dump($_POST);

//if user is in database

// $pageObj = new page( 'feedPage', 'This is the feedpage.' );
// header('Location: index.php?p=feed');

//if not to refresh and show errors


 ?>