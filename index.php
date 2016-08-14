	
<?php

session_start();

	define( 'APPROOT', dirname(__FILE__) . '/' );

	// include master page controller
	require_once( APPROOT . 'app/controllers/pageController.php' );
	$pageObj;
	
	// if page is not specified direct to login page                   + need to add if logged in redirect to feedPage
	$requestedPage = isset( $_GET['page'] ) ? $_GET['page'] : 'login';
	switch( strtolower( $requestedPage ) ) {

		case 'login':
			$pageObj = new page( 'loginPage', 'Welcome to testsite, login to get started.', false );
			break;

		case 'registry':
			$pageObj = new page( 'registryPage', 'Welcome to testsite, register an accou to get started.', false );
			break;	

		case 'feed':
			$pageObj = new page( 'feedPage', 'index feed of projects', true );
			break;

		case 'project':
			$pageObj = new page( 'projectPage', 'information on a specific project', true );
			break;

		case 'logout':
			$pageObj = new page( 'logout', 'prossesing logout', false );
			break;	

		case 'processlogin':
			$pageObj = new page( 'processLogin', 'prossesing login', false );
			break;		
		
		default:
			$pageObj = new page( 'pageNotFound', 'Page Not Found', false );
			break;
	}

	// Output the page
	$pageObj->output( );
	
?>