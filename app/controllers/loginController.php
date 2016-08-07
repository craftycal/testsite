<?php 

class loginController extends page{

	public function __construct($databse){

		parent::__construct();

		$this->database = $database;

	}

	private function validateLoginRequest() { 

		$totalErrors = 0;

		if( strlen($_POST['username']) < 1 ) {
			$this->data['usernameMessage'] = '* please enter your username';
			$totalErrors++;
		}
		if( strlen($_POST['password']) < 1 ) {
				$this->data['passwordMessage'] = '* please enter your password';
				$totalErrors++;
			}
	}
}
//Function to check if user is in database

//Get post data
var_dump($_POST);

//if user is in database

// $pageObj = new page( 'feedPage', 'This is the feedpage.' );
// header('Location: index.php?p=feed');

//if not to refresh and show errors


 ?>