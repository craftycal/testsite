<?php 

session_start();

require 'app/controllers/pageController.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'landing';

$dbc = new mysqli('localhost', 'root', '', 'testsite_data');

switch($page) {

	case 'landing':
		require 'app/controllers/landingController.php';
		$controller = new landingController($dbc);
	break;

	case 'feed':
		require 'app/controllers/feedController.php';
		$controller = new feedController($dbc);
	break;	

	case 'project':
		require 'app/controllers/projectController.php';
		$controller = new projectController($dbc);
	break;

	case 'pageNotFound':
		require 'app/controllers/pageNotFoundController.php';
		$controller = new pageNotFoundController($dbc);
	break;	

}		

