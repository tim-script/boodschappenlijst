<?php

require "Database.php";
require "Validator.php";

$errors = [];

$form = [
	"name" => null,
	"number" => null,
	"price" => null,
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$errors = validate_form($form);
	if (empty($errors)) {
		insert_form($form);
		header("Location: /");
	}
}

require "views/create.view.php";

function validate_form(&$form) {
	foreach (array_keys($form) as $field)
		$form[$field] = $_POST[$field] ?? null;

	$errors = [];

	if (!Validator::string($form["name"], 1, 1000))
		$errors["name"] = "Vul een productnaam in van minimaal 1 en maximaal 1000 tekens";

	if (!Validator::integer($form["number"], 1))
		$errors["number"] = "Vul een aantal in van 1 of meer";

	if (!Validator::decimal($form["price"], 0, 2))
		$errors["price"] = "Vul een prijs in met maximaal 2 cijfers achter de komma";

	return $errors;
}

function insert_form($form) {
	$config = require "config.php";
	$db = new Database($config["database"]);
	$db->query("INSERT INTO groceries (name, number, price) VALUES (:name, :number, :price)", $form);
}
