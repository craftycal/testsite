<?php
	
	

	class page {
		private $_title ='';
		private $_content ='';
		private $_templateFile ='';
		private $_templatePath ='';
		private $_isLanding = false;

		private function _getPageContent() {

			ob_start( );
			include_once( $this->_templatePath );
			$this->_content = ob_get_contents();
			ob_end_clean();
		}

		function __construct( $templateFileName, $pageTitle ) {


			$this->_templateFile = strtolower( $templateFileName );
			$this->_templatePath = APPROOT . 'app/templates/' . $this->_templateFile  . '.php';
			if( $this->_templateFile  == 'landingPage' ) {
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

	}
?>