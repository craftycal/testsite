<?php


	function processLogInRequest( $database ) { 

		if ( !isset( $_POST ['username'] )){
			return;
		}

		// start errors at 0
		$totalErrors = 0;

		$post_username = $_POST['username'];

		// has anything been entered in the username field
		if( strlen( $post_username ) == 0 ) {
			$data['usernameMessage'] = '<span><i class="fa fa-bell-o" aria-hidden="true"></i></span> please enter your username';
			$totalErrors++;
		}

		// has anything been entered in the password field
		if( strlen($_POST['password']) == 0 ) {
				$data['passwordMessage'] = '<span><i class="fa fa-bell-o" aria-hidden="true"></i></span> please enter your password';
				$totalErrors++;
		}

		if( $totalErrors == 0 ) {
			
			$user_verified = false;

			$fetched_user_Data = mysqli_query( $database, "SELECT user_id, username, password FROM users WHERE username = '$post_username' " );
				$userData = $fetched_user_Data->fetch_assoc();

			if ( $post_username == $userData['username'] ) {
				$user_verified = true;
			} else {
				$totalErrors++;
			}	

			$password_verified = false;

			if ( password_verify ($_POST['password'], $userData['password']) ) {
				$password_verified = true;
			} else {
				$totalErrors++;
			}

			if ( $password_verified == true ) {
				$_SESSION['id'] = $userData['user_id'];
				header('Location:?page=feed');
			} else {
				$data['loginMessage'] = '<span><i class="fa fa-bell-o" aria-hidden="true"></i></span> invalid Username or Password  ';
			}	
		}
		return $data;
	}
 ?>