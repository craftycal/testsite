<?php 


	function processRegistrationForm( $database) {
		
		$totalErrors = 0;

		if( strlen( $_POST['email']) == 0 ) {
			$data->emailMessageRegistry = '<span><i class="fa fa-bell-o" aria-hidden="true"></i></span> you must provide a email address';
			$totalErrors++;
		}

		if( strlen( $_POST['username']) == 0 ) {
			$data->usernameMessageRegistry = '<span><i class="fa fa-bell-o" aria-hidden="true"></i></span> you must provide a username';
			$totalErrors++;
		}

		if( strlen( $_POST['password']) == 0 ) {
			$data->passwordMessageRegistry = '<span><i class="fa fa-bell-o" aria-hidden="true"></i></span> you must provide a password';
			$totalErrors++;
		}	

		// if ( $_POST['terms'] is checked carry on if not 
		// $data[->termsMessage = '<span><i class="fa fa-bell-o" aria-hidden="true"></i></span> you must accept the Terms and conditions before you are allowed access to the TestSite';	

		// is email already in use
		$filteredEmail = $database->real_escape_string( $_POST['email'] );

		$sql = "SELECT email
				FROM users
				WHERE email = '$filteredEmail'  ";

		$result = $database->query($sql);

		if( !$result || $result->num_rows > 0 ) {
			$data->emailMessageRegistry = '<span><i class="fa fa-bell-o" aria-hidden="true"></i></span> e-Mail already in use';
			$totalErrors++;
		}

		// is username already in use
		$filteredUsername = $database->real_escape_string( $_POST['username'] );

		$sql = "SELECT username
				FROM users
				WHERE username = '$filteredUsername'  ";

		$result = $database->query($sql);

		if( !$result || $result->num_rows > 0 ) {
			$data->usernameMessageRegistry = '<span><i class="fa fa-bell-o" aria-hidden="true"></i></span> sorry username already in use';
			$totalErrors++;
		}



		// If the password is less than 8 characters long
		if( strlen($_POST['password']) < 8 ) {
			// Password is too short
			$data->passwordMessageRegistry = '<span><i class="fa fa-bell-o" aria-hidden="true"></i></span> must be at least 8 characters';
			$totalErrors++;
		}



		// Determine if this data is valid to go into the database
		if( $totalErrors == 0 ) {

			// Hash the password
			$hash = password_hash( $_POST['password'], PASSWORD_BCRYPT );

			// Prepare the SQL
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$filteredUsername', '$filteredEmail', '$hash')";

			// Run the query
			$database->query($sql);

			// Check to make sure this worked


			// Log the user in
			$_SESSION['id'] = $database->insert_id;
			$_SESSION['privilege'] = 'member';

			// Redirect the user to their stream page
			header('Location: ?page=feed');

	}
}











?>