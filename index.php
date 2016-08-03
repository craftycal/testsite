<?php 

	define( 'APPROOT', dirname(__FILE__) . '/' );

	// Include the master page controller
	require_once( APPROOT . 'app/controllers/pageController.php' );
	$pageObj;
	
	// is page specified if not direct to landing page
	$requestedPage = isset( $_GET['p'] ) ? $_GET['p'] : 'landingPage';
	switch( strtolower( $requestedPage ) ) {
		case 'landing':
			$pageObj = new page( 'landingPage', 'Welcome to testsite, login to get started.' );
			break;

		case 'feed':
			$pageObj = new page( 'feedPage', 'index feed of projects' );
			break;

		case 'project':
			$pageObj = new page( 'projectPage', 'information on a specific project' );
			break;

		default:
			$pageObj = new page( 'pageNotFound', 'Page Not Found' );
			break;
	}

	// Output the page
	$pageObj->output( );

?>