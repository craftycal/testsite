<?php 

	require_once ( APPROOT . 'app/controllers/registryController.php' );

	$data = processRegistrationForm( $this->_database );
?>
	

		<div class="login-page">
			<div class="form">
		  		<img id="landing-logo" src="img/logo-ts.png" alt="test site logo">
				<form action="?page=registry" method="post" class="registry">
						<?php if( isset ($data['usernameMessageRegistry']) ){ ?>
							<p class="alert_comment" > <?= $data['usernameMessageRegistry'] ?> </p>
						<?php } ?>			   
					<input type="text" name="username" value="<?php echo isset ($_POST['username'])?$_POST['username']:''; ?>" placeholder="username"/>
						<?php if( isset ($data['passwordMessageRegistry']) ){ ?>
							<p class="alert_comment" > <?= $data['passwordMessageRegistry'] ?> </p>
						<?php } ?>	
					<input type="password" name="password" placeholder="password"/>
						<?php if( isset ($data['emailMessageRegistry']) ){ ?>
							<p class="alert_comment" > <?= $data['emailMessageRegistry'] ?> </p>
						<?php } ?>	
					<input type="text" name="email" value="<?php echo isset ($_POST['email'])?$_POST['email']:''; ?>" placeholder="email address"/>
						<?php if( isset ($data['termsMessageRegistry']) ){ ?>
							<p class="alert_comment" > <?= $data['termsMessageRegistry'] ?> </p>
						<?php } ?>	
					<input type="checkbox" value="checked" name="terms" id="tac_check"><label id="tac_message">agree to terms and conditions</label>
					<input type="submit" class="button_style" name="create" value="create">
					<p class="message">Already registered? <a href="?page=login">Sign In</a></p>
				</form>
			</div>
		</div>	