<?php


processLogInRequest();

$data = array();

function processLogInRequest() {

	global $data;

	$totalErrors = 0;

	// Make sure a username has been entered
	if( strlen($_POST['username']) < 6 ) {

		// Prepare error messages
		$data['usernameMessage'] = '* please enter your username';
		$totalErrors++;
	}

	// Make sure a password has been entered
	if( strlen($_POST['password']) < 8 ) {

			$data['passwordMessage'] = '* please enter your password';
			$totalErrors++;
		}

	if( $totalErrors == 0 ) {
		// check to see of username matches one from the database
		$filteredUsername = ::parent->dbc->real_escape_string( $_POST['username'] );

		// Prepare SQL
			$sql = "SELECT id, password, roll
					FROM users
					WHERE username = '$filteredUsername'  ";

		// Run the query
		$result = $this->dbc->query( $sql );

		// Is there a result?
		if( $result->num_rows == 1 ) {			
		// check to see of password matches the username 
		$userData = $result->fetch_assoc();

		$passwordResult = password_verify( $_POST['password'], $userData['password'] );
		
		// if no errors login and direct to feed page
		if( $passwordResult == true ) {
				// Log the user in
				$_SESSION['id'] = $userData['id'];
				$_SESSION['roll'] = $userData['roll'];

				header('Location: ?page=feed');

			// if errors display message 'username or password are incorrect'
			} else {
				// Prepare error message
				$data['loginMessage'] = '* your Username or Password is incorrect';
				
			}	
		}
	}
}


// private function processRegistryRequest() {

// 	$totalErrors = 0;

// 	// valade username 

// 	// valade email address 

// 	// valade password

// 	// have the agreed to terms

// 	// if errors display message on relevent input

// 	// invalid username
// 	// invalid email addresss
// 	// invalid password

// 	// if no errors prosses data and login, redirect to feed page

// }









?>