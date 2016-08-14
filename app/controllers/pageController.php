<?php

	class page {

		private $_title ='';
		private $_content ='';
		private $_templateFile ='';
		private $_templatePath ='';
		private $_isLanding = false;
		private $_database;
		private $_loginRequired = true;

		private function _getPageContent() {


			ob_start( );
			include_once( $this->_templatePath );
			$this->_content = ob_get_contents();
			ob_end_clean();
		}

		function __construct( $templateFileName, $pageTitle, $loginRequired = true ) {

			$this->_loginRequired = $loginRequired;

			$this->isLoggedIn (); 

			$this->_database  = mysqli_connect("localhost","root","","testsite_data");

			$this->_templateFile = strtolower( $templateFileName );
			$this->_templatePath = APPROOT . 'app/templates/' . $this->_templateFile  . '.php';
			if( $this->_templateFile  == 'loginPage' ) {
				$this->_isLanding = true;
			} elseif( $this->_templateFile  == 'pageNotFound' ) {

				header( '404 Not Found', true, 404 );	
			}
			$this->_title = strip_tags( $pageTitle );
			$this->_getPageContent( );
		}

		function output( ) {
			// Includes the master template and injects relevent template content.
			require_once( APPROOT . 'app/templates/master.php' );
		}

		function isLoggedIn() {
			if ( $this->_loginRequired == true ) {
				if ( !isset ( $_SESSION['id'] ) || ( $_SESSION['id'] == null ) ) {
					header('location: ?page=login');
				}
			}
		}


	}
?>