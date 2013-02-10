<h2>Signup</h2>
<?php echo validation_errors(); ?>

<?php echo form_open('users/signup') ?>

	<label for="name">First & Last Name</label> 
	<input type="input" name="name" /><br />

	<label for="username">Username [must be between 2 & 15</label>
	<input type="input" name="username" /><br />

	<label for="email">Email</label>
	<input type="input" name="email" /><br />

	<label for="password">Password</label>
	<input type="password" name="password" /><br />
		
	<input type="submit" name="submit" value="Signup" /> 

</form>