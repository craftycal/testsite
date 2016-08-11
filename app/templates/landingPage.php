<?php 

	require_once ( APPROOT . 'app/controllers/loginController.php' );

	$data = processLogInRequest( $this->_database );

?>


		<div class="login-page">

		  <div class="form">
		  	<img id="landing-logo" src="img/logo-ts.png" alt="test site logo">

		    <form action="?p=landing" method="post" class="register-form">
		      <input type="text" name="username" placeholder="username"/>
		      <input type="password" name="password" placeholder="password"/>
		      <input type="text" name="email" placeholder="email address"/>
		      <input type="checkbox" name="terms" id="tac_check"><label id="tac_message">agree to terms and conditions</label>
		      <input type="submit" class="button_style" name="create" value="create">
		      <p class="message">Already registered? <a href="#">Sign In</a></p>
		    </form>
		    
		    <form action="index.php" method="post" class="login-form">
		  			<?php if( isset ($data['usernameMessage']) ){ ?>
		    			<p class="alert_comment" > <?= $data['usernameMessage'] ?> </p>
		    		<?php } ?>			    
			    <input type="text" name="username" placeholder="username"/>	
		    		<?php if( isset ($data['passwordMessage']) ){ ?>
		    			<p class="alert_comment" > <?= $data['passwordMessage'] ?> </p>
		    		<?php } ?>			    	    
			    <input type="password" name="password" placeholder="password"/>
					<?php if( isset($data['loginMessage']) ){ ?>
						<p class="alert_comment" > <?= $data['loginMessage'] ?> </p>
					<?php } ?>		    					    
			    <input type="submit" class="button_style" name="login" value="Login">
			    <p class="message">Not registered? <a href="#">Create an account</a></p>
		    </form>
		  </div>
		</div>