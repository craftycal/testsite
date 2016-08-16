<?php 


	function processRegistrationForm($database) {

		$data = array();

		if ( isset ( $_POST['email']) && isset ( $_POST['username'] ) ) {

			$filteredEmail = $database->real_escape_string( $_POST['email']);

			$filteredUsername = $database->real_escape_string( $_POST['username']);

			$totalErrors = 0;

			if (!preg_match('[^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$]', $filteredEmail) ) {
	  			$data['emailMessageRegistry'] = '<span><i class="fa fa-bell-o" aria-hidden="true"></i></span> sorry the email address you provided is invalid';
				$totalErrors++;
			}

			if (!preg_match('[^(?=.{4,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$]', $filteredUsername) ) {
	  			$data['usernameMessageRegistry'] = '<span><i class="fa fa-bell-o" aria-hidden="true"></i></span> a username may only consist of: <br> a-z A-Z 0-9 . _ -';
				$totalErrors++;
			}

			if ( !isset($_POST['password']) || $_POST['password'] == '' ) {
				$data['passwordMessageRegistry'] = '<span><i class="fa fa-bell-o" aria-hidden="true"></i></span> you must provide a password';
				$totalErrors++;
			}	

			if ( !isset($_POST['terms']) || !$_POST['terms'] == 'checked' ) {
				$data['termsMessageRegistry'] = '<span><i class="fa fa-bell-o" aria-hidden="true"></i></span> you must accept the Terms and conditions before you are allowed access to the TestSite';
				$totalErrors++;
			}

			if( $totalErrors > 0 ) { 
					return $data;
			}

			// is email already in use
			$sql = "SELECT email
					FROM users
					WHERE email = 'filteredEmail'
					OR username = '$filteredUsername'  ";

			$result = $database->query($sql);

			if( $result && $result->num_rows > 0 ) {

				while ( $row = $result->fetch_assoc()) {
					if ($row['username'] == $filteredUsername ) {
						$data['usernameMessageRegistry'] = '<span><i class="fa fa-bell-o" aria-hidden="true"></i></span> sorry username already in use';
						$totalErrors++;
					}
					if ($row['email'] == $filteredEmail ) {
						$data['emailMessageRegistry'] = '<span><i class="fa fa-bell-o" aria-hidden="true"></i></span> e-Mail already in use';
						$totalErrors++;
					}
				}
			}

			// If the password is less than 8 characters long
			if( strlen($_POST['password']) < 8 ) {
				// Password is too short
				$data['passwordMessageRegistry'] = '<span><i class="fa fa-bell-o" aria-hidden="true"></i></span> must be at least 8 characters';
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

				// Log the user in
				$_SESSION['id'] = $database->insert_id;
				$_SESSION['privilege'] = 'member';

				// Redirect the user to their stream page
				header('Location: ?page=feed');

			} else {
				return $data;
			}
		}
	}

?>