<?php require "views/partials/header.php" ?>

<table id="boodschappen">

<tr>
<th>Product</th>
<th>Prijs</th>
<th>Aantal</th>
<th>Subtotaal</th>
</tr>

<?php foreach ($groceries as $grocery): ?>

<tr>
<td><?= htmlspecialchars($grocery["name"]) ?></td>
<td class="productPrice"><?= htmlspecialchars($grocery["price"]) ?></td>
<td><input class="productQuantity" value="<?= htmlspecialchars($grocery["number"]) ?>"></td>
<td class="productTotalCost"><?= $grocery["price"] * $grocery["number"] ?></td>
</tr>

<?php endforeach ?>

<tr>
<td colspan="3">Totaal</td>
<td id="totalCost"><?= $totalPrice ?></td>
</tr>

</table>

<script>
function update() {
	const productPrices = document.getElementsByClassName("productPrice");
	const productQuantities = document.getElementsByClassName("productQuantity");
	const productTotalCosts = document.getElementsByClassName("productTotalCost");
	const totalCost = document.getElementById("totalCost");

	//console.log('aantal producten is gewijzigd');
	let total = 0.0;
	for (i = 0; i < productPrices.length; i++) {
		productTotalCosts[i].innerHTML = productPrices[i].innerHTML * productQuantities[i].value;
		total += parseFloat(productTotalCosts[i].innerHTML);
	}
	totalCost.innerHTML = total.toFixed(2);
}

const table = document.getElementById("boodschappen");
table.addEventListener("change", update);

update();
</script>

<?php require "partials/footer.php" ?>
