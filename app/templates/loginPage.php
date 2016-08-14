<?php 

	require_once ( APPROOT . 'app/controllers/loginController.php' );

	$data = processLogInRequest( $this->_database );

	echo( $_SESSION['id']);

?>


		<div class="login-page">
			<div class="form">
		  		<img id="landing-logo" src="img/logo-ts.png" alt="test site logo">
				<form action="index.php?page=login" method="post" class="login-form">
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
					<p class="message">Not registered? <a href="?page=registry">Create an account</a></p>
				</form>
			</div>
		</div>
	