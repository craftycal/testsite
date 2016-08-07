<?php

class landingController extends PageController {

	public function __construct($dbc) {

		// Make sure the PageControllers constructor still runs
		parent::__construct();

		// loged in?
		$this->mustBeLoggedOut();

		// require user_data database
		$this->dbc = $dbc;

		// If the login form has been submitted
		if( isset( $_POST['login'] ) ) {
			$this->processLogInRequest();
		}
	}


private function processLogInRequest() {

	$totalErrors = 0;

	// Make sure a username has been entered
	if( strlen($_POST['usernaem']) < 6 ) {

		// Prepare error messages
		$this->data['usernameMessage'] = '* please enter your username';
		$totalErrors++;
	}

	// Make sure a password has been entered
	if( strlen($_POST['password']) < 8 ) {

			$this->data['passwordMessage'] = '* please enter your password';
			$totalErrors++;

		}

	if( $totalErrors == 0 ) {
		// check to see of username matches one from the database
		$filteredUsername = $this->dbc->real_escape_string( $_POST['username'] );

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
				$_SESSION['privilege'] = $userData['privilege'];

				header('Location: ?page=feed');

			// if errors display message 'username or password are incorrect'
			} else {
				// Prepare error message
				$this->data['loginMessage'] = '* your Username or Password is incorrect';
				die();
	

		
	};
}

private function processRegistryRequest() {

	$totalErrors = 0;

	// valade username 

	// valade email address 

	// valade password

	// have the agreed to terms

	// if errors display message on relevent input

	// invalid username
	// invalid email addresss
	// invalid password

	// if no errors prosses data and login, redirect to feed page

}









?>