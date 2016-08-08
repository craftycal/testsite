<?php 

class loginController extends page{

	public function __construct($database){

		$this->database = $database;

		if( isset( $_POST['registry'] ) ) {
			$this->processRegistrationForm();
		}
	}

	private function processRegistrationForm() {
		
		$totalErrors = 0;

		// Make sure the E-Mail has been provided
		// and is valid
		if( $_POST['email'] == '' ) {
			// E-Mail is invalid
			$this->emailMessage = 'Invalid E-Mail';
			$totalErrors++;
		}

		// Make sure the E-Mail is not in use
		$filteredEmail = $this->database->real_escape_string( $_POST['email'] );

		$sql = "SELECT email
				FROM users
				WHERE email = '$filteredEmail'  ";

		// Run the query
		$result = $this->database->query($sql);

		// If the query failed OR there is a result
		if( !$result || $result->num_rows > 0 ) {
			$this->emailMessage = 'E-Mail in use';
			$totalErrors++;
		}


		// If the password is less than 8 characters long
		if( strlen($_POST['password']) < 8 ) {
			// Password is too short
			$this->passwordMessage = '* must be at least 8 characters';
			$totalErrors++;
		}

		// Determine if this data is valid to go into the database
		if( $totalErrors == 0 ) {

			// Hash the password
			$hash = password_hash( $_POST['password'], PASSWORD_BCRYPT );

			// Prepare the SQL
			$sql = "INSERT INTO users (email, password)
					VALUES ('$filteredEmail', '$hash')";

			// Run the query
			$this->database->query($sql);

			// Check to make sure this worked


			// Log the user in
			$_SESSION['id'] = $this->database->insert_id;
			$_SESSION['privilege'] = 'member';

			// Redirect the user to their stream page
			header('Location: index.php?page=stream');

	}
}











?>