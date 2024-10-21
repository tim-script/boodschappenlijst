<?php

require "views/partials/header.php";

function print_error($errors, $field) {
	if (array_key_exists($field, $errors))
		echo "<div class=\"error\">" . htmlspecialchars($errors[$field]) . "</div>\n";
}
?>

<form method="post">

<div>
<label for="name">Product:</label>
<input name="name" value="<?= htmlspecialchars($form["name"]) ?>">
<?php print_error($errors, "name") ?>
</div>

<div>
<label for="number">Aantal:</label>
<input name="number" value="<?= htmlspecialchars($form["number"]) ?>">
<?php print_error($errors, "number") ?>
</div>

<div>
<label for="price">Stukprijs:</label>
<input name="price" value="<?= htmlspecialchars($form["price"]) ?>">
<?php print_error($errors, "price") ?>
</div>

<div>
<input type="submit" value="Toevoegen">
</div>

</form>

<?php require "partials/footer.php" ?>
