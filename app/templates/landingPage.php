

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
		    
		    <form action="?p=landing" method="post" class="login-form">
		    	<input type="text" name="username" placeholder="username"/>
		    		<?php if( isset($usernameMessage) ): ?>
		    			<p> <?= $usernameMessage ?> </p>
		    		<?php endif ?>

		      <input type="password" name="password" placeholder="password"/>
		    		<?php if( isset($passwordMessage) ): ?>
		    			<p> <?= $passwordMessage ?> </p>
		    		<?php endif ?>	
		    		
					<?php if( isset($loginMessage) ): ?>
						<p> <?= $loginMessage ?> </p>
					<?php endif ?>	      

		      <input type="submit" class="button_style" name="login" value="Login">
		      <p class="message">Not registered? <a href="#">Create an account</a></p>
		    </form>
		  </div>

		</div>