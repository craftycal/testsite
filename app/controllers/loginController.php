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


//  not working? v

		if( $totalErrors == 0 ) {
			
			$user_verifyed = false;

			$fetched_user_Data = mysqli_query( $database, "SELECT username, password FROM users WHERE username = '$post_username' " );
				$userData = $fetched_user_Data->fetch_assoc();

			if ( $post_username == $userData['username'] ) {
				$user_verifyed = true;
			} else {
				$totalErrors++;
			}	

			$password_verifyed = false;

			if ( $_POST['password'] == $userData['password'] ) {
				$password_verifyed = true;
			} else {
				$totalErrors++;
			}

			if ( $password_verifyed = true ) {
				$_SESSION['id'] = $userData['id'];
				header('Location:?page=feed');
			} else {
				$data['loginMessage'] = '<span><i class="fa fa-bell-o" aria-hidden="true"></i></span> invalid Username or Password  ';
			}

			
		}

		return $data;

	}
			
	


 ?>