$arr = explode("\n", $str);

<?php print_r($recipe_item); echo $recipe_item[0]['name']; ?>

<h1><?php echo $recipe_item[0]['name']; ?></h1>
<p class="prep">Prep Time: <?php echo $recipe_item[0]['prepTime']; ?></p>
<p class="category">Category: <?php  echo $recipe_item[0]['category']; ?></p>
<p class="title">Ingredients</p>

<?php $foo = preg_replace("/\r\n|\r|\n/",'<li>',$recipe_item[0]['ingredients']); echo $foo."</li>"; ?></p>

<br />
<p class="steps">Steps</p>
<?php $foo = preg_replace("/\r\n|\r|\n/",'<li>',$recipe_item[0]['steps']); echo $foo."</li>"; ?>