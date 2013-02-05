<h2>Create a recipe</h2>
<?php echo validation_errors(); ?>

<?php echo form_open('recipes/create') ?>

	<label for="name">Recipe Name</label> 
	<input type="input" name="name" /><br />

	<label for="text">Ingredients</label>
	<textarea name="ingredients"></textarea><br />

	<label for="text">Steps</label>
	<textarea name="steps"></textarea><br />

	<label for="name">uid</label> 
	<input type="input" name="user_id" /><br />

	<label for="name">Category</label> 
	<input type="input" name="category" /><br />

	<label for="name">Prep Time</label> 
	<input type="input" name="prep" /><br />
		
	<input type="submit" name="submit" value="Add Recipe" /> 

</form>
