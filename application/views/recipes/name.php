

<h1><?php echo $recipe_item[0]['name']; ?></h1>
<p class="prep">Prep Time: <?php echo $recipe_item[0]['prepTime']; ?></p>
<p class="category">Category: <?php  echo $recipe_item[0]['category']; ?></p>
<p class="title">Ingredients</p>

<?php $foo = preg_replace("/\r\n|\r|\n/",'<li>',$recipe_item[0]['ingredients']); echo $foo."</li>"; ?></p>

<br />
<p class="steps">Steps</p>
<?php $foo = preg_replace("/\r\n|\r|\n/",'<li>',$recipe_item[0]['steps']); echo $foo."</li>"; ?>

<br /><br />

<div class="review">

	<p class="title">Love this recipe? hate It? Rate it and leave a comment</p>

	<?php echo validation_errors(); ?>

	<form method="post" accept-charset="utf-8" action="<?php echo $this->uri->uri_string(); ?>" />
		<label>Rate it</label>
		<select name="rating">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select>

		<label>Comment</label>
		<textarea name="comment"></textarea>

		<input type="hidden" value="1" name="user_id" />
		<input type="hidden" value=" <?php echo $recipe_item[0]['recipe_id']; ?> " name="recipe_id" />
		<input type="hidden" value="<?php echo $recipe_item[0]['name']; ?>" name="name" />

		<input type="submit" name="submit" value="Add Review" /> 

	</form>
</div>
<div class="reviews"> 

 <?php 
 foreach($comments as $comment):
 ?> 
	<div class="rating">
		<?php 
			for($i = 0; $i < $comment['rating']; $i++){
				echo "<img src='../../../public/images/star.png' width='15px' />";
			}
		?>
	</div>
	<p class="review">
		<span class="attribute"><?php echo $comment['name']; ?> said:</span> <br />

		<?php 
			echo $comment['review']; 
		?>
	</p>
 <?php 
 endforeach;
 ?>
</div>